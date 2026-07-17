<?php
/**
 * Theme setup.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme supports, menus, and image sizes.
 */
function revive_setup() {
	load_theme_textdomain( 'revive-integrative-health', REVIVE_THEME_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 150,
			'width'       => 342,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'revive-integrative-health' ),
		)
	);

	add_image_size( 'revive-hero', 1600, 818, true );
	add_image_size( 'revive-card', 800, 800, false );
	add_image_size( 'revive-team', 600, 600, true );
}
add_action( 'after_setup_theme', 'revive_setup' );

/**
 * Admin notice when Kirki is missing.
 */
function revive_kirki_missing_notice() {
	if ( class_exists( 'Kirki' ) || ! current_user_can( 'install_plugins' ) ) {
		return;
	}

	printf(
		'<div class="notice notice-warning"><p>%s</p></div>',
		esc_html__(
			'Revive Integrative Health recommends the Kirki Customizer Framework plugin for theme options (phone, CTAs, hero content).',
			'revive-integrative-health'
		)
	);
}
add_action( 'admin_notices', 'revive_kirki_missing_notice' );

/**
 * Admin notice when the primary menu location is unassigned.
 */
function revive_primary_menu_notice() {
	if ( ! current_user_can( 'edit_theme_options' ) || has_nav_menu( 'primary' ) ) {
		return;
	}

	$menus_url = admin_url( 'nav-menus.php' );

	printf(
		'<div class="notice notice-info"><p>%s</p></div>',
		wp_kses_post(
			sprintf(
				/* translators: %s: Menus admin URL */
				__( 'Assign a menu to the <strong>Primary Menu</strong> location under <a href="%s">Appearance → Menus</a>. Until then, a fallback navigation is shown. For the Services mega menu, add CSS class <code>mega</code> to the Services item (enable CSS Classes in Screen Options).', 'revive-integrative-health' ),
				esc_url( $menus_url )
			)
		)
	);
}
add_action( 'admin_notices', 'revive_primary_menu_notice' );

/**
 * Add page-inner body class on inner page templates.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function revive_body_classes( $classes ) {
	if ( ! is_array( $classes ) ) {
		$classes = array();
	}

	if ( ! is_front_page() && ( is_page() || is_singular( 'services' ) ) ) {
		$classes[] = 'page-inner';
	}

	return $classes;
}
add_filter( 'body_class', 'revive_body_classes' );
