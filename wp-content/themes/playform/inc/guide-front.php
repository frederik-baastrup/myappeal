<?php
/**
 * Myappeal: data til forsiden, menuen og søgningen i guides (26. nov. 2026).
 *
 * Alt det dyre (guidernes valg slået op som produkter, produktbilleder, laveste pris) bygges én gang og ligger i
 * transienten playform_front_guides_v1 i 12 timer. Den tømmes efter import (Admin::clear_front_cache()), ved udrulning
 * (playform_after_deploy-listen i inc/setup.php) og når et indlæg gemmes. Siden laver derfor ingen ekstra opslag pr. besøg.
 */
defined( 'ABSPATH' ) || exit;

const PLAYFORM_FRONT_GUIDES_KEY = 'playform_front_guides_v1';

/**
 * [ 'count' => int, 'topics' => [ emne => [ 'label', 'guides' => [ id … ] ] ], 'guides' => [ id => guide ] ].
 * Hver guide: url, title, short, excerpt, topic, date (Y-m-d), img, img_srcset, thumb, n (antal valg),
 * top (op til 3 valg: role, name, img, price) – kun valg, butikkerne har på lager, får en pris.
 */
function playform_front_guides(): array {
	static $data = null;
	if ( null !== $data ) {
		return $data;
	}
	$cached = get_transient( PLAYFORM_FRONT_GUIDES_KEY );
	if ( is_array( $cached ) && isset( $cached['guides'] ) ) {
		$data = $cached;
		return $data;
	}
	$data = playform_front_guides_build();
	set_transient( PLAYFORM_FRONT_GUIDES_KEY, $data, 12 * HOUR_IN_SECONDS );
	return $data;
}

/** Kort navn til faner og menu: "Bedste airstyler: …" → "Airstyler". */
function playform_guide_label( WP_Post $p ): string {
	$t = playform_guide_short( $p );
	$t = (string) preg_replace( '~^bedste\s+~iu', '', $t );
	return mb_strtoupper( mb_substr( $t, 0, 1 ) ) . mb_substr( $t, 1 );
}

function playform_front_guides_build(): array {
	$out = [ 'count' => 0, 'topics' => [], 'guides' => [] ];
	foreach ( playform_guides_by_topic() as $t => $posts ) {
		$label = playform_guide_emner()[ $t ][0] ?? $t;
		$ids   = [];
		// Nyeste først i emnet (samme rækkefølge i faner, menu og mobilmenu).
		usort( $posts, static fn( $a, $b ) => strcmp( $b->post_date, $a->post_date ) );
		foreach ( $posts as $p ) {
			$g = playform_front_guide_row( $p, $t );
			if ( ! $g ) {
				continue;
			}
			$out['guides'][ $p->ID ] = $g;
			$ids[]                   = $p->ID;
		}
		if ( $ids ) {
			$out['topics'][ $t ] = [ 'label' => $label, 'guides' => $ids ];
		}
	}
	$out['count'] = count( $out['guides'] );
	return $out;
}

