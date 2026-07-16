<?php
/**
 * Homepage Our Services section.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="services-section" id="services" aria-labelledby="services-title">
	<div class="container">
		<h2 class="services-section__title text-center" id="services-title">
			<?php esc_html_e( 'Our Services', 'revive-integrative-health' ); ?>
		</h2>

		<div class="services-section__list">

			<article class="service-card row align-items-center g-4 g-lg-5" id="pediatric-services">
				<div class="col-12 col-lg-5">
					<figure class="service-card__media service-card__media--accent-blue mx-auto mb-0">
						<img
							src="<?php echo esc_url( revive_asset_uri( 'assets/images/image-masking-shape-1.png' ) ); ?>"
							alt=""
							class="service-card__media-glow"
							width="441"
							height="457"
							aria-hidden="true"
						>
						<img
							src="<?php echo esc_url( revive_asset_uri( 'assets/images/peadiatric-service-masked.png' ) ); ?>"
							alt="<?php esc_attr_e( 'A young child holding a yellow ball above their head', 'revive-integrative-health' ); ?>"
							class="service-card__image"
							width="441"
							height="457"
						>
					</figure>
				</div>
				<div class="col-12 col-lg-7">
					<div class="service-card__content">
						<h3 class="service-card__heading">
							<?php esc_html_e( 'Pediatric Services', 'revive-integrative-health' ); ?>
						</h3>
						<p class="service-card__text">
							<?php esc_html_e( 'Our pediatric team supports children of all ages with individualized therapy plans that build strength, confidence, and independence—at home, school, and play.', 'revive-integrative-health' ); ?>
						</p>
						<ul class="service-card__list row row-cols-1 row-cols-sm-2 g-2 list-unstyled mb-4">
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Physical Therapy', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Occupational Therapy', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Speech Therapy', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Aquatic Therapy', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'ABA Therapy', 'revive-integrative-health' ); ?></span></li>
						</ul>
						<a href="<?php echo esc_url( home_url( '/services/#pediatric-services' ) ); ?>" class="btn-revive btn-revive--primary btn-revive--sm">
							<?php esc_html_e( 'More Info', 'revive-integrative-health' ); ?>
						</a>
					</div>
				</div>
			</article>

			<article class="service-card row align-items-center g-4 g-lg-5 flex-lg-row-reverse" id="specialized-services">
				<div class="col-12 col-lg-5">
					<figure class="service-card__media service-card__media--accent-purple mx-auto mb-0">
						<img
							src="<?php echo esc_url( revive_asset_uri( 'assets/images/image-masking-shape-purple.png' ) ); ?>"
							alt=""
							class="service-card__media-glow"
							width="441"
							height="457"
							aria-hidden="true"
						>
						<img
							src="<?php echo esc_url( revive_asset_uri( 'assets/images/specialized-masked.png' ) ); ?>"
							alt="<?php esc_attr_e( 'A person in a hoodie sitting thoughtfully with hands clasped', 'revive-integrative-health' ); ?>"
							class="service-card__image"
							width="441"
							height="457"
						>
					</figure>
				</div>
				<div class="col-12 col-lg-7">
					<div class="service-card__content">
						<h3 class="service-card__heading">
							<?php esc_html_e( 'Specialized', 'revive-integrative-health' ); ?>
						</h3>
						<p class="service-card__text">
							<?php esc_html_e( 'From pelvic health to mental wellness, our specialized programs address complex needs with compassionate, evidence-based care tailored to each patient.', 'revive-integrative-health' ); ?>
						</p>
						<ul class="service-card__list row row-cols-1 row-cols-sm-2 g-2 list-unstyled mb-4">
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Pelvic Floor (Men\'s & Women\'s Health)', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Mercier', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Lymphedema', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Speech Therapy', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Mental Health', 'revive-integrative-health' ); ?></span></li>
						</ul>
						<a href="<?php echo esc_url( home_url( '/services/#specialized-services' ) ); ?>" class="btn-revive btn-revive--primary btn-revive--sm">
							<?php esc_html_e( 'More Info', 'revive-integrative-health' ); ?>
						</a>
					</div>
				</div>
			</article>

			<article class="service-card row align-items-center g-4 g-lg-5" id="health-wellness-services">
				<div class="col-12 col-lg-5">
					<figure class="service-card__media service-card__media--accent-purple mx-auto mb-0">
						<img
							src="<?php echo esc_url( revive_asset_uri( 'assets/images/image-masking-shape-purple.png' ) ); ?>"
							alt=""
							class="service-card__media-glow"
							width="441"
							height="457"
							aria-hidden="true"
						>
						<img
							src="<?php echo esc_url( revive_asset_uri( 'assets/images/health-wellness-masked.png' ) ); ?>"
							alt="<?php esc_attr_e( 'Hands performing a therapeutic massage on a person\'s back', 'revive-integrative-health' ); ?>"
							class="service-card__image"
							width="441"
							height="457"
						>
					</figure>
				</div>
				<div class="col-12 col-lg-7">
					<div class="service-card__content">
						<h3 class="service-card__heading">
							<?php esc_html_e( 'Health & Wellness', 'revive-integrative-health' ); ?>
						</h3>
						<p class="service-card__text">
							<?php esc_html_e( 'Restore balance and feel your best with integrative wellness therapies designed to support recovery, reduce pain, and promote lasting vitality.', 'revive-integrative-health' ); ?>
						</p>
						<ul class="service-card__list row row-cols-1 row-cols-sm-2 g-2 list-unstyled mb-4">
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'IV and Injection Therapy', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Ozone and UBI Therapy', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Shockwave', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Acupuncture', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Massage', 'revive-integrative-health' ); ?></span></li>
							<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Spa Facials', 'revive-integrative-health' ); ?></span></li>
						</ul>
						<a href="<?php echo esc_url( home_url( '/services/#health-wellness-services' ) ); ?>" class="btn-revive btn-revive--primary btn-revive--sm">
							<?php esc_html_e( 'More Info', 'revive-integrative-health' ); ?>
						</a>
					</div>
				</div>
			</article>

		</div>
	</div>
</section>
