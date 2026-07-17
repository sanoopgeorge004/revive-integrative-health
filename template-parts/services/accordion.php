<?php
/**
 * Service children accordion (titles + content; no links to child posts).
 *
 * Expected $args:
 * - parent_id (int) Parent service post ID.
 * - children  (WP_Post[]) Optional preloaded children.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$parent_id = isset( $args['parent_id'] ) ? absint( $args['parent_id'] ) : 0;
$children  = isset( $args['children'] ) && is_array( $args['children'] )
	? $args['children']
	: revive_get_service_children( $parent_id );

if ( empty( $children ) ) {
	return;
}

$accordion_id = 'service-accordion-' . ( $parent_id ? $parent_id : 'main' );
?>
<div class="service-detail__accordion">
	<div class="accordion service-accordion" id="<?php echo esc_attr( $accordion_id ); ?>">
		<?php foreach ( $children as $index => $child ) : ?>
			<?php
			$heading_id  = $accordion_id . '-heading-' . $child->ID;
			$collapse_id = $accordion_id . '-collapse-' . $child->ID;
			$is_first    = ( 0 === $index );
			$content     = apply_filters( 'the_content', $child->post_content );
			if ( ! $content && $child->post_excerpt ) {
				$content = wpautop( esc_html( $child->post_excerpt ) );
			}
			?>
			<div class="accordion-item">
				<h3 class="accordion-header" id="<?php echo esc_attr( $heading_id ); ?>">
					<button
						class="accordion-button<?php echo $is_first ? '' : ' collapsed'; ?>"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#<?php echo esc_attr( $collapse_id ); ?>"
						aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $collapse_id ); ?>"
					>
						<?php echo esc_html( get_the_title( $child ) ); ?>
					</button>
				</h3>
				<div
					id="<?php echo esc_attr( $collapse_id ); ?>"
					class="accordion-collapse collapse<?php echo $is_first ? ' show' : ''; ?>"
					aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
					data-bs-parent="#<?php echo esc_attr( $accordion_id ); ?>"
				>
					<div class="accordion-body">
						<?php echo $content ? wp_kses_post( $content ) : ''; ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
