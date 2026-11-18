<?php
/**
 * Customizer: contact details, hero slides and enquiry form settings.
 *
 * Appearance → Customize → "Marhaba: Contact & Social" / "Marhaba: Hero Slider" / "Marhaba: Enquiry Form".
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

/**
 * Default values (from the 2026 company profile).
 *
 * @return array
 */
function marhaba_defaults() {
	return array(
		'phone'         => '+973 17 610 618',
		'mobile'        => '+973 3331 2746 / 3331 2736',
		'whatsapp'      => '97333312746',
		'email'         => 'syed@marhabahrain.com',
		'email_2'       => 'aamer@marhabahrain.com',
		'location'      => 'Kingdom of Bahrain',
		'instagram'     => 'marhabahrain',
		'linkedin'      => '',
		'facebook'      => '',
		'profile_url'   => '',
		'arabic_url'    => '',
		'form_to'       => '',
		'form_sc'       => '',
		'footer_about'  => 'Building finishing materials, flooring, waterproofing, construction chemicals and interior solutions — supplied and applied across Bahrain.',

		'slide1_eyebrow' => 'Building Finishing Partner · Bahrain',
		'slide1_title'   => 'Your Partner for <em>Construction</em> Materials.',
		'slide1_text'    => 'Flooring, waterproofing, construction chemicals and finishing materials — supplied, supported and applied by one reliable partner.',
		'slide1_image'   => 'https://cdn-global.laticrete.com/-/media/project/laticrete-international/north-america/images/solutions-by-application/application_restaurant_exterior_veneer.jpg',
		'slide1_btn1'    => 'Explore Solutions|#solutions',
		'slide1_btn2'    => 'Talk to Our Team|#contact',

		'slide2_eyebrow' => 'International & Regional Brands',
		'slide2_title'   => 'Trusted Partner of <em>International</em> Brands.',
		'slide2_text'    => 'LATICRETE, DCP, GERFLOR, BOSTIK, Wonderfloor and more — selected for the technical, functional and aesthetic demands of modern construction.',
		'slide2_image'   => 'https://cdn-global.laticrete.com/-/media/project/laticrete-international/middle-east/images/artworks/floor.jpg',
		'slide2_btn1'    => 'View Our Brands|#brands',
		'slide2_btn2'    => 'Download Profile|#',

		'slide3_eyebrow' => 'Retail & Project Customers',
		'slide3_title'   => 'Serving <em>100+</em> Clients Across Bahrain.',
		'slide3_text'    => 'Contractors, consultants, developers and retailers rely on Marhaba for dependable supply, technical support and professional application.',
		'slide3_image'   => 'https://cdn-global.laticrete.com/-/media/project/laticrete-international/north-america/images/solutions-by-application/office-lobby_7000-central-park.jpg',
		'slide3_btn1'    => 'Our Services|#services',
		'slide3_btn2'    => 'Request a Site Visit|#contact',
	);
}

/**
 * Read a theme option with its default.
 *
 * @param string $key Option key.
 * @return string
 */
