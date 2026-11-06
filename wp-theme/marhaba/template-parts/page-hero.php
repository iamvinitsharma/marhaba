<?php
/**
 * Dark title band used on inner pages.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

$marhaba_title = isset( $args['title'] ) ? $args['title'] : get_the_title();
$marhaba_sub   = isset( $args['subtitle'] ) ? $args['subtitle'] : '';
?>
<section class="page-hero">
	<div class="container">
		<h1><?php echo esc_html( $marhaba_title ); ?></h1>
		<?php if ( $marhaba_sub ) : ?>
			<p><?php echo esc_html( $marhaba_sub ); ?></p>
		<?php endif; ?>
	</div>
</section>
