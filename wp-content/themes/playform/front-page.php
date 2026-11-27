<?php
/**
 * Forside (Myappeal, 26. nov. 2026): redaktionelt købsguide-magasin.
 * Hero → Udvalgt lige nu → Shop efter kategori → én sektion pr. emne (faner + scene-kort + kategorilinks) → Nr. 1-hylden
 * → Aktuelle tilbud → Sådan vælger vi → Flere nye guides → SEO-tekst. Butikken (kategorier, tilbud) kom tilbage 27. nov. 2026.
 * Alle data kommer fra playform_front_guides() (transient i 12 timer). Faner og skift er ren JS/CSS på den renderede HTML;
 * uden JS står alle scene-kort under hinanden.
 */
defined( 'ABSPATH' ) || exit;
get_header();

$fg     = playform_front_guides();
$guides = $fg['guides'];
$topics = $fg['topics'];
$shop   = playform_front_shop();
$arrow  = playform_icon( 'arrow-right', 16, 1.6 );
$money  = home_url( '/saadan-tjener-vi-penge/' );
$plural = static fn( int $n ): string => $n . ' ' . ( 1 === $n ? 'guide' : 'guides' );
$img    = static function ( array $g, string $sizes, string $class = '' ): string {
	if ( ! $g['img'] ) {
		return '<span class="ma-ph" aria-hidden="true"></span>';
	}
	return '<img' . ( $class ? ' class="' . esc_attr( $class ) . '"' : '' ) . ' src="' . esc_url( $g['img'] ) . '"'
		. ( $g['img_srcset'] ? ' srcset="' . esc_attr( $g['img_srcset'] ) . '" sizes="' . esc_attr( $sizes ) . '"' : '' )
		. ' alt="" loading="lazy">';
};
?>

<section class="ma-hero">
	<img class="ma-hero__img" src="<?php echo esc_url( playform_asset( 'hero-myappeal.jpg' ) ); ?>" srcset="<?php echo esc_url( playform_asset( 'hero-myappeal-1200.jpg' ) ); ?> 1200w, <?php echo esc_url( playform_asset( 'hero-myappeal.jpg' ) ); ?> 2400w" sizes="100vw" width="2400" height="1600" alt="" fetchpriority="high">
	<div class="wrap ma-hero__in">
		<p class="ma-kicker">Købsguides til skønhed og pleje</p>
		<h1 class="ma-hero__title">Køb klogere. <span>Vi har gjort forarbejdet.</span></h1>
		<p class="ma-hero__lead">Vi sammenligner produkter og priser fra de butikker, vi samarbejder med – så du hurtigt finder det, der passer til din hud, dit hår og din hverdag.</p>
		<?php if ( $topics ) : ?>
			<nav class="ma-chips" aria-label="Emner">
				<?php foreach ( $topics as $t => $topic ) : ?>
					<a class="ma-chip" href="#<?php echo esc_attr( $t ); ?>"><?php echo esc_html( $topic['label'] ); ?><span><?php echo count( $topic['guides'] ); ?></span></a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>
		<p class="ma-hero__trust"><?php echo playform_icon( 'clock', 14, 1.4 ); // phpcs:ignore ?>Priser opdateres hver dag<i></i>Ikke afprøvet af os<i></i><a href="<?php echo esc_url( $money ); ?>">Reklamelinks</a></p>
	</div>
</section>

