<?php
/**
 * Front page template.
 *
 * @package Revive_Integrative_Health
 */

get_header();
?>
<main id="main-content">
	<?php
	get_template_part( 'template-parts/home/hero' );
	get_template_part( 'template-parts/home/highlight', 'box' );
	get_template_part( 'template-parts/home/services' );
	get_template_part( 'template-parts/home/testimonials' );
	get_template_part( 'template-parts/home/join', 'team' );
	get_template_part( 'template-parts/home/contact' );
	get_template_part( 'template-parts/home/locations' );
	?>
</main>
<?php
get_footer();
