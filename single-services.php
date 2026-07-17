<?php
/**
 * Single Services template (parent posts only; children redirect to parent).
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();

	$children  = revive_get_service_children( get_the_ID() );
	$image_url = get_the_post_thumbnail_url( get_the_ID(), 'revive-card' );
	$image_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
	if ( ! $image_url ) {
		$image_url = revive_asset_uri( 'assets/images/peadiatric-service-masked.png' );
	}
	if ( ! $image_alt ) {
		$image_alt = get_the_title();
	}
	?>
<main id="main-content" <?php post_class(); ?>>
	<?php
	revive_the_page_banner(
		array(
			'image' => 'assets/images/peadiatric-service.jpg',
		)
	);
	?>

	<section class="service-detail section-pad" aria-labelledby="service-detail-title">
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
					<h1 class="service-card__heading" id="service-detail-title"><?php the_title(); ?></h1>
					<?php if ( get_the_content() ) : ?>
						<div class="service-card__text mb-0">
							<?php the_content(); ?>
						</div>
					<?php elseif ( has_excerpt() ) : ?>
						<p class="service-card__text mb-0"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<?php
			get_template_part(
				'template-parts/services/accordion',
				null,
				array(
					'parent_id' => get_the_ID(),
					'children'  => $children,
				)
			);
			?>
		</div>
	</section>

	<?php get_template_part( 'template-parts/shared/contact', 'section', array( 'no_brush' => true ) ); ?>
</main>
	<?php
endwhile;

get_footer();
