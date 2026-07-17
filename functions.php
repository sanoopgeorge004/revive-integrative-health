<?php
/**
 * Theme bootstrap.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'REVIVE_THEME_VERSION', '1.0.0' );
define( 'REVIVE_THEME_DIR', get_template_directory() );
define( 'REVIVE_THEME_URI', get_template_directory_uri() );

require_once REVIVE_THEME_DIR . '/inc/helpers.php';
require_once REVIVE_THEME_DIR . '/inc/setup.php';
require_once REVIVE_THEME_DIR . '/inc/enqueue.php';
require_once REVIVE_THEME_DIR . '/inc/template-tags.php';
require_once REVIVE_THEME_DIR . '/inc/class-revive-nav-walker.php';
require_once REVIVE_THEME_DIR . '/inc/services.php';
require_once REVIVE_THEME_DIR . '/inc/customizer/class-kirki-config.php';
require_once REVIVE_THEME_DIR . '/inc/blocks.php';
