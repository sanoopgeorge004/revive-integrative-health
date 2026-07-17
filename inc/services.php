<?php
/**
 * Services CPT helpers (hierarchical parents + children).
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Post type slug for services.
 */
function revive_services_post_type() {
	return 'services';
}

/**
 * Query top-level (parent) service posts.
 *
 * @param array $args Optional WP_Query args overrides.
 * @return WP_Post[]
 */
function revive_get_parent_services( $args = array() ) {
	$query_args = wp_parse_args(
		$args,
		array(
			'post_type'              => revive_services_post_type(),
			'post_parent'            => 0,
			'post_status'            => 'publish',
			'posts_per_page'         => -1,
			'orderby'                => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
			'no_found_rows'          => true,
			'update_post_meta_cache' => true,
			'update_post_term_cache' => false,
		)
	);

	$query = new WP_Query( $query_args );
	return $query->posts;
}

/**
 * Query child service posts for a parent (not linked publicly).
 *
 * @param int   $parent_id Parent service post ID.
 * @param array $args      Optional WP_Query args overrides.
 * @return WP_Post[]
 */
function revive_get_service_children( $parent_id, $args = array() ) {
	$parent_id = absint( $parent_id );
	if ( ! $parent_id ) {
		return array();
	}

	$query_args = wp_parse_args(
		$args,
		array(
			'post_type'              => revive_services_post_type(),
			'post_parent'            => $parent_id,
			'post_status'            => 'publish',
			'posts_per_page'         => -1,
			'orderby'                => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
		)
	);

	$query = new WP_Query( $query_args );
	return $query->posts;
}

/**
 * Glow image path for a service card by index.
 *
 * @param int $index Zero-based index.
 * @return string Relative theme asset path.
 */
function revive_service_glow_asset( $index ) {
	return ( 0 === (int) $index % 2 )
		? 'assets/images/image-masking-shape-1.png'
		: 'assets/images/image-masking-shape-purple.png';
}

/**
 * Media accent modifier class by index.
 *
 * @param int $index Zero-based index.
 * @return string
 */
function revive_service_media_accent_class( $index ) {
	return ( 0 === (int) $index % 2 )
		? 'service-card__media--accent-blue'
		: 'service-card__media--accent-purple';
}

/**
 * Redirect child service singles to the parent (children are not linked).
 */
function revive_redirect_child_service_singles() {
	if ( ! is_singular( revive_services_post_type() ) ) {
		return;
	}

	$post = get_queried_object();
	if ( ! $post instanceof WP_Post || ! $post->post_parent ) {
		return;
	}

	$parent_link = get_permalink( $post->post_parent );
	if ( $parent_link ) {
		wp_safe_redirect( $parent_link, 301 );
		exit;
	}
}
add_action( 'template_redirect', 'revive_redirect_child_service_singles' );
