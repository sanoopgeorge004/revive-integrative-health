<?php
/**
 * Homepage Locations & Hours section.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="locations-section" id="locations" aria-labelledby="locations-title">
	<div class="container">
		<h2 class="locations-section__title text-center" id="locations-title">
			<?php esc_html_e( 'Locations & Hours', 'revive-integrative-health' ); ?>
		</h2>

		<div class="row g-4 g-lg-5 justify-content-center">
			<div class="col-12 col-md-6 col-lg-5">
				<article class="location-card">
					<h3 class="location-card__name">
						<?php esc_html_e( 'Salina Location', 'revive-integrative-health' ); ?>
					</h3>
					<address class="location-card__address">
						<?php esc_html_e( '645 E. Iron St', 'revive-integrative-health' ); ?><br>
						<?php esc_html_e( 'Salina, KS 67401', 'revive-integrative-health' ); ?>
					</address>

					<div class="location-card__block">
						<h4 class="location-card__heading">
							<?php esc_html_e( 'General Office Hours', 'revive-integrative-health' ); ?>
						</h4>
						<p class="location-card__text">
							<?php esc_html_e( 'Monday-Friday 9am-5pm', 'revive-integrative-health' ); ?>
						</p>
					</div>

					<div class="location-card__block">
						<h4 class="location-card__heading">
							<?php esc_html_e( 'IV Clinic Hours:', 'revive-integrative-health' ); ?>
						</h4>
						<ul class="location-card__hours list-unstyled mb-0">
							<li><?php esc_html_e( 'Tuesday: 1pm-6pm', 'revive-integrative-health' ); ?></li>
							<li><?php esc_html_e( 'Thursday: 7:30am-1pm', 'revive-integrative-health' ); ?></li>
							<li><?php esc_html_e( 'Fridays: 12pm-5pm', 'revive-integrative-health' ); ?></li>
						</ul>
					</div>
				</article>
			</div>

			<div class="col-12 col-md-6 col-lg-5">
				<article class="location-card">
					<h3 class="location-card__name">
						<?php esc_html_e( 'McPherson Location', 'revive-integrative-health' ); ?>
					</h3>
					<address class="location-card__address">
						<?php esc_html_e( '114 W. Euclid', 'revive-integrative-health' ); ?><br>
						<?php esc_html_e( 'McPherson, KS 67460', 'revive-integrative-health' ); ?>
					</address>
					<p class="location-card__note">
						<?php esc_html_e( 'Located in Stupka Chiropractic', 'revive-integrative-health' ); ?>
					</p>

					<div class="location-card__block">
						<h4 class="location-card__heading">
							<?php esc_html_e( 'IV Clinic Hours:', 'revive-integrative-health' ); ?>
						</h4>
						<p class="location-card__text">
							<?php esc_html_e( 'Tuesday, July 8 & July 22: 2-6pm', 'revive-integrative-health' ); ?>
						</p>
					</div>

					<p class="location-card__footnote">
						<em><?php esc_html_e( '*Please check our Facebook for up-to-date clinic hours.', 'revive-integrative-health' ); ?></em>
					</p>
				</article>
			</div>
		</div>
	</div>

	<span class="locations-section__bottom-brush" aria-hidden="true"></span>
</section>
