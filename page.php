<?php
/**
 * Default page template.
 *
 * Banner uses the page featured image and title (like services.html).
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="main-content">
	<?php revive_the_page_banner(); ?>

	<div class="section-pad">
		<div class="container">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
	</div>
</main>
<?php
get_footer();
