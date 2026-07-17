<?php
/**
 * Homepage Our Services section — parent services CPT with child title lists.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$parents = revive_get_parent_services();
?>
<section class="services-section" id="services" aria-labelledby="services-title">
	<div class="container">
		<h2 class="services-section__title text-center" id="services-title">
			<?php esc_html_e( 'Our Services', 'revive-integrative-health' ); ?>
		</h2>

		<?php if ( ! empty( $parents ) ) : ?>
			<div class="services-section__list">
				<?php foreach ( $parents as $index => $service ) : ?>
					<?php
					get_template_part(
						'template-parts/services/card',
						null,
						array(
							'post'  => $service,
							'index' => $index,
						)
					);
					?>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<p class="text-center mb-0">
				<?php esc_html_e( 'Services will appear here once parent service posts are published.', 'revive-integrative-health' ); ?>
			</p>
		<?php endif; ?>
	</div>
</section>
