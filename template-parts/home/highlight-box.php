<?php
/**
 * Homepage highlight / new patient section.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title     = (string) revive_get_mod( 'revive_highlight_title', __( 'New Patient? Start Here.', 'revive-integrative-health' ) );
$text      = (string) revive_get_mod( 'revive_highlight_text', __( 'We provide a wide range of services at Revive to help you achieve your health and wellness goals, individually and as a family.', 'revive-integrative-health' ) );
$image     = (string) revive_get_mod( 'revive_highlight_image', revive_asset_uri( 'assets/images/new-patient.jpg' ) );
$cta_label = (string) revive_get_mod( 'revive_highlight_cta_label', __( 'New Patient Intake Form', 'revive-integrative-health' ) );
$cta_url   = (string) revive_get_mod( 'revive_highlight_cta_url', '#new-patient-intake' );
?>
<section class="highlight-section" aria-labelledby="highlight-title">
	<div class="highlight-section__inner">
		<article class="highlight-box">
			<div class="highlight-box__inner d-flex flex-column flex-md-row">
				<figure class="highlight-box__media">
					<img
						src="<?php echo esc_url( $image ); ?>"
						alt="<?php esc_attr_e( 'A physical therapist assisting a patient with a leg extension exercise', 'revive-integrative-health' ); ?>"
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