<?php
// Udvalgt: de nyeste guides med fulde valg – men ikke dem, der allerede står som første fane i deres emne.
$firsts = [];
foreach ( $topics as $t => $topic ) {
	foreach ( $topic['guides'] as $id ) {
		if ( ! empty( $guides[ $id ]['front'] ) ) {
			$firsts[] = $id;
			break;
		}
	}
}
$feat = [];
foreach ( playform_front_latest( 999 ) as $id => $g ) {
	if ( ! empty( $g['front'] ) && ! in_array( $id, $firsts, true ) && count( $feat ) < 3 ) {
		$feat[ $id ] = $g;
	}
}
?>
<?php if ( count( $feat ) === 3 ) : ?>
	<section class="ma-sec ma-sec--first ma-reveal" aria-labelledby="h-udvalgt">
		<div class="wrap">
			<div class="ma-sec__head">
				<div>
					<p class="ma-kicker">Udvalgt lige nu</p>
					<h2 id="h-udvalgt">Nye købsguides</h2>
				</div>
				<a class="ma-link" href="<?php echo esc_url( playform_guide_url() ); ?>">Alle <?php echo (int) $fg['count']; ?> guides <?php echo $arrow; // phpcs:ignore ?></a>
			</div>
			<div class="ma-feature">
				<?php
				$i = 0;
				foreach ( $feat as $g ) :
					$big = 0 === $i++;
					?>
					<a class="ma-fcard<?php echo $big ? ' ma-fcard--big' : ''; ?>" href="<?php echo esc_url( $g['url'] ); ?>">
						<span class="ma-fcard__img"><?php echo $img( $g, $big ? '(max-width: 900px) 100vw, 840px' : '(max-width: 900px) 100vw, 420px' ); // phpcs:ignore ?></span>
						<span class="ma-fcard__body">
							<span class="ma-kicker ma-kicker--light"><?php echo esc_html( $topics[ $g['topic'] ]['label'] ?? '' ); ?> · Top <?php echo (int) $g['n']; ?></span>
							<span class="ma-fcard__title"><?php echo esc_html( $g['head'] ); ?></span>
							<?php if ( $g['excerpt'] ) : ?><span class="ma-fcard__excerpt"><?php echo esc_html( $g['excerpt'] ); ?></span><?php endif; ?>
							<span class="ma-fcard__meta"><span class="ma-adtag ma-adtag--light">Reklamelinks</span><span class="ma-fcard__go">Læs guiden <?php echo $arrow; // phpcs:ignore ?></span></span>
						</span>
					</a>
					<?php if ( $big ) : ?><div class="ma-feature__side"><?php endif; ?>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( count( $shop['cats'] ) >= 4 ) : ?>
	<section class="ma-sec ma-sec--blush ma-shopcats ma-reveal" aria-labelledby="h-shop">
		<div class="wrap">
			<div class="ma-sec__head">
				<div>
					<p class="ma-kicker">Shop · <b><?php echo esc_html( number_format_i18n( array_sum( array_column( $shop['cats'], 'count' ) ) ) ); ?></b> produkter</p>
					<h2 id="h-shop">Shop efter kategori</h2>
					<p class="ma-sec__sub">Produkter fra de butikker, vi samarbejder med. Priser og lager opdateres hver dag, og du handler hos butikken selv.</p>
				</div>
				<?php if ( $shop['deal_count'] > 0 ) : ?><a class="ma-link" href="<?php echo esc_url( playform_tilbud_url() ); ?>">Se butikkernes tilbud <?php echo $arrow; // phpcs:ignore ?></a><?php endif; ?>
			</div>
			<ul class="ma-cats">
				<?php foreach ( $shop['cats'] as $c ) : ?>
					<li>
						<a class="ma-cat" href="<?php echo esc_url( $c['url'] ); ?>">
							<span class="ma-cat__img"><img src="<?php echo esc_url( $c['img_s'] ?: $c['img'] ); ?>" alt="" loading="lazy" width="800" height="550"></span>
							<span class="ma-cat__body"><b><?php echo esc_html( $c['label'] ); ?></b><small><?php echo esc_html( number_format_i18n( $c['count'] ) ); ?> produkter</small></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>

