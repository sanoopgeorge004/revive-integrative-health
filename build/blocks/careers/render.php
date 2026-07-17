<?php
/**
 * Careers / Job Posts block front-end render.
 *
 * @package Revive_Integrative_Health
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block content.
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_title = isset( $attributes['sectionTitle'] ) ? (string) $attributes['sectionTitle'] : __( 'Open Positions', 'revive-integrative-health' );
$jobs          = ( isset( $attributes['jobs'] ) && is_array( $attributes['jobs'] ) ) ? $attributes['jobs'] : array();

if ( empty( $jobs ) ) {
	return;
}

/**
 * Split textarea into non-empty lines.
 *
 * @param string $text Raw text.
 * @return string[]
 */
$revive_job_lines = static function ( $text ) {
	$lines = preg_split( '/\r\n|\r|\n/', (string) $text );
	if ( ! is_array( $lines ) ) {
		return array();
	}
	return array_values(
		array_filter(
			array_map( 'trim', $lines ),
			static function ( $line ) {
				return '' !== $line;
			}
		)
	);
};

/**
 * Print a prose section (paragraphs from blank-line breaks).
 *
 * @param string $heading Section heading.
 * @param string $text    Body text.
 */
$revive_job_prose = static function ( $heading, $text ) {
	$text = trim( (string) $text );
	if ( '' === $text ) {
		return;
	}

	$paragraphs = preg_split( '/\n\s*\n/', $text );
	if ( ! is_array( $paragraphs ) ) {
		$paragraphs = array( $text );
	}
	?>
	<div class="career-post__block">
		<?php if ( '' !== $heading ) : ?>
			<h4 class="career-post__heading"><?php echo esc_html( $heading ); ?></h4>
		<?php endif; ?>
		<?php foreach ( $paragraphs as $paragraph ) : ?>
			<?php
			$paragraph = trim( (string) $paragraph );
			if ( '' === $paragraph ) {
				continue;
			}
			?>
			<p class="career-post__text"><?php echo nl2br( esc_html( $paragraph ) ); ?></p>
		<?php endforeach; ?>
	</div>
	<?php
};

/**
 * Print a list section.
 *
 * @param string   $heading Section heading.
 * @param string[] $lines   List items.
 */
