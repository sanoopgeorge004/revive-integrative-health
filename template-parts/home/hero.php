<?php
/**
 * Homepage hero section (Kirki-driven fallback; prefer Gutenberg block when present).
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title_before    = (string) revive_get_mod( 'revive_hero_title_before', __( 'Begin', 'revive-integrative-health' ) );
$title_emphasis  = (string) revive_get_mod( 'revive_hero_title_emphasis', __( 'Your', 'revive-integrative-health' ) );
$title_after     = (string) revive_get_mod( 'revive_hero_title_after', __( 'Wellness Journey', 'revive-integrative-health' ) );
$hero_image      = (string) revive_get_mod( 'revive_hero_image', revive_asset_uri( 'assets/images/hero-image.jpg' ) );
$cta_label       = (string) revive_get_mod( 'revive_hero_cta_label', __( 'Book Online', 'revive-integrative-health' ) );
$cta_url         = (string) revive_get_mod( 'revive_hero_cta_url', '#book-online' );
?>
<section class="hero" aria-labelledby="hero-title">
	<figure class="hero__background">
		<img
			src="<?php echo esc_url( $hero_image ); ?>"
			alt="<?php esc_attr_e( 'A person holding orange dumbbells during a wellness workout session', 'revive-integrative-health' ); ?>"
			class="hero__background-image"
			width="1600"
			height="818"
		>
		<span class="hero__background-overlay" aria-hidden="true"></span>
	</figure>

	<span class="hero__bottom-brush" aria-hidden="true"></span>

	<div class="hero__content">
		<h1 class="hero__title" id="hero-title">
			<?php echo esc_html( $title_before ); ?>
			<span class="hero__title-emphasis"><?php echo esc_html( $title_emphasis ); ?></span>
			<?php echo esc_html( $title_after ); ?>
		</h1>
		<a href="<?php echo esc_url( $cta_url ); ?>" class="btn-revive btn-revive--primary hero__cta">
			<?php echo esc_html( $cta_label ); ?>
		</a>
	</div>
</section>
