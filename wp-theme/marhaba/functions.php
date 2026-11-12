<?php
/**
 * Marhaba theme setup.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

define( 'MARHABA_VERSION', '1.1.0' );

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/enquiry.php';
require_once get_template_directory() . '/inc/brands.php';
require_once get_template_directory() . '/inc/brand-import.php';

/**
 * Theme supports and menus.
 */
function marhaba_setup() {
	load_theme_textdomain( 'marhaba', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 176,
			'width'       => 611,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'marhaba' ),
			'footer'  => __( 'Footer — Company links', 'marhaba' ),
		)
	);
}
add_action( 'after_setup_theme', 'marhaba_setup' );

/**
 * Styles and scripts.
 */
function marhaba_assets() {
	wp_enqueue_style( 'marhaba-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700;800;900&display=swap', array(), null );
	wp_enqueue_style( 'marhaba-main', get_theme_file_uri( 'assets/css/main.css' ), array( 'marhaba-fonts' ), MARHABA_VERSION );
	wp_enqueue_style( 'marhaba-style', get_stylesheet_uri(), array( 'marhaba-main' ), MARHABA_VERSION );
	wp_enqueue_style( 'marhaba-brands', get_theme_file_uri( 'assets/css/brands.css' ), array( 'marhaba-style' ), MARHABA_VERSION );
	wp_enqueue_script( 'marhaba-main', get_theme_file_uri( 'assets/js/main.js' ), array(), MARHABA_VERSION, array( 'in_footer' => true, 'strategy' => 'defer' ) );
}
add_action( 'wp_enqueue_scripts', 'marhaba_assets' );

/**
 * Preconnect to Google Fonts.
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array
 */
function marhaba_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = 'https://fonts.googleapis.com';
		$urls[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' );
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'marhaba_resource_hints', 10, 2 );

/**
 * Trim head output.
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * URL of an image bundled with the theme.
 *
 * @param string $file File name inside assets/images.
 * @return string
 */
function marhaba_img( $file ) {
	return get_theme_file_uri( 'assets/images/' . $file );
}

/**
 * Link to a homepage section; works from inner pages too.
 *
 * @param string $id Section id without the hash.
 * @return string
 */
function marhaba_anchor( $id ) {
	return is_front_page() ? '#' . $id : home_url( '/#' . $id );
}

/**
 * Print the site logo: the Customizer logo if set, otherwise the bundled one.
 *
 * @param bool $white Use the white variant (footer).
 */
function marhaba_logo( $white = false ) {
	$name = get_bloginfo( 'name' );
	$src  = marhaba_img( $white ? 'marhaba-logo-white.png' : 'marhaba-logo.png' );

	if ( ! $white && has_custom_logo() ) {
		$logo_id = (int) get_theme_mod( 'custom_logo' );
		echo wp_get_attachment_image( $logo_id, 'full', false, array( 'class' => 'logo__img', 'alt' => $name ) );
		return;
	}
	printf(
		'<img class="logo__img" src="%s" alt="%s" width="611" height="176">',
		esc_url( $src ),
		esc_attr( $name )
	);
}

/**
 * Fallback navigation (used until a Primary menu is assigned).
 */
function marhaba_nav_fallback() {
	get_template_part( 'template-parts/nav', 'fallback' );
}

/**
 * Mobile drawer fallback: plain list of section links.
 */
function marhaba_drawer_fallback() {
	$links = array(
		'about'     => __( 'About', 'marhaba' ),
		'solutions' => __( 'Solutions', 'marhaba' ),
		'brands'    => __( 'Brands', 'marhaba' ),
		'services'  => __( 'Supply & Apply', 'marhaba' ),
		'sectors'   => __( 'Sectors', 'marhaba' ),
		'contact'   => __( 'Contact', 'marhaba' ),
	);
	foreach ( $links as $id => $label ) {
		$url = ( 'brands' === $id && post_type_exists( 'brand' ) && wp_count_posts( 'brand' )->publish ) ? get_post_type_archive_link( 'brand' ) : marhaba_anchor( $id );
		printf( '<a href="%s">%s</a>', esc_url( $url ), esc_html( $label ) );
	}
}

/**
 * Inline SVG icon reference.
 *
 * @param string $id Symbol id from template-parts/icons.php.
 * @return string
 */
function marhaba_icon( $id ) {
	return '<svg aria-hidden="true"><use href="#' . esc_attr( $id ) . '"/></svg>';
}
