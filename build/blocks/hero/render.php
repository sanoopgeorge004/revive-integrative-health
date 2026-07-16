<?php
/**
 * Hero block front-end render.
 *
 * @package Revive_Integrative_Health
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block content.
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title_before   = isset( $attributes['titleBefore'] ) ? $attributes['titleBefore'] : 'Begin';
$title_emphasis = isset( $attributes['titleEmphasis'] ) ? $attributes['titleEmphasis'] : 'Your';
$title_after    = isset( $attributes['titleAfter'] ) ? $attributes['titleAfter'] : 'Wellness Journey';
$cta_label      = isset( $attributes['ctaLabel'] ) ? $attributes['ctaLabel'] : 'Book Online';
$cta_url        = isset( $attributes['ctaUrl'] ) ? $attributes['ctaUrl'] : '#book-online';
$image_url      = ! empty( $attributes['imageUrl'] ) ? $attributes['imageUrl'] : revive_asset_uri( 'assets/images/hero-image.jpg' );
$image_alt      = ! empty( $attributes['imageAlt'] ) ? $attributes['imageAlt'] : __( 'A person holding orange dumbbells during a wellness workout session', 'revive-integrative-health' );
?>
<section class="hero" aria-labelledby="hero-title">
	<figure class="hero__background">
		<img
			src="<?php echo esc_url( $image_url ); ?>"
			alt="<?php echo esc_attr( $image_alt ); ?>"
			class="hero__background-image"
			width="1600"
			height="818"
		>
		<span class="hero__background-overlay" aria-hidden="true"></span>
	</figure>
	<span class="hero__bottom-brush" aria-hidden="true"></span>
	<div class="hero__content">
		<h1 class="hero__title" id="hero-title">
			<?php echo esc_html( $title_before ); ?>
			<span class="hero__title-emphasis"><?php echo esc_html( $title_emphasis ); ?></span>
			<?php echo esc_html( $title_after ); ?>
		</h1>
		<a href="<?php echo esc_url( $cta_url ); ?>" class="btn-revive btn-revive--primary hero__cta">
			<?php echo esc_html( $cta_label ); ?>
		</a>
	</div>
</section>
