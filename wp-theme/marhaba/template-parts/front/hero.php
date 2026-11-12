<?php
/**
 * Front page section: hero slider (edited in Customizer → Marhaba: Hero Slider).
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

/**
 * Turn a "Label|link" setting into a button.
 *
 * @param string $value   Setting value.
 * @param string $classes Button classes.
 * @param bool   $arrow   Append the arrow icon.
 */
$marhaba_button = function ( $value, $classes, $arrow ) {
	if ( '' === trim( $value ) ) {
		return;
	}
	$parts = array_map( 'trim', explode( '|', $value, 2 ) );
	$label = $parts[0];
	$link  = isset( $parts[1] ) && '' !== $parts[1] ? $parts[1] : '#';

	if ( '#' === $link && marhaba_opt( 'profile_url' ) ) {
		$link = marhaba_opt( 'profile_url' );
	} elseif ( 0 === strpos( $link, '#' ) && strlen( $link ) > 1 ) {
		$link = marhaba_anchor( substr( $link, 1 ) );
	}

	printf(
		'<a href="%s" class="%s">%s%s</a>',
		esc_url( $link ),
		esc_attr( $classes ),
		esc_html( $label ),
		$arrow ? ' ' . marhaba_icon( 'i-arrow' ) : '' // phpcs:ignore WordPress.Security.EscapeOutput
	);
};
?>
<section class="hero" id="hero">
	<?php for ( $marhaba_i = 1; $marhaba_i <= 3; $marhaba_i++ ) : ?>
		<div class="hero__slide<?php echo 1 === $marhaba_i ? ' is-active' : ''; ?>">
			<div class="hero__bg" style="background-image:url('<?php echo esc_url( marhaba_opt( "slide{$marhaba_i}_image" ) ); ?>')"></div>
			<div class="container">
				<div class="hero__content">
					<span class="eyebrow"><?php echo esc_html( marhaba_opt( "slide{$marhaba_i}_eyebrow" ) ); ?></span>
					<?php
					$marhaba_tag = 1 === $marhaba_i ? 'h1' : 'h2';
					printf( '<%1$s class="hero__title">%2$s</%1$s>', esc_html( $marhaba_tag ), marhaba_sanitize_title( marhaba_opt( "slide{$marhaba_i}_title" ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput
					?>
					<p><?php echo esc_html( marhaba_opt( "slide{$marhaba_i}_text" ) ); ?></p>
					<div class="hero__ctas">
						<?php
						$marhaba_button( marhaba_opt( "slide{$marhaba_i}_btn1" ), 'btn btn--primary', true );
						$marhaba_button( marhaba_opt( "slide{$marhaba_i}_btn2" ), 'btn btn--ghost', false );
						?>
					</div>
				</div>
			</div>
		</div>
	<?php endfor; ?>

	<div class="hero__controls">
		<div class="container">
			<div class="hero__dots" id="heroDots">
				<?php for ( $marhaba_i = 1; $marhaba_i <= 3; $marhaba_i++ ) : ?>
					<?php /* translators: %d: slide number */ ?>
					<button class="hero__dot<?php echo 1 === $marhaba_i ? ' is-active' : ''; ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Slide %d', 'marhaba' ), $marhaba_i ) ); ?>"><span></span></button>
				<?php endfor; ?>
			</div>
			<div class="hero__arrows">
				<button class="hero__arrow" id="heroPrev" aria-label="<?php esc_attr_e( 'Previous slide', 'marhaba' ); ?>"><?php echo marhaba_icon( 'i-left' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></button>
				<button class="hero__arrow" id="heroNext" aria-label="<?php esc_attr_e( 'Next slide', 'marhaba' ); ?>"><?php echo marhaba_icon( 'i-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></button>
			</div>
		</div>
	</div>

	<div class="hero__stats">
		<div class="container">
			<div class="hero-stat"><strong>300<sup>+</sup></strong><span><?php esc_html_e( 'Retail outlets across Bahrain', 'marhaba' ); ?></span></div>
			<div class="hero-stat"><strong>1,200<sup>m²</sup></strong><span><?php esc_html_e( 'Storage & warehousing', 'marhaba' ); ?></span></div>
			<div class="hero-stat"><strong>10<sup>+</sup></strong><span><?php esc_html_e( 'International & regional brands', 'marhaba' ); ?></span></div>
			<div class="hero-stat"><strong>Supply<sup>+</sup>Apply</strong><span><?php esc_html_e( 'End-to-end project support', 'marhaba' ); ?></span></div>
		</div>
	</div>
</section>