<?php
$k = count( $shop['cats'] ) >= 4 ? 1 : 0; // skift mellem hvid og blush efter sektionen ovenfor
foreach ( $topics as $t => $topic ) :
	$all   = $topic['guides'];
	$ids   = array_values( array_filter( $all, static fn( $id ) => ! empty( $guides[ $id ]['front'] ) ) );
	$blush = 0 === $k++ % 2;
	$lc    = mb_strtolower( $topic['label'] );
	?>
	<section class="ma-sec ma-topic<?php echo $blush ? ' ma-sec--blush' : ''; ?> ma-reveal" id="<?php echo esc_attr( $t ); ?>" aria-labelledby="h-<?php echo esc_attr( $t ); ?>">
		<div class="wrap">
			<div class="ma-topic__head">
				<p class="ma-kicker"><?php echo esc_html( $topic['label'] ); ?> · <b><?php echo esc_html( $plural( count( $all ) ) ); ?></b></p>
				<h2 id="h-<?php echo esc_attr( $t ); ?>"><?php echo esc_html( $topic['label'] ); ?></h2>
			</div>
			<?php if ( count( $ids ) > 1 ) : ?>
				<div class="ma-tabs" role="tablist" aria-label="Guides om <?php echo esc_attr( $lc ); ?>" data-tabs="<?php echo esc_attr( $t ); ?>">
					<?php foreach ( $ids as $j => $id ) : ?>
						<button type="button" class="ma-tab" role="tab" id="tab-<?php echo (int) $id; ?>" aria-controls="scene-<?php echo (int) $id; ?>" aria-selected="<?php echo 0 === $j ? 'true' : 'false'; ?>" tabindex="<?php echo 0 === $j ? '0' : '-1'; ?>"><?php echo esc_html( $guides[ $id ]['short'] ); ?></button>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<div class="ma-scenes" data-scenes="<?php echo esc_attr( $t ); ?>">
				<?php foreach ( $ids as $j => $id ) : $g = $guides[ $id ]; ?>
					<article class="ma-scene<?php echo 0 === $j ? ' is-active' : ''; ?>" id="scene-<?php echo (int) $id; ?>"<?php echo count( $ids ) > 1 ? ' role="tabpanel" aria-labelledby="tab-' . (int) $id . '"' : ''; ?>>
						<a class="ma-scene__media" href="<?php echo esc_url( $g['url'] ); ?>" tabindex="-1" aria-hidden="true"><?php echo $img( $g, '(max-width: 760px) 90vw, 480px' ); // phpcs:ignore ?></a>
						<div class="ma-scene__body">
							<p class="ma-kicker"><span class="ma-num">Top <?php echo (int) $g['n']; ?></span> · <?php echo esc_html( $g['short'] ); ?></p>
							<h3 class="ma-scene__title"><a href="<?php echo esc_url( $g['url'] ); ?>"><?php echo esc_html( $g['head'] ); ?></a></h3>
							<?php if ( $g['excerpt'] ) : ?><p class="ma-scene__excerpt"><?php echo esc_html( $g['excerpt'] ); ?></p><?php endif; ?>
							<?php if ( $g['top'] ) : ?>
								<p class="ma-scene__lbl">Fra vores top <?php echo (int) $g['n']; ?></p>
								<ol class="ma-top3">
									<?php foreach ( $g['top'] as $r => $row ) : ?>
										<li>
											<span class="ma-top3__img"><img src="<?php echo esc_url( $row['img'] ); ?>" alt="" width="72" height="72" loading="lazy"><i><?php echo (int) $row['rank']; ?></i></span>
											<span class="ma-top3__txt"><small><?php echo esc_html( $row['role'] ); ?></small><b><?php echo esc_html( $row['name'] ); ?></b><span class="ma-top3__price"><?php echo esc_html( playform_front_price( (float) $row['price'] ) ); ?></span></span>
										</li>
									<?php endforeach; ?>
								</ol>
							<?php endif; ?>
							<div class="ma-scene__foot">
								<a class="ma-btn" href="<?php echo esc_url( $g['url'] ); ?>">Se alle <?php echo (int) $g['n']; ?> valg <?php echo $arrow; // phpcs:ignore ?></a>
								<span class="ma-adtag">Reklamelinks</span>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
			<?php if ( count( $all ) > 1 ) : ?>
				<details class="ma-all">
					<summary>Alle <?php echo esc_html( $plural( count( $all ) ) ); ?> om <?php echo esc_html( $lc ); ?> <?php echo playform_icon( 'chevron', 16, 1.6 ); // phpcs:ignore ?></summary>
					<ul class="ma-all__grid">
						<?php foreach ( $all as $id ) : $g = $guides[ $id ]; ?>
							<li><a href="<?php echo esc_url( $g['url'] ); ?>"><span class="ma-thumb ma-thumb--l"><?php if ( $g['thumb'] ) : ?><img src="<?php echo esc_url( $g['thumb'] ); ?>" alt="" width="52" height="52" loading="lazy"><?php endif; ?></span><span><b><?php echo esc_html( $g['short'] ); ?></b><small>Top <?php echo (int) $g['n']; ?> · Reklamelinks</small></span></a></li>
						<?php endforeach; ?>
					</ul>
				</details>
			<?php endif; ?>
			<?php if ( ! empty( $shop['topics'][ $t ] ) ) : ?>
				<nav class="ma-shoprow" aria-label="<?php echo esc_attr( 'Shop ' . $lc ); ?>">
					<span class="ma-kicker">Shop <?php echo esc_html( $lc ); ?></span>
					<?php foreach ( $shop['topics'][ $t ] as $c ) : ?>
						<a class="ma-chip" href="<?php echo esc_url( $c['url'] ); ?>"><?php echo esc_html( $c['label'] ); ?><span><?php echo esc_html( number_format_i18n( $c['count'] ) ); ?></span></a>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>
		</div>
	</section>
<?php endforeach; ?>

