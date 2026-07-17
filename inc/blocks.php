<?php
/**
 * Register custom Gutenberg blocks.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the Revive block category.
 *
 * @param array $categories Existing categories.
 * @return array
 */
function revive_block_categories( $categories ) {
	if ( ! is_array( $categories ) ) {
		$categories = array();
	}

	return array_merge(
		array(
			array(
				'slug'  => 'revive',
				'title' => __( 'Revive', 'revive-integrative-health' ),
			),
		),
		$categories
	);
}
add_filter( 'block_categories_all', 'revive_block_categories' );

/**
 * Register block types from build metadata.
 */
function revive_register_blocks() {
	$blocks = array(
		'hero',
		'highlight-box',
		'contact-locations',
		'careers',
	);

	foreach ( $blocks as $block ) {
		$block_path = REVIVE_THEME_DIR . '/build/blocks/' . $block;
		if ( file_exists( $block_path . '/block.json' ) ) {
			register_block_type( $block_path );
		}
	}
}
add_action( 'init', 'revive_register_blocks' );
