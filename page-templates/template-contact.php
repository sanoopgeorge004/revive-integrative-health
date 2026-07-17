<?php
/**
 * Template Name: Contact
 *
 * Locations are edited in the page content via the Contact Locations block.
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
	revive_the_page_banner(
		array(
			'image' => 'assets/images/health-wellness.jpg',
		)
	);
	?>

	<?php
	while ( have_posts() ) :
		the_post();
		$raw_content = get_post() ? (string) get_post()->post_content : '';
		if ( '' !== trim( $raw_content ) ) :
			?>
			<div class="entry-content contact-page__content">
				<?php the_content(); ?>
			</div>
		<?php else : ?>
			<?php echo do_blocks( '<!-- wp:revive/contact-locations /-->' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php endif; ?>
	<?php endwhile; ?>

	<?php get_template_part( 'template-parts/shared/contact', 'section', array( 'no_brush' => true ) ); ?>
</main>
<?php
get_footer();
