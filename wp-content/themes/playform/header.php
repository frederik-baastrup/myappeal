<?php defined( 'ABSPATH' ) || exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>document.documentElement.classList.add('js');</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip" href="#indhold">Gå til indhold</a>

<?php
$pf_money = home_url( '/saadan-tjener-vi-penge/' );
$pf_fg    = playform_front_guides();
$pf_shop  = playform_front_shop();
$pf_usps  = [
	[ 'book', $pf_fg['count'] . ' købsguides', 'i skønhed og pleje' ],
	[ 'clock', 'Priser opdateret', 'hver dag' ],
	[ 'info', 'Ingen egen afprøvning', '– valg ud fra produktdata' ],
];
?>
<div class="topbar">
	<div class="wrap topbar__in">
		<ul class="topbar__usp">
			<?php foreach ( $pf_usps as [ $icon, $lead, $rest ] ) : ?>
				<li><?php echo playform_icon( $icon, 14, 1.4 ); // phpcs:ignore ?><span><b><?php echo esc_html( $lead ); ?></b> <?php echo esc_html( $rest ); ?></span></li>
			<?php endforeach; ?>
		</ul>
		<a class="topbar__ad" href="<?php echo esc_url( $pf_money ); ?>"><span class="topbar__tag">Annonce</span>Siden indeholder affiliate-links</a>
	</div>
	<?php // Mobil: én linje, hvor løfterne skifter roligt ?>
	<div class="topbar__mob">
		<a class="topbar__tag" href="<?php echo esc_url( $pf_money ); ?>" title="Siden indeholder affiliate-links (reklamelinks)">Reklamelinks</a>
		<span class="topbar__rot" aria-live="off">
			<?php foreach ( $pf_usps as $i => [ $icon, $lead, $rest ] ) : ?>
				<span class="topbar__msg<?php echo $i === 0 ? ' is-on' : ''; ?>"><?php echo playform_icon( $icon, 13, 1.4 ); // phpcs:ignore ?><b><?php echo esc_html( $lead ); ?></b> <?php echo esc_html( $rest ); ?></span>
			<?php endforeach; ?>
		</span>
	</div>
</div>

