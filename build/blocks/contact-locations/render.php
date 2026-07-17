<?php
/**
 * Contact Locations block front-end render.
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

$section_title = isset( $attributes['sectionTitle'] ) ? (string) $attributes['sectionTitle'] : __( 'Locations & Hours', 'revive-integrative-health' );
$locations     = ( isset( $attributes['locations'] ) && is_array( $attributes['locations'] ) ) ? $attributes['locations'] : array();

if ( empty( $locations ) ) {
	return;
}

/**
 * Split textarea content into non-empty lines.
 *
 * @param string $text Raw text.
 * @return string[]
 */
$revive_location_lines = static function ( $text ) {
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
?>
<section class="contact-locations section-pad" id="locations" aria-labelledby="contact-locations-title">
	<div class="container">
		<?php if ( '' !== $section_title ) : ?>
			<h2 class="contact-locations__title text-center" id="contact-locations-title">
				<?php echo esc_html( $section_title ); ?>
			</h2>
		<?php endif; ?>

		<div class="contact-locations__list">
			<?php foreach ( $locations as $location ) : ?>
				<?php
				$name      = isset( $location['name'] ) ? (string) $location['name'] : '';
				$address   = isset( $location['address'] ) ? (string) $location['address'] : '';
				$note      = isset( $location['note'] ) ? (string) $location['note'] : '';
				$hours     = ( isset( $location['hours'] ) && is_array( $location['hours'] ) ) ? $location['hours'] : array();
				$phone     = isset( $location['phone'] ) ? (string) $location['phone'] : '';
				$fax       = isset( $location['fax'] ) ? (string) $location['fax'] : '';
				$map_url   = isset( $location['mapUrl'] ) ? (string) $location['mapUrl'] : '';
				$map_title = isset( $location['mapTitle'] ) ? (string) $location['mapTitle'] : '';
				$footnote  = isset( $location['footnote'] ) ? (string) $location['footnote'] : '';
				$addr_lines = $revive_location_lines( $address );
				?>
				<article class="contact-location row align-items-center g-4 g-lg-5">
					<div class="col-12 col-lg-6">
						<div class="contact-location__details location-card">
							<?php if ( '' !== $name ) : ?>
								<h3 class="location-card__name"><?php echo esc_html( $name ); ?></h3>
							<?php endif; ?>

							<?php if ( ! empty( $addr_lines ) ) : ?>
								<address class="location-card__address">
									<?php echo wp_kses_post( implode( '<br>', array_map( 'esc_html', $addr_lines ) ) ); ?>
								</address>
							<?php endif; ?>

							<?php if ( '' !== $note ) : ?>
								<p class="location-card__note"><?php echo esc_html( $note ); ?></p>
							<?php endif; ?>

							<?php foreach ( $hours as $hours_item ) : ?>
								<?php
								$heading = isset( $hours_item['heading'] ) ? (string) $hours_item['heading'] : '';
								$content = isset( $hours_item['content'] ) ? (string) $hours_item['content'] : '';
								$lines   = $revive_location_lines( $content );

								if ( '' === $heading && empty( $lines ) ) {
									continue;
								}
								?>
								<div class="location-card__block">
									<?php if ( '' !== $heading ) : ?>
										<h4 class="location-card__heading"><?php echo esc_html( $heading ); ?></h4>
									<?php endif; ?>

									<?php if ( count( $lines ) > 1 ) : ?>
										<ul class="location-card__hours list-unstyled mb-0">
											<?php foreach ( $lines as $line ) : ?>
												<li><?php echo esc_html( $line ); ?></li>
											<?php endforeach; ?>
										</ul>
									<?php elseif ( 1 === count( $lines ) ) : ?>
										<p class="location-card__text"><?php echo esc_html( $lines[0] ); ?></p>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>

							<?php if ( '' !== $phone || '' !== $fax ) : ?>
								<p class="contact-location__phone">
									<?php if ( '' !== $phone ) : ?>
										<a href="<?php echo esc_url( revive_phone_href( $phone ) ); ?>">
											<?php echo esc_html( $phone ); ?>
										</a>
										<?php if ( '' !== $fax ) : ?>
											<br>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ( '' !== $fax ) : ?>
										<?php echo esc_html( $fax ); ?>
									<?php endif; ?>
								</p>
							<?php endif; ?>

							<?php if ( '' !== $footnote ) : ?>
								<p class="location-card__footnote mb-0">
									<em><?php echo esc_html( $footnote ); ?></em>
								</p>
							<?php endif; ?>
						</div>
					</div>

					<?php if ( '' !== $map_url ) : ?>
						<div class="col-12 col-lg-6">
							<div class="contact-location__map">
								<iframe
									class="contact-location__iframe"
									title="<?php echo esc_attr( $map_title ? $map_title : $name ); ?>"
									src="<?php echo esc_url( $map_url ); ?>"
									loading="lazy"
									referrerpolicy="no-referrer-when-downgrade"
									allowfullscreen
								></iframe>
							</div>
						</div>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
