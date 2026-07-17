<?php
/**
 * Fallback primary nav when no menu is assigned.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services_url = home_url( '/services/' );
$team_url     = home_url( '/team/' );
$contact_url  = home_url( '/contact/' );
$careers_url  = home_url( '/team/#careers' );
?>
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
						<h3 class="mega-menu__heading"><a href="<?php echo esc_url( $services_url . '#pediatric-services' ); ?>" class="mega-menu__heading-link"><?php esc_html_e( 'Pediatric Services', 'revive-integrative-health' ); ?></a></h3>
						<ul class="mega-menu__list list-unstyled mb-0">
							<li><a href="<?php echo esc_url( $services_url . '#pediatric-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Physical therapy', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#pediatric-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Occupational therapy', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#pediatric-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Speech therapy', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#pediatric-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Aquatic therapy', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#pediatric-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'ABA therapy', 'revive-integrative-health' ); ?></a></li>
						</ul>
					</div>
					<div class="col-12 col-lg-4">
						<h3 class="mega-menu__heading"><a href="<?php echo esc_url( $services_url . '#specialized-services' ); ?>" class="mega-menu__heading-link"><?php esc_html_e( 'Specialized Services', 'revive-integrative-health' ); ?></a></h3>
						<ul class="mega-menu__list list-unstyled mb-0">
							<li><a href="<?php echo esc_url( $services_url . '#specialized-services' ); ?>" class="mega-menu__link"><?php esc_html_e( "Pelvic Floor (Men's/Women's health)", 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#specialized-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Mercier', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#specialized-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Lymphedema', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#specialized-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Speech therapy', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#specialized-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Mental Health', 'revive-integrative-health' ); ?></a></li>
						</ul>
					</div>
					<div class="col-12 col-lg-4">
						<h3 class="mega-menu__heading"><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__heading-link"><?php esc_html_e( 'Health & Wellness Services', 'revive-integrative-health' ); ?></a></h3>
						<ul class="mega-menu__list list-unstyled mb-0">
							<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Acupuncture', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Massage', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Spa facials', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'IV and injection therapy', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Ozone and UBI therapy', 'revive-integrative-health' ); ?></a></li>
							<li><a href="<?php echo esc_url( $services_url . '#health-wellness-services' ); ?>" class="mega-menu__link"><?php esc_html_e( 'Shockwave', 'revive-integrative-health' ); ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a href="<?php echo esc_url( $team_url ); ?>" class="nav-link site-header__nav-link p-0<?php echo revive_nav_is_active( 'team' ) ? ' is-active' : ''; ?>"<?php echo revive_nav_is_active( 'team' ) ? ' aria-current="page"' : ''; ?>>
			<?php esc_html_e( 'Our Team', 'revive-integrative-health' ); ?>
		</a>
	</li>
	<li class="nav-item">
		<a href="<?php echo esc_url( $careers_url ); ?>" class="nav-link site-header__nav-link p-0">
			<?php esc_html_e( 'Careers', 'revive-integrative-health' ); ?>
		</a>
	</li>
	<li class="nav-item">
		<a href="<?php echo esc_url( home_url( '/#insurance' ) ); ?>" class="nav-link site-header__nav-link p-0">
			<?php esc_html_e( 'Insurance', 'revive-integrative-health' ); ?>
		</a>
	</li>
	<li class="nav-item">
		<a href="<?php echo esc_url( $contact_url ); ?>" class="nav-link site-header__nav-link p-0<?php echo revive_nav_is_active( 'contact' ) ? ' is-active' : ''; ?>"<?php echo revive_nav_is_active( 'contact' ) ? ' aria-current="page"' : ''; ?>>
			<?php esc_html_e( 'Contact', 'revive-integrative-health' ); ?>
		</a>
	</li>
</ul>
