<?php
/**
 * Template Name: Contact
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="main-content">
	<?php
	get_template_part(
		'template-parts/shared/page',
		'banner',
		array(
			'title' => __( 'Contact', 'revive-integrative-health' ),
			'image' => 'assets/images/health-wellness.jpg',
		)
	);
	?>

	<section class="contact-locations section-pad" id="locations" aria-labelledby="contact-locations-title">
		<div class="container">
			<h2 class="contact-locations__title text-center" id="contact-locations-title">
				<?php esc_html_e( 'Locations & Hours', 'revive-integrative-health' ); ?>
			</h2>

			<div class="contact-locations__list">

				<article class="contact-location row align-items-center g-4 g-lg-5">
					<div class="col-12 col-lg-6">
						<div class="contact-location__details location-card">
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

							<p class="contact-location__phone">
								<a href="<?php echo esc_url( revive_phone_href( '7854149422' ) ); ?>">785-414-9422</a><br>
								<?php esc_html_e( 'Fax: 785-200-3765', 'revive-integrative-health' ); ?>
							</p>
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="contact-location__map">
							<iframe
								class="contact-location__iframe"
								title="<?php esc_attr_e( 'Map of Revive Integrative Health Salina location', 'revive-integrative-health' ); ?>"
								src="<?php echo esc_url( 'https://maps.google.com/maps?q=645+E.+Iron+St,+Salina,+KS+67401&z=15&output=embed' ); ?>"
								loading="lazy"
								referrerpolicy="no-referrer-when-downgrade"
								allowfullscreen
							></iframe>
						</div>
					</div>
				</article>

				<article class="contact-location row align-items-center g-4 g-lg-5">
					<div class="col-12 col-lg-6">
						<div class="contact-location__details location-card">
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

							<p class="location-card__footnote mb-0">
								<em><?php esc_html_e( '*Please check our Facebook for up-to-date clinic hours.', 'revive-integrative-health' ); ?></em>
							</p>
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="contact-location__map">
							<iframe
								class="contact-location__iframe"
								title="<?php esc_attr_e( 'Map of Revive Integrative Health McPherson location', 'revive-integrative-health' ); ?>"
								src="<?php echo esc_url( 'https://maps.google.com/maps?q=114+W.+Euclid,+McPherson,+KS+67460&z=15&output=embed' ); ?>"
								loading="lazy"
								referrerpolicy="no-referrer-when-downgrade"
								allowfullscreen
							></iframe>
						</div>
					</div>
				</article>

			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/shared/contact', 'section', array( 'no_brush' => true ) ); ?>
</main>
<?php
get_footer();
