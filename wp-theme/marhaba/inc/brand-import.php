<?php
/**
 * One-click import of the brands in the Marhaba 2026 product catalogue.
 *
 * Brands → "Import catalogue brands" (admin notice). Existing brands with the same slug are skipped,
 * so it is safe to run more than once. After importing, everything is edited in the normal brand screens.
 *
 * Images are placeholders hot-linked from reference sites; replace them via the Media Library before go-live.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

/**
 * Catalogue data.
 *
 * @return array
 */
function marhaba_catalogue_brands() {
	$l  = 'https://media.myklaticrete.com/mykl/2026/04/';
	$sv = 'https://www.saveto.com/sites/default/files/';
	$b1 = $sv . '2025-07/hp-slider2_0.jpg';
	$b2 = $sv . '2025-07/hp-slider4_0.jpg';

	$apps4 = "Residential\nCommercial\nInstitutional\nInfrastructure";

	return array(
		'flooring-solutions'        => array(
			'name'   => __( 'Flooring Solutions', 'marhaba' ),
			'brands' => array(
				array(
					'title'   => 'GERFLOR',
					'slug'    => 'gerflor',
					'tagline' => 'Floor coverings & floor maintenance',
					'excerpt' => 'Floor covering solutions and floor maintenance products for a broad spectrum of building finishing and flooring applications.',
					'content' => 'GERFLOR offers floor covering solutions and floor maintenance products for a broad spectrum of building finishing and flooring applications.',
					'origin'  => 'France',
					'website' => 'https://www.gerflor.com',
					'logo'    => 'https://www.gerflor.com/themes/custom/gerflor_base/logo.svg',
					'banner'  => $b1,
					'offer'   => 'Marhaba supplies GERFLOR floor coverings and floor maintenance products to retail and project customers across Bahrain.' . "\n\n" . 'Our project team supports specifiers and contractors with product recommendations, technical submittals and delivery — and our applicators provide professional PVC flooring installation in roll and tile formats.',
					'offer_image' => get_theme_file_uri( 'assets/images/consultant.jpg' ),
					'groups'  => array( array( 'Floor coverings', $l . 'masks6-1.webp' ), array( 'Floor maintenance', $l . 'images5-1-1.webp' ) ),
					'apply'   => true,
				),
				array(
					'title'   => 'BOSTIK',
					'slug'    => 'bostik',
					'tagline' => 'Smart adhesives',
					'excerpt' => 'Smart adhesive solutions including carpet and wallpaper adhesives and ceramic tile adhesives.',
					'content' => 'BOSTIK provides smart adhesive solutions including carpet and wallpaper adhesives and ceramic tile adhesives, supporting a broad range of building finishing and flooring applications.',
					'origin'  => 'France',
					'website' => 'https://www.bostik.com',
					'logo'    => 'https://www.bostik.com/files/live/sites/shared_bostik/files/images/Logos/Bostik_Logo_Header.svg',
					'banner'  => $b2,
					'offer'   => 'Marhaba supplies BOSTIK carpet, wallpaper and ceramic tile adhesives to retailers, contractors and applicators throughout Bahrain.' . "\n\n" . 'With 300+ retail outlets served and a dedicated project sales team, we keep the right adhesives available for both everyday finishing work and large projects.',
					'offer_image' => get_theme_file_uri( 'assets/images/what.jpg' ),
					'groups'  => array( array( 'Carpet adhesives', $l . 'masks7-1.webp' ), array( 'Wallpaper adhesives', $l . 'Mask3-1.webp' ), array( 'Ceramic tile adhesives', $l . 'tile-adhesive-1-1.webp' ) ),
					'apply'   => false,
				),
				array(
					'title'   => 'Wonderfloor',
					'slug'    => 'wonderfloor',
					'tagline' => 'Vinyl flooring',
					'excerpt' => 'A recognized brand in vinyl flooring — floor coverings, PVC geomembranes, artificial leather, PVC films and sheetings.',
					'content' => 'Wonderfloor is a recognized brand in the vinyl flooring industry, offering vinyl floor coverings, PVC geomembranes, artificial leather, PVC films and sheetings.',
					'origin'  => 'India',
					'website' => 'https://www.wonderfloor.co.in',
					'logo'    => 'https://www.wonderfloor.co.in/assets/img/logo/logo.png',
					'banner'  => $b1,
					'offer'   => 'Marhaba supplies Wonderfloor vinyl flooring for healthcare, hospitality, retail, sports, transport, industrial and residential spaces across Bahrain.' . "\n\n" . 'Our flooring team handles both supply and professional application, giving project owners one partner from product selection to handover.',
					'offer_image' => get_theme_file_uri( 'assets/images/how.jpg' ),
					'groups'  => array( array( 'Vinyl floor coverings', $l . 'masks6-1.webp' ), array( 'PVC geomembranes', '' ), array( 'Artificial leather', '' ), array( 'PVC films & sheetings', '' ) ),
					'apps'    => "Healthcare facilities\nSports facilities\nRestaurants\nSupermarkets\nTransportation\nDance facilities\nOffices\nFactories\nHospitals\nHotels\nResidential properties\nModular & portable buildings",
					'apply'   => true,
				),
				array(
					'title'   => 'Terrain Floorings',
					'slug'    => 'terrain-floorings',
					'tagline' => 'Sports flooring',
					'excerpt' => 'Rubber, acrylic, wooden and vinyl sports surfaces from Al Khaleej Polymers (Ismat Group), UAE.',
					'content' => 'Terrain Floorings is produced by Al Khaleej Polymers Rubber &amp; Plastic Industries LLC (Ismat Group), UAE — a premier regional manufacturer of rubber flooring surfaces, specializing in acrylic, wooden, vinyl and recycled rubber solutions for a diverse range of sports surfaces.' . "\n\n" . 'Developed to international specifications, in a variety of designs, colours, sizes and shapes — eco-friendly and durable.',
					'origin'  => 'UAE',
					'website' => '',
					'logo'    => '',
					'banner'  => $b2,
					'offer'   => 'Marhaba supplies Terrain sports flooring systems for courts, gyms, schools and recreational facilities in Bahrain.' . "\n\n" . 'We help clients choose the right surface for each sport and space, and coordinate supply and installation with the project team.',
					'offer_image' => $l . 'images2-1.webp',
					'groups'  => array( array( 'Acrylic sports surfaces', '' ), array( 'Wooden flooring', '' ), array( 'Vinyl flooring', $l . 'masks2-1.webp' ), array( 'Recycled rubber flooring', '' ) ),
					'apply'   => true,
				),
			),
		),
		'construction-chemicals'    => array(
			'name'   => __( 'Construction Chemicals', 'marhaba' ),
			'brands' => array(
				array(
					'title'   => 'LATICRETE',
					'slug'    => 'laticrete',
					'tagline' => 'Tile, stone, masonry & concrete systems',
					'excerpt' => 'A comprehensive range of products and systems for tile, stone, masonry, resinous flooring and concrete.',
					'content' => 'LATICRETE offers a comprehensive range of products and systems covering tile and stone installation and care, masonry installation and care, resinous and decorative flooring, concrete construction chemicals and concrete restoration.' . "\n\n" . 'These solutions support a wide variety of residential, commercial, institutional and infrastructure applications.',
					'origin'  => 'USA',
					'website' => 'https://laticrete.com',
					'logo'    => 'https://media.myklaticrete.com/mykl/2024/09/MYK-L-Logo-1-2.svg',
					'banner'  => $b1,
					'offer'   => 'Marhaba supplies the LATICRETE range to retailers and projects across Bahrain, from tile adhesives and grouts to resinous flooring and concrete repair.' . "\n\n" . 'Our team provides product recommendations and technical submittals for consultants and contractors, plus supply and application services for tiles, stone and flooring.',
					'offer_image' => $l . 'stone-adhesive-1.webp',
					'groups'  => array( array( 'Tile & stone installation and care', $l . 'tile-adhesive-1-1.webp' ), array( 'Masonry installation and care', 'https://media.myklaticrete.com/mykl/2026/04/images6-1.webp' ), array( 'Resinous & decorative flooring', $l . 'images2-1.webp' ), array( 'Concrete construction chemicals', $l . 'images9-1.webp' ), array( 'Concrete restoration', $l . 'images1-1.webp' ) ),
					'apps'    => $apps4,
					'apply'   => true,
				),
				array(
					'title'   => 'DCP',
					'slug'    => 'dcp',
					'tagline' => 'Specialized construction & finishing materials',
					'excerpt' => 'Dry-mix materials, tile adhesives, grouts, renders, plasters, repair, waterproofing, flooring and sealants.',
					'content' => 'DCP (Saudi Arabia) is a leading manufacturer of specialized construction and building finishing materials, offering a broad portfolio for modern construction requirements.' . "\n\n" . 'Marhaba\'s DCP portfolio includes dry-mix building materials, tile adhesives, grouts, renders, plasters, repair products, waterproofing systems, flooring solutions, sealants and other construction chemicals.',
					'origin'  => 'Saudi Arabia',
					'website' => 'https://www.dcp-int.com',
					'logo'    => 'https://www.dcp-int.com/themes/dcp/images/logo.svg',
					'banner'  => $b2,
					'offer'   => 'DCP solutions suit residential, commercial, institutional and infrastructure projects. Marhaba supports contractors, consultants and project owners with specialized construction and finishing requirements.' . "\n\n" . 'From material supply and submittals to waterproofing and flooring application, we cover the full scope of DCP systems in Bahrain.',
					'offer_image' => get_theme_file_uri( 'assets/images/hero-waterproofing.jpg' ),
					'groups'  => array( array( 'Dry-mix building materials', $l . 'images9-1.webp' ), array( 'Tile adhesives & grouts', $l . 'tile-joint-grout-2.webp' ), array( 'Renders & plasters', $l . 'Mask3-1.webp' ), array( 'Repair products', $l . 'images1-1.webp' ), array( 'Waterproofing & flooring', $l . 'images3-1-1.webp' ), array( 'Sealants & construction chemicals', $l . 'images8-1.webp' ) ),
					'apps'    => $apps4,
					'apply'   => true,
				),
				array(
					'title'   => 'Terraco',
					'slug'    => 'terraco',
					'tagline' => 'Environmentally conscious finishing materials',
					'excerpt' => 'Quality finishes supporting durability, comfort and improved energy efficiency.',
					'content' => 'Terraco develops and manufactures environmentally conscious finishing materials for the construction industry — quality finishes that support durability, comfort and improved energy efficiency.',
					'origin'  => '',
					'website' => 'https://www.terraco.com',
					'logo'    => 'https://b4366279.assetcdn.net/2.0/4366279/wp-content/uploads/2026/01/Terraco-White-Logo-Main.png',
					'invert'  => true,
					'banner'  => $sv . 'page-images/Homepage/sustainbility.jpg',
					'offer'   => 'Marhaba supplies Terraco systems for façades, surface preparation, waterproofing, repair, coatings, tiling and flooring.' . "\n\n" . 'We work with consultants and contractors to specify the right system and support painting, finishing and waterproofing application on site.',
					'offer_image' => $l . 'stones-or-tiles-fixing-on-external-facade-1.webp',
					'groups'  => array( array( 'EIFS / ETICS', $l . 'Mask6-1.webp' ), array( 'Surface preparation', $l . 'images5-1-1.webp' ), array( 'Waterproofing & repair', 'https://media.myklaticrete.com/mykl/2026/04/images4-1.webp' ), array( 'Performance coatings', $l . 'leaking-bathroom-1.webp' ), array( 'Tiling & flooring', $l . 'Mask2-1.webp' ), array( 'Building finishing', $l . 'Mask3-1.webp' ) ),
					'apply'   => true,
				),
			),
		),
		'sealants-solvent-cements'  => array(
			'name'   => __( 'Sealants & Solvent Cements', 'marhaba' ),
			'brands' => array(
				array(
					'title'   => 'Triton Middle East',
					'slug'    => 'triton',
					'tagline' => 'UAE-based sealants & protective coatings',
					'excerpt' => 'High-performance silicone, hybrid PU, acrylic and specialty sealants plus protective coatings.',
					'content' => 'Triton Middle East, based in the UAE, specializes in the manufacture of high-performance sealants and protective coating solutions.',
					'origin'  => 'UAE',
					'website' => '',
					'logo'    => '',
					'banner'  => $b1,
					'offer'   => 'Marhaba stocks Triton sealants and protective coatings for retail customers, applicators and project sites across Bahrain.' . "\n\n" . 'Our sales team helps match the right sealant to each joint, substrate and exposure condition.',
					'offer_image' => $l . 'images8-1.webp',
					'groups'  => array( array( 'Silicone sealants', $l . 'images8-1.webp' ), array( 'Advanced hybrid PU sealants', $l . 'specialty-adhesive-1-1.webp' ), array( 'Acrylic sealants', '' ), array( 'Specialty sealants', '' ), array( 'Protective coatings', $l . 'images3-1-1.webp' ) ),
					'apply'   => false,
				),
				array(
					'title'   => 'E-Z Weld',
					'slug'    => 'e-z-weld',
					'tagline' => 'PVC, CPVC & ABS pipe-joining',
					'excerpt' => 'High-strength PVC, CPVC and ABS solvent cements, primers, cleaners and thread sealants.',
					'content' => 'E-Z Weld offers a comprehensive range of high-strength PVC, CPVC and ABS solvent cements, primers, cleaners and thread sealants designed for a variety of pipe-joining applications.' . "\n\n" . 'The products are manufactured under stringent quality-control procedures and are designed to meet applicable industry requirements.',
					'origin'  => 'USA',
					'website' => 'https://e-zweld.com',
					'logo'    => 'https://e-zweld.com/wp-content/themes/ezw/images/horizontal-logo-color.svg',
					'banner'  => $b2,
					'offer'   => 'Marhaba supplies E-Z Weld pipe-joining products to plumbing retailers, MEP contractors and project sites across Bahrain.' . "\n\n" . 'Stock is held in our 1,200 m² warehouse and delivered by our own logistics fleet.',
					'offer_image' => get_theme_file_uri( 'assets/images/who.jpg' ),
					'groups'  => array( array( 'Solvent cements', '' ), array( 'Primers', '' ), array( 'Cleaners', '' ), array( 'Thread sealants', '' ) ),
					'apply'   => false,
				),
				array(
					'title'   => 'HP International',
					'slug'    => 'hp-international',
					'tagline' => 'Flagship company of the HP Group',
					'excerpt' => 'A major Asian manufacturer of solvent cements, cleaners, primers and lubricants for PVC and CPVC piping.',
					'content' => 'HP International, the flagship company of the HP Group, is a major manufacturer of solvent cements and related products in Asia.' . "\n\n" . 'Its portfolio includes high-strength formulations for industrial piping systems, including products for PVC and CPVC applications, cleaners, primers and lubricants.',
					'origin'  => 'India',
					'website' => 'https://www.hpadhesives.com',
					'logo'    => 'https://www.hpadhesives.com/wp-content/uploads/2023/06/logo-01.png',
					'banner'  => $b1,
					'offer'   => 'Marhaba supplies HP International solvent cements and accessories to retailers and piping contractors throughout Bahrain.' . "\n\n" . 'Our retail network and project sales team keep products available for both everyday plumbing and industrial piping work.',
					'offer_image' => get_theme_file_uri( 'assets/images/who.jpg' ),
					'groups'  => array( array( 'Solvent cements', '' ), array( 'Cleaners & primers', '' ), array( 'Lubricants', '' ) ),
					'apply'   => false,
				),
			),
		),
	);
}

