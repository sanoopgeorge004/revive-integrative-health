<?php
/**
 * Theme helpers — avoid strict param types that can TypeError with WP filters.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return a theme asset URL.
 *
 * @param string $path Relative path from the theme root.
 * @return string
 */
function revive_asset_uri( $path ) {
	return trailingslashit( REVIVE_THEME_URI ) . ltrim( (string) $path, '/' );
}

/**
 * Return a theme file path.
 *
 * @param string $path Relative path from the theme root.
 * @return string
 */
function revive_asset_path( $path ) {
	return trailingslashit( REVIVE_THEME_DIR ) . ltrim( (string) $path, '/' );
}

/**
 * Theme mod with fallback.
 *
 * @param string $key     Theme mod key.
 * @param mixed  $default Default value.
 * @return mixed
 */
function revive_get_mod( $key, $default = '' ) {
	$value = get_theme_mod( $key, $default );
	return ( null === $value || '' === $value ) ? $default : $value;
}

/**
 * Format a phone number for tel: links (digits and leading + only).
 *
 * @param string $phone Display phone number.
 * @return string
 */
function revive_phone_href( $phone ) {
	$cleaned = preg_replace( '/[^\d+]/', '', (string) $phone );
	if ( ! is_string( $cleaned ) || '' === $cleaned ) {
		return '';
	}
	return 'tel:' . $cleaned;
}
