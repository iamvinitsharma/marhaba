<?php
/**
 * Fallback template: blog index, archives and search.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( is_search() ) {
	/* translators: %s: search query */
	$marhaba_title = sprintf( __( 'Search results for "%s"', 'marhaba' ), get_search_query() );
} elseif ( is_archive() ) {
	$marhaba_title = wp_strip_all_tags( get_the_archive_title() );
} elseif ( is_home() && get_option( 'page_for_posts' ) ) {
	$marhaba_title = get_the_title( (int) get_option( 'page_for_posts' ) );
} else {
	$marhaba_title = __( 'News & Insights', 'marhaba' );
}

get_template_part( 'template-parts/page-hero', null, array( 'title' => $marhaba_title ) );
?>
<section class="entry">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="post-list">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<a href="<?php the_permalink(); ?>" <?php post_class( 'post-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'medium_large' ); ?>
						<?php endif; ?>
						<div class="post-card__body">
							<h2><?php the_title(); ?></h2>
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						</div>
					</a>
				<?php endwhile; ?>
			</div>
			<div class="pagination"><?php echo wp_kses_post( paginate_links() ); ?></div>
		<?php else : ?>
			<p><?php esc_html_e( 'Nothing found.', 'marhaba' ); ?></p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
