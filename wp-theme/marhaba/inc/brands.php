<?php
/**
 * Brands: custom post type, categories and the "Brand Details" meta box.
 *
 * Single brand:  /brand/{slug}/   (single-brand.php)
 * All brands:    /brands/          (archive-brand.php)
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the Brand post type and Brand Category taxonomy.
 */
function marhaba_register_brands() {
	register_post_type(
		'brand',
		array(
			'labels'        => array(
				'name'               => __( 'Brands', 'marhaba' ),
				'singular_name'      => __( 'Brand', 'marhaba' ),
				'add_new'            => __( 'Add Brand', 'marhaba' ),
				'add_new_item'       => __( 'Add New Brand', 'marhaba' ),
				'edit_item'          => __( 'Edit Brand', 'marhaba' ),
				'new_item'           => __( 'New Brand', 'marhaba' ),
				'view_item'          => __( 'View Brand', 'marhaba' ),
				'search_items'       => __( 'Search Brands', 'marhaba' ),
				'not_found'          => __( 'No brands found', 'marhaba' ),
				'not_found_in_trash' => __( 'No brands found in Trash', 'marhaba' ),
				'all_items'          => __( 'All Brands', 'marhaba' ),
			),
			'public'        => true,
			'show_in_rest'  => true,
			'menu_position' => 21,
			'menu_icon'     => 'dashicons-awards',
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'revisions' ),
			'has_archive'   => 'brands',
			'rewrite'       => array( 'slug' => 'brand', 'with_front' => false ),
		)
	);

	register_taxonomy(
		'brand_category',
		'brand',
		array(
			'labels'            => array(
				'name'          => __( 'Brand Categories', 'marhaba' ),
				'singular_name' => __( 'Brand Category', 'marhaba' ),
				'add_new_item'  => __( 'Add Brand Category', 'marhaba' ),
			),
			'hierarchical'      => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'brands/category', 'with_front' => false ),
		)
	);
}
add_action( 'init', 'marhaba_register_brands' );

/**
 * Flush permalinks once after the theme is switched on, so /brand/ URLs work immediately.
 */
function marhaba_brands_flush() {
	marhaba_register_brands();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'marhaba_brands_flush' );

/**
 * Field definitions for the meta box. Keys are stored as `_mb_{key}`.
 *
 * @return array
 */
function marhaba_brand_fields() {
	return array(
		'tagline'      => array( 'label' => __( 'Tagline', 'marhaba' ), 'type' => 'text', 'help' => __( 'Short line under the brand name, e.g. "Tile, stone, masonry & concrete systems".', 'marhaba' ) ),
		'origin'       => array( 'label' => __( 'Country of origin', 'marhaba' ), 'type' => 'text' ),
		'website'      => array( 'label' => __( 'Brand website', 'marhaba' ), 'type' => 'url', 'help' => __( 'Shows the red "Visit website" band. Leave empty to hide it.', 'marhaba' ) ),
		'logo'         => array( 'label' => __( 'Logo', 'marhaba' ), 'type' => 'image', 'help' => __( 'Transparent PNG or SVG. If empty, the brand name is shown as text.', 'marhaba' ) ),
		'logo_invert'  => array( 'label' => __( 'Logo is white', 'marhaba' ), 'type' => 'checkbox', 'help' => __( 'Tick if the logo file is white, so it is shown dark on light backgrounds.', 'marhaba' ) ),
		'banner'       => array( 'label' => __( 'Banner image', 'marhaba' ), 'type' => 'image', 'help' => __( 'Wide photo behind the brand name. Falls back to the Featured Image.', 'marhaba' ) ),
		'offer_title'  => array( 'label' => __( '"What We Offer" heading', 'marhaba' ), 'type' => 'text' ),
		'offer_text'   => array( 'label' => __( '"What We Offer" text', 'marhaba' ), 'type' => 'textarea' ),
		'offer_image'  => array( 'label' => __( '"What We Offer" image', 'marhaba' ), 'type' => 'image' ),
		'applications' => array( 'label' => __( 'Applications', 'marhaba' ), 'type' => 'lines', 'help' => __( 'One per line. Shown as tags (e.g. Hospitals, Hotels).', 'marhaba' ) ),
	);
}

/**
 * Read one brand field.
 *
 * @param string   $key     Field key (without the _mb_ prefix).
 * @param int|null $post_id Post ID; defaults to the current post.
 * @return mixed
 */
