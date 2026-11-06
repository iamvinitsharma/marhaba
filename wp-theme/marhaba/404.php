<?php
/**
 * Not found.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

get_header();
get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'title'    => __( 'Page not found', 'marhaba' ),
		'subtitle' => __( 'The page you are looking for has moved or no longer exists.', 'marhaba' ),
	)
);
?>
<section class="entry">
	<div class="container">
		<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to homepage', 'marhaba' ); ?> <?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
	</div>
</section>
<?php
get_footer();
