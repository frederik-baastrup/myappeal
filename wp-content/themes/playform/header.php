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
					foreach ( $pf_fg['topics'] as $t => $topic ) :
						$ids  = $topic['guides'];
						$feat = $pf_fg['guides'][ $ids[0] ];
						?>
						<li class="ma-nav__item" data-mn>
							<a href="<?php echo esc_url( home_url( '/#' . $t ) ); ?>" class="ma-nav__link" aria-expanded="false" aria-controls="mn-<?php echo esc_attr( $t ); ?>"><?php echo esc_html( $topic['label'] ); ?></a>
							<div class="ma-mega" id="mn-<?php echo esc_attr( $t ); ?>">
								<div class="ma-mega__in">
									<div class="ma-mega__list">
										<span class="ma-kicker"><?php echo esc_html( $topic['label'] ); ?> · <b><?php echo count( $ids ); ?></b> <?php echo 1 === count( $ids ) ? 'guide' : 'guides'; ?></span>
										<ul class="ma-mega__guides<?php echo count( $ids ) > 5 ? ' ma-mega__guides--2' : ''; ?>">
											<?php foreach ( $ids as $id ) : $g = $pf_fg['guides'][ $id ]; ?>
												<li><a href="<?php echo esc_url( $g['url'] ); ?>"><span class="ma-thumb"><?php if ( $g['thumb'] ) : ?><img src="<?php echo esc_url( $g['thumb'] ); ?>" alt="" width="40" height="40" loading="lazy"><?php endif; ?></span><span><?php echo esc_html( $g['short'] ); ?></span></a></li>
											<?php endforeach; ?>
										</ul>
										<a href="<?php echo esc_url( home_url( '/#' . $t ) ); ?>" class="ma-more">Alle guides om <?php echo esc_html( mb_strtolower( $topic['label'] ) ); ?><?php echo playform_icon( 'arrow-right', 14, 1.6 ); // phpcs:ignore ?></a>
									</div>
									<a class="ma-mega__feat" href="<?php echo esc_url( $feat['url'] ); ?>">
										<span class="ma-mega__img"><?php if ( $feat['img'] ) : ?><img src="<?php echo esc_url( $feat['img'] ); ?>" alt="" loading="lazy"><?php endif; ?></span>
										<span class="ma-mega__body">
											<span class="ma-kicker ma-kicker--light">Nyeste guide</span>
											<span class="ma-mega__title"><?php echo esc_html( $feat['title'] ); ?></span>
											<span class="ma-mega__cta">Se top <?php echo (int) $feat['n']; ?> <?php echo playform_icon( 'arrow-right', 14, 1.6 ); // phpcs:ignore ?></span>
										</span>
									</a>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
			<div class="ma-head__end">
				<button type="button" class="ma-searchbtn" data-search-open aria-haspopup="dialog" aria-controls="ma-search" aria-label="Søg i guides"><?php echo playform_icon( 'search', 20, 1.4 ); // phpcs:ignore ?></button>
				<a href="<?php echo esc_url( playform_guide_url() ); ?>" class="ma-allbtn">Alle købsguides</a>
				<button type="button" class="menu-toggle" aria-expanded="false" aria-controls="mobilmenu" aria-label="Åbn menu"><span class="burger" aria-hidden="true"><i></i><i></i><i></i></span></button>
			</div>
		</div>
	</div>
</header>
<?php // Søg i guides: filtrerer listen herunder i browseren – ingen kald til serveren. ?>
<div class="ma-search" id="ma-search" role="dialog" aria-modal="true" aria-label="Søg i købsguides" hidden>
	<div class="ma-search__bg" data-search-close></div>
	<div class="ma-search__box">
		<div class="ma-search__field">
			<?php echo playform_icon( 'search', 22, 1.4 ); // phpcs:ignore ?>
			<input type="search" id="ma-search-input" placeholder="Søg i guides – fx serum, glattejern eller mascara" autocomplete="off" spellcheck="false" role="combobox" aria-expanded="true" aria-controls="ma-search-results" aria-autocomplete="list" data-guide-search="ma-search-results">
			<button type="button" class="ma-search__close" data-search-close aria-label="Luk søgning"><?php echo playform_icon( 'close', 20, 1.4 ); // phpcs:ignore ?></button>
		</div>
		<p class="ma-kicker ma-search__label" data-search-label>Nyeste guides</p>
		<ul class="ma-search__results" id="ma-search-results" role="listbox" aria-label="Guides"></ul>
		<p class="ma-search__hint"><kbd>↑</kbd><kbd>↓</kbd> vælg · <kbd>Enter</kbd> åbn · <kbd>Esc</kbd> luk</p>
	</div>
</div>
<script type="application/json" id="ma-guides-data"><?php echo playform_front_search_json(); // phpcs:ignore ?></script>
<?php get_template_part( 'template-parts/mobile-menu' ); ?>
<?php if ( isset( $_GET['nyhedsbrev'] ) && $_GET['nyhedsbrev'] === 'bekraeftet' ) : // phpcs:ignore ?>
	<div class="notice-bar" role="status"><div class="wrap">Tak – din tilmelding til nyhedsbrevet er bekræftet.</div></div>
<?php endif; ?>
<main id="indhold">