function marhaba_brand( $key, $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$value   = get_post_meta( $post_id, '_mb_' . $key, true );

	if ( 'offer_title' === $key && '' === $value ) {
		return __( 'What We Offer', 'marhaba' );
	}
	if ( 'banner' === $key && '' === $value && has_post_thumbnail( $post_id ) ) {
		return get_the_post_thumbnail_url( $post_id, 'full' );
	}
	if ( in_array( $key, array( 'stats', 'groups' ), true ) ) {
		return is_array( $value ) ? $value : array();
	}
	if ( 'applications' === $key ) {
		return array_values( array_filter( array_map( 'trim', explode( "\n", (string) $value ) ) ) );
	}
	return $value;
}

/**
 * Published brands in menu order.
 *
 * @param array $args Extra WP_Query args.
 * @return WP_Post[]
 */
function marhaba_get_brands( $args = array() ) {
	return get_posts(
		array_merge(
			array(
				'post_type'      => 'brand',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'orderby'        => array( 'menu_order' => 'ASC', 'title' => 'ASC' ),
			),
			$args
		)
	);
}

/**
 * Print a brand logo, or the name as a wordmark if no logo is set.
 *
 * @param int    $post_id Brand ID.
 * @param string $class   Extra class on the img / span.
 */
function marhaba_brand_logo( $post_id, $class = '' ) {
	$logo = marhaba_brand( 'logo', $post_id );
	$name = get_the_title( $post_id );
	if ( marhaba_brand( 'logo_invert', $post_id ) ) {
		$class .= ' logo-dark';
	}
	if ( $logo ) {
		printf( '<img class="%s" src="%s" alt="%s" loading="lazy">', esc_attr( $class ), esc_url( $logo ), esc_attr( $name ) );
	} else {
		printf( '<span class="wordmark %s">%s</span>', esc_attr( $class ), esc_html( $name ) );
	}
}

/* -------------------------------------------------------------------------
 * Admin: meta box
 * ---------------------------------------------------------------------- */

/**
 * Register the meta box.
 */
