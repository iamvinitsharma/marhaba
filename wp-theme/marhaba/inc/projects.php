<?php
/**
 * Projects gallery: a simple post type (title + featured image + optional location/excerpt),
 * shown as the homepage "Projects" gallery. No single pages — photos open in a lightbox.
 *
 * Admin: Projects → Add Project → title, Featured Image, Project Type, Excerpt (location / short note).
 * Order: Page Attributes → Order.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the Project post type and Project Type taxonomy.
 */
function marhaba_register_projects() {
	register_post_type(
		'project',
		array(
			'labels'             => array(
				'name'               => __( 'Projects', 'marhaba' ),
				'singular_name'      => __( 'Project', 'marhaba' ),
				'add_new'            => __( 'Add Project', 'marhaba' ),
				'add_new_item'       => __( 'Add New Project', 'marhaba' ),
				'edit_item'          => __( 'Edit Project', 'marhaba' ),
				'all_items'          => __( 'All Projects', 'marhaba' ),
				'featured_image'     => __( 'Project photo', 'marhaba' ),
				'set_featured_image' => __( 'Set project photo', 'marhaba' ),
				'not_found'          => __( 'No projects yet', 'marhaba' ),
			),
			'public'             => false,
			'show_ui'            => true,
			'show_in_rest'       => true,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'menu_position'      => 22,
			'menu_icon'          => 'dashicons-format-gallery',
			'supports'           => array( 'title', 'thumbnail', 'excerpt', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'project_type',
		'project',
		array(
			'labels'            => array(
				'name'          => __( 'Project Types', 'marhaba' ),
				'singular_name' => __( 'Project Type', 'marhaba' ),
			),
			'public'            => false,
			'show_ui'           => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'hierarchical'      => true,
		)
	);
}
add_action( 'init', 'marhaba_register_projects' );

/**
 * Gallery items: published projects with a photo, or placeholder photos until projects are added.
 *
 * @param int $limit Max items.
 * @return array[] Each: image (full), thumb, title, type, note.
 */
function marhaba_project_items( $limit = 8 ) {
	$posts = get_posts(
		array(
			'post_type'      => 'project',
			'post_status'    => 'publish',
			'posts_per_page' => $limit,
			'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
			'meta_key'       => '_thumbnail_id', // phpcs:ignore WordPress.DB.SlowDBQuery -- only projects with a photo.
		)
	);

	$items = array();
	foreach ( $posts as $post ) {
		$types   = get_the_terms( $post, 'project_type' );
		$items[] = array(
			'image' => get_the_post_thumbnail_url( $post, 'full' ),
			'thumb' => get_the_post_thumbnail_url( $post, 'large' ),
			'title' => get_the_title( $post ),
			'type'  => $types && ! is_wp_error( $types ) ? $types[0]->name : '',
			'note'  => has_excerpt( $post ) ? get_the_excerpt( $post ) : '',
		);
	}
	if ( $items ) {
		return $items;
	}

	// Placeholders (reference photos from LATICRETE / Wonderfloor) — replace with Marhaba project photos.
	$c    = 'https://cdn-global.laticrete.com/-/media/project/laticrete-international/';
	$demo = array(
		array( $c . 'shared/images/resinous-and-decorative-finishes/healthcare-flooring-campaign/hospitalbannerfullwidth.jpg', __( 'Healthcare', 'marhaba' ) ),
		array( $c . 'north-america/images/solutions-by-application/office-lobby_7000-central-park.jpg', __( 'Commercial Offices', 'marhaba' ) ),
		array( $c . 'north-america/images/solutions-by-application/jade-mountain_st-lucia_swimming-pool_infinity_beauty.jpg', __( 'Hospitality & Pools', 'marhaba' ) ),
		array( $c . 'north-america/images/solutions-by-application/multifamily-residential_condo_apartment_exterior.jpg', __( 'Residential', 'marhaba' ) ),
		array( 'https://www.wonderfloor.co.in/wd_admin/c_images/braavo_img-1.png', __( 'Sports Facilities', 'marhaba' ) ),
		array( $c . 'north-america/images/solutions-by-application/application_education_duke-lobby_beauty.png', __( 'Education', 'marhaba' ) ),
		array( $c . 'north-america/images/solutions-by-application/top-promo-653x367/top-promo_mall-653x367.png', __( 'Retail', 'marhaba' ) ),
		array( $c . 'north-america/images/solutions-by-application/mta-nyc-subway-mosaic-mural_1.png', __( 'Transport & Infrastructure', 'marhaba' ) ),
	);
	foreach ( array_slice( $demo, 0, $limit ) as $d ) {
		$items[] = array( 'image' => $d[0], 'thumb' => $d[0], 'title' => $d[1], 'type' => '', 'note' => '' );
	}
	return $items;
}

/**
 * Admin reminder while the gallery is still showing placeholder photos.
 */
function marhaba_projects_notice() {
	$screen = get_current_screen();
	if ( ! $screen || 'edit-project' !== $screen->id ) {
		return;
	}
	$count = wp_count_posts( 'project' );
	if ( ! empty( $count->publish ) ) {
		return;
	}
	printf(
		'<div class="notice notice-warning"><p>%s</p></div>',
		esc_html__( 'The homepage Projects gallery is showing placeholder photos. Add projects here (title + Project photo) to replace them with Marhaba\'s own work.', 'marhaba' )
	);
}
add_action( 'admin_notices', 'marhaba_projects_notice' );
