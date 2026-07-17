<?php
/**
 * Kirki Customizer configuration.
 *
 * Requires the Kirki plugin. Uses the classic Kirki::add_* API for broad
 * compatibility across Kirki 3.x / 4.x / 5.x.
 *
 * @package Revive_Integrative_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Kirki config, panels, sections, and fields.
 */
function revive_register_kirki_fields() {
	if ( ! class_exists( 'Kirki' ) ) {
		return;
	}

	// Avoid fatals if a partial Kirki install is present.
	if ( ! method_exists( 'Kirki', 'add_config' ) || ! method_exists( 'Kirki', 'add_field' ) ) {
		return;
	}

	Kirki::add_config(
		'revive_theme',
		array(
			'capability'  => 'edit_theme_options',
			'option_type' => 'theme_mod',
		)
	);

	Kirki::add_panel(
		'revive_panel',
		array(
			'priority'    => 10,
			'title'       => esc_html__( 'Revive Theme Options', 'revive-integrative-health' ),
			'description' => esc_html__( 'Header, hero, and highlight content for Revive Integrative Health.', 'revive-integrative-health' ),
		)
	);

	Kirki::add_section(
		'revive_header',
		array(
			'title'    => esc_html__( 'Header', 'revive-integrative-health' ),
			'panel'    => 'revive_panel',
			'priority' => 10,
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'text',
			'settings' => 'revive_phone',
			'label'    => esc_html__( 'Phone Number', 'revive-integrative-health' ),
			'section'  => 'revive_header',
			'default'  => '785-414-9422',
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'text',
			'settings' => 'revive_book_online_label',
			'label'    => esc_html__( 'Book Online Button Label', 'revive-integrative-health' ),
			'section'  => 'revive_header',
			'default'  => 'Book Online',
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'url',
			'settings' => 'revive_book_online_url',
			'label'    => esc_html__( 'Book Online Button URL', 'revive-integrative-health' ),
			'section'  => 'revive_header',
			'default'  => '#book-online',
		)
	);

	Kirki::add_section(
		'revive_hero',
		array(
			'title'    => esc_html__( 'Hero', 'revive-integrative-health' ),
			'panel'    => 'revive_panel',
			'priority' => 20,
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'text',
			'settings' => 'revive_hero_title_before',
			'label'    => esc_html__( 'Hero Title (before emphasis)', 'revive-integrative-health' ),
			'section'  => 'revive_hero',
			'default'  => 'Begin',
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'text',
			'settings' => 'revive_hero_title_emphasis',
			'label'    => esc_html__( 'Hero Title Emphasis Word', 'revive-integrative-health' ),
			'section'  => 'revive_hero',
			'default'  => 'Your',
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'text',
			'settings' => 'revive_hero_title_after',
			'label'    => esc_html__( 'Hero Title (after emphasis)', 'revive-integrative-health' ),
			'section'  => 'revive_hero',
			'default'  => 'Wellness Journey',
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'image',
			'settings' => 'revive_hero_image',
			'label'    => esc_html__( 'Hero Background Image', 'revive-integrative-health' ),
			'section'  => 'revive_hero',
			'default'  => revive_asset_uri( 'assets/images/hero-image.jpg' ),
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'text',
			'settings' => 'revive_hero_cta_label',
			'label'    => esc_html__( 'Hero CTA Label', 'revive-integrative-health' ),
			'section'  => 'revive_hero',
			'default'  => 'Book Online',
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'url',
			'settings' => 'revive_hero_cta_url',
			'label'    => esc_html__( 'Hero CTA URL', 'revive-integrative-health' ),
			'section'  => 'revive_hero',
			'default'  => '#book-online',
		)
	);

	Kirki::add_section(
		'revive_highlight',
		array(
			'title'    => esc_html__( 'Highlight Box', 'revive-integrative-health' ),
			'panel'    => 'revive_panel',
			'priority' => 30,
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'text',
			'settings' => 'revive_highlight_title',
			'label'    => esc_html__( 'Highlight Title', 'revive-integrative-health' ),
			'section'  => 'revive_highlight',
			'default'  => 'New Patient? Start Here.',
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'textarea',
			'settings' => 'revive_highlight_text',
			'label'    => esc_html__( 'Highlight Body Text', 'revive-integrative-health' ),
			'section'  => 'revive_highlight',
			'default'  => 'We provide a wide range of services at Revive to help you achieve your health and wellness goals, individually and as a family.',
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'image',
			'settings' => 'revive_highlight_image',
			'label'    => esc_html__( 'Highlight Image', 'revive-integrative-health' ),
			'section'  => 'revive_highlight',
			'default'  => revive_asset_uri( 'assets/images/new-patient.jpg' ),
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'text',
			'settings' => 'revive_highlight_cta_label',
			'label'    => esc_html__( 'Highlight CTA Label', 'revive-integrative-health' ),
			'section'  => 'revive_highlight',
			'default'  => 'New Patient Intake Form',
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'url',
			'settings' => 'revive_highlight_cta_url',
			'label'    => esc_html__( 'Highlight CTA URL', 'revive-integrative-health' ),
			'section'  => 'revive_highlight',
			'default'  => '#new-patient-intake',
		)
	);

	Kirki::add_section(
		'revive_contact',
		array(
			'title'       => esc_html__( 'Contact Form', 'revive-integrative-health' ),
			'description' => esc_html__( 'Manage the site-wide contact section and Cognito Forms embed.', 'revive-integrative-health' ),
			'panel'       => 'revive_panel',
			'priority'    => 35,
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'text',
			'settings' => 'revive_contact_title',
			'label'    => esc_html__( 'Section Title', 'revive-integrative-health' ),
			'section'  => 'revive_contact',
			'default'  => 'Contact Our Team',
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'              => 'code',
			'settings'          => 'revive_cognito_embed',
			'label'             => esc_html__( 'Cognito Forms Embed Code', 'revive-integrative-health' ),
			'description'       => esc_html__( 'Paste your Cognito Forms embed script here (seamless.js). Leave empty to show the placeholder form.', 'revive-integrative-health' ),
			'section'           => 'revive_contact',
			'default'           => '',
			'choices'           => array(
				'language' => 'html',
			),
			'sanitize_callback' => 'revive_sanitize_cognito_embed',
		)
	);

	Kirki::add_section(
		'revive_footer',
		array(
			'title'    => esc_html__( 'Footer', 'revive-integrative-health' ),
			'panel'    => 'revive_panel',
			'priority' => 40,
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'     => 'url',
			'settings' => 'revive_facebook_url',
			'label'    => esc_html__( 'Facebook URL', 'revive-integrative-health' ),
			'section'  => 'revive_footer',
			'default'  => 'https://www.facebook.com/',
		)
	);

	Kirki::add_field(
		'revive_theme',
		array(
			'type'              => 'text',
			'settings'          => 'revive_email',
			'label'             => esc_html__( 'Contact Email', 'revive-integrative-health' ),
			'section'           => 'revive_footer',
			'default'           => 'revive@reviveih.com',
			'sanitize_callback' => 'sanitize_email',
		)
	);
}
add_action( 'init', 'revive_register_kirki_fields', 20 );
