<?php
/**
 * Default navigation with the Solutions mega menu.
 * Shown until a menu is assigned to the "Primary Menu" location.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

$marhaba_mega = array(
	array( 'i-building', __( 'Building Finishing', 'marhaba' ), __( 'Interior & exterior finishing materials', 'marhaba' ) ),
	array( 'i-floor', __( 'PVC Flooring', 'marhaba' ), __( 'Rolls & tiles for every sector', 'marhaba' ) ),
	array( 'i-tile', __( 'Carpet & Laminate', 'marhaba' ), __( 'Luxury carpet & laminated parquet', 'marhaba' ) ),
	array( 'i-epoxy', __( 'Epoxy Flooring', 'marhaba' ), __( 'Commercial & industrial coatings', 'marhaba' ) ),
	array( 'i-drop', __( 'Waterproofing', 'marhaba' ), __( 'Building & infrastructure systems', 'marhaba' ) ),
	array( 'i-pipe', __( 'PVC Solvent Cements', 'marhaba' ), __( 'USA & India manufactured', 'marhaba' ) ),
);
$marhaba_simple = array(
	'brands'   => __( 'Brands', 'marhaba' ),
	'services' => __( 'Supply & Apply', 'marhaba' ),
	'sectors'  => __( 'Sectors', 'marhaba' ),
	'contact'  => __( 'Contact', 'marhaba' ),
);
?>
<div class="nav__item"><a class="nav__link" href="<?php echo esc_url( marhaba_anchor( 'about' ) ); ?>"><?php esc_html_e( 'About', 'marhaba' ); ?></a></div>
<div class="nav__item">
	<a class="nav__link" href="<?php echo esc_url( marhaba_anchor( 'solutions' ) ); ?>"><?php esc_html_e( 'Solutions', 'marhaba' ); ?> <?php echo marhaba_icon( 'i-chev' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
	<div class="mega">
		<?php foreach ( $marhaba_mega as $marhaba_item ) : ?>
			<a href="<?php echo esc_url( marhaba_anchor( 'solutions' ) ); ?>"><span class="mega__icon"><?php echo marhaba_icon( $marhaba_item[0] ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span><span><strong><?php echo esc_html( $marhaba_item[1] ); ?></strong><span><?php echo esc_html( $marhaba_item[2] ); ?></span></span></a>
		<?php endforeach; ?>
	</div>
</div>
<?php foreach ( $marhaba_simple as $marhaba_id => $marhaba_label ) : ?>
	<div class="nav__item"><a class="nav__link" href="<?php echo esc_url( marhaba_anchor( $marhaba_id ) ); ?>"><?php echo esc_html( $marhaba_label ); ?></a></div>
<?php endforeach; ?>
