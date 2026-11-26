<?php
/**
 * Mobilmenuen (Myappeal, 26. nov. 2026): en skuffe i fuld skærm med lag.
 * Forside: søgefelt, emnerne som fotokort (2 kolonner) og "Alle købsguides". Tryk på et emne → lag med emnets guides.
 * Data fra playform_front_guides() (cachet). Uden JavaScript er emnekortene almindelige links til forsidens sektioner.
 */
defined( 'ABSPATH' ) || exit;

$fg   = playform_front_guides();
$chev = playform_icon( 'arrow-right', 16, 1.4 );
$back = playform_icon( 'arrow-left', 18, 1.4 );
?>
<div class="dr-bg" data-close-bg hidden></div>
<div class="dr ma-dr" id="mobilmenu" aria-label="Menu" role="dialog" aria-modal="true" aria-hidden="true" inert>
	<div class="dr__views">
		<section class="dr__view is-active" data-view="root">
			<div class="ma-dr__search">
				<?php echo playform_icon( 'search', 18, 1.4 ); // phpcs:ignore ?>
				<input type="search" placeholder="Søg i guides" autocomplete="off" spellcheck="false" aria-label="Søg i købsguides" role="combobox" aria-expanded="false" aria-controls="ma-dr-results" aria-autocomplete="list" data-guide-search="ma-dr-results">
			</div>
			<ul class="ma-dr__results" id="ma-dr-results" role="listbox" aria-label="Guides" hidden></ul>

			<div class="ma-dr__topics" data-dr-topics>
				<span class="ma-kicker">Emner</span>
				<ul class="ma-dr__grid">
					<?php foreach ( $fg['topics'] as $t => $topic ) : $g = $fg['guides'][ $topic['guides'][0] ]; $n = count( $topic['guides'] ); ?>
						<li>
							<a class="ma-dr__card" href="<?php echo esc_url( home_url( '/#' . $t ) ); ?>" data-to="t-<?php echo esc_attr( $t ); ?>">
								<?php if ( $g['img'] ) : ?><img src="<?php echo esc_url( $g['img'] ); ?>"<?php echo $g['img_srcset'] ? ' srcset="' . esc_attr( $g['img_srcset'] ) . '" sizes="50vw"' : ''; ?> alt="" loading="lazy"><?php endif; ?>
								<span class="ma-dr__card-body"><b><?php echo esc_html( $topic['label'] ); ?></b><small><?php echo (int) $n; ?> <?php echo 1 === $n ? 'guide' : 'guides'; ?></small></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
				<a class="ma-btn ma-btn--ink ma-dr__all" href="<?php echo esc_url( playform_guide_url() ); ?>">Alle købsguides <?php echo $chev; // phpcs:ignore ?></a>

				<ul class="ma-dr__links">
					<li><a href="<?php echo esc_url( playform_method_url() ); ?>">Sådan vælger vi produkter</a></li>
					<li><a href="<?php echo esc_url( home_url( '/saadan-tjener-vi-penge/' ) ); ?>">Sådan tjener vi penge</a></li>
					<li><a href="<?php echo esc_url( home_url( '/viden/' ) ); ?>">Artikler</a></li>
				</ul>
			</div>
		</section>

		<?php foreach ( $fg['topics'] as $t => $topic ) : ?>
			<section class="dr__view" data-view="t-<?php echo esc_attr( $t ); ?>">
				<div class="dr__bar">
					<button type="button" class="dr__back" data-back aria-label="Tilbage"><?php echo $back; // phpcs:ignore ?></button>
					<span class="dr__heading"><?php echo esc_html( $topic['label'] ); ?></span>
				</div>
				<ul class="ma-dr__guides">
					<?php foreach ( $topic['guides'] as $id ) : $g = $fg['guides'][ $id ]; ?>
						<li>
							<a href="<?php echo esc_url( $g['url'] ); ?>">
								<span class="ma-thumb ma-thumb--l"><?php if ( $g['thumb'] ) : ?><img src="<?php echo esc_url( $g['thumb'] ); ?>" alt="" width="52" height="52" loading="lazy"><?php endif; ?></span>
								<span class="ma-dr__gname"><b><?php echo esc_html( $g['short'] ); ?></b><small>Top <?php echo (int) $g['n']; ?> · Reklamelinks</small></span>
								<?php echo $chev; // phpcs:ignore ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
				<a class="ma-btn ma-btn--ink ma-dr__all" href="<?php echo esc_url( home_url( '/#' . $t ) ); ?>">Alle guides om <?php echo esc_html( mb_strtolower( $topic['label'] ) ); ?> <?php echo $chev; // phpcs:ignore ?></a>
			</section>
		<?php endforeach; ?>
	</div>

	<p class="dr__foot">Siden indeholder annoncer. <a href="<?php echo esc_url( home_url( '/saadan-tjener-vi-penge/' ) ); ?>">Sådan tjener vi penge</a></p>
</div>
