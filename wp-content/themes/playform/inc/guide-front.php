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
const PLAYFORM_FRONT_GUIDES_SCHEMA = 3; // hæves, når datastrukturen ændres – så bygges cachen om med det samme

/**
 * Er produktfotoet mørkt? Måler hjørnerne og midten af det lokalt cachede billede (kun når cachen bygges, højst hver 12. time).
 */
function playform_image_is_dark( string $url ): bool {
	$up = wp_get_upload_dir();
	if ( ! function_exists( 'imagecreatefromstring' ) || ! str_starts_with( $url, (string) $up['baseurl'] ) ) {
		return false;
	}
	$file = $up['basedir'] . substr( $url, strlen( (string) $up['baseurl'] ) );
	$raw  = is_file( $file ) && filesize( $file ) < 4000000 ? file_get_contents( $file ) : false; // phpcs:ignore
	$im   = $raw ? @imagecreatefromstring( $raw ) : false; // phpcs:ignore
	if ( ! $im ) {
		return false;
	}
	$w   = imagesx( $im );
	$h   = imagesy( $im );
	$sum = 0;
	$n   = 0;
	foreach ( [ [ .04, .04 ], [ .96, .04 ], [ .04, .96 ], [ .96, .96 ], [ .5, .5 ], [ .3, .5 ], [ .7, .5 ] ] as [ $fx, $fy ] ) {
		$c    = imagecolorsforindex( $im, imagecolorat( $im, (int) ( $fx * ( $w - 1 ) ), (int) ( $fy * ( $h - 1 ) ) ) );
		$sum += 0.2126 * $c['red'] + 0.7152 * $c['green'] + 0.0722 * $c['blue'];
		++$n;
	}
	imagedestroy( $im );
	return $n && $sum / $n < 70;
}

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
	if ( is_array( $cached ) && isset( $cached['guides'] ) && PLAYFORM_FRONT_GUIDES_SCHEMA === ( $cached['schema'] ?? 0 ) ) {
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
	$out = [ 'schema' => PLAYFORM_FRONT_GUIDES_SCHEMA, 'count' => 0, 'topics' => [], 'guides' => [] ];
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
	$out['shop']  = playform_front_shop_build();
	return $out;
}

/**
 * Butikken i samme cache (27. nov. 2026, Myappeal er shop igen): kategorier pr. emne med underkategorier,
 * alle hovedkategorier i menuens rækkefølge og butikkernes aktuelle tilbud. Bygges kun, når cachen er tom.
 */
function playform_front_shop_build(): array {
	$shop   = [ 'topics' => [], 'cats' => [], 'deals' => [], 'deal_count' => 0 ];
	$labels = playform_menu_labels();
	foreach ( playform_topic_categories() as $t => $slugs ) {
		foreach ( $slugs as $slug ) {
			$term = get_term_by( 'slug', $slug, 'product_cat' );
			if ( ! $term instanceof WP_Term || $term->count < 1 ) {
				continue;
			}
			$subs = [];
			foreach ( playform_sub_links( $slug ) as [ $name, $args, $n ] ) {
				$subs[] = [ 'label' => $labels[ $args['sub'] ] ?? wp_specialchars_decode( $name ), 'slug' => $args['sub'], 'url' => playform_category_url( $args['sub'] ), 'count' => (int) $n ];
			}
			$row = [
				'slug'  => $slug,
				'label' => playform_cat_label( $term ),
				'url'   => (string) get_term_link( $term ),
				'img'   => playform_category_image( $slug ),
				'img_s' => is_file( get_template_directory() . "/assets/img/cat-$slug-800.jpg" ) ? playform_asset( "cat-$slug-800.jpg" ) : '',
				'thumb' => playform_category_thumb( $slug ),
				'count' => (int) $term->count,
				'subs'  => $subs,
			];
			$shop['topics'][ $t ][] = $row;
			$shop['cats'][]         = $row;
		}
	}
	// Butikkernes egne tilbud (højst 14 dage gamle, se Sales) på varer fra 150 kr, største rabat først.
	$q = new WP_Query(
		[
			'post_type'              => 'product',
			'post_status'            => 'publish',
			'fields'                 => 'ids',
			'posts_per_page'         => 12,
			'update_post_term_cache' => false,
			'meta_key'               => '_pf_sale_percent',
			'orderby'                => 'meta_value_num',
			'order'                  => 'DESC',
			'meta_query'             => [
				[ 'key' => '_pf_shop_sale', 'compare' => 'EXISTS' ],
				[ 'key' => '_pf_in_stock', 'value' => 1, 'type' => 'NUMERIC' ],
				[ 'key' => '_price', 'value' => 150, 'compare' => '>=', 'type' => 'NUMERIC' ],
			],
		]
	);
	$shop['deal_count'] = (int) $q->found_posts;
	foreach ( $q->posts as $id ) {
		$p = wc_get_product( $id );
		if ( ! $p ) {
			continue;
		}
		$d = playform_card_data( $p );
		if ( ! $d['image'] || $d['price'] <= 0 || ! $d['sale'] ) {
			continue;
		}
		$shop['deals'][] = [
			'url'     => $d['url'],
			'name'    => $d['name'],
			'brand'   => $d['brand'],
			'img'     => (string) $d['image'],
			'price'   => (float) $d['price'],
			'was'     => (float) $d['was'],
			'was_src' => $d['was_src'],
			'shop'    => $d['shop'],
		];
	}
	return $shop;
}