$revive_job_list = static function ( $heading, $lines ) {
	if ( empty( $lines ) ) {
		return;
	}
	?>
	<div class="career-post__block">
		<?php if ( '' !== $heading ) : ?>
			<h4 class="career-post__heading"><?php echo esc_html( $heading ); ?></h4>
		<?php endif; ?>
		<ul class="career-post__list">
			<?php foreach ( $lines as $line ) : ?>
				<li><?php echo esc_html( $line ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php
};
?>
<section class="careers-section section-pad" id="job-posts" aria-labelledby="careers-section-title">
	<div class="container">
		<?php if ( '' !== $section_title ) : ?>
			<h2 class="careers-section__title text-center" id="careers-section-title">
				<?php echo esc_html( $section_title ); ?>
			</h2>
		<?php endif; ?>

		<div class="careers-section__list">
			<?php foreach ( $jobs as $index => $job ) : ?>
				<?php
				$title         = isset( $job['title'] ) ? (string) $job['title'] : '';
				$posting_label = isset( $job['jobPostingLabel'] ) ? (string) $job['jobPostingLabel'] : '';
				$location      = isset( $job['location'] ) ? (string) $job['location'] : '';
				$position      = isset( $job['position'] ) ? (string) $job['position'] : '';
				$age_range     = isset( $job['clienteleAgeRange'] ) ? (string) $job['clienteleAgeRange'] : '';
				$image_url     = ! empty( $job['imageUrl'] ) ? (string) $job['imageUrl'] : revive_asset_uri( 'assets/images/team.jpg' );
				$image_alt     = ! empty( $job['imageAlt'] ) ? (string) $job['imageAlt'] : $title;
				$about         = isset( $job['aboutUs'] ) ? (string) $job['aboutUs'] : '';
				$overview      = isset( $job['roleOverview'] ) ? (string) $job['roleOverview'] : '';
				$responsibilities = $revive_job_lines( isset( $job['keyResponsibilities'] ) ? $job['keyResponsibilities'] : '' );
				$offer            = $revive_job_lines( isset( $job['whatWeOffer'] ) ? $job['whatWeOffer'] : '' );
				$qualifications   = $revive_job_lines( isset( $job['qualifications'] ) ? $job['qualifications'] : '' );
				$join_us          = isset( $job['joinUs'] ) ? (string) $job['joinUs'] : '';
				$eeo              = isset( $job['equalOpportunity'] ) ? (string) $job['equalOpportunity'] : '';
				$apply_label      = isset( $job['applyLabel'] ) ? (string) $job['applyLabel'] : __( 'Apply Now', 'revive-integrative-health' );
				$apply_url        = isset( $job['applyUrl'] ) ? (string) $job['applyUrl'] : '#contact';
				$reverse          = ( $index % 2 ) === 1;
				$article_classes  = 'career-post row align-items-start g-4 g-lg-5';
				if ( $reverse ) {
					$article_classes .= ' career-post--reverse';
				}
				?>
				<article class="<?php echo esc_attr( $article_classes ); ?>">
					<div class="col-12 col-lg-5<?php echo $reverse ? ' order-lg-2' : ''; ?>">
						<figure class="career-post__media mb-0">
							<img
								src="<?php echo esc_url( $image_url ); ?>"
								alt="<?php echo esc_attr( $image_alt ); ?>"
								class="career-post__image"
								loading="lazy"
								width="640"
								height="480"
							>
						</figure>
					</div>
					<div class="col-12 col-lg-7<?php echo $reverse ? ' order-lg-1' : ''; ?>">
						<div class="career-post__content">
							<?php if ( '' !== $title ) : ?>
								<h3 class="career-post__title"><?php echo esc_html( $title ); ?></h3>
							<?php endif; ?>

							<?php if ( '' !== $posting_label ) : ?>
								<p class="career-post__posting-label"><?php echo esc_html( $posting_label ); ?></p>
							<?php endif; ?>

							<?php if ( '' !== $location || '' !== $position || '' !== $age_range ) : ?>
								<ul class="career-post__meta list-unstyled">
									<?php if ( '' !== $location ) : ?>
										<li>
											<span class="career-post__meta-label"><?php esc_html_e( 'Location:', 'revive-integrative-health' ); ?></span>
											<?php echo esc_html( $location ); ?>
										</li>
									<?php endif; ?>
									<?php if ( '' !== $position ) : ?>
										<li>
											<span class="career-post__meta-label"><?php esc_html_e( 'Position:', 'revive-integrative-health' ); ?></span>
											<?php echo esc_html( $position ); ?>
										</li>
									<?php endif; ?>
									<?php if ( '' !== $age_range ) : ?>
										<li>
											<span class="career-post__meta-label"><?php esc_html_e( 'Clientele Age Range:', 'revive-integrative-health' ); ?></span>
											<?php echo esc_html( $age_range ); ?>
										</li>
									<?php endif; ?>
								</ul>
							<?php endif; ?>

							<?php
							$revive_job_prose( __( 'About Us:', 'revive-integrative-health' ), $about );
							$revive_job_prose( __( 'Role Overview:', 'revive-integrative-health' ), $overview );
							$revive_job_list( __( 'Key Responsibilities:', 'revive-integrative-health' ), $responsibilities );
							$revive_job_list( __( 'What We Offer:', 'revive-integrative-health' ), $offer );
							$revive_job_list( __( 'Qualifications:', 'revive-integrative-health' ), $qualifications );
							$revive_job_prose( __( 'Join Us:', 'revive-integrative-health' ), $join_us );
							?>

							<?php if ( '' !== $eeo ) : ?>
								<p class="career-post__eeo"><?php echo esc_html( $eeo ); ?></p>
							<?php endif; ?>

							<?php if ( '' !== $apply_label && '' !== $apply_url ) : ?>
								<a href="<?php echo esc_url( $apply_url ); ?>" class="btn-revive btn-revive--primary career-post__cta">
									<?php echo esc_html( $apply_label ); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