function marhaba_brand_meta_box() {
	add_meta_box( 'marhaba-brand', __( 'Brand Details', 'marhaba' ), 'marhaba_brand_meta_box_render', 'brand', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'marhaba_brand_meta_box' );

/**
 * Admin scripts for media pickers and repeaters.
 *
 * @param string $hook Current admin page.
 */
function marhaba_brand_admin_assets( $hook ) {
	$screen = get_current_screen();
	if ( ! $screen || 'brand' !== $screen->post_type || ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_style( 'marhaba-admin-brand', get_theme_file_uri( 'assets/css/admin-brand.css' ), array(), MARHABA_VERSION );
	wp_enqueue_script( 'marhaba-admin-brand', get_theme_file_uri( 'assets/js/admin-brand.js' ), array( 'jquery', 'jquery-ui-sortable' ), MARHABA_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'marhaba_brand_admin_assets' );

/**
 * Image field markup (URL input + media picker + preview).
 *
 * @param string $name  Input name.
 * @param string $value Current URL.
 */
function marhaba_image_input( $name, $value ) {
	?>
	<div class="mb-image">
		<span class="mb-image__preview"><?php echo $value ? '<img src="' . esc_url( $value ) . '" alt="">' : ''; ?></span>
		<input type="url" class="regular-text mb-image__url" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" placeholder="https://">
		<button type="button" class="button mb-image__pick"><?php esc_html_e( 'Choose image', 'marhaba' ); ?></button>
		<button type="button" class="button-link mb-image__clear"><?php esc_html_e( 'Remove', 'marhaba' ); ?></button>
	</div>
	<?php
}

/**
 * Render the meta box.
 *
 * @param WP_Post $post Current brand.
 */
function marhaba_brand_meta_box_render( $post ) {
	wp_nonce_field( 'marhaba_brand_save', 'marhaba_brand_nonce' );
	$stats  = marhaba_brand( 'stats', $post->ID );
	$groups = marhaba_brand( 'groups', $post->ID );
	?>
	<p class="description mb-intro">
		<?php esc_html_e( 'The main editor above is the "Introduction". The Excerpt is the short summary used on the homepage and the Brands page. Use "Order" (Page Attributes) to sort brands.', 'marhaba' ); ?>
	</p>

	<table class="form-table mb-table" role="presentation">
		<?php
		foreach ( marhaba_brand_fields() as $key => $field ) :
			$name  = 'mb[' . $key . ']';
			$value = get_post_meta( $post->ID, '_mb_' . $key, true );
			?>
			<tr>
				<th scope="row"><label for="mb-<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field['label'] ); ?></label></th>
				<td>
					<?php
					switch ( $field['type'] ) {
						case 'image':
							marhaba_image_input( $name, (string) $value );
							break;
						case 'checkbox':
							printf( '<label><input id="mb-%1$s" type="checkbox" name="%2$s" value="1" %3$s> %4$s</label>', esc_attr( $key ), esc_attr( $name ), checked( '1', (string) $value, false ), esc_html__( 'Yes', 'marhaba' ) );
							break;
						case 'textarea':
						case 'lines':
							printf( '<textarea id="mb-%1$s" name="%2$s" rows="%3$d" class="large-text">%4$s</textarea>', esc_attr( $key ), esc_attr( $name ), 'lines' === $field['type'] ? 6 : 5, esc_textarea( (string) $value ) );
							break;
						default:
							printf( '<input id="mb-%1$s" type="%2$s" name="%3$s" value="%4$s" class="regular-text">', esc_attr( $key ), esc_attr( $field['type'] ), esc_attr( $name ), esc_attr( (string) $value ) );
					}
					if ( ! empty( $field['help'] ) ) {
						echo '<p class="description">' . esc_html( $field['help'] ) . '</p>';
					}
					?>
				</td>
			</tr>
		<?php endforeach; ?>

		<tr>
			<th scope="row"><?php esc_html_e( 'Key figures', 'marhaba' ); ?></th>
			<td>
				<p class="description"><?php esc_html_e( 'Up to 4 figures shown under the introduction, e.g. "300+" / "Retail outlets". Leave empty to hide.', 'marhaba' ); ?></p>
				<div class="mb-stats">
					<?php for ( $i = 0; $i < 4; $i++ ) : ?>
						<div class="mb-stats__row">
							<input type="text" name="mb_stats[<?php echo (int) $i; ?>][value]" value="<?php echo esc_attr( isset( $stats[ $i ]['value'] ) ? $stats[ $i ]['value'] : '' ); ?>" placeholder="<?php esc_attr_e( 'Figure', 'marhaba' ); ?>">
							<input type="text" name="mb_stats[<?php echo (int) $i; ?>][label]" value="<?php echo esc_attr( isset( $stats[ $i ]['label'] ) ? $stats[ $i ]['label'] : '' ); ?>" placeholder="<?php esc_attr_e( 'Label', 'marhaba' ); ?>">
						</div>
					<?php endfor; ?>
				</div>
			</td>
		</tr>

		<tr>
			<th scope="row"><?php esc_html_e( 'Product groups', 'marhaba' ); ?></th>
			<td>
				<p class="description"><?php esc_html_e( 'Cards in the "Product Groups" slider. Drag ≡ to reorder.', 'marhaba' ); ?></p>
				<div class="mb-groups" data-next="<?php echo (int) count( $groups ); ?>">
					<?php
					foreach ( $groups as $i => $group ) {
						marhaba_brand_group_row( $i, $group );
					}
					?>
				</div>
				<script type="text/html" id="tmpl-mb-group"><?php marhaba_brand_group_row( '__i__', array() ); ?></script>
				<button type="button" class="button mb-groups__add"><?php esc_html_e( '+ Add product group', 'marhaba' ); ?></button>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * One product-group repeater row.
 *
 * @param int|string $i     Row index.
 * @param array      $group Row data (title, image).
 */
function marhaba_brand_group_row( $i, $group ) {
	$base = 'mb_groups[' . $i . ']';
	?>
	<div class="mb-group">
		<span class="mb-group__handle" title="<?php esc_attr_e( 'Drag to reorder', 'marhaba' ); ?>">≡</span>
		<input type="text" class="regular-text" name="<?php echo esc_attr( $base ); ?>[title]" value="<?php echo esc_attr( isset( $group['title'] ) ? $group['title'] : '' ); ?>" placeholder="<?php esc_attr_e( 'Group name', 'marhaba' ); ?>">
		<?php marhaba_image_input( $base . '[image]', isset( $group['image'] ) ? $group['image'] : '' ); ?>
		<button type="button" class="button-link-delete mb-group__remove"><?php esc_html_e( 'Delete', 'marhaba' ); ?></button>
	</div>
	<?php
}

/**
 * Save the meta box.
 *
 * @param int $post_id Brand ID.
 */
function marhaba_brand_save( $post_id ) {
	if ( ! isset( $_POST['marhaba_brand_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['marhaba_brand_nonce'] ) ), 'marhaba_brand_save' ) ) {
		return;
	}
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$input = isset( $_POST['mb'] ) && is_array( $_POST['mb'] ) ? wp_unslash( $_POST['mb'] ) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- sanitized per field below.
	foreach ( marhaba_brand_fields() as $key => $field ) {
		$raw = isset( $input[ $key ] ) ? $input[ $key ] : '';
		switch ( $field['type'] ) {
			case 'url':
			case 'image':
				$clean = esc_url_raw( $raw );
				break;
			case 'checkbox':
				$clean = $raw ? '1' : '';
				break;
			case 'textarea':
				$clean = sanitize_textarea_field( $raw );
				break;
			case 'lines':
				$clean = implode( "\n", array_filter( array_map( 'sanitize_text_field', explode( "\n", $raw ) ) ) );
				break;
			default:
				$clean = sanitize_text_field( $raw );
		}
		update_post_meta( $post_id, '_mb_' . $key, $clean );
	}

	$stats = array();
	$raw   = isset( $_POST['mb_stats'] ) && is_array( $_POST['mb_stats'] ) ? wp_unslash( $_POST['mb_stats'] ) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	foreach ( $raw as $row ) {
		$value = isset( $row['value'] ) ? sanitize_text_field( $row['value'] ) : '';
		$label = isset( $row['label'] ) ? sanitize_text_field( $row['label'] ) : '';
		if ( '' !== $value || '' !== $label ) {
			$stats[] = compact( 'value', 'label' );
		}
	}
	update_post_meta( $post_id, '_mb_stats', array_slice( $stats, 0, 4 ) );

	$groups = array();
	$raw    = isset( $_POST['mb_groups'] ) && is_array( $_POST['mb_groups'] ) ? wp_unslash( $_POST['mb_groups'] ) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	foreach ( $raw as $row ) {
		$title = isset( $row['title'] ) ? sanitize_text_field( $row['title'] ) : '';
		$image = isset( $row['image'] ) ? esc_url_raw( $row['image'] ) : '';
		if ( '' !== $title ) {
			$groups[] = compact( 'title', 'image' );
		}
	}
	update_post_meta( $post_id, '_mb_groups', $groups );
}
add_action( 'save_post_brand', 'marhaba_brand_save' );

/**
 * Logo + order columns in the brand list.
 *
 * @param array $columns Columns.
 * @return array
 */
function marhaba_brand_columns( $columns ) {
	$new = array();
	foreach ( $columns as $key => $label ) {
		if ( 'title' === $key ) {
			$new['mb_logo'] = __( 'Logo', 'marhaba' );
		}
		$new[ $key ] = $label;
	}
	$new['menu_order'] = __( 'Order', 'marhaba' );
	return $new;
}
add_filter( 'manage_brand_posts_columns', 'marhaba_brand_columns' );

/**
 * Column values.
 *
 * @param string $column  Column key.
 * @param int    $post_id Brand ID.
 */
function marhaba_brand_column_value( $column, $post_id ) {
	if ( 'mb_logo' === $column ) {
		$logo = marhaba_brand( 'logo', $post_id );
		echo $logo ? '<img src="' . esc_url( $logo ) . '" alt="" style="max-height:28px;max-width:110px">' : '—';
	} elseif ( 'menu_order' === $column ) {
		echo (int) get_post_field( 'menu_order', $post_id );
	}
}
add_action( 'manage_brand_posts_custom_column', 'marhaba_brand_column_value', 10, 2 );

/**
 * Sort the admin brand list by Order by default.
 *
 * @param WP_Query $query Query.
 */
function marhaba_brand_admin_order( $query ) {
	if ( is_admin() && $query->is_main_query() && 'brand' === $query->get( 'post_type' ) && ! $query->get( 'orderby' ) ) {
		$query->set( 'orderby', array( 'menu_order' => 'ASC', 'title' => 'ASC' ) );
	}
}
add_action( 'pre_get_posts', 'marhaba_brand_admin_order' );

/**
 * Show all brands on the archive (no pagination) in menu order.
 *
 * @param WP_Query $query Query.
 */
function marhaba_brand_archive_query( $query ) {
	if ( ! is_admin() && $query->is_main_query() && ( $query->is_post_type_archive( 'brand' ) || $query->is_tax( 'brand_category' ) ) ) {
		$query->set( 'posts_per_page', -1 );
		$query->set( 'orderby', array( 'menu_order' => 'ASC', 'title' => 'ASC' ) );
	}
}
add_action( 'pre_get_posts', 'marhaba_brand_archive_query' );
