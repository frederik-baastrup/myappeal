<?php
defined( 'ABSPATH' ) || exit;
get_header();

/** Produkter til forsidens sliders. Caches i 6 timer. */
function playform_front_products( string $which ): array {
	$key = "playform_front_$which";
	$ids = get_transient( $key );
	if ( $ids === false ) {
		$base = [
			'post_type'      => 'product',
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'posts_per_page' => 12,
			'no_found_rows'  => true,
			'meta_query'     => [
				[ 'key' => '_pf_in_stock', 'value' => 1, 'type' => 'NUMERIC' ],
				[ 'key' => '_pf_image', 'value' => '', 'compare' => '!=' ],
			],
		];
		if ( $which === 'deals' ) {
			// Butikkernes egne tilbud (højst 14 dage gamle) på udstyr over 300 kr, største rabat først.
			$base['meta_query'][] = [ 'key' => '_pf_shop_sale', 'compare' => 'EXISTS' ];
			$base['meta_query'][] = [ 'key' => '_price', 'value' => 300, 'compare' => '>=', 'type' => 'NUMERIC' ];
			$base['meta_key']     = '_pf_sale_percent';
			$base['orderby']      = 'meta_value_num';
			$base['order']        = 'DESC';
		} elseif ( $which === 'new' ) {
			$base['orderby'] = 'rand';
			$base['tax_query'] = [ [ 'taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => array_column( playform_menu_spec(), 0 ) ] ];
		} else {
			// "Populære": stylingapparater, hårfjerning, eltandbørster og parfume (størst kurv), blandet hver dag.
			$base['tax_query']    = [ [ 'taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => [ 'haarstyling', 'haarfjerning', 'tandpleje', 'parfume', 'barbering' ] ] ];
			$base['meta_query'][] = [ 'key' => '_price', 'value' => 400, 'compare' => '>=', 'type' => 'NUMERIC' ];
			$base['orderby']      = 'rand';
		}
		$ids = get_posts( $base );
		set_transient( $key, $ids, 6 * HOUR_IN_SECONDS );
	}
	return array_filter( array_map( 'wc_get_product', $ids ) );
}

/**
 * Forsidens kategori-sektioner: 5 populære kategorier med god kurvstørrelse (ejerens ønske 4. nov. 2026: ikke noget megabilligt).
 * slug => [ overskrift, mindstepris i kr. ]. Caches i 6 timer; produkterne blandes, så forsiden skifter.
 */
function playform_front_categories(): array {
	return [
		'haarstyling'    => [ 'Hårstyling', 300 ],
		'dameparfume'    => [ 'Dameparfume', 300 ],
		'herreparfume'   => [ 'Herreparfume', 300 ],
		'el-tandboerste' => [ 'Eltandbørster', 300 ],
		'serum'          => [ 'Serum til ansigtet', 150 ],
	];
}

function playform_front_category_products( string $slug, int $min ): array {
	$key = 'playform_front_cat_' . $slug;
	$ids = get_transient( $key );
	if ( $ids === false ) {
		$ids = get_posts(
			[
				'post_type'      => 'product',
				'post_status'    => 'publish',
				'fields'         => 'ids',
				'posts_per_page' => 12,
				'no_found_rows'  => true,
				'orderby'        => 'rand',
				'tax_query'      => [ [ 'taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => [ $slug ] ] ],
				'meta_query'     => [
					[ 'key' => '_pf_in_stock', 'value' => 1, 'type' => 'NUMERIC' ],
					[ 'key' => '_pf_image', 'value' => '', 'compare' => '!=' ],
					[ 'key' => '_price', 'value' => $min, 'compare' => '>=', 'type' => 'NUMERIC' ],
				],
			]
		);
		set_transient( $key, $ids, 6 * HOUR_IN_SECONDS );
	}
	return array_filter( array_map( 'wc_get_product', $ids ) );
}

$hero = [
	[ 'slug' => 'hudpleje', 'title' => 'Hudpleje', 'big' => true, 'subs' => [ [ 'Serum', [ 'sub' => 'serum' ] ], [ 'Dagcreme', [ 'sub' => 'dagcreme' ] ], [ 'Øjencreme', [ 'sub' => 'oejencreme' ] ], [ 'Retinol', [ 'sub' => 'retinol' ] ], [ 'Solcreme til ansigt', [ 'sub' => 'solcreme-til-ansigt' ] ] ] ],
	[ 'slug' => 'haarstyling', 'title' => 'Hårstyling', 'subs' => [ [ 'Glattejern', [ 'sub' => 'glattejern' ] ], [ 'Hårtørrer', [ 'sub' => 'haartoerrer' ] ], [ 'Krøllejern', [ 'sub' => 'kroellejern' ] ] ] ],
	[ 'slug' => 'parfume', 'title' => 'Parfume', 'subs' => [ [ 'Dameparfume', [ 'sub' => 'dameparfume' ] ], [ 'Herreparfume', [ 'sub' => 'herreparfume' ] ], [ 'Unisex', [ 'sub' => 'unisex-parfume' ] ] ] ],
	[ 'slug' => 'makeup', 'title' => 'Makeup', 'subs' => [ [ 'Foundation', [ 'sub' => 'foundation' ] ], [ 'Mascara', [ 'sub' => 'mascara' ] ], [ 'Læbestift', [ 'sub' => 'laebestift' ] ] ] ],
];
// Desktop: det store kort til venstre og tre kort til højre. Mobil: karrusel med 6 kategorier.
$mob = array_values( array_filter(
	[ 'hudpleje', 'haarstyling', 'parfume', 'makeup', 'haarpleje', 'tandpleje' ],
	static function ( $c ) {
		$t = get_term_by( 'slug', $c, 'product_cat' );
		return $t && ( $t->count > 0 || get_term_children( $t->term_id, 'product_cat' ) );
	}
) );
foreach ( $hero as &$h ) {
	$pos       = array_search( $h['slug'], $mob, true );
	$h['mob']  = false !== $pos ? $pos : -1; // -1 = kun desktop
	$h['desk'] = true;
	$h['img']  = playform_category_image( $h['slug'] );
}
unset( $h );
foreach ( $mob as $pos => $c ) {
	if ( ! in_array( $c, array_column( $hero, 'slug' ), true ) ) {
		$t      = get_term_by( 'slug', $c, 'product_cat' );
		$hero[] = [ 'slug' => $c, 'title' => $t ? playform_cat_label( $t ) : $c, 'img' => playform_category_image( $c ), 'mob' => $pos, 'desk' => false, 'subs' => array_map( static fn( $l ) => [ $l[0], $l[1] ], array_slice( playform_sub_links( $c ), 0, 3 ) ) ];
	}
}
$deals     = playform_front_products( 'deals' );
$has_deals = count( $deals ) >= 4;
?>

<section class="wrap hero-wrap">
	<h1 class="screen-reader-text"><?php echo esc_html( playform_site( 'name' ) . ' – ' . playform_site( 'niche' ) . ' fra de butikker, vi samarbejder med' ); ?></h1>
	<div class="hero">
		<?php foreach ( $hero as $i => $h ) : ?>
			<?php if ( $i === 1 ) : ?><div class="hero__side"><?php endif; ?>
			<div class="cat<?php echo ! empty( $h['big'] ) ? ' cat--big' : ''; ?><?php echo $h['desk'] ? '' : ' cat--mob'; ?><?php echo $h['mob'] < 0 ? ' cat--desk' : ''; ?>"<?php echo $h['mob'] >= 0 ? ' style="--mob-order:' . (int) $h['mob'] . '"' : ''; ?>>
				<img class="cat__img" src="<?php echo esc_url( $h['img'] ); ?>"<?php echo playform_srcset( $h['img'], $i === 0 ? '(max-width: 760px) 100vw, 60vw' : '(max-width: 760px) 80vw, 30vw' ); // phpcs:ignore ?> alt="" <?php echo $i === 0 ? 'fetchpriority="high"' : 'loading="lazy"'; ?>>
				<span class="cat__shade"></span>
				<a class="cat__main" href="<?php echo esc_url( playform_category_url( $h['slug'], $h['args'] ?? [] ) ); ?>" aria-label="<?php echo esc_attr( $h['title'] ); ?>"></a>
				<div class="cat__body">
					<span class="cat__title"><?php echo esc_html( $h['title'] ); ?></span>
					<nav class="cat__subs" aria-label="<?php echo esc_attr( 'Underkategorier til ' . $h['title'] ); ?>">
						<?php foreach ( $h['subs'] as [ $label, $args ] ) : ?>
							<a href="<?php echo esc_url( playform_category_url( $h['slug'], $args ) ); ?>"><?php echo esc_html( $label ); ?></a>
						<?php endforeach; ?>
					</nav>
				</div>
				<span class="cat__arrow" aria-hidden="true"><?php echo playform_icon( 'arrow-right', 20, 1.4 ); // phpcs:ignore ?></span>
			</div>
			<?php if ( $i === 3 ) : ?></div><?php endif; ?>
		<?php endforeach; ?>
	</div>

	<div class="usp">
		<div class="usp__item"><span class="usp__icon"><?php echo playform_icon( 'grid', 22, 1.4 ); // phpcs:ignore ?></span><span><b>Fra top til tå</b><span>Hud, hår, makeup og parfume</span></span></div>
		<div class="usp__item"><span class="usp__icon"><?php echo playform_icon( 'refresh', 22, 1.4 ); // phpcs:ignore ?></span><span><b>Opdateret 2× dagligt</b><span>Friske priser og lagertal</span></span></div>
		<div class="usp__item"><span class="usp__icon"><?php echo playform_icon( 'store', 22, 1.4 ); // phpcs:ignore ?></span><span><b>Handl hos webshoppen</b><span>Vi sender dig videre til butikken</span></span></div>
		<a class="usp__item" href="<?php echo esc_url( playform_tilbud_url() ); ?>"><span class="usp__icon"><?php echo playform_icon( 'tag', 22, 1.4 ); // phpcs:ignore ?></span><span><b>Butikkernes tilbud</b><span>Se de nedsatte priser</span></span></a>
	</div>
</section>

<?php
get_template_part( 'template-parts/slider', null, [ 'title' => 'Populære produkter', 'products' => playform_front_products( 'popular' ), 'id' => 'slider-pop' ] );
get_template_part(
	'template-parts/slider',
	null,
	$has_deals
		? [ 'title' => 'Tilbud lige nu', 'products' => $deals, 'id' => 'slider-deals', 'link' => playform_tilbud_url(), 'link_label' => 'Se alle tilbud' ]
		: [ 'title' => 'Nyt i butikkerne', 'products' => playform_front_products( 'new' ), 'id' => 'slider-new' ]
);
foreach ( playform_front_categories() as $cslug => [ $ctitle, $cmin ] ) {
	$cterm = get_term_by( 'slug', $cslug, 'product_cat' );
	$cprod = $cterm ? playform_front_category_products( $cslug, $cmin ) : [];
	if ( count( $cprod ) >= 4 ) { // en sektion med få produkter ser tom ud – så springes den over
		get_template_part( 'template-parts/slider', null, [ 'title' => $ctitle, 'products' => $cprod, 'id' => 'slider-' . $cslug, 'link' => get_term_link( $cterm ), 'link_label' => 'Se alle ' . mb_strtolower( $ctitle ) ] );
	}
}
?>

<?php if ( class_exists( '\Playform\Feeds\Newsletter' ) && \Playform\Feeds\Newsletter::enabled() ) : // vises først, når nyhedsbrevet er sat op (Værktøjer → Playform Feeds) ?>
<section class="wrap section">
	<div class="news">
		<div>
			<h2>Få besked, når prisen falder</h2>
			<p>Nye tilbud på <?php echo esc_html( playform_site( 'niche' ) ); ?>, købsguides og gode råd om pleje – højst omkring én mail om ugen.</p>
		</div>
		<form class="news__form" method="post" action="#" data-newsletter data-endpoint="<?php echo esc_url( rest_url( 'playform/v1/newsletter' ) ); ?>">
			<input type="text" name="website" tabindex="-1" autocomplete="off" class="sr-only" aria-hidden="true">
			<label for="nl-email">Din e-mail</label>
			<div class="news__row">
				<input id="nl-email" type="email" name="email" placeholder="navn@eksempel.dk" required>
				<button type="submit">Tilmeld</button>
			</div>
			<span class="news__note" role="status" aria-live="polite">Tjek din indbakke og bekræft tilmeldingen i den mail, vi sender. Du kan til enhver tid framelde dig. Læs mere i vores <a href="<?php echo esc_url( home_url( '/privatlivspolitik/' ) ); ?>">privatlivspolitik</a>.</span>
		</form>
	</div>
</section>
<?php endif; ?>

<?php
$posts = get_posts( [ 'post_type' => 'post', 'posts_per_page' => 8 ] );
$items = [];
if ( $posts ) {
	foreach ( $posts as $post_item ) {
		$cats    = get_the_category( $post_item->ID );
		$items[] = [
			'title' => get_the_title( $post_item ),
			'tag'   => $cats ? $cats[0]->name : 'Guide',
			'img'   => playform_post_image( $post_item, 700 ) ?: playform_asset( 'cat-placeholder.svg' ),
			'url'   => get_permalink( $post_item ),
			'date'  => get_the_date( 'j. M Y', $post_item ),
			'ad'    => playform_post_ad_label( $post_item ),
		];
	}
}
?>
<?php if ( $items ) : // vises, når der er udgivne guides ?>
<section class="wrap section">
	<div class="section__head">
		<h2>Guides og artikler</h2>
		<span class="section__line"></span>
		<a class="section__more" href="<?php echo esc_url( home_url( '/viden/' ) ); ?>">Se alle</a>
	</div>
	<div class="guides-top">
		<?php $g = $items[0]; ?>
		<a href="<?php echo esc_url( $g['url'] ); ?>" class="guide-big">
			<img src="<?php echo esc_url( $g['img'] ); ?>" alt="" loading="lazy">
			<span class="guide-big__shade"></span>
			<span class="guide-big__body">
				<span class="tag-accent"><?php echo esc_html( $g['tag'] ); ?></span>
				<span class="guide-big__title"><?php echo esc_html( $g['title'] ); ?></span>
				<?php if ( $g['date'] ) : ?><span class="guide-big__meta"><?php echo esc_html( $g['date'] . ( $g['ad'] ? ' · ' . $g['ad'] : '' ) ); ?></span><?php endif; ?>
			</span>
		</a>
		<?php if ( isset( $items[1] ) ) : $g = $items[1]; ?>
			<a href="<?php echo esc_url( $g['url'] ); ?>" class="guide-side">
				<img src="<?php echo esc_url( $g['img'] ); ?>" alt="" loading="lazy">
				<span class="guide-side__tag"><?php echo esc_html( $g['tag'] ); ?></span>
				<span class="guide-side__title"><?php echo esc_html( $g['title'] ); ?></span>
				<?php if ( $g['date'] ) : ?><span class="guide-side__meta"><?php echo esc_html( $g['date'] . ( $g['ad'] ? ' · ' . $g['ad'] : '' ) ); ?></span><?php endif; ?>
			</a>
		<?php endif; ?>
	</div>
	<div class="guides-list">
		<?php foreach ( array_slice( $items, 2, 6 ) as $g ) : ?>
			<a href="<?php echo esc_url( $g['url'] ); ?>" class="guide-row">
				<img src="<?php echo esc_url( $g['img'] ); ?>" alt="" loading="lazy">
				<span><b><?php echo esc_html( $g['title'] ); ?></b><span><?php echo esc_html( trim( $g['tag'] . ( $g['date'] ? ' · ' . $g['date'] : '' ) . ( $g['ad'] ? ' · ' . $g['ad'] : '' ) ) ); ?></span></span>
			</a>
		<?php endforeach; ?>
	</div>
</section>
<?php endif; ?>

<?php
$front   = get_post( (int) get_option( 'page_on_front' ) );
$seo     = $front && trim( $front->post_content ) ? apply_filters( 'the_content', $front->post_content ) : '<h2>Hudpleje, makeup, parfume og hårstyling fra de butikker, vi samarbejder med</h2><p>' . esc_html( playform_site( 'name' ) ) . ' samler skønhed og personlig pleje ét sted, så du kan se udvalg, priser og lagerstatus uden at klikke dig gennem den ene webshop efter den anden. Produkterne kommer fra de butikker, vi samarbejder med, og vi henter dem på ny to gange i døgnet. Når du har fundet det, du leder efter, sender vi dig videre til butikken, hvor du handler som du plejer.</p><h3>Start med det, du bruger hver dag</h3><p>Den rutine, du gentager hver morgen og aften, er der, hvor de rigtige produkter gør mest forskel. Find en rens og en creme, der passer til din hudtype, en shampoo til dit hår, og en eltandbørste eller trimmer, du har lyst til at bruge. Er du i tvivl, så læs vores købsguides, hvor vi forklarer, hvad du skal kigge efter.</p><h3>Apparater, der holder i mange år</h3><p>Glattejern, hårtørrere, epilatorer og barbermaskiner er køb, du lever med længe. Se efter, hvordan de passer til dit hår eller din hud, hvor nemme de er at rengøre, og om der fås reservedele som børstehoveder og skær. Og hold øje med tilbudssiden: Her ser du kun butikkernes egne, aktuelle tilbud.</p>';
get_template_part( 'template-parts/seo-text', null, [ 'html' => $seo, 'right' => true ] );
get_footer();
