<?php
/**
 * Default navigation with the Solutions mega menu.
 * Shown until a menu is assigned to the "Primary Menu" location.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

$marhaba_brands = marhaba_get_brands();
$marhaba_simple = array(
	'services' => __( 'Supply & Apply', 'marhaba' ),
	'projects' => __( 'Projects', 'marhaba' ),
	'contact'  => __( 'Contact', 'marhaba' ),
);
?>
<div class="nav__item"><a class="nav__link" href="<?php echo esc_url( marhaba_anchor( 'about' ) ); ?>"><?php esc_html_e( 'About', 'marhaba' ); ?></a></div>
<div class="nav__item">
	<a class="nav__link" href="<?php echo esc_url( marhaba_anchor( 'solutions' ) ); ?>"><?php esc_html_e( 'Solutions', 'marhaba' ); ?> <?php echo marhaba_icon( 'i-chev' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
	<div class="mega mega--solutions">
		<?php foreach ( marhaba_solutions() as $marhaba_slug => $marhaba_item ) : ?>
			<a href="<?php echo esc_url( marhaba_solution_link( $marhaba_slug ) ); ?>"><span class="mega__icon"><?php echo marhaba_icon( $marhaba_item[2] ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span><span><strong><?php echo esc_html( $marhaba_item[0] ); ?></strong><span><?php echo esc_html( $marhaba_item[1] ); ?></span></span></a>
		<?php endforeach; ?>
	</div>
</div>
<div class="nav__item">
	<a class="nav__link" href="<?php echo esc_url( $marhaba_brands ? get_post_type_archive_link( 'brand' ) : marhaba_anchor( 'brands' ) ); ?>"><?php esc_html_e( 'Brands', 'marhaba' ); ?><?php echo $marhaba_brands ? ' ' . marhaba_icon( 'i-chev' ) : ''; // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
	<?php if ( $marhaba_brands ) : ?>
		<div class="mega mega--brands">
			<?php foreach ( $marhaba_brands as $marhaba_b ) : ?>
				<a href="<?php echo esc_url( get_permalink( $marhaba_b ) ); ?>"><span><strong><?php echo esc_html( get_the_title( $marhaba_b ) ); ?></strong><span><?php echo esc_html( marhaba_brand( 'tagline', $marhaba_b->ID ) ); ?></span></span></a>
			<?php endforeach; ?>
			<a class="mega__all" href="<?php echo esc_url( get_post_type_archive_link( 'brand' ) ); ?>"><span><strong><?php esc_html_e( 'View all brands', 'marhaba' ); ?> →</strong></span></a>
		</div>
	<?php endif; ?>
</div>
<?php foreach ( $marhaba_simple as $marhaba_id => $marhaba_label ) : ?>
	<div class="nav__item"><a class="nav__link" href="<?php echo esc_url( marhaba_anchor( $marhaba_id ) ); ?>"><?php echo esc_html( $marhaba_label ); ?></a></div>
<?php endforeach; ?>
