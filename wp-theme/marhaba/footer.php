<?php
/**
 * Site footer.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

$marhaba_phone    = marhaba_opt( 'phone' );
$marhaba_email    = marhaba_opt( 'email' );
$marhaba_email_2  = marhaba_opt( 'email_2' );
$marhaba_insta    = marhaba_opt( 'instagram' );
$marhaba_linkedin = marhaba_opt( 'linkedin' );
$marhaba_facebook = marhaba_opt( 'facebook' );
$marhaba_wa       = preg_replace( '/\D/', '', marhaba_opt( 'whatsapp' ) );
?>
</main>

<footer class="footer">
	<div class="container">
		<div class="footer__grid">
			<div class="footer__about">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) . ' — ' . __( 'Home', 'marhaba' ) ); ?>">
					<?php marhaba_logo( true ); ?>
				</a>
				<p><?php echo esc_html( marhaba_opt( 'footer_about' ) ); ?></p>
				<div class="socials">
					<?php if ( $marhaba_insta ) : ?>
						<a href="<?php echo esc_url( 'https://instagram.com/' . $marhaba_insta ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><?php echo marhaba_icon( 'i-insta' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
					<?php endif; ?>
					<?php if ( $marhaba_linkedin ) : ?>
						<a href="<?php echo esc_url( $marhaba_linkedin ); ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><?php echo marhaba_icon( 'i-linkedin' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
					<?php endif; ?>
					<?php if ( $marhaba_facebook ) : ?>
						<a href="<?php echo esc_url( $marhaba_facebook ); ?>" target="_blank" rel="noopener" aria-label="Facebook"><?php echo marhaba_icon( 'i-facebook' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
					<?php endif; ?>
					<?php if ( $marhaba_wa ) : ?>
						<a href="<?php echo esc_url( 'https://wa.me/' . $marhaba_wa ); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><?php echo marhaba_icon( 'i-whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
					<?php endif; ?>
				</div>
			</div>
			<div>
				<h4><?php esc_html_e( 'Solutions', 'marhaba' ); ?></h4>
				<ul>
					<?php
					foreach ( array_slice( marhaba_solutions(), 0, 7, true ) as $marhaba_slug => $marhaba_item ) {
						printf( '<li><a href="%s">%s</a></li>', esc_url( marhaba_solution_link( $marhaba_slug ) ), esc_html( $marhaba_item[0] ) );
					}
					printf( '<li><a href="%s">%s</a></li>', esc_url( marhaba_anchor( 'solutions' ) ), esc_html__( 'All solutions →', 'marhaba' ) );
					?>
				</ul>
			</div>
			<div>
				<h4><?php esc_html_e( 'Company', 'marhaba' ); ?></h4>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => function () {
							echo '<ul>';
							$links = array(
								'about'    => __( 'About Us', 'marhaba' ),
								'services' => __( 'Supply & Apply', 'marhaba' ),
								'projects' => __( 'Projects', 'marhaba' ),
								'contact'  => __( 'Contact', 'marhaba' ),
							);
							foreach ( $links as $id => $label ) {
								printf( '<li><a href="%s">%s</a></li>', esc_url( marhaba_anchor( $id ) ), esc_html( $label ) );
							}
							echo '</ul>';
						},
					)
				);
				?>
			</div>
			<div>
				<h4><?php esc_html_e( 'Contact', 'marhaba' ); ?></h4>
				<ul>
					<?php if ( $marhaba_phone ) : ?>
						<li><a href="<?php echo esc_attr( marhaba_tel( $marhaba_phone ) ); ?>"><?php echo esc_html__( 'Tel:', 'marhaba' ) . ' ' . esc_html( $marhaba_phone ); ?></a></li>
					<?php endif; ?>
					<?php foreach ( array_filter( array( $marhaba_email, $marhaba_email_2 ) ) as $marhaba_mail ) : ?>
						<li><a href="mailto:<?php echo esc_attr( $marhaba_mail ); ?>"><?php echo esc_html( $marhaba_mail ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="footer__bottom">
			<span>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. <?php esc_html_e( 'All rights reserved.', 'marhaba' ); ?></span>
			<?php if ( get_privacy_policy_url() ) : ?>
				<span><?php the_privacy_policy_link(); ?></span>
			<?php endif; ?>
		</div>
	</div>
</footer>

<?php if ( $marhaba_wa ) : ?>
	<a class="wa" href="<?php echo esc_url( 'https://wa.me/' . $marhaba_wa ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Chat on WhatsApp', 'marhaba' ); ?>"><?php echo marhaba_icon( 'i-whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
