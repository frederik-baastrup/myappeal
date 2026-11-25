<?php
/**
 * Myappeal er kun købsguides (ejerens valg 24. nov. 2026, efter CPU-kvoten og et angreb på filtersiderne).
 * Importen tager kun guidernes varer (Config::guide_eans()). Her: emner til guiderne, menuen ud fra guiderne,
 * og butikssiderne (kategorier, filtre, søgning, tilbud) sendes til guide-oversigten.
 */
defined( 'ABSPATH' ) || exit;

/** Emner i menu og på forsiden: slug => [navn, regex mod guidens slug]. Første match vinder. */
function playform_guide_topics(): array {
	return [
		'makeup'   => [ 'Makeup', '~mascara|foundation|concealer|bb-cream|spejl|primer|laeb|eyeliner|pudder~' ],
		'parfume'  => [ 'Parfume', '~parfume|duft~' ],
		'haar'     => [ 'Hår', '~haar|toershampoo|glattejern|kroellejern|foentoerrer|airstyler|shampoo|balsam~' ],
		'krop'     => [ 'Krop & tænder', '~bodylotion|selvbruner|hudpleje-krop|tandboerste|tand|ipl|vandflosser|flosser|epilator|ladyshave~' ],
		'hudpleje' => [ 'Hudpleje', '~.~' ],
	];
}

function playform_guide_topic( string $slug ): string {
	foreach ( playform_guide_topics() as $t => [ , $re ] ) {
		if ( preg_match( $re, $slug ) ) {
			return $t;
		}
	}
	return 'hudpleje';
}

/** Alle udgivne guides grupperet pr. emne: emne => [WP_Post …]. */
function playform_guides_by_topic(): array {
	static $out = null;
	if ( null !== $out ) {
		return $out;
	}
	$out = array_fill_keys( array_keys( playform_guide_topics() ), [] );
	$cat = get_term_by( 'slug', 'kobsguide', 'category' );
	if ( ! $cat ) {
		return $out;
	}
	foreach ( get_posts( [ 'category' => (int) $cat->term_id, 'numberposts' => 200, 'orderby' => 'title', 'order' => 'ASC' ] ) as $p ) {
		$out[ playform_guide_topic( $p->post_name ) ][] = $p;
	}
	return $out;
}

/** Kort titel til menuen: "Bedste dagcreme" ud fra titlen før kolon. */
function playform_guide_short( WP_Post $p ): string {
	$t = get_the_title( $p );
	return trim( (string) preg_replace( '~:.*$~u', '', $t ) );
}

/** Menu i samme format som playform_menu(), bygget af guiderne. */
function playform_guide_menu(): array {
	$menu = [];
	foreach ( playform_guides_by_topic() as $t => $posts ) {
		if ( ! $posts ) {
			continue;
		}
		$label = playform_guide_topics()[ $t ][0];
		$url   = home_url( '/#' . $t );
		$menu[] = [
			'label'   => $label,
			'slug'    => $t,
			'url'     => $url,
			'tilbud'  => playform_guide_url(),
			'primary' => [
				[
					'label'  => $label,
					'slug'   => $t,
					'url'    => $url,
					'tilbud' => playform_guide_url(),
					'img'    => playform_category_image( [ 'makeup' => 'makeup', 'parfume' => 'parfume', 'haar' => 'haarpleje', 'krop' => 'kropspleje', 'hudpleje' => 'hudpleje' ][ $t ] ?? 'hudpleje' ),
					'subs'   => array_map( static fn( $p ) => [ playform_guide_short( $p ), get_permalink( $p ) ], $posts ),
					'prices' => [],
				],
			],
		];
	}
	return $menu;
}

// Butikssider → guide-oversigten. Guidernes egne produktsider står (de er udgivet); alt andet er kladde = 404.
add_action(
	'template_redirect',
	static function () {
		if ( is_admin() || ! function_exists( 'is_shop' ) ) {
			return;
		}
		$path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' ); // phpcs:ignore
		$shop = is_shop() || is_product_category() || is_product_tag() || is_tax( 'pa_brand' ) || ( is_search() && 'product' === get_query_var( 'post_type' ) )
			|| ( function_exists( 'playform_is_tilbud_page' ) && playform_is_tilbud_page() )
			|| preg_match( '~^(produkter|tilbud|black-friday|januarudsalg|sommerudsalg|efteraarstilbud|maerker?)(/|$)~', $path )
			|| ( is_404() && 0 === strpos( $path, 'produkt/' ) );
		if ( $shop ) {
			wp_safe_redirect( playform_guide_url(), 301 );
			exit;
		}
	},
	1
);

// Guidernes links til kategorisider (/hudpleje/serum/ …) peger nu på sider, der ikke findes: behold kun teksten.
add_filter(
	'the_content',
	static function ( $html ) {
		if ( ! is_string( $html ) || false === strpos( $html, 'href=' ) ) {
			return $html;
		}
		$cats = 'hudpleje|makeup|parfume|haarpleje|haarstyling|kropspleje|tandpleje|solcreme|negle|haarfjerning|barbering|tilbud|produkter';
		return (string) preg_replace( '~<a\b[^>]*href=["\'](?:https?://[^/"\']+)?/(?:' . $cats . ')(?:/[^"\']*)?["\'][^>]*>(.*?)</a>~is', '$1', $html );
	},
	13
);
