<?php defined( 'ABSPATH' ) || exit; ?>
</main>
<footer class="site-footer">
	<div class="wrap">
		<div class="foot">
			<div class="foot__about">
				<img src="<?php echo esc_url( playform_asset( 'logo-white.svg' ) ); ?>" alt="<?php echo esc_attr( playform_site( 'name' ) ); ?>" width="156" height="34">
				<p>Vi samler <?php echo esc_html( playform_site( 'niche' ) ); ?> fra de butikker, vi samarbejder med, så du kan finde det rigtige produkt til din hud, dit hår og din rutine uden at lede i timevis.</p>
				<span><?php echo esc_html( playform_site( 'email' ) ); ?></span>
			</div>
			<?php $pf_fg = playform_front_guides(); ?>
			<?php $pf_shop = playform_front_shop(); ?>
			<?php if ( $pf_shop['cats'] ) : ?>
				<div class="foot__col">
					<span class="foot__title">Shop</span>
					<?php foreach ( $pf_shop['cats'] as $c ) : ?>
						<a href="<?php echo esc_url( $c['url'] ); ?>"><?php echo esc_html( $c['label'] ); ?></a>
					<?php endforeach; ?>
					<?php if ( $pf_shop['deal_count'] > 0 ) : ?><a href="<?php echo esc_url( playform_tilbud_url() ); ?>">Tilbud</a><?php endif; ?>
				</div>
			<?php else : ?>
				<div class="foot__col">
					<span class="foot__title">Emner</span>
					<?php foreach ( $pf_fg['topics'] as $t => $topic ) : ?>
						<a href="<?php echo esc_url( home_url( '/#' . $t ) ); ?>"><?php echo esc_html( $topic['label'] ); ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<div class="foot__col">
				<span class="foot__title">Nye guides</span>
				<?php foreach ( playform_front_latest( 5 ) as $g ) : ?>
					<a href="<?php echo esc_url( $g['url'] ); ?>"><?php echo esc_html( $g['short'] ); ?></a>
				<?php endforeach; ?>
			</div>
			<div class="foot__col">
				<span class="foot__title">Læs mere</span>
				<a href="<?php echo esc_url( playform_guide_url() ); ?>">Alle købsguides</a>
				<a href="<?php echo esc_url( home_url( '/viden/' ) ); ?>">Artikler</a>
			</div>
			<div class="foot__col">
				<span class="foot__title">Om <?php echo esc_html( playform_site( 'name' ) ); ?></span>
				<a href="<?php echo esc_url( playform_how_url() ); ?>"><?php echo esc_html( playform_how_title() ); ?></a>
				<a href="<?php echo esc_url( playform_method_url() ); ?>">Sådan vælger vi produkter</a>
				<a href="<?php echo esc_url( home_url( '/vores-butikker/' ) ); ?>">Vores butikker</a>
				<a href="<?php echo esc_url( home_url( '/saadan-tjener-vi-penge/' ) ); ?>">Sådan tjener vi penge</a>
				<a href="<?php echo esc_url( home_url( '/privatlivspolitik/' ) ); ?>">Privatlivspolitik</a>
				<a href="<?php echo esc_url( home_url( '/cookies/' ) ); ?>">Cookies</a>
			</div>
		</div>
		<div class="foot__bottom">
			<span><?php echo esc_html( playform_site( 'domain' ) ); ?> viser annoncer. Klikker du videre og køber hos en af vores partnerbutikker, kan vi tjene en provision. Du betaler ikke mere af den grund. Pris og lagerstatus kan have ændret sig siden sidste opdatering.</span>
			<span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( playform_site( 'domain' ) . ' · ' . playform_site( 'company' ) . ' · CVR ' . playform_site( 'cvr' ) ); ?> · <button type="button" class="foot__link" data-cc-open>Cookie-indstillinger</button></span>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
