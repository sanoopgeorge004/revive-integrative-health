<?php
/**
 * Page banner partial — full-bleed image with title overlay (services.html style).
 *
 * Prefer revive_the_page_banner() so the featured image is used automatically.
 *
 * @package Revive_Integrative_Health
 *
 * @var array $args {
 *     @type string $title      Required. Banner heading text.
 *     @type string $image      Required. Relative asset path or full URL.
 *     @type string $image_alt  Optional. Image alt text.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title     = isset( $args['title'] ) ? (string) $args['title'] : '';
$image     = isset( $args['image'] ) ? (string) $args['image'] : '';
$image_alt = isset( $args['image_alt'] ) ? (string) $args['image_alt'] : '';

if ( '' === $title || '' === $image ) {
	return;
}

$image_url = ( 0 === strpos( $image, 'http://' ) || 0 === strpos( $image, 'https://' ) )
	? $image
	: revive_asset_uri( $image );
$title_id = 'page-banner-title';
?>
<section class="page-banner" aria-labelledby="<?php echo esc_attr( $title_id ); ?>">
	<figure class="page-banner__background">
		<img
			src="<?php echo esc_url( $image_url ); ?>"
			alt="<?php echo esc_attr( $image_alt ); ?>"
			class="page-banner__image"
			width="1200"
			height="800"
		>
		<span class="page-banner__overlay" aria-hidden="true"></span>
	</figure>
	<div class="page-banner__content">
		<h1 class="page-banner__title" id="<?php echo esc_attr( $title_id ); ?>"><?php echo esc_html( $title ); ?></h1>
	</div>
	<span class="page-banner__bar" aria-hidden="true"></span>
</section>
