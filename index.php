<?php
/**
 * Main fallback template.
 *
 * @package Revive_Integrative_Health
 */

get_header();
?>
<main id="main-content" class="section-pad">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article <?php post_class(); ?>>
					<h1 class="mb-4"><?php the_title(); ?></h1>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
