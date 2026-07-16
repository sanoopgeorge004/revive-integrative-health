<?php
/**
 * Homepage Join the Team section.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="team-section" id="careers" aria-labelledby="team-title">
	<div class="team-section__inner row g-0">
		<div class="col-12 col-lg-6">
			<figure class="team-section__media mb-0">
				<img
					src="<?php echo esc_url( revive_asset_uri( 'assets/images/team.jpg' ) ); ?>"
					alt="<?php esc_attr_e( 'The Revive Integrative Health team posing together in matching shirts', 'revive-integrative-health' ); ?>"
					class="team-section__image"
					width="960"
					height="640"
				>
			</figure>
		</div>
		<div class="col-12 col-lg-6 d-flex align-items-center">
			<div class="team-section__content text-center mx-auto">
				<h2 class="team-section__title" id="team-title">
					<?php esc_html_e( 'Join the Team', 'revive-integrative-health' ); ?>
				</h2>
				<p class="team-section__text">
					<?php esc_html_e( 'Join our vibrant multidisciplinary team at Revive Integrative Health in Salina Kansas. Our clinic is a hub of innovation and support, fostering a nurturing environment for both our patients and staff.', 'revive-integrative-health' ); ?>
				</p>
				<a href="<?php echo esc_url( home_url( '/team/#careers' ) ); ?>" class="btn-revive btn-revive--primary">
					<?php esc_html_e( 'Apply Now', 'revive-integrative-health' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
