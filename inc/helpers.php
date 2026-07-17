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
 * Resolve banner args for an inner page (featured image + title).
 *
 * @param array $args {
 *     Optional overrides.
 *     @type string     $title      Banner title. Defaults to current post title.
 *     @type string     $image      Fallback image path or URL when no featured image.
 *     @type string     $image_alt  Image alt text.
 *     @type int|WP_Post $post      Post to read. Defaults to queried object.
 * }
 * @return array{title:string,image:string,image_alt:string}
 */
function revive_get_page_banner_args( $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'title'     => '',
			'image'     => 'assets/images/peadiatric-service.jpg',
			'image_alt' => '',
			'post'      => null,
		)
	);

	$post = null;
	if ( ! empty( $args['post'] ) ) {
		$post = get_post( $args['post'] );
	} elseif ( get_queried_object_id() ) {
		$post = get_post( get_queried_object_id() );
	} else {
		$post = get_post();
	}

	$title = (string) $args['title'];
	if ( '' === $title && $post ) {
		$title = get_the_title( $post );
	}

	$image     = '';
	$image_alt = (string) $args['image_alt'];

	if ( $post && has_post_thumbnail( $post ) ) {
		$thumb = get_the_post_thumbnail_url( $post, 'revive-hero' );
		if ( is_string( $thumb ) && '' !== $thumb ) {
			$image = $thumb;
		}
		if ( '' === $image_alt ) {
			$alt = get_post_meta( get_post_thumbnail_id( $post ), '_wp_attachment_image_alt', true );
			$image_alt = is_string( $alt ) ? $alt : '';
		}
	}

	if ( '' === $image ) {
		$image = (string) $args['image'];
	}

	if ( '' === $image ) {
		$image = 'assets/images/peadiatric-service.jpg';
	}

	if ( '' === $image_alt ) {
		$image_alt = $title;
	}

	return array(
		'title'     => $title,
		'image'     => $image,
		'image_alt' => $image_alt,
	);
}

/**
 * Output the inner page banner (featured image + title).
 *
 * @param array $args Optional overrides for revive_get_page_banner_args().
 */
function revive_the_page_banner( $args = array() ) {
	get_template_part( 'template-parts/shared/page', 'banner', revive_get_page_banner_args( $args ) );
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

/**
 * Sanitize Cognito Forms embed markup for Customizer storage.
 * Allows Cognito script tags plus basic embed wrappers.
 *
 * @param string $value Raw embed code.
 * @return string
 */
function revive_sanitize_cognito_embed( $value ) {
	$value = (string) $value;

	if ( '' === trim( $value ) ) {
		return '';
	}

	$allowed = array(
		'script' => array(
			'src'       => true,
			'type'      => true,
			'async'     => true,
			'defer'     => true,
			'data-key'  => true,
			'data-form' => true,
			'id'        => true,
			'class'     => true,
		),
		'div'    => array(
			'id'    => true,
			'class' => true,
			'style' => true,
		),
		'iframe' => array(
			'src'             => true,
			'width'           => true,
			'height'          => true,
			'style'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
			'title'           => true,
			'loading'         => true,
			'class'           => true,
			'id'              => true,
		),
		'noscript' => array(),
	);

	$sanitized = wp_kses( $value, $allowed );

	// Keep only Cognito Forms script tags (drop anything else).
	$sanitized = preg_replace_callback(
		'/<script\b([^>]*)>.*?<\/script>/is',
		static function ( $matches ) {
			$attrs = $matches[1];
			if ( ! preg_match( '/\bsrc\s*=\s*([\'"])(.*?)\1/i', $attrs, $src_match ) ) {
				return '';
			}
			if ( false === strpos( $src_match[2], 'cognitoforms.com' ) ) {
				return '';
			}
			return '<script' . $attrs . '></script>';
		},
		$sanitized
	);

	return is_string( $sanitized ) ? $sanitized : '';
}

/**
 * Print the Cognito / contact form embed from theme options.
 */
function revive_the_contact_form_embed() {
	$embed = revive_get_mod( 'revive_cognito_embed', '' );

	echo '<div class="cognito-form-embed" id="cognito-contact-form">';

	if ( is_string( $embed ) && '' !== trim( $embed ) ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- sanitized on save via revive_sanitize_cognito_embed().
		echo revive_sanitize_cognito_embed( $embed );
	} else {
		get_template_part( 'template-parts/shared/contact', 'form-fallback' );
	}

	echo '</div>';
}
