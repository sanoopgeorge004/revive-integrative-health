<?php
/**
 * Single team member card (used in the team roster loop).
 *
 * Expects global $post to be a `team` CPT post.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_id = get_the_ID();

$designations = get_the_terms( $post_id, 'designation' );
$specialities = get_the_terms( $post_id, 'speciality' );

$role = '';
if ( ! is_wp_error( $designations ) && ! empty( $designations ) ) {
	$role_names = wp_list_pluck( $designations, 'name' );
	$role       = implode( ', ', $role_names );
}

$glow_images = array(
	'assets/images/image-masking-shape-purple.png',
	'assets/images/image-masking-shape-1.png',
);
$glow_index = isset( $args['index'] ) ? absint( $args['index'] ) : 0;
$glow_src   = $glow_images[ $glow_index % count( $glow_images ) ];

$photo_url = get_the_post_thumbnail_url( $post_id, 'revive-team' );
if ( ! $photo_url ) {
	$photo_url = get_the_post_thumbnail_url( $post_id, 'medium_large' );
}
if ( ! $photo_url ) {
	$photo_url = revive_asset_uri( 'assets/images/new-patient.jpg' );
}

$photo_alt = get_post_meta( get_post_thumbnail_id( $post_id ), '_wp_attachment_image_alt', true );
if ( ! $photo_alt ) {
	$photo_alt = get_the_title();
}
?>
<article <?php post_class( 'team-member row align-items-center g-4 g-lg-5' ); ?> id="team-member-<?php echo esc_attr( (string) $post_id ); ?>">
	<div class="col-12 col-lg-4">
		<figure class="team-member__media mb-0">
			<img
				src="<?php echo esc_url( revive_asset_uri( $glow_src ) ); ?>"
				alt=""
				class="team-member__media-glow"
				width="441"
				height="457"
				aria-hidden="true"
			>
			<img
				src="<?php echo esc_url( $photo_url ); ?>"
				alt="<?php echo esc_attr( $photo_alt ); ?>"
				class="team-member__photo"
				width="400"
				height="400"
			>
		</figure>
	</div>
	<div class="col-12 col-lg-8">
		<div class="team-member__content">
			<h2 class="team-member__name"><?php the_title(); ?></h2>

			<?php if ( $role ) : ?>
				<p class="team-member__role"><?php echo esc_html( $role ); ?></p>
			<?php endif; ?>

			<?php if ( ! is_wp_error( $specialities ) && ! empty( $specialities ) ) : ?>
				<ul class="team-member__tags">
					<?php foreach ( $specialities as $speciality ) : ?>
						<li>
							<span class="team-member__tag"><?php echo esc_html( $speciality->name ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ( get_the_content() ) : ?>
				<div class="team-member__bio">
					<?php the_content(); ?>
				</div>
			<?php elseif ( has_excerpt() ) : ?>
				<div class="team-member__bio">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</article>
