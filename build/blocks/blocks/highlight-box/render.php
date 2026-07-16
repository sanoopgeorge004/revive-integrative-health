<?php
/**
 * Highlight box block front-end render.
 *
 * @package Revive_Integrative_Health
 *
 * @var array $attributes Block attributes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title     = isset( $attributes['title'] ) ? $attributes['title'] : 'New Patient? Start Here.';
$text      = isset( $attributes['text'] ) ? $attributes['text'] : '';
$cta_label = isset( $attributes['ctaLabel'] ) ? $attributes['ctaLabel'] : 'New Patient Intake Form';
$cta_url   = isset( $attributes['ctaUrl'] ) ? $attributes['ctaUrl'] : '#new-patient-intake';
$image_url = ! empty( $attributes['imageUrl'] ) ? $attributes['imageUrl'] : revive_asset_uri( 'assets/images/new-patient.jpg' );
$image_alt = ! empty( $attributes['imageAlt'] ) ? $attributes['imageAlt'] : __( 'A physical therapist assisting a patient with a leg extension exercise', 'revive-integrative-health' );
?>
<section class="highlight-section" aria-labelledby="highlight-title">
	<div class="highlight-section__inner">
		<article class="highlight-box">
			<div class="highlight-box__inner d-flex flex-column flex-md-row">
				<figure class="highlight-box__media">
					<img
						src="<?php echo esc_url( $image_url ); ?>"
						alt="<?php echo esc_attr( $image_alt ); ?>"
						class="highlight-box__image"
						width="408"
						height="262"
					>
				</figure>
				<div class="highlight-box__content">
					<h2 class="highlight-box__title" id="highlight-title"><?php echo esc_html( $title ); ?></h2>
					<hr class="highlight-box__divider">
					<p class="highlight-box__text"><?php echo esc_html( $text ); ?></p>
					<a href="<?php echo esc_url( $cta_url ); ?>" class="btn-revive btn-revive--light highlight-box__cta">
						<?php echo esc_html( $cta_label ); ?>
					</a>
				</div>
			</div>
			<span class="highlight-box__bottom-brush" aria-hidden="true"></span>
		</article>
	</div>
	<div class="highlight-section__bottom-space" aria-hidden="true"></div>
</section>
