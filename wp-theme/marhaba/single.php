<?php
/**
 * Single post.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/page-hero', null, array( 'subtitle' => get_the_date() ) );
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
		<div class="container">
			<div class="entry-content">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large' ); ?>
				<?php endif; ?>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
				<?php the_post_navigation(); ?>
			</div>
		</div>
	</article>
	<?php
endwhile;

get_footer();