<header class="site-header ma-head">
	<div class="wrap">
		<div class="site-header__row">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php echo esc_attr( playform_site( 'name' ) ); ?> forside">
				<img src="<?php echo esc_url( playform_asset( 'logo.svg' ) ); ?>" alt="<?php echo esc_attr( playform_site( 'name' ) ); ?>" width="147" height="32">
			</a>
			<nav class="ma-nav" aria-label="Emner">
				<ul class="ma-nav__list">
					<?php
					// Emner: butikkens kategorier (venstre) + købsguides (midten) + nyeste guide (højre). Alt fra cachen.
					foreach ( playform_guide_emner() as $t => [ $tlabel ] ) :
						$ids   = $pf_fg['topics'][ $t ]['guides'] ?? [];
						$cats  = $pf_shop['topics'][ $t ] ?? [];
						if ( ! $ids && ! $cats ) {
							continue;
						}
						$feat  = $ids ? $pf_fg['guides'][ $ids[0] ] : null;
						$turl  = home_url( '/#' . $t );
						?>
						<li class="ma-nav__item" data-mn>
							<a href="<?php echo esc_url( $turl ); ?>" class="ma-nav__link" aria-expanded="false" aria-controls="mn-<?php echo esc_attr( $t ); ?>"><?php echo esc_html( $tlabel ); ?></a>
							<div class="ma-mega" id="mn-<?php echo esc_attr( $t ); ?>">
								<div class="ma-mega__in<?php echo $cats ? ' ma-mega__in--shop' : ''; ?>">
									<?php if ( $cats ) : ?>
										<div class="ma-mega__shop">
											<span class="ma-kicker">Shop <?php echo esc_html( mb_strtolower( $tlabel ) ); ?></span>
											<div class="ma-mega__cats">
												<?php foreach ( $cats as $c ) : ?>
													<div class="ma-mcat">
														<a class="ma-mcat__head" href="<?php echo esc_url( $c['url'] ); ?>"><?php echo esc_html( $c['label'] ); ?><small><?php echo esc_html( number_format_i18n( $c['count'] ) ); ?></small></a>
														<?php if ( $c['subs'] ) : ?>
															<ul>
																<?php foreach ( array_slice( $c['subs'], 0, count( $cats ) > 1 ? 7 : 14 ) as $sub ) : ?>
																	<li><a href="<?php echo esc_url( $sub['url'] ); ?>"><?php echo esc_html( $sub['label'] ); ?></a></li>
																<?php endforeach; ?>
															</ul>
														<?php endif; ?>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if ( $ids ) : ?>
									<div class="ma-mega__list">
										<span class="ma-kicker"><?php echo esc_html( $cats ? 'Købsguides' : $tlabel ); ?> · <b><?php echo count( $ids ); ?></b> <?php echo 1 === count( $ids ) ? 'guide' : 'guides'; ?></span>
										<ul class="ma-mega__guides<?php echo ! $cats && count( $ids ) > 5 ? ' ma-mega__guides--2' : ''; ?>">
											<?php foreach ( array_slice( $ids, 0, $cats ? 7 : 99 ) as $id ) : $g = $pf_fg['guides'][ $id ]; ?>
												<li><a href="<?php echo esc_url( $g['url'] ); ?>"><span class="ma-thumb"><?php if ( $g['thumb'] ) : ?><img src="<?php echo esc_url( $g['thumb'] ); ?>" alt="" width="40" height="40" loading="lazy"><?php endif; ?></span><span><?php echo esc_html( $g['short'] ); ?></span></a></li>
											<?php endforeach; ?>
										</ul>
										<a href="<?php echo esc_url( home_url( '/#' . $t ) ); ?>" class="ma-more">Alle guides om <?php echo esc_html( mb_strtolower( $tlabel ) ); ?><?php echo playform_icon( 'arrow-right', 14, 1.6 ); // phpcs:ignore ?></a>
									</div>
									<?php endif; ?>
									<?php if ( $feat ) : ?>
									<a class="ma-mega__feat" href="<?php echo esc_url( $feat['url'] ); ?>">
										<span class="ma-mega__img"><?php if ( $feat['img'] ) : ?><img src="<?php echo esc_url( $feat['img'] ); ?>" alt="" loading="lazy"><?php endif; ?></span>
										<span class="ma-mega__body">
											<span class="ma-kicker ma-kicker--light">Nyeste guide</span>
											<span class="ma-mega__title"><?php echo esc_html( $feat['head'] ); ?></span><?php if ( $feat['excerpt'] ) : ?><span class="ma-mega__sub"><?php echo esc_html( $feat['excerpt'] ); ?></span><?php endif; ?>
											<span class="ma-mega__cta">Se top <?php echo (int) $feat['n']; ?> <?php echo playform_icon( 'arrow-right', 14, 1.6 ); // phpcs:ignore ?></span>
										</span>
									</a>
									<?php endif; ?>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
					<?php if ( $pf_shop['deal_count'] > 0 ) : ?>
						<li class="ma-nav__item"><a href="<?php echo esc_url( playform_tilbud_url() ); ?>" class="ma-nav__link ma-nav__link--sale">Tilbud</a></li>
					<?php endif; ?>
				</ul>
			</nav>
			<div class="ma-head__end">
				<button type="button" class="ma-searchbtn" data-search-open aria-haspopup="dialog" aria-controls="ma-search" aria-label="Søg i kategorier og guides"><?php echo playform_icon( 'search', 20, 1.4 ); // phpcs:ignore ?></button>
				<a href="<?php echo esc_url( playform_guide_url() ); ?>" class="ma-allbtn">Alle købsguides</a>
				<button type="button" class="menu-toggle" aria-expanded="false" aria-controls="mobilmenu" aria-label="Åbn menu"><span class="burger" aria-hidden="true"><i></i><i></i><i></i></span></button>
			</div>
		</div>
	</div>
</header>
<?php // Søg i kategorier og guides: filtrerer listen herunder i browseren – ingen kald til serveren. ?>
<div class="ma-search" id="ma-search" role="dialog" aria-modal="true" aria-label="Søg i kategorier og købsguides" hidden>
	<div class="ma-search__bg" data-search-close></div>
	<div class="ma-search__box">
		<div class="ma-search__field">
			<?php echo playform_icon( 'search', 22, 1.4 ); // phpcs:ignore ?>
			<input type="search" id="ma-search-input" placeholder="Søg – fx serum, glattejern eller mascara" autocomplete="off" spellcheck="false" role="combobox" aria-expanded="true" aria-controls="ma-search-results" aria-autocomplete="list" data-guide-search="ma-search-results">
			<button type="button" class="ma-search__close" data-search-close aria-label="Luk søgning"><?php echo playform_icon( 'close', 20, 1.4 ); // phpcs:ignore ?></button>
		</div>
		<p class="ma-kicker ma-search__label" data-search-label>Nyeste guides</p>
		<ul class="ma-search__results" id="ma-search-results" role="listbox" aria-label="Kategorier og guides"></ul>
		<p class="ma-search__hint"><kbd>↑</kbd><kbd>↓</kbd> vælg · <kbd>Enter</kbd> åbn · <kbd>Esc</kbd> luk</p>
	</div>
</div>
<script type="application/json" id="ma-guides-data"><?php echo playform_front_search_json(); // phpcs:ignore ?></script>
<?php
if ( $pf_shop['deal_count'] > 0 ) {
	playform_campaign_bar(); // kun når der er tilbud at vise
}
get_template_part( 'template-parts/mobile-menu' );
?>
<?php if ( isset( $_GET['nyhedsbrev'] ) && $_GET['nyhedsbrev'] === 'bekraeftet' ) : // phpcs:ignore ?>
	<div class="notice-bar" role="status"><div class="wrap">Tak – din tilmelding til nyhedsbrevet er bekræftet.</div></div>
<?php endif; ?>
<main id="indhold">
