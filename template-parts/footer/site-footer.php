<?php
/**
 * Site footer markup.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone      = (string) revive_get_mod( 'revive_phone', '785-414-9422' );
$phone_href = revive_phone_href( $phone );
$email      = (string) revive_get_mod( 'revive_email', 'revive@reviveih.com' );
$facebook   = (string) revive_get_mod( 'revive_facebook_url', 'https://www.facebook.com/' );
?>
<footer class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row gy-4 align-items-start justify-content-between">
			<div class="col-12 col-lg-3">
				<?php revive_the_logo( 'site-footer__logo-link', 'site-footer__logo img-fluid' ); ?>
			</div>
			<div class="col-12 col-md-8 col-lg-6">
				<div class="site-footer__contact">
					<h2 class="site-footer__heading"><?php esc_html_e( 'Contact Us', 'revive-integrative-health' ); ?></h2>
					<div class="row g-3 g-md-4 mb-3">
						<div class="col-12 col-sm-6">
							<address class="site-footer__address mb-0">
								<strong class="site-footer__address-title"><?php esc_html_e( 'Salina Location', 'revive-integrative-health' ); ?></strong><br>
								645 E. Iron St<br>
								Salina, KS 67401
							</address>
						</div>
						<div class="col-12 col-sm-6">
							<address class="site-footer__address mb-0">
								<strong class="site-footer__address-title"><?php esc_html_e( 'McPherson Location', 'revive-integrative-health' ); ?></strong><br>
								114 W. Euclid<br>
								McPherson, KS 67460<br>
								<?php esc_html_e( 'Located in Stupka Chiropractic', 'revive-integrative-health' ); ?>
							</address>
						</div>
					</div>
					<ul class="site-footer__links list-unstyled mb-0">
						<?php if ( $phone_href ) : ?>
							<li>
								<a href="<?php echo esc_url( $phone_href ); ?>" class="site-footer__link">
									<svg class="site-footer__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
										<path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.36 11.36 0 003.56.57 1 1 0 011 1V21a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.36 11.36 0 00.57 3.56 1 1 0 01-.25 1.01l-2.2 2.22z"/>
									</svg>
									<span><?php echo esc_html( $phone ); ?></span>
								</a>
							</li>
						<?php endif; ?>
						<?php if ( $email ) : ?>
							<li>
								<a href="<?php echo esc_url( 'mailto:' . antispambot( $email ) ); ?>" class="site-footer__link">
									<svg class="site-footer__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
										<path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
									</svg>
									<span><?php echo esc_html( antispambot( $email ) ); ?></span>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="col-12 col-md-4 col-lg-3">
				<div class="site-footer__meta text-md-end">
					<?php if ( $facebook ) : ?>
						<a href="<?php echo esc_url( $facebook ); ?>" class="site-footer__social" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Revive Integrative Health on Facebook', 'revive-integrative-health' ); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
								<path d="M22 12a10 10 0 10-11.5 9.9v-7H8v-3h2.5V9.5c0-2.5 1.5-3.9 3.7-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.8-1.6 1.5V12H16l-.4 3h-2.6v7A10 10 0 0022 12z"/>
							</svg>
						</a>
					<?php endif; ?>
					<p class="site-footer__credit mb-0">
						<span>&copy;<?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></span>
						<span><?php esc_html_e( 'Designed by Mr. Freeland Design', 'revive-integrative-health' ); ?></span>
						<span><?php esc_html_e( 'Powered by WCCiT', 'revive-integrative-health' ); ?></span>
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>
