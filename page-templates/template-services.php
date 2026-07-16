<?php
/**
 * Template Name: Services
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
			'title' => __( 'Services', 'revive-integrative-health' ),
			'image' => 'assets/images/peadiatric-service.jpg',
		)
	);
	?>

	<section class="service-detail section-pad" id="pediatric-services" aria-labelledby="pediatric-detail-title">
		<div class="container">
			<div class="service-detail__intro row align-items-center g-4 g-lg-5">
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
					<h2 class="service-card__heading" id="pediatric-detail-title">
						<?php esc_html_e( 'Pediatric Services', 'revive-integrative-health' ); ?>
					</h2>
					<p class="service-card__text mb-0">
						<?php esc_html_e( 'Our pediatric team supports children of all ages with individualized therapy plans that build strength, confidence, and independence—at home, school, and play.', 'revive-integrative-health' ); ?>
					</p>
				</div>
			</div>

			<div class="service-detail__accordion row">
				<div class="col-12">
					<div class="accordion service-accordion" id="pediatric-accordion">
						<div class="accordion-item">
							<h3 class="accordion-header" id="heading-pt">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-pt" aria-expanded="true" aria-controls="collapse-pt">
									<?php esc_html_e( 'Physical Therapy', 'revive-integrative-health' ); ?>
								</button>
							</h3>
							<div id="collapse-pt" class="accordion-collapse collapse show" aria-labelledby="heading-pt" data-bs-parent="#pediatric-accordion">
								<div class="accordion-body">
									<p><?php esc_html_e( 'Pediatric physical therapy helps children improve strength, balance, coordination, and mobility through play-based, age-appropriate exercises.', 'revive-integrative-health' ); ?></p>
									<p><?php esc_html_e( 'Our therapists create personalized plans that support developmental milestones and help kids move with confidence in everyday activities.', 'revive-integrative-health' ); ?></p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h3 class="accordion-header" id="heading-ot">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-ot" aria-expanded="false" aria-controls="collapse-ot">
									<?php esc_html_e( 'Occupational Therapy', 'revive-integrative-health' ); ?>
								</button>
							</h3>
							<div id="collapse-ot" class="accordion-collapse collapse" aria-labelledby="heading-ot" data-bs-parent="#pediatric-accordion">
								<div class="accordion-body">
									<p><?php esc_html_e( 'Occupational therapy supports fine motor skills, sensory processing, and daily living activities so children can thrive at home and in school.', 'revive-integrative-health' ); ?></p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h3 class="accordion-header" id="heading-st">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-st" aria-expanded="false" aria-controls="collapse-st">
									<?php esc_html_e( 'Speech Therapy', 'revive-integrative-health' ); ?>
								</button>
							</h3>
							<div id="collapse-st" class="accordion-collapse collapse" aria-labelledby="heading-st" data-bs-parent="#pediatric-accordion">
								<div class="accordion-body">
									<p><?php esc_html_e( 'Speech therapy helps children develop communication, language, and feeding skills with engaging, family-centered care.', 'revive-integrative-health' ); ?></p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h3 class="accordion-header" id="heading-aq">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-aq" aria-expanded="false" aria-controls="collapse-aq">
									<?php esc_html_e( 'Aquatic Therapy', 'revive-integrative-health' ); ?>
								</button>
							</h3>
							<div id="collapse-aq" class="accordion-collapse collapse" aria-labelledby="heading-aq" data-bs-parent="#pediatric-accordion">
								<div class="accordion-body">
									<p><?php esc_html_e( 'Aquatic therapy uses warm water to support movement, reduce joint stress, and build strength in a fun, low-impact environment.', 'revive-integrative-health' ); ?></p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h3 class="accordion-header" id="heading-aba">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-aba" aria-expanded="false" aria-controls="collapse-aba">
									<?php esc_html_e( 'ABA Therapy', 'revive-integrative-health' ); ?>
								</button>
							</h3>
							<div id="collapse-aba" class="accordion-collapse collapse" aria-labelledby="heading-aba" data-bs-parent="#pediatric-accordion">
								<div class="accordion-body">
									<p><?php esc_html_e( 'ABA therapy focuses on building communication, social, and adaptive skills through evidence-based, individualized behavioral support.', 'revive-integrative-health' ); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="other-services section-pad" aria-labelledby="other-services-title">
		<div class="container">
			<h2 class="other-services__title text-center" id="other-services-title">
				<?php esc_html_e( 'Other Services', 'revive-integrative-health' ); ?>
			</h2>

			<div class="services-section__list">
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
								<li class="col"><span class="service-card__list-item"><?php esc_html_e( "Pelvic Floor (Men's & Women's Health)", 'revive-integrative-health' ); ?></span></li>
								<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Mercier', 'revive-integrative-health' ); ?></span></li>
								<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Lymphedema', 'revive-integrative-health' ); ?></span></li>
								<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Speech Therapy', 'revive-integrative-health' ); ?></span></li>
								<li class="col"><span class="service-card__list-item"><?php esc_html_e( 'Mental Health', 'revive-integrative-health' ); ?></span></li>
							</ul>
							<a href="#contact" class="btn-revive btn-revive--primary btn-revive--sm">
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
								alt="<?php esc_attr_e( "Hands performing a therapeutic massage on a person's back", 'revive-integrative-health' ); ?>"
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
							<a href="#contact" class="btn-revive btn-revive--primary btn-revive--sm">
								<?php esc_html_e( 'More Info', 'revive-integrative-health' ); ?>
							</a>
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
