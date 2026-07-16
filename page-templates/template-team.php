<?php
/**
 * Template Name: Our Team
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
			'title' => __( 'Our Team', 'revive-integrative-health' ),
			'image' => 'assets/images/team.jpg',
		)
	);
	?>

	<section class="team-roster section-pad" id="our-team" aria-label="<?php esc_attr_e( 'Team members', 'revive-integrative-health' ); ?>">
		<div class="container">
			<div class="team-roster__list">

				<article class="team-member row align-items-center g-4 g-lg-5">
					<div class="col-12 col-lg-4">
						<figure class="team-member__media mb-0">
							<img
								src="<?php echo esc_url( revive_asset_uri( 'assets/images/image-masking-shape-purple.png' ) ); ?>"
								alt=""
								class="team-member__media-glow"
								width="441"
								height="457"
								aria-hidden="true"
							>
							<img
								src="<?php echo esc_url( revive_asset_uri( 'assets/images/new-patient.jpg' ) ); ?>"
								alt="<?php esc_attr_e( 'Dr. Shayla Trost', 'revive-integrative-health' ); ?>"
								class="team-member__photo"
								width="400"
								height="400"
							>
						</figure>
					</div>
					<div class="col-12 col-lg-8">
						<div class="team-member__content">
							<h2 class="team-member__name"><?php esc_html_e( 'Dr. Shayla Trost', 'revive-integrative-health' ); ?></h2>
							<p class="team-member__role"><?php esc_html_e( 'Physical Therapist', 'revive-integrative-health' ); ?></p>
							<ul class="team-member__tags">
								<li><span class="team-member__tag"><?php esc_html_e( 'Specialty 1', 'revive-integrative-health' ); ?></span></li>
								<li><span class="team-member__tag"><?php esc_html_e( 'Specialty 2', 'revive-integrative-health' ); ?></span></li>
								<li><span class="team-member__tag"><?php esc_html_e( 'Specialty 3', 'revive-integrative-health' ); ?></span></li>
							</ul>
							<div class="team-member__bio">
								<p>
									<?php esc_html_e( 'Dr. Shayla Trost is a dedicated physical therapist focused on helping patients restore movement, reduce pain, and return to the activities they love. She combines evidence-based care with a compassionate, whole-person approach.', 'revive-integrative-health' ); ?>
								</p>
							</div>
						</div>
					</div>
				</article>

				<article class="team-member row align-items-center g-4 g-lg-5">
					<div class="col-12 col-lg-4">
						<figure class="team-member__media mb-0">
							<img
								src="<?php echo esc_url( revive_asset_uri( 'assets/images/image-masking-shape-1.png' ) ); ?>"
								alt=""
								class="team-member__media-glow"
								width="441"
								height="457"
								aria-hidden="true"
							>
							<img
								src="<?php echo esc_url( revive_asset_uri( 'assets/images/specialized.jpg' ) ); ?>"
								alt="<?php esc_attr_e( 'Laura Stegman-Love', 'revive-integrative-health' ); ?>"
								class="team-member__photo"
								width="400"
								height="400"
							>
						</figure>
					</div>
					<div class="col-12 col-lg-8">
						<div class="team-member__content">
							<h2 class="team-member__name"><?php esc_html_e( 'Laura Stegman-Love', 'revive-integrative-health' ); ?></h2>
							<p class="team-member__role"><?php esc_html_e( 'Acupuncturist', 'revive-integrative-health' ); ?></p>
							<ul class="team-member__tags">
								<li><span class="team-member__tag"><?php esc_html_e( 'Specialty 1', 'revive-integrative-health' ); ?></span></li>
								<li><span class="team-member__tag"><?php esc_html_e( 'Specialty 2', 'revive-integrative-health' ); ?></span></li>
							</ul>
							<div class="team-member__bio">
								<p>
									<?php esc_html_e( 'Laura Stegman-Love specializes in acupuncture and integrative wellness, supporting patients with personalized treatments that promote balance, recovery, and long-term well-being.', 'revive-integrative-health' ); ?>
								</p>
							</div>
						</div>
					</div>
				</article>

				<article class="team-member row align-items-center g-4 g-lg-5">
					<div class="col-12 col-lg-4">
						<figure class="team-member__media mb-0">
							<img
								src="<?php echo esc_url( revive_asset_uri( 'assets/images/image-masking-shape-purple.png' ) ); ?>"
								alt=""
								class="team-member__media-glow"
								width="441"
								height="457"
								aria-hidden="true"
							>
							<img
								src="<?php echo esc_url( revive_asset_uri( 'assets/images/health-wellness.jpg' ) ); ?>"
								alt="<?php esc_attr_e( 'Sarah Brown', 'revive-integrative-health' ); ?>"
								class="team-member__photo"
								width="400"
								height="400"
							>
						</figure>
					</div>
					<div class="col-12 col-lg-8">
						<div class="team-member__content">
							<h2 class="team-member__name"><?php esc_html_e( 'Sarah Brown', 'revive-integrative-health' ); ?></h2>
							<p class="team-member__role"><?php esc_html_e( 'Esthetician', 'revive-integrative-health' ); ?></p>
							<ul class="team-member__tags">
								<li><span class="team-member__tag"><?php esc_html_e( 'Specialty 1', 'revive-integrative-health' ); ?></span></li>
							</ul>
							<div class="team-member__bio">
								<p>
									<?php esc_html_e( 'Sarah Brown is an experienced esthetician who helps clients renew their skin and confidence through tailored facial treatments and thoughtful wellness-focused skincare care.', 'revive-integrative-health' ); ?>
								</p>
							</div>
						</div>
					</div>
				</article>

			</div>
		</div>
	</section>

	<section class="team-section" id="careers" aria-labelledby="join-team-title">
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
					<h2 class="team-section__title" id="join-team-title">
						<?php esc_html_e( 'Join the Team', 'revive-integrative-health' ); ?>
					</h2>
					<p class="team-section__text">
						<?php esc_html_e( 'Join our vibrant multidisciplinary team at Revive Integrative Health in Salina Kansas. Our clinic is a hub of innovation and support, fostering a nurturing environment for both our patients and staff.', 'revive-integrative-health' ); ?>
					</p>
					<a href="#contact" class="btn-revive btn-revive--primary">
						<?php esc_html_e( 'Apply Now', 'revive-integrative-health' ); ?>
					</a>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/shared/contact', 'section', array( 'no_brush' => true ) ); ?>
</main>
<?php
get_footer();