<?php
$shelf = [];
foreach ( playform_front_latest( 999 ) as $g ) {
	if ( ! empty( $g['nr1'] ) && count( $shelf ) < 12 ) {
		$shelf[] = $g;
	}
}
?>
<?php if ( count( $shelf ) >= 3 ) : ?>
	<section class="ma-sec ma-shelf ma-reveal" aria-labelledby="h-nr1">
		<div class="wrap">
			<div class="ma-sec__head">
				<div>
					<p class="ma-kicker"><span class="ma-num">Nr. 1</span> · <?php echo count( $shelf ); ?> udvalgte</p>
					<h2 id="h-nr1">Vores nr. 1 i hver guide</h2>
					<p class="ma-sec__sub">Det valg, der står øverst i guiden. Ikke afprøvet af os – valgt ud fra produktdata. <span class="ma-adtag">Reklamelinks</span></p>
				</div>
				<div class="ma-arrows" data-slider-arrows="ma-shelf">
					<button type="button" data-dir="-1" aria-label="Forrige"><?php echo playform_icon( 'arrow-left', 18, 1.4 ); // phpcs:ignore ?></button>
					<button type="button" data-dir="1" aria-label="Næste"><?php echo playform_icon( 'arrow-right', 18, 1.4 ); // phpcs:ignore ?></button>
				</div>
			</div>
		</div>
		<ul class="ma-shelf__row" id="ma-shelf">
				<?php foreach ( $shelf as $g ) : $p = $g['nr1']; ?>
					<li class="slider__item">
						<a class="ma-pcard" href="<?php echo esc_url( $g['url'] ); ?>">
							<span class="ma-pcard__img"><img src="<?php echo esc_url( $p['img'] ); ?>" alt="" loading="lazy"><i>1</i></span>
							<span class="ma-kicker"><?php echo esc_html( $g['short'] ); ?></span>
							<span class="ma-pcard__name"><?php echo esc_html( $p['name'] ); ?></span>
							<span class="ma-pcard__foot"><b><?php echo esc_html( playform_front_price( (float) $p['price'] ) ); ?></b><span class="ma-pcard__go">Se guiden <?php echo playform_icon( 'arrow-right', 14, 1.6 ); // phpcs:ignore ?></span></span>
						</a>
					</li>
				<?php endforeach; ?>
		</ul>
	</section>
<?php endif; ?>

<?php if ( count( $shop['deals'] ) >= 4 ) : ?>
	<section class="ma-sec ma-sec--blush ma-shelf ma-deals ma-reveal" aria-labelledby="h-tilbud">
		<div class="wrap">
			<div class="ma-sec__head">
				<div>
					<p class="ma-kicker">Aktuelle tilbud · <b><?php echo esc_html( number_format_i18n( $shop['deal_count'] ) ); ?></b> i alt</p>
					<h2 id="h-tilbud">Sat ned af butikkerne</h2>
					<p class="ma-sec__sub">Butikkernes egne tilbud, højst <?php echo (int) ( class_exists( '\Playform\Feeds\Sales' ) ? \Playform\Feeds\Sales::DAYS : 14 ); ?> dage gamle. Den endelige pris ser du hos butikken. <span class="ma-adtag">Reklamelinks</span></p>
				</div>
				<div class="ma-arrows" data-slider-arrows="ma-deals">
					<button type="button" data-dir="-1" aria-label="Forrige"><?php echo playform_icon( 'arrow-left', 18, 1.4 ); // phpcs:ignore ?></button>
					<button type="button" data-dir="1" aria-label="Næste"><?php echo playform_icon( 'arrow-right', 18, 1.4 ); // phpcs:ignore ?></button>
				</div>
			</div>
		</div>
		<ul class="ma-shelf__row" id="ma-deals">
			<?php foreach ( $shop['deals'] as $d ) : $pct = $d['was'] > $d['price'] ? (int) round( ( $d['was'] - $d['price'] ) / $d['was'] * 100 ) : 0; ?>
				<li class="slider__item">
					<a class="ma-pcard" href="<?php echo esc_url( $d['url'] ); ?>">
						<span class="ma-pcard__img"><img src="<?php echo esc_url( $d['img'] ); ?>" alt="" loading="lazy"><?php if ( $pct >= 5 ) : ?><i class="ma-pcard__pct">−<?php echo (int) $pct; ?> %</i><?php endif; ?></span>
						<span class="ma-kicker"><?php echo esc_html( $d['brand'] ?: 'Tilbud hos ' . $d['shop'] ); ?></span>
						<span class="ma-pcard__name"><?php echo esc_html( $d['name'] ); ?></span>
						<span class="ma-pcard__foot"><b class="ma-pcard__sale"><?php echo esc_html( playform_kr( $d['price'] ) ); ?><?php if ( $d['was'] > $d['price'] ) : ?> <s title="<?php echo 'shop' === $d['was_src'] ? 'Butikkens førpris' : 'Laveste pris de 30 dage før tilbuddet'; ?>"><?php echo esc_html( playform_kr( $d['was'] ) ); ?></s><?php endif; ?></b><span class="ma-pcard__go"><?php echo esc_html( $d['shop'] ); ?></span></span>
						<?php if ( 'shop' === $d['was_src'] ) : ?><span class="ma-pcard__note">Butikkens førpris</span><?php endif; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
