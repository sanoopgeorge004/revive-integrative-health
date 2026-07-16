<?php
/**
 * Template tags / shared markup helpers.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Print the site logo (custom logo or fallback image).
 *
 * @param string $link_class Anchor class.
 * @param string $img_class  Image class.
 */
function revive_the_logo( $link_class = 'site-header__logo-link', $img_class = 'site-header__logo-image img-fluid' ) {
	if ( has_custom_logo() ) {
		$custom_logo_id = (int) get_theme_mod( 'custom_logo' );
		$logo_url       = wp_get_attachment_image_url( $custom_logo_id, 'full' );
		$logo_alt       = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		if ( ! $logo_alt ) {
			$logo_alt = get_bloginfo( 'name', 'display' );
		}
		printf(
			'<a href="%1$s" class="%2$s" aria-label="%3$s"><img src="%4$s" alt="%5$s" class="%6$s"></a>',
			esc_url( home_url( '/' ) ),
			esc_attr( $link_class ),
			esc_attr(
				sprintf(
					/* translators: %s: site name */
					__( '%s - Home', 'revive-integrative-health' ),
					get_bloginfo( 'name', 'display' )
				)
			),
			esc_url( $logo_url ? $logo_url : revive_asset_uri( 'assets/images/logo.png' ) ),
			esc_attr( $logo_alt ),
			esc_attr( $img_class )
		);
		return;
	}

	printf(
		'<a href="%1$s" class="%2$s" aria-label="%3$s"><img src="%4$s" alt="%5$s" class="%6$s"></a>',
		esc_url( home_url( '/' ) ),
		esc_attr( $link_class ),
		esc_attr(
			sprintf(
				/* translators: %s: site name */
				__( '%s - Home', 'revive-integrative-health' ),
				get_bloginfo( 'name', 'display' )
			)
		),
		esc_url( revive_asset_uri( 'assets/images/logo.png' ) ),
		esc_attr( get_bloginfo( 'name', 'display' ) ),
		esc_attr( $img_class )
	);
}

/**
 * Current page helper for nav active states.
 *
 * @param string $slug Page slug.
 * @return bool
 */
function revive_nav_is_active( $slug ) {
	if ( 'home' === $slug ) {
		return is_front_page();
	}
	return is_page( $slug );
}
