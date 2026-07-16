<?php
/**
 * Homepage testimonials slider section.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="testimonials-section" id="testimonials" aria-labelledby="testimonials-title">
	<div class="container">
		<div class="testimonials-section__header text-center">
			<img
				src="<?php echo esc_url( revive_asset_uri( 'assets/images/testimonial-brush.png' ) ); ?>"
				alt=""
				class="testimonials-section__brush"
				width="280"
				height="40"
				aria-hidden="true"
			>
			<h2 class="testimonials-section__title" id="testimonials-title">
				<?php esc_html_e( 'Testimonials', 'revive-integrative-health' ); ?>
			</h2>
		</div>

		<div class="testimonials-section__carousel-wrap position-relative">
			<div class="testimonials-slider" data-testimonials-slider>
				<blockquote class="testimonial-slide text-center">
					<p class="testimonial-slide__quote">
						<?php esc_html_e( 'Acupuncture has been extremely beneficial for me in multiple faucets of health! I began my journey due to severe migraines during pregnancy and now utilize it for self care management from the demands of every day life. My favorite part is the cupping, I can instantly tell a difference after a session!', 'revive-integrative-health' ); ?>
					</p>
					<footer class="testimonial-slide__author">
						<cite class="testimonial-slide__name">&mdash; <?php esc_html_e( 'Reilly', 'revive-integrative-health' ); ?></cite>
					</footer>
				</blockquote>

				<blockquote class="testimonial-slide text-center">
					<p class="testimonial-slide__quote">
						<?php esc_html_e( 'The team at Revive truly listens. My physical therapy sessions have helped me regain strength and confidence after my injury, and I always leave feeling supported and hopeful.', 'revive-integrative-health' ); ?>
					</p>
					<footer class="testimonial-slide__author">
						<cite class="testimonial-slide__name">&mdash; <?php esc_html_e( 'Jordan', 'revive-integrative-health' ); ?></cite>
					</footer>
				</blockquote>

				<blockquote class="testimonial-slide text-center">
					<p class="testimonial-slide__quote">
						<?php esc_html_e( 'From the moment I walked in, I felt cared for. The wellness treatments have become an essential part of how I manage stress and stay healthy for my family.', 'revive-integrative-health' ); ?>
					</p>
					<footer class="testimonial-slide__author">
						<cite class="testimonial-slide__name">&mdash; <?php esc_html_e( 'Sam', 'revive-integrative-health' ); ?></cite>
					</footer>
				</blockquote>
			</div>
		</div>
	</div>
</section>