/**
 * Create the catalogue brands. Skips slugs that already exist.
 *
 * @return int Number of brands created.
 */
function marhaba_import_catalogue_brands() {
	$created = 0;
	$order   = 0;

	foreach ( marhaba_catalogue_brands() as $term_slug => $category ) {
		$term = term_exists( $term_slug, 'brand_category' );
		if ( ! $term ) {
			$term = wp_insert_term( $category['name'], 'brand_category', array( 'slug' => $term_slug ) );
		}
		$term_id = is_array( $term ) ? (int) $term['term_id'] : 0;

		foreach ( $category['brands'] as $b ) {
			$order++;
			if ( get_page_by_path( $b['slug'], OBJECT, 'brand' ) ) {
				continue;
			}

			$paragraphs = array_map(
				function ( $p ) {
					return "<!-- wp:paragraph -->\n<p>" . $p . "</p>\n<!-- /wp:paragraph -->";
				},
				explode( "\n\n", $b['content'] )
			);

			$post_id = wp_insert_post(
				array(
					'post_type'    => 'brand',
					'post_status'  => 'publish',
					'post_title'   => $b['title'],
					'post_name'    => $b['slug'],
					'post_excerpt' => $b['excerpt'],
					'post_content' => implode( "\n\n", $paragraphs ),
					'menu_order'   => $order,
				),
				true
			);
			if ( is_wp_error( $post_id ) ) {
				continue;
			}

			if ( $term_id ) {
				wp_set_object_terms( $post_id, $term_id, 'brand_category' );
			}

			$groups = array();
			foreach ( $b['groups'] as $g ) {
				$groups[] = array( 'title' => $g[0], 'image' => $g[1] );
			}

			$stats = array();
			if ( $b['origin'] ) {
				$stats[] = array( 'value' => $b['origin'], 'label' => __( 'Origin', 'marhaba' ) );
			}
			$stats[] = array( 'value' => (string) count( $groups ), 'label' => __( 'Product groups', 'marhaba' ) );
			$stats[] = array( 'value' => '300+', 'label' => __( 'Retail outlets served in Bahrain', 'marhaba' ) );
			$stats[] = $b['apply']
				? array( 'value' => 'Supply + Apply', 'label' => __( 'Marhaba project support', 'marhaba' ) )
				: array( 'value' => '1,200 m²', 'label' => __( 'Warehouse stock in Bahrain', 'marhaba' ) );

			$meta = array(
				'tagline'      => $b['tagline'],
				'origin'       => $b['origin'],
				'website'      => $b['website'],
				'logo'         => $b['logo'],
				'logo_invert'  => empty( $b['invert'] ) ? '' : '1',
				'banner'       => $b['banner'],
				'offer_title'  => '',
				'offer_text'   => $b['offer'],
				'offer_image'  => $b['offer_image'],
				'applications' => isset( $b['apps'] ) ? $b['apps'] : '',
				'stats'        => array_slice( $stats, 0, 4 ),
				'groups'       => $groups,
			);
			foreach ( $meta as $key => $value ) {
				update_post_meta( $post_id, '_mb_' . $key, $value );
			}
			$created++;
		}
	}
	return $created;
}

