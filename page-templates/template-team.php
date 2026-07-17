<?php
/**
 * Template Name: Our Team
 *
 * Loads team members from the `team` custom post type.
 * - Designation taxonomy: `designation` (role)
 * - Speciality taxonomy: `speciality` (tags)
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$team_query = new WP_Query(
	array(
		'post_type'              => 'team',
		'post_status'            => 'publish',
		'posts_per_page'         => -1,
		'orderby'                => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
	)
);
?>
<main id="main-content">
	<?php
	revive_the_page_banner(
		array(
			'image' => 'assets/images/team.jpg',
		)
	);
	?>

	<section class="team-roster section-pad" id="our-team" aria-label="<?php esc_attr_e( 'Team members', 'revive-integrative-health' ); ?>">
		<div class="container">
			<?php if ( $team_query->have_posts() ) : ?>
				<div class="team-roster__list">
					<?php
					$index = 0;
					while ( $team_query->have_posts() ) :
						$team_query->the_post();
						get_template_part( 'template-parts/team/member', 'card', array( 'index' => $index ) );
						++$index;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php else : ?>
				<p class="text-center mb-0">
					<?php esc_html_e( 'Team members will appear here once they are published.', 'revive-integrative-health' ); ?>
				</p>
			<?php endif; ?>
		</div>
	</section>

	<?php
	// Careers / job posts: add the Careers block in the page editor.
	while ( have_posts() ) :
		the_post();
		$raw_content = get_post() ? (string) get_post()->post_content : '';
		if ( '' !== trim( $raw_content ) ) :
			?>
			<div class="entry-content team-page__content">
				<?php the_content(); ?>
			</div>
			<?php
		endif;
	endwhile;
	?>

	<?php get_template_part( 'template-parts/home/join', 'team' ); ?>

	<?php get_template_part( 'template-parts/shared/contact', 'section', array( 'no_brush' => true ) ); ?>
</main>
<?php
get_footer();