function marhaba_opt( $key ) {
	$defaults = marhaba_defaults();
	return (string) get_theme_mod( 'marhaba_' . $key, isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
}

/**
 * Phone number as a tel: link.
 *
 * @param string $number Display number; only the first number is used if several are separated by "/".
 * @return string
 */
function marhaba_tel( $number ) {
	$first = trim( explode( '/', $number )[0] );
	return 'tel:' . preg_replace( '/[^0-9+]/', '', $first );
}

/**
 * Sanitize a slide title: allow <em> for the red highlight.
 *
 * @param string $value Raw input.
 * @return string
 */
function marhaba_sanitize_title( $value ) {
	return wp_kses( $value, array( 'em' => array(), 'br' => array() ) );
}

/**
 * Register Customizer panels and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function marhaba_customize_register( $wp_customize ) {
	$defaults = marhaba_defaults();

	$add = function ( $key, $section, $label, $type = 'text', $sanitize = 'sanitize_text_field', $description = '' ) use ( $wp_customize, $defaults ) {
		$wp_customize->add_setting(
			'marhaba_' . $key,
			array(
				'default'           => isset( $defaults[ $key ] ) ? $defaults[ $key ] : '',
				'sanitize_callback' => $sanitize,
			)
		);
		$wp_customize->add_control(
			'marhaba_' . $key,
			array(
				'label'       => $label,
				'section'     => $section,
				'type'        => $type,
				'description' => $description,
			)
		);
	};

	// Contact & social.
	$wp_customize->add_section( 'marhaba_contact', array( 'title' => __( 'Marhaba: Contact & Social', 'marhaba' ), 'priority' => 30 ) );
	$add( 'phone', 'marhaba_contact', __( 'Office phone', 'marhaba' ) );
	$add( 'mobile', 'marhaba_contact', __( 'Mobile number(s)', 'marhaba' ) );
	$add( 'whatsapp', 'marhaba_contact', __( 'WhatsApp number', 'marhaba' ), 'text', 'sanitize_text_field', __( 'Digits only, with country code, e.g. 97333312746', 'marhaba' ) );
	$add( 'email', 'marhaba_contact', __( 'Primary email', 'marhaba' ), 'email', 'sanitize_email' );
	$add( 'email_2', 'marhaba_contact', __( 'Second email', 'marhaba' ), 'email', 'sanitize_email' );
	$add( 'location', 'marhaba_contact', __( 'Location', 'marhaba' ) );
	$add( 'instagram', 'marhaba_contact', __( 'Instagram handle', 'marhaba' ), 'text', 'sanitize_text_field', __( 'Without the @', 'marhaba' ) );
	$add( 'linkedin', 'marhaba_contact', __( 'LinkedIn URL', 'marhaba' ), 'url', 'esc_url_raw' );
	$add( 'facebook', 'marhaba_contact', __( 'Facebook URL', 'marhaba' ), 'url', 'esc_url_raw' );
	$add( 'profile_url', 'marhaba_contact', __( 'Company profile PDF URL', 'marhaba' ), 'url', 'esc_url_raw', __( 'Upload the PDF in Media and paste its link here.', 'marhaba' ) );
	$add( 'arabic_url', 'marhaba_contact', __( 'Arabic site URL', 'marhaba' ), 'url', 'esc_url_raw' );
	$add( 'footer_about', 'marhaba_contact', __( 'Footer description', 'marhaba' ), 'textarea', 'sanitize_textarea_field' );

	// Hero slider.
	$wp_customize->add_section(
		'marhaba_hero',
		array(
			'title'       => __( 'Marhaba: Hero Slider', 'marhaba' ),
			'priority'    => 31,
			'description' => __( 'Wrap a word in &lt;em&gt;…&lt;/em&gt; to make it red. Buttons use the format: Label|link', 'marhaba' ),
		)
	);
	for ( $i = 1; $i <= 3; $i++ ) {
		/* translators: %d: slide number */
		$n = sprintf( __( 'Slide %d', 'marhaba' ), $i );
		$add( "slide{$i}_eyebrow", 'marhaba_hero', $n . ' — ' . __( 'small heading', 'marhaba' ) );
		$add( "slide{$i}_title", 'marhaba_hero', $n . ' — ' . __( 'headline', 'marhaba' ), 'text', 'marhaba_sanitize_title' );
		$add( "slide{$i}_text", 'marhaba_hero', $n . ' — ' . __( 'text', 'marhaba' ), 'textarea', 'sanitize_textarea_field' );
		$add( "slide{$i}_btn1", 'marhaba_hero', $n . ' — ' . __( 'main button', 'marhaba' ) );
		$add( "slide{$i}_btn2", 'marhaba_hero', $n . ' — ' . __( 'second button', 'marhaba' ) );

		$wp_customize->add_setting( "marhaba_slide{$i}_image", array( 'default' => $defaults[ "slide{$i}_image" ], 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				"marhaba_slide{$i}_image",
				array(
					'label'   => $n . ' — ' . __( 'background image', 'marhaba' ),
					'section' => 'marhaba_hero',
				)
			)
		);
	}

	// Enquiry form.
	$wp_customize->add_section( 'marhaba_form', array( 'title' => __( 'Marhaba: Enquiry Form', 'marhaba' ), 'priority' => 32 ) );
	$add( 'form_to', 'marhaba_form', __( 'Send enquiries to', 'marhaba' ), 'email', 'sanitize_email', __( 'Leave empty to use the primary email above.', 'marhaba' ) );
	$add( 'form_sc', 'marhaba_form', __( 'Form plugin shortcode (optional)', 'marhaba' ), 'text', 'sanitize_text_field', __( 'e.g. a Contact Form 7 shortcode. Replaces the built-in form.', 'marhaba' ) );
}
add_action( 'customize_register', 'marhaba_customize_register' );