/** Butiksdelen af cachen (tom struktur, hvis den mangler). */
function playform_front_shop(): array {
	return playform_front_guides()['shop'] ?? [ 'topics' => [], 'cats' => [], 'deals' => [], 'deal_count' => 0 ];
}

function playform_front_guide_row( WP_Post $p, string $topic ): ?array {
	if ( 'publish' !== $p->post_status ) {
		return null;
	}
	$img = playform_post_image( $p, 700 );
	$aid = (int) get_post_thumbnail_id( $p );
	// Kun brugbare valg (produkt fundet, billede og pris hos en butik på lager) kommer på forsiden.
	// Rangen beholdes, så "nr. 2" ikke pludselig hedder nr. 1. Nr. 1-hylden tager kun guidens egentlige nr. 1,
	// og kun når produktfotoet ikke er mørkt (sorte æsker ser tunge ud på hylden).
	$top    = [];
	$nr1    = null;
	$picks  = playform_picks( $p->ID );
	$usable = 0;
	foreach ( $picks as $i => $pick ) {
		$prod = playform_pick_product( $pick );
		if ( ! $prod || ! playform_pick_offer( $prod->get_id() ) ) {
			continue;
		}
		$d = playform_card_data( $prod );
		if ( ! $d['image'] || $d['price'] <= 0 ) {
			continue;
		}
		++$usable;
		$row = [ 'rank' => $i + 1, 'role' => (string) ( $pick['role'] ?? '' ), 'name' => $d['name'], 'img' => (string) $d['image'], 'price' => (float) $d['price'] ];
		if ( count( $top ) < 3 ) {
			$top[] = $row;
		}
		if ( 0 === $i && ! playform_image_is_dark( $row['img'] ) ) {
			$nr1 = $row;
		}
	}
	return [
		'url'        => get_permalink( $p ),
		'slug'       => $p->post_name,
		'title'      => get_the_title( $p ),
		'short'      => playform_guide_label( $p ),
		'head'       => playform_guide_short( $p ),
		'front'      => $usable >= 3,
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

/** Listen, som søgningen (guides og kategorier) filtrerer i (lægges inline i siden – ingen serverkald). */
function playform_front_search_json(): string {
	$data   = playform_front_guides();
	$topics = $data['topics'];
	$rows   = [];
	foreach ( playform_front_latest( 999 ) as $g ) {
		$rows[] = [
			't' => wp_specialchars_decode( $g['head'], ENT_QUOTES ),
			'x' => wp_specialchars_decode( $g['title'], ENT_QUOTES ),
			's' => $g['short'],
			'e' => $topics[ $g['topic'] ]['label'] ?? '',
			'u' => $g['url'],
			'i' => $g['thumb'],
			'k' => str_replace( '-', ' ', $g['slug'] ),
		];
	}
	// Kategorier og underkategorier (27. nov. 2026): samme liste, typen 'y' => 'c'.
	foreach ( $data['shop']['cats'] ?? [] as $c ) {
		$rows[] = [ 't' => $c['label'], 'x' => '', 's' => $c['label'], 'e' => 'Kategori', 'u' => $c['url'], 'i' => $c['thumb'], 'k' => $c['slug'], 'y' => 'c', 'n' => $c['count'] ];
		foreach ( $c['subs'] as $sub ) {
			$rows[] = [ 't' => $sub['label'], 'x' => $c['label'], 's' => $sub['label'], 'e' => $c['label'], 'u' => $sub['url'], 'i' => $c['thumb'], 'k' => str_replace( '-', ' ', $sub['slug'] ), 'y' => 'c', 'n' => $sub['count'] ];
		}
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
