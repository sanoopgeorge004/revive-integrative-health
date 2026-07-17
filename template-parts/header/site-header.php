<?php
/**
 * Site header markup.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone      = (string) revive_get_mod( 'revive_phone', '785-414-9422' );
$phone_href = revive_phone_href( $phone );
$book_label = (string) revive_get_mod( 'revive_book_online_label', __( 'Book Online', 'revive-integrative-health' ) );
$book_url   = (string) revive_get_mod( 'revive_book_online_url', '#book-online' );
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
							<?php
							if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu(
									array(
										'theme_location' => 'primary',
										'container'      => false,
										'menu_class'     => 'navbar-nav site-header__nav flex-lg-row align-items-lg-center gap-3 gap-lg-4',
										'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'          => 3,
										'fallback_cb'    => false,
										'walker'         => new Revive_Nav_Walker(),
									)
								);
							} else {
								get_template_part( 'template-parts/header/nav', 'fallback' );
							}
							?>
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
