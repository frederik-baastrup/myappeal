<?php
namespace Playform\Feeds;

/**
 * Placerer et produkt i sitets kategoritræ (Config::categories()) ud fra navn og butikkens kategori.
 * Returnerer en kategori-slug, 'exclude' (skal ikke med) eller Config::uncategorized_slug().
 */
final class Classifier {

	public static function classify( array $offer ): string {
		$name = mb_strtolower( $offer['name'] );
		// Mærkenavnet må ikke styre kategorien (fx "American Barbell Squat Stand").
		$brand = mb_strtolower( trim( $offer['brand'] ) );
		$match_name = $brand !== '' && mb_strlen( $brand ) > 2 ? trim( str_replace( $brand, ' ', $name ) ) : $name;
		$cat  = mb_strtolower( $offer['shop_category'] );

		if ( $offer['price'] <= 0 ) {
			return 'exclude';
		}
		// Butikker med fast kategori-oversættelse (fx cykelbutikker): kun de nævnte butikskategorier kommer med.
		$shop = Config::shops()[ $offer['shop'] ] ?? [];
		$map  = $shop['category_map'] ?? null;
		if ( is_array( $map ) ) {
			$mapped = $map[ $cat ] ?? null;
			// 'map_parents' (kun Myappeal, 10. nov. 2026): butikker med dybe stier ("Personlig Pleje > Ansigtspleje > Serum")
			// slår den nærmeste forælder op, så én nøgle dækker hele grenen. Ukendte grene er stadig 'exclude'.
			if ( null === $mapped && ! empty( $shop['map_parents'] ) ) {
				$path = $cat;
				while ( null === $mapped && false !== ( $pos = strrpos( $path, ' > ' ) ) ) {
					$path   = substr( $path, 0, $pos );
					$mapped = $map[ $path ] ?? null;
				}
			}
			// Udelukkelserne testes på navnet – og på mærke + navn, når navnet ikke selv nævner mærket
			// (fx Beova: "Eros Eau De Toilette" fra Versace er en herreduft).
			$excl_text = ( $brand !== '' && ! str_contains( $name, $brand ) ) ? "$brand $name" : $name;
			// '*': standard for butikskategorier, der ikke er nævnt (fx Glow Studio, hvis kategorier er lange tag-lister).
			$mapped = $mapped ?? ( $map['*'] ?? 'exclude' );
			// '?': butikskategorien er med, men kun vores egne regler (inkl. udelukkelser) afgør placeringen.
			// '?:<regex>': som '?', men navnet skal også matche regex (fx kun bærbare grill fra en stor grillkategori).
			if ( is_string( $mapped ) && str_starts_with( $mapped, '?:' ) ) {
				if ( ! self::m( substr( $mapped, 2 ), $name ) ) {
					return 'exclude';
				}
				$mapped = '?';
			}
			// '!<slug>' (kun Myappeal, 10. nov. 2026): butikkens kategori er sikker (fx "Hårkur" – hårmasker og -serum ville
			// ellers ende i hudpleje). Udelukkelserne gælder; vores regler må kun flytte apparater (Config::appliance_categories()).
			if ( is_string( $mapped ) && str_starts_with( $mapped, '!' ) ) {
				if ( self::excluded( $excl_text ) ) {
					return 'exclude';
				}
				$found = self::first_match( $match_name );
				$apps  = method_exists( Config::class, 'appliance_categories' ) ? Config::appliance_categories() : [];
				return ( $found && in_array( $found, $apps, true ) ) ? $found : substr( $mapped, 1 );
			}
			// '?<slug>': som '?', men varer, vores regler ikke kan placere, lander i <slug> (butikkens kategori er sikker,
			// fx Proshops "Parfume og dufte", hvor navnet ofte kun er mærke og duftnavn).
			if ( is_string( $mapped ) && str_starts_with( $mapped, '?' ) ) {
				if ( self::excluded( $excl_text ) ) {
					return 'exclude';
				}
				$fallback = strlen( $mapped ) > 1 ? substr( $mapped, 1 ) : 'exclude';
				$by_brand = ( $brand !== '' && method_exists( Config::class, 'brand_categories' ) ) ? ( Config::brand_categories()[ $brand ] ?? null ) : null;
				return self::first_match( $match_name ) ?: ( $by_brand ?: $fallback );
			}
			// 'refine': butikken sælger kun nichens varer – vores egne regler må placere varen mere præcist
			// (fx en pizzasaks i butikkens "Andet pizzaudstyr"), ellers bruges butikkens kategori.
			if ( 'exclude' !== $mapped && ! empty( $shop['refine'] ) ) {
				return self::first_match( $match_name ) ?: $mapped;
			}
			return $mapped;
		}
		foreach ( Config::exclude() as $pattern ) {
			if ( self::m( $pattern, $name ) || self::m( $pattern, $cat ) ) {
				return 'exclude';
			}
		}

		$found = self::first_match( $match_name );
		if ( ! $found && ! in_array( $cat, Config::meaningless_shop_categories(), true ) && $cat !== mb_strtolower( $offer['brand'] ) ) {
			$found = self::first_match( $cat );
		}
		// Tilbehør til maskiner (reservedele, filtre …) placeres for sig (Config::machine_categories()).
		if ( $found && in_array( $found, Config::machine_categories(), true ) && self::m( Config::accessory_pattern(), $name ) ) {
			$found = Config::accessory_target();
		}
		// Mærker, der kun laver udstyr til nichen (fx Ooni til pizza): tilbehør uden kategoriord i navnet.
		if ( ! $found && $brand !== '' && method_exists( Config::class, 'brand_categories' ) ) {
			$found = Config::brand_categories()[ $brand ] ?? null;
		}
		if ( ! $found && method_exists( Config::class, 'skip_uncategorized' ) && Config::skip_uncategorized() ) {
			return 'exclude'; // fx Outdoorland: kun varer, der passer i en kategori, kommer med
		}
		return $found ?: Config::uncategorized_slug();
	}

	private static function excluded( string $text ): bool {
		foreach ( Config::exclude() as $pattern ) {
			if ( self::m( $pattern, $text ) ) {
				return true;
			}
		}
		return false;
	}

	private static function first_match( string $text ): ?string {
		if ( $text === '' ) {
			return null;
		}
		foreach ( Config::categories() as $slug => $def ) {
			if ( self::m( $def['match'], $text ) && ( empty( $def['not'] ) || ! self::m( $def['not'], $text ) ) ) {
				return $slug;
			}
		}
		return null;
	}

	private static function m( string $pattern, string $text ): bool {
		return (bool) preg_match( '~' . $pattern . '~iu', $text );
	}
}
