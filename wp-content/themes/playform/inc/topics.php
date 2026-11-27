<?php
/**
 * Myappeal: emner (Makeup & parfume, Hår, Krop & tænder, Hudpleje), der samler købsguides og butikkens kategorier
 * i menu, mobilmenu, søgning og på forsiden.
 *
 * 24.–26. nov. 2026 var Myappeal kun købsguides. 27. nov. 2026 (ejerens valg, kategorierne fik trafik) er butikken
 * tilbage: kategorisider, produkter og tilbud – med det redaktionelle design. Data til menu og forside bygges én gang
 * og caches i playform_front_guides() (inc/guide-front.php).
 */
defined( 'ABSPATH' ) || exit;

/** Emner i menu og på forsiden: slug => [navn, regex mod guidens slug]. Første match vinder. */
function playform_guide_emner(): array {
	return [
		// Parfume står sammen med makeup, indtil der er flere parfumeguides (kun én 26. nov. 2026).
		'makeup'   => [ 'Makeup & parfume', '~mascara|foundation|concealer|bb-cream|spejl|primer|laeb|eyeliner|pudder|parfume|duft~' ],
		// "haarfjerner(-til-ansigtet)" er hudpleje, ikke hår.
		'haar'     => [ 'Hår', '~haar(?!fjern)|toershampoo|glattejern|kroellejern|foentoerrer|airstyler|shampoo|balsam~' ],
		'krop'     => [ 'Krop & tænder', '~bodylotion|selvbruner|hudpleje-krop|tandboerste|tand|ipl|vandflosser|flosser|epilator|ladyshave~' ],
		'hudpleje' => [ 'Hudpleje', '~.~' ],
	];
}

function playform_guide_topic( string $slug ): string {
	foreach ( playform_guide_emner() as $t => [ , $re ] ) {
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
	$out = array_fill_keys( array_keys( playform_guide_emner() ), [] );
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

/** Butikkens kategorier pr. emne (rækkefølgen i menuen). */
function playform_topic_categories(): array {
	return [
		'makeup'   => [ 'makeup', 'negle', 'parfume' ],
		'haar'     => [ 'haarpleje', 'haarstyling' ],
		'krop'     => [ 'kropspleje', 'haarfjerning', 'tandpleje' ],
		'hudpleje' => [ 'hudpleje', 'solcreme' ],
	];
}

/** Emnet for en kategori-slug (hovedkategori). */
function playform_category_topic( string $cat ): string {
	foreach ( playform_topic_categories() as $t => $cats ) {
		if ( in_array( $cat, $cats, true ) ) {
			return $t;
		}
	}
	return '';
}

// Ingen produktsøgning på serveren (CPU, 27. nov. 2026): søgningen er overlayet i headeren, der filtrerer en inline liste.
add_action(
	'template_redirect',
	static function () {
		if ( ! is_admin() && is_search() && 'product' === get_query_var( 'post_type' ) ) {
			wp_safe_redirect( home_url( '/' ), 301 );
			exit;
		}
	},
	1
);