function playform_front_guide_row( WP_Post $p, string $topic ): ?array {
	if ( 'publish' !== $p->post_status ) {
		return null;
	}
	$img = playform_post_image( $p, 700 );
	$aid = (int) get_post_thumbnail_id( $p );
	$top = [];
	$nr1 = null;
	$picks = playform_picks( $p->ID );
	foreach ( array_slice( $picks, 0, 3 ) as $i => $pick ) {
		$prod  = playform_pick_product( $pick );
		$row   = [ 'role' => (string) ( $pick['role'] ?? '' ), 'name' => (string) ( $pick['name'] ?? '' ), 'img' => '', 'price' => 0.0 ];
		if ( $prod ) {
			$d           = playform_card_data( $prod );
			$row['name'] = $d['name'];
			$row['img']  = (string) $d['image'];
			if ( playform_pick_offer( $prod->get_id() ) ) {
				$row['price'] = (float) $d['price'];
			}
		}
		$top[] = $row;
		if ( 0 === $i && $row['img'] && $row['price'] > 0 ) {
			$nr1 = $row;
		}
	}
	return [
		'url'        => get_permalink( $p ),
		'slug'       => $p->post_name,
		'title'      => get_the_title( $p ),
		'short'      => playform_guide_label( $p ),
		'excerpt'    => has_excerpt( $p ) ? get_the_excerpt( $p ) : '',
		'topic'      => $topic,
		'date'       => get_the_date( 'Y-m-d', $p ),
		'modified'   => get_the_modified_date( 'Y-m-d', $p ),
		'img'        => $img,
		'img_srcset' => $img && $aid ? (string) wp_get_attachment_image_srcset( $aid, 'large' ) : '',
		'thumb'      => $aid ? (string) wp_get_attachment_image_url( $aid, 'thumbnail' ) : '',
		'n'          => count( $picks ),
		'top'        => $top,
		'nr1'        => $nr1,
	];
}

function playform_front_guides_flush(): void {
	delete_transient( PLAYFORM_FRONT_GUIDES_KEY );
}
add_action(
	'save_post_post',
	static function ( $id, $post ) {
		if ( ! wp_is_post_revision( $id ) ) {
			playform_front_guides_flush();
		}
	},
	10,
	2
);

/** Nyeste guides på tværs af emner (efter udgivelsesdato). */
function playform_front_latest( int $n ): array {
	$g = playform_front_guides()['guides'];
	uasort( $g, static fn( $a, $b ) => strcmp( $b['date'], $a['date'] ) ?: strcmp( $a['title'], $b['title'] ) );
	return array_slice( $g, 0, $n, true );
}

/** Datoen på dansk: "24. nov. 2026". */
function playform_front_date( string $ymd ): string {
	$ts = strtotime( $ymd . ' 12:00:00' );
	return $ts ? wp_date( 'j. M Y', $ts ) : '';
}

/** "fra 1.299 kr" – kun når et valg har en pris lige nu. */
function playform_front_price( float $price ): string {
	return $price > 0 ? 'fra ' . playform_kr( $price ) : '';
}

/** Listen, som søgningen i guides filtrerer i (lægges inline i siden – ingen serverkald). */
function playform_front_search_json(): string {
	$data   = playform_front_guides();
	$topics = $data['topics'];
	$rows   = [];
	foreach ( playform_front_latest( 999 ) as $g ) {
		$rows[] = [
			't' => wp_specialchars_decode( $g['title'], ENT_QUOTES ),
			's' => $g['short'],
			'e' => $topics[ $g['topic'] ]['label'] ?? '',
			'u' => $g['url'],
			'i' => $g['thumb'],
			'k' => str_replace( '-', ' ', $g['slug'] ),
		];
	}
	return (string) wp_json_encode( $rows, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP );
}

/** Ekstra stylesheet til det redaktionelle udtryk (kun Myappeal). */
add_action(
	'wp_enqueue_scripts',
	static function () {
		$file = get_template_directory() . '/assets/css/myappeal-editorial.css';
		if ( is_file( $file ) ) {
			wp_enqueue_style( 'myappeal-editorial', get_template_directory_uri() . '/assets/css/myappeal-editorial.css', [ 'playform' ], PLAYFORM_THEME_VERSION . '.' . filemtime( $file ) );
		}
	},
	21
);

// Forsidens hero hentes tidligt (det største billede over folden).
add_action(
	'wp_head',
	static function () {
		if ( is_front_page() ) {
			echo '<link rel="preload" as="image" href="' . esc_url( playform_asset( 'hero-myappeal.jpg' ) ) . '" imagesrcset="' . esc_attr( playform_asset( 'hero-myappeal-1200.jpg' ) . ' 1200w, ' . playform_asset( 'hero-myappeal.jpg' ) . ' 2400w' ) . '" imagesizes="100vw" fetchpriority="high">' . "\n";
		}
	},
	2
);
