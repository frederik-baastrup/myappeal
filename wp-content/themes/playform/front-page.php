<?php
/**
 * Forside: Myappeal er kun købsguides (24. nov. 2026). Guiderne vises pr. emne (playform_guides_by_topic()).
 */
defined( 'ABSPATH' ) || exit;
get_header();

$topics = playform_guide_emner();
$groups = array_filter( playform_guides_by_topic() );
$card   = static function ( WP_Post $p ): void {
	$img = playform_post_image( $p, 700 ) ?: playform_asset( 'cat-placeholder.svg' );
	?>
	<a href="<?php echo esc_url( get_permalink( $p ) ); ?>" class="gcard">
		<span class="gcard__img"><img src="<?php echo esc_url( $img ); ?>" alt="" loading="lazy"></span>
		<span class="gcard__body">
			<span class="gcard__title"><?php echo esc_html( get_the_title( $p ) ); ?></span>
			<?php if ( has_excerpt( $p ) ) : ?><span class="gcard__excerpt"><?php echo esc_html( get_the_excerpt( $p ) ); ?></span><?php endif; ?>
			<span class="gcard__meta"><span><?php echo esc_html( get_the_modified_date( 'j. M Y', $p ) ); ?></span><i></i><span class="adtag">Reklamelinks</span></span>
		</span>
	</a>
	<?php
};
?>
<section class="wrap cat-top">
	<div class="cat-top__head">
		<h1>Find den rigtige hudpleje, makeup og hårstyling</h1>
		<p>Vores købsguides samler de produkter, vi synes er værd at kigge på – med priser fra de butikker, vi samarbejder med, opdateret hver dag. Vi har ikke selv afprøvet produkterne; valgene bygger på produktdata og generel viden om, hvad der passer til hvem.</p>
	</div>
	<?php if ( count( $groups ) > 1 ) : ?>
		<nav class="tabs" aria-label="Emner">
			<?php foreach ( $groups as $t => $posts ) : ?>
				<a href="#<?php echo esc_attr( $t ); ?>" class="tab"><?php echo esc_html( $topics[ $t ][0] ); ?><span class="tab__n"><?php echo count( $posts ); ?></span></a>
			<?php endforeach; ?>
		</nav>
	<?php endif; ?>
</section>

<?php foreach ( $groups as $t => $posts ) : ?>
	<section class="wrap section guides-index" id="<?php echo esc_attr( $t ); ?>">
		<h2><?php echo esc_html( $topics[ $t ][0] ); ?></h2>
		<div class="gcards">
			<?php foreach ( $posts as $p ) : ?>
				<?php $card( $p ); ?>
			<?php endforeach; ?>
		</div>
	</section>
<?php endforeach; ?>

<section class="wrap section section--end prose">
	<h2>Sådan finder du det rigtige produkt</h2>
	<p>Det bedste produkt er det, der passer til din hud, dit hår og din hverdag – ikke nødvendigvis det dyreste. Derfor starter hver guide med, hvem produktet passer til, og hvem der hellere skal vælge noget andet. Under hvert valg ser du prisen hos de butikker, vi samarbejder med, så du kan se, hvor det er billigst i dag.</p>
	<p>Klikker du videre og køber, får vi en provision fra butikken. Det koster ikke dig noget ekstra og påvirker ikke, hvilke produkter vi vælger.</p>
</section>
<?php
get_footer();