<?php endif; ?>

<section class="ma-band ma-reveal" aria-labelledby="h-metode">
	<div class="wrap">
		<div class="ma-band__head">
			<p class="ma-kicker ma-kicker--pink">Sådan vælger vi</p>
			<h2 id="h-metode">Ærlige valg. Ingen pynt.</h2>
		</div>
		<ul class="ma-band__cols">
			<li>
				<?php echo playform_icon( 'doc', 28, 1.4 ); // phpcs:ignore ?>
				<h3>Produktdata</h3>
				<p>Vi gennemgår ingredienser, funktioner, størrelser og pris i butikkernes produktdata og vælger ud fra, hvem produktet passer til.</p>
			</li>
			<li>
				<?php echo playform_icon( 'compare', 28, 1.4 ); // phpcs:ignore ?>
				<h3>Priser fra flere butikker</h3>
				<p>Under hvert valg ser du prisen hos de butikker, vi samarbejder med. Priser og lager opdateres hver dag.</p>
			</li>
			<li>
				<?php echo playform_icon( 'heart', 28, 1.4 ); // phpcs:ignore ?>
				<h3>Ingen egen afprøvning</h3>
				<p>Vi har ikke selv prøvet produkterne – og det siger vi ærligt ved hvert eneste valg, så du ved, hvad anbefalingen bygger på.</p>
			</li>
		</ul>
		<p class="ma-band__links"><a href="<?php echo esc_url( playform_method_url() ); ?>">Sådan vælger vi produkter <?php echo $arrow; // phpcs:ignore ?></a><a href="<?php echo esc_url( $money ); ?>">Sådan tjener vi penge <?php echo $arrow; // phpcs:ignore ?></a></p>
	</div>
</section>

<?php $more = array_slice( array_diff_key( playform_front_latest( 999 ), $feat ), 0, 8, true ); ?>
<?php if ( $more ) : ?>
	<section class="ma-sec ma-reveal" aria-labelledby="h-nyeste">
		<div class="wrap">
			<div class="ma-sec__head">
				<div>
					<p class="ma-kicker">Senest udgivet</p>
					<h2 id="h-nyeste">Flere nye guides</h2>
				</div>
				<a class="ma-link" href="<?php echo esc_url( playform_guide_url() ); ?>">Se alle guides <?php echo $arrow; // phpcs:ignore ?></a>
			</div>
			<ul class="ma-latest">
				<?php foreach ( $more as $g ) : ?>
					<li>
						<a href="<?php echo esc_url( $g['url'] ); ?>">
							<span class="ma-thumb ma-thumb--xl"><?php if ( $g['thumb'] ) : ?><img src="<?php echo esc_url( $g['thumb'] ); ?>" alt="" width="72" height="72" loading="lazy"><?php endif; ?></span>
							<span class="ma-latest__txt">
								<span class="ma-latest__meta"><span class="ma-kicker"><?php echo esc_html( $topics[ $g['topic'] ]['label'] ?? '' ); ?> · <span class="ma-num">Top <?php echo (int) $g['n']; ?></span></span><span class="ma-adtag">Reklamelinks</span></span>
								<b><?php echo esc_html( $g['head'] ); ?></b>
								<?php if ( $g['excerpt'] ) : ?><small><?php echo esc_html( $g['excerpt'] ); ?></small><?php endif; ?>
							</span>
							<?php echo $arrow; // phpcs:ignore ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>

<section class="ma-sec ma-sec--blush ma-seo">
	<div class="wrap">
		<div class="ma-seo__in prose">
			<p class="ma-kicker">Om vores købsguides</p>
			<h2>Sådan finder du det rigtige produkt</h2>
			<p>Det bedste produkt er det, der passer til din hud, dit hår og din hverdag – ikke nødvendigvis det dyreste. Derfor starter hver guide med, hvem produktet passer til, og hvem der hellere skal vælge noget andet. Under hvert valg ser du prisen hos de butikker, vi samarbejder med, så du kan se, hvor det er billigst i dag.</p>
			<p>Klikker du videre og køber, får vi en provision fra butikken. Det koster ikke dig noget ekstra og påvirker ikke, hvilke produkter vi vælger.</p>
		</div>
	</div>
</section>
<?php
get_footer();
