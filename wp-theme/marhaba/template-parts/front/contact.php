<?php
/**
 * Front page section: contact details + "Request a Quote" form.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

$marhaba_phone  = marhaba_opt( 'phone' );
$marhaba_mobile = marhaba_opt( 'mobile' );
$marhaba_email  = marhaba_opt( 'email' );
$marhaba_emails = array_filter( array( $marhaba_email, marhaba_opt( 'email_2' ) ) );
$marhaba_sc     = marhaba_opt( 'form_sc' );
?>
<section class="section" id="contact">
	<div class="container">
		<div class="cta reveal">
			<div class="cta__body">
				<span class="eyebrow"><?php esc_html_e( 'Get in Touch', 'marhaba' ); ?></span>
				<h2><?php esc_html_e( "Have a project in Bahrain? Let's build it right.", 'marhaba' ); ?></h2>
				<p><?php esc_html_e( 'Share your requirements and our project sales team will get back to you with product recommendations and a quotation.', 'marhaba' ); ?></p>
				<div class="contact-list">
					<?php if ( $marhaba_phone ) : ?>
						<a href="<?php echo esc_attr( marhaba_tel( $marhaba_phone ) ); ?>"><i><?php echo marhaba_icon( 'i-phone' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></i><span><small><?php esc_html_e( 'Office', 'marhaba' ); ?></small><strong><?php echo esc_html( $marhaba_phone ); ?></strong></span></a>
					<?php endif; ?>
					<?php if ( $marhaba_mobile ) : ?>
						<a href="<?php echo esc_attr( marhaba_tel( $marhaba_mobile ) ); ?>"><i><?php echo marhaba_icon( 'i-whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></i><span><small><?php esc_html_e( 'Mobile', 'marhaba' ); ?></small><strong><?php echo esc_html( $marhaba_mobile ); ?></strong></span></a>
					<?php endif; ?>
					<?php if ( $marhaba_emails ) : ?>
						<div class="contact-list__multi"><i><?php echo marhaba_icon( 'i-mail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></i><span><small><?php esc_html_e( 'Email', 'marhaba' ); ?></small>
							<?php foreach ( $marhaba_emails as $marhaba_mail ) : ?>
								<a href="mailto:<?php echo esc_attr( $marhaba_mail ); ?>"><strong><?php echo esc_html( $marhaba_mail ); ?></strong></a>
							<?php endforeach; ?>
						</span></div>
					<?php endif; ?>
					<div><i><?php echo marhaba_icon( 'i-pin' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></i><span><small><?php esc_html_e( 'Location', 'marhaba' ); ?></small><strong><?php echo esc_html( marhaba_opt( 'location' ) ); ?></strong></span></div>
				</div>
			</div>

			<?php if ( $marhaba_sc ) : ?>
				<div class="form"><h3><?php esc_html_e( 'Request a Quote', 'marhaba' ); ?></h3><div class="full"><?php echo do_shortcode( $marhaba_sc ); ?></div></div>
			<?php else : ?>
				<form class="form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
					<h3><?php esc_html_e( 'Request a Quote', 'marhaba' ); ?></h3>
					<?php marhaba_enquiry_notice(); ?>
					<input type="hidden" name="action" value="marhaba_enquiry">
					<?php wp_nonce_field( 'marhaba_enquiry', 'marhaba_nonce' ); ?>
					<div class="hp-field" aria-hidden="true"><label for="f-website">Website</label><input id="f-website" type="text" name="website" tabindex="-1" autocomplete="off"></div>
					<div class="field"><label for="f-name"><?php esc_html_e( 'Full name', 'marhaba' ); ?></label><input id="f-name" name="name" type="text" required autocomplete="name"></div>
					<div class="field"><label for="f-company"><?php esc_html_e( 'Company', 'marhaba' ); ?></label><input id="f-company" name="company" type="text" autocomplete="organization"></div>
					<div class="field"><label for="f-email"><?php esc_html_e( 'Email', 'marhaba' ); ?></label><input id="f-email" name="email" type="email" required autocomplete="email"></div>
					<div class="field"><label for="f-phone"><?php esc_html_e( 'Phone', 'marhaba' ); ?></label><input id="f-phone" name="phone" type="tel" autocomplete="tel"></div>
					<div class="field full"><label for="f-type"><?php esc_html_e( "I'm interested in", 'marhaba' ); ?></label>
						<select id="f-type" name="topic">
							<?php foreach ( marhaba_enquiry_topics() as $marhaba_topic ) : ?>
								<option><?php echo esc_html( $marhaba_topic ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="field full"><label for="f-msg"><?php esc_html_e( 'Project details', 'marhaba' ); ?></label><textarea id="f-msg" name="message"></textarea></div>
					<button type="submit" class="btn btn--primary"><?php esc_html_e( 'Send Enquiry', 'marhaba' ); ?> <?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></button>
				</form>
			<?php endif; ?>
		</div>
	</div>
</section>
