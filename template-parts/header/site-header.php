<?php
/**
 * Site header markup.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone       = (string) revive_get_mod( 'revive_phone', '785-414-9422' );
$phone_href  = revive_phone_href( $phone );
$book_label  = (string) revive_get_mod( 'revive_book_online_label', __( 'Book Online', 'revive-integrative-health' ) );
$book_url    = (string) revive_get_mod( 'revive_book_online_url', '#book-online' );
$services_url = home_url( '/services/' );
$team_url     = home_url( '/team/' );
$contact_url  = home_url( '/contact/' );
$careers_url  = home_url( '/team/#careers' );
?>
<header class="site-header" role="banner">
	<nav class="navbar navbar-expand-lg site-header__navbar" aria-label="<?php esc_attr_e( 'Primary', 'revive-integrative-health' ); ?>">
		<div class="site-header__inner d-flex align-items-center gap-4">

			<div class="site-header__brand">
				<?php revive_the_logo(); ?>
			</div>

			<div class="site-header__menu-col d-flex flex-column flex-grow-1">
				<div class="site-header__phone-row text-end mb-4">
					<?php if ( $phone_href ) : ?>
						<a href="<?php echo esc_url( $phone_href ); ?>" class="site-header__phone d-inline-flex align-items-center gap-2">
							<svg class="site-header__phone-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
								<path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.36 11.36 0 003.56.57 1 1 0 011 1V21a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.36 11.36 0 00.57 3.56 1 1 0 01-.25 1.01l-2.2 2.22z"/>
							</svg>
							<span><?php echo esc_html( $phone ); ?></span>
						</a>
					<?php endif; ?>
				</div>

				<div class="site-header__menu-row d-flex align-items-center justify-content-between gap-3">
					<button
						class="navbar-toggler site-header__toggler"
						type="button"
						data-bs-toggle="offcanvas"
						data-bs-target="#site-navigation"
						aria-controls="site-navigation"
						aria-label="<?php esc_attr_e( 'Toggle navigation', 'revive-integrative-health' ); ?>"
					>
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="offcanvas offcanvas-end offcanvas-lg site-header__offcanvas flex-grow-1" tabindex="-1" id="site-navigation" aria-labelledby="site-navigation-label">
						<div class="offcanvas-header d-lg-none">
							<h2 class="offcanvas-title fs-6 text-uppercase" id="site-navigation-label"><?php esc_html_e( 'Menu', 'revive-integrative-health' ); ?></h2>
							<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="<?php esc_attr_e( 'Close', 'revive-integrative-health' ); ?>"></button>
						</div>

						<div class="offcanvas-body justify-content-end">
							<ul class="navbar-nav site-header__nav flex-lg-row align-items-lg-center gap-3 gap-lg-4">
								<li class="nav-item site-header__mega-item">
									<a
										href="<?php echo esc_url( $services_url ); ?>"
										class="nav-link site-header__nav-link p-0<?php echo revive_nav_is_active( 'services' ) ? ' is-active' : ''; ?>"
										id="services-mega-trigger"
										aria-expanded="false"
										aria-controls="services-mega-menu"
										data-mega-trigger
										<?php echo revive_nav_is_active( 'services' ) ? ' aria-current="page"' : ''; ?>
									>
										<?php esc_html_e( 'Services', 'revive-integrative-health' ); ?>
									</a>

									<div class="mega-menu" id="services-mega-menu" role="region" aria-label="<?php esc_attr_e( 'Services menu', 'revive-integrative-health' ); ?>" data-mega-panel>
										<div class="mega-menu__inner container">
											<div class="row g-4 g-lg-5">
												<div class="col-12 col-lg-4">
													<h3 class="mega-menu__heading"><?php esc_html_e( 'Pediatric Services', 'revive-integrative-health' ); ?></h3>
													<ul class="mega-menu__list list-unstyled mb-0">
														<li><a href="<?php echo esc_url( $services_url . '#pediatric-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Physical therapy', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#pediatric-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Occupational therapy', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#pediatric-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Speech therapy', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#pediatric-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Aquatic therapy', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#pediatric-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'ABA therapy', 'revive-integrative-health' ); ?></a></li>
													</ul>
												</div>
												<div class="col-12 col-lg-4">
													<h3 class="mega-menu__heading"><?php esc_html_e( 'Specialized Services', 'revive-integrative-health' ); ?></h3>
													<ul class="mega-menu__list list-unstyled mb-0">
														<li><a href="<?php echo esc_url( $services_url . '#specialized-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( "Pelvic Floor (Men's/Women's health)", 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#specialized-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Mercier', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#specialized-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Lymphedema', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#specialized-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Speech therapy', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#specialized-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Mental Health', 'revive-integrative-health' ); ?></a></li>
													</ul>
												</div>
												<div class="col-12 col-lg-4">
													<h3 class="mega-menu__heading"><?php esc_html_e( 'Health & Wellness Services', 'revive-integrative-health' ); ?></h3>
													<ul class="mega-menu__list list-unstyled mb-0">
														<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Acupuncture', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Massage', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Spa facials', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'IV and injection therapy', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Ozone and UBI therapy', 'revive-integrative-health' ); ?></a></li>
														<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link" data-bs-dismiss="offcanvas"><?php esc_html_e( 'Shockwave', 'revive-integrative-health' ); ?></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="nav-item">
									<a href="<?php echo esc_url( $team_url ); ?>" class="nav-link site-header__nav-link p-0<?php echo revive_nav_is_active( 'team' ) ? ' is-active' : ''; ?>" data-bs-dismiss="offcanvas"<?php echo revive_nav_is_active( 'team' ) ? ' aria-current="page"' : ''; ?>>
										<?php esc_html_e( 'Our Team', 'revive-integrative-health' ); ?>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo esc_url( $careers_url ); ?>" class="nav-link site-header__nav-link p-0" data-bs-dismiss="offcanvas">
										<?php esc_html_e( 'Careers', 'revive-integrative-health' ); ?>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo esc_url( home_url( '/#insurance' ) ); ?>" class="nav-link site-header__nav-link p-0" data-bs-dismiss="offcanvas">
										<?php esc_html_e( 'Insurance', 'revive-integrative-health' ); ?>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo esc_url( $contact_url ); ?>" class="nav-link site-header__nav-link p-0<?php echo revive_nav_is_active( 'contact' ) ? ' is-active' : ''; ?>" data-bs-dismiss="offcanvas"<?php echo revive_nav_is_active( 'contact' ) ? ' aria-current="page"' : ''; ?>>
										<?php esc_html_e( 'Contact', 'revive-integrative-health' ); ?>
									</a>
								</li>
							</ul>
						</div>
					</div>

					<a href="<?php echo esc_url( $book_url ); ?>" class="btn-revive btn-revive--primary btn-revive--sm flex-shrink-0">
						<?php echo esc_html( $book_label ); ?>
					</a>
				</div>
			</div>
		</div>
	</nav>
	<span class="site-header__bottom-brush" aria-hidden="true"></span>
</header>
