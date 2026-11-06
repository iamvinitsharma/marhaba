<?php
/**
 * Default page template.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/page-hero', null, array( 'subtitle' => has_excerpt() ? get_the_excerpt() : '' ) );
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
		<div class="container">
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
		</div>
	</article>
	<?php
endwhile;

get_footer();
