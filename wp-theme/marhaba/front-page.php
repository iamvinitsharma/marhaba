<?php
/**
 * Homepage.
 *
 * Each section lives in template-parts/front/. Reorder or remove sections here.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

get_header();

$marhaba_sections = apply_filters(
	'marhaba_front_sections',
	array( 'hero', 'finder', 'pillars', 'about', 'solutions', 'services', 'brands', 'stats', 'audience', 'projects', 'quality', 'commitment', 'contact' )
);

foreach ( $marhaba_sections as $marhaba_section ) {
	get_template_part( 'template-parts/front/' . $marhaba_section );
}

get_footer();
