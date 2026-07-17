<?php
/**
 * Service card: parent service with child titles as a list (no child links).
 *
 * Expected $args:
 * - post  (WP_Post) Parent service post.
 * - index (int)     Loop index for layout/glow.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$service = isset( $args['post'] ) ? $args['post'] : null;
if ( ! $service instanceof WP_Post ) {
	return;
}

$index      = isset( $args['index'] ) ? absint( $args['index'] ) : 0;
$children   = revive_get_service_children( $service->ID );
$permalink  = get_permalink( $service );
$excerpt    = $service->post_excerpt ? $service->post_excerpt : wp_trim_words( wp_strip_all_tags( $service->post_content ), 40 );
$image_url  = get_the_post_thumbnail_url( $service, 'revive-card' );
$image_alt  = get_post_meta( get_post_thumbnail_id( $service ), '_wp_attachment_image_alt', true );
$glow       = revive_service_glow_asset( $index );
$accent     = revive_service_media_accent_class( $index );
$row_class  = 'service-card row align-items-center g-4 g-lg-5';
if ( 1 === $index % 2 ) {
	$row_class .= ' flex-lg-row-reverse';
}

if ( ! $image_url ) {
	$fallbacks = array(
		'assets/images/peadiatric-service-masked.png',
		'assets/images/specialized-masked.png',
		'assets/images/health-wellness-masked.png',
	);
	$image_url = revive_asset_uri( $fallbacks[ $index % count( $fallbacks ) ] );
}

if ( ! $image_alt ) {
	$image_alt = get_the_title( $service );
}
?>
<article class="<?php echo esc_attr( $row_class ); ?>" id="<?php echo esc_attr( $service->post_name ); ?>">
	<div class="col-12 col-lg-5">
		<figure class="service-card__media <?php echo esc_attr( $accent ); ?> mx-auto mb-0">
			<img
				src="<?php echo esc_url( revive_asset_uri( $glow ) ); ?>"
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
		<div class="service-card__content">
			<h3 class="service-card__heading"><?php echo esc_html( get_the_title( $service ) ); ?></h3>
			<?php if ( $excerpt ) : ?>
				<p class="service-card__text"><?php echo esc_html( $excerpt ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $children ) ) : ?>
				<ul class="service-card__list row row-cols-1 row-cols-sm-2 g-2 list-unstyled mb-4">
					<?php foreach ( $children as $child ) : ?>
						<li class="col">
							<span class="service-card__list-item"><?php echo esc_html( get_the_title( $child ) ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<a href="<?php echo esc_url( $permalink ); ?>" class="btn-revive btn-revive--primary btn-revive--sm">
				<?php esc_html_e( 'More Info', 'revive-integrative-health' ); ?>
			</a>
		</div>
	</div>
</article>
