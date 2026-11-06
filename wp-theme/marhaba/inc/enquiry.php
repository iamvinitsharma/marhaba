<?php
/**
 * "Request a Quote" form handler.
 *
 * Posts to admin-post.php, verifies a nonce and a honeypot, then emails the enquiry.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

/**
 * Options for the "I'm interested in" select.
 *
 * @return string[]
 */
function marhaba_enquiry_topics() {
	return array(
		__( 'Building finishing materials', 'marhaba' ),
		__( 'PVC flooring', 'marhaba' ),
		__( 'Carpet & laminate', 'marhaba' ),
		__( 'Epoxy flooring', 'marhaba' ),
		__( 'Waterproofing', 'marhaba' ),
		__( 'PVC solvent cements', 'marhaba' ),
		__( 'Supply & application', 'marhaba' ),
	);
}

/**
 * Handle a submitted enquiry.
 */
function marhaba_handle_enquiry() {
	$back = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$back = remove_query_arg( 'enquiry', $back );
	$back = strtok( $back, '#' );

	$fail = function ( $code ) use ( $back ) {
		wp_safe_redirect( add_query_arg( 'enquiry', $code, $back ) . '#contact' );
		exit;
	};

	if ( ! isset( $_POST['marhaba_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['marhaba_nonce'] ) ), 'marhaba_enquiry' ) ) {
		$fail( 'error' );
	}

	// Honeypot: bots fill hidden fields. Pretend success.
	if ( ! empty( $_POST['website'] ) ) {
		$fail( 'sent' );
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$company = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$topic   = isset( $_POST['topic'] ) ? sanitize_text_field( wp_unslash( $_POST['topic'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) ) {
		$fail( 'invalid' );
	}
	if ( ! in_array( $topic, marhaba_enquiry_topics(), true ) ) {
		$topic = '';
	}

	$to = marhaba_opt( 'form_to' );
	if ( ! is_email( $to ) ) {
		$to = marhaba_opt( 'email' );
	}
	if ( ! is_email( $to ) ) {
		$to = get_option( 'admin_email' );
	}

	/* translators: 1: sender name, 2: topic */
	$subject = sprintf( __( 'Website enquiry from %1$s — %2$s', 'marhaba' ), $name, $topic ? $topic : __( 'General', 'marhaba' ) );
	$body    = implode(
		"\n",
		array(
			__( 'Name:', 'marhaba' ) . ' ' . $name,
			__( 'Company:', 'marhaba' ) . ' ' . $company,
			__( 'Email:', 'marhaba' ) . ' ' . $email,
			__( 'Phone:', 'marhaba' ) . ' ' . $phone,
			__( 'Interested in:', 'marhaba' ) . ' ' . $topic,
			'',
			__( 'Project details:', 'marhaba' ),
			$message,
			'',
			'— ' . home_url( '/' ),
		)
	);
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	$sent = wp_mail( $to, $subject, $body, $headers );

	/**
	 * Fires after an enquiry is processed (e.g. to push it to a CRM).
	 *
	 * @param array $data Sanitized form fields.
	 * @param bool  $sent Whether wp_mail() reported success.
	 */
	do_action( 'marhaba_enquiry_submitted', compact( 'name', 'company', 'email', 'phone', 'topic', 'message' ), $sent );

	$fail( $sent ? 'sent' : 'error' );
}
add_action( 'admin_post_marhaba_enquiry', 'marhaba_handle_enquiry' );
add_action( 'admin_post_nopriv_marhaba_enquiry', 'marhaba_handle_enquiry' );

/**
 * Status message after a redirect.
 */
function marhaba_enquiry_notice() {
	if ( empty( $_GET['enquiry'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return;
	}
	$status   = sanitize_key( wp_unslash( $_GET['enquiry'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$messages = array(
		'sent'    => array( 'ok', __( 'Thank you — your enquiry has been sent. Our team will be in touch shortly.', 'marhaba' ) ),
		'invalid' => array( 'err', __( 'Please enter your name and a valid email address.', 'marhaba' ) ),
		'error'   => array( 'err', __( 'Sorry, something went wrong. Please call or email us directly.', 'marhaba' ) ),
	);
	if ( isset( $messages[ $status ] ) ) {
		printf( '<p class="form-notice form-notice--%s" role="status">%s</p>', esc_attr( $messages[ $status ][0] ), esc_html( $messages[ $status ][1] ) );
	}
}
