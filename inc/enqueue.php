<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Front-end assets.
 */
function revive_enqueue_assets() {
	wp_enqueue_style(
		'revive-google-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'revive-bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
		array(),
		'5.3.3'
	);

	wp_enqueue_style(
		'revive-slick',
		'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
		array(),
		'1.8.1'
	);

	$theme_css     = revive_asset_path( 'css/style.css' );
	$theme_version = ( file_exists( $theme_css ) ) ? (string) filemtime( $theme_css ) : REVIVE_THEME_VERSION;

	wp_enqueue_style(
		'revive-theme',
		revive_asset_uri( 'css/style.css' ),
		array( 'revive-bootstrap', 'revive-slick', 'revive-google-fonts' ),
		$theme_version
	);

	wp_enqueue_script(
		'revive-bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
		array(),
		'5.3.3',
		true
	);

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script(
		'revive-slick',
		'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
		array( 'jquery' ),
		'1.8.1',
		true
	);

	$megamenu = revive_asset_path( 'js/megamenu.js' );
	wp_enqueue_script(
		'revive-megamenu',
		revive_asset_uri( 'js/megamenu.js' ),
		array(),
		file_exists( $megamenu ) ? (string) filemtime( $megamenu ) : REVIVE_THEME_VERSION,
		true
	);

	$testimonials = revive_asset_path( 'js/testimonials.js' );
	if ( is_front_page() && file_exists( $testimonials ) ) {
		wp_enqueue_script(
			'revive-testimonials',
			revive_asset_uri( 'js/testimonials.js' ),
			array( 'jquery', 'revive-slick' ),
			(string) filemtime( $testimonials ),
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'revive_enqueue_assets' );
