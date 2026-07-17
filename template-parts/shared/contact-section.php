<?php
/**
 * Contact form section (shared; optional bottom brush via $args).
 *
 * Form embed + section title come from Customizer (Kirki) theme options.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$no_brush = ! empty( $args['no_brush'] );

$section_classes = 'contact-section';
if ( $no_brush ) {
	$section_classes .= ' contact-section--no-brush';
}

$section_title = (string) revive_get_mod( 'revive_contact_title', __( 'Contact Our Team', 'revive-integrative-health' ) );
?>
<section class="<?php echo esc_attr( $section_classes ); ?>" id="contact" aria-labelledby="contact-title">
	<div class="container">
		<h2 class="contact-section__title text-center" id="contact-title">
			<?php echo esc_html( $section_title ); ?>
		</h2>

		<?php revive_the_contact_form_embed(); ?>
	</div>

	<?php if ( ! $no_brush ) : ?>
		<span class="contact-section__bottom-brush" aria-hidden="true"></span>
	<?php endif; ?>
</section>
