<?php
/**
 * Default page template.
 *
 * @package Revive_Integrative_Health
 */

get_header();
?>
<main id="main-content" class="section-pad page-inner">
	<div class="container">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article <?php post_class(); ?>>
				<h1 class="mb-4"><?php the_title(); ?></h1>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</main>
<?php
get_footer();
