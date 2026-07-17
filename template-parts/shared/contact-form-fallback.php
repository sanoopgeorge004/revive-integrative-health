<?php
/**
 * Fallback contact form preview when no Cognito embed is set in Customizer.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<form class="cog-form c-forms-form" action="#" method="post" novalidate>
	<div class="cog-row c-row row g-3">
		<div class="cog-row__col c-col col-12 col-md-6">
			<div class="cog-field cog-text cog-name c-field c-name">
				<label class="cog-label c-label" for="contact-name">
					<?php esc_html_e( 'Name', 'revive-integrative-health' ); ?>
				</label>
				<input class="el-input__inner c-input" id="contact-name" name="name" type="text" autocomplete="name">
			</div>
		</div>
		<div class="cog-row__col c-col col-12 col-md-6">
			<div class="cog-field cog-email c-field c-email">
				<label class="cog-label c-label" for="contact-email">
					<?php esc_html_e( 'Email', 'revive-integrative-health' ); ?>
				</label>
				<input class="el-input__inner c-input" id="contact-email" name="email" type="email" autocomplete="email">
			</div>
		</div>
		<div class="cog-row__col c-col col-12">
			<div class="cog-field cog-text cog-text--multiplelines c-field c-textarea">
				<label class="cog-label c-label" for="contact-message">
					<?php esc_html_e( 'Message', 'revive-integrative-health' ); ?>
				</label>
				<textarea class="el-textarea__inner c-textarea-input" id="contact-message" name="message" rows="5"></textarea>
			</div>
		</div>
	</div>

	<div class="cog-form__footer c-forms-form-buttons d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mt-4">
		<div class="cognito-form-embed__captcha" aria-hidden="true">
			<div class="cognito-form-embed__captcha-placeholder">
				<?php esc_html_e( 'reCAPTCHA', 'revive-integrative-health' ); ?>
			</div>
		</div>
		<button type="submit" class="cog-button cog-button--primary cog-button--submit c-button" id="c-submit-button">
			<?php esc_html_e( 'Submit', 'revive-integrative-health' ); ?>
		</button>
	</div>
</form>