/**
 * Admin notice with the import button (shown while no brands exist).
 */
function marhaba_import_notice() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$screen = get_current_screen();
	if ( ! $screen || ! in_array( $screen->id, array( 'dashboard', 'edit-brand', 'themes' ), true ) ) {
		return;
	}

	if ( isset( $_GET['marhaba_imported'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %d: number of brands */
		printf( '<div class="notice notice-success is-dismissible"><p>%s</p></div>', esc_html( sprintf( __( 'Imported %d brands from the catalogue.', 'marhaba' ), absint( $_GET['marhaba_imported'] ) ) ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return;
	}

	$count = wp_count_posts( 'brand' );
	if ( ( isset( $count->publish ) && $count->publish ) || ( isset( $count->draft ) && $count->draft ) ) {
		return;
	}
	$url = wp_nonce_url( admin_url( 'admin-post.php?action=marhaba_import_brands' ), 'marhaba_import_brands' );
	printf(
		'<div class="notice notice-info"><p><strong>%s</strong> %s</p><p><a class="button button-primary" href="%s">%s</a></p></div>',
		esc_html__( 'Marhaba theme:', 'marhaba' ),
		esc_html__( 'No brands yet. Import the 10 brands from the 2026 product catalogue (GERFLOR, BOSTIK, Wonderfloor, Terrain Floorings, LATICRETE, DCP, Terraco, Triton, E-Z Weld, HP International)?', 'marhaba' ),
		esc_url( $url ),
		esc_html__( 'Import catalogue brands', 'marhaba' )
	);
}
add_action( 'admin_notices', 'marhaba_import_notice' );

/**
 * Handle the import button.
 */
function marhaba_import_brands_action() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to do this.', 'marhaba' ) );
	}
	check_admin_referer( 'marhaba_import_brands' );
	$created = marhaba_import_catalogue_brands();
	wp_safe_redirect( admin_url( 'edit.php?post_type=brand&marhaba_imported=' . $created ) );
	exit;
}
add_action( 'admin_post_marhaba_import_brands', 'marhaba_import_brands_action' );
