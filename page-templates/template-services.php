<?php
/**
 * Template Name: Services
 *
 * Lists top-level hierarchical services (child titles as lists; More Info → parent single).
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$parents = revive_get_parent_services();
?>
<main id="main-content">
	<?php
	revive_the_page_banner(
		array(
			'image' => 'assets/images/peadiatric-service.jpg',
		)
	);
	?>

	<?php if ( ! empty( $parents ) ) : ?>
		<?php
		$featured = array_shift( $parents );
		$children = revive_get_service_children( $featured->ID );
		$image_url = get_the_post_thumbnail_url( $featured, 'revive-card' );
		$image_alt = get_post_meta( get_post_thumbnail_id( $featured ), '_wp_attachment_image_alt', true );
		if ( ! $image_url ) {
			$image_url = revive_asset_uri( 'assets/images/peadiatric-service-masked.png' );
		}
		if ( ! $image_alt ) {
			$image_alt = get_the_title( $featured );
		}
		?>
		<section class="service-detail section-pad" id="<?php echo esc_attr( $featured->post_name ); ?>" aria-labelledby="featured-service-title">
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
								src="<?php echo esc_url( $image_url ); ?>"
								alt="<?php echo esc_attr( $image_alt ); ?>"
								class="service-card__image"
								width="441"
								height="457"
							>
						</figure>
					</div>
					<div class="col-12 col-lg-7">
						<h2 class="service-card__heading" id="featured-service-title">
							<?php echo esc_html( get_the_title( $featured ) ); ?>
						</h2>
						<?php
						$intro = $featured->post_excerpt
							? $featured->post_excerpt
							: wp_trim_words( wp_strip_all_tags( $featured->post_content ), 45 );
						?>
						<?php if ( $intro ) : ?>
							<p class="service-card__text mb-0"><?php echo esc_html( $intro ); ?></p>
						<?php endif; ?>
					</div>
				</div>

				<?php
				get_template_part(
					'template-parts/services/accordion',
					null,
					array(
						'parent_id' => $featured->ID,
						'children'  => $children,
					)
				);
				?>
			</div>
		</section>

		<?php if ( ! empty( $parents ) ) : ?>
			<section class="other-services section-pad" aria-labelledby="other-services-title">
				<div class="container">
					<h2 class="other-services__title text-center" id="other-services-title">
						<?php esc_html_e( 'Other Services', 'revive-integrative-health' ); ?>
					</h2>
					<div class="services-section__list">
						<?php foreach ( $parents as $index => $service ) : ?>
							<?php
							get_template_part(
								'template-parts/services/card',
								null,
								array(
									'post'  => $service,
									'index' => $index + 1,
								)
							);
							?>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php else : ?>
		<section class="section-pad">
			<div class="container">
				<p class="text-center mb-0">
					<?php esc_html_e( 'Services will appear here once parent service posts are published.', 'revive-integrative-health' ); ?>
				</p>
			</div>
		</section>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/shared/contact', 'section', array( 'no_brush' => true ) ); ?>
</main>
<?php
get_footer();
