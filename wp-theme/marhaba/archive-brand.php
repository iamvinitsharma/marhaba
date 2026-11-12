<?php
/**
 * All brands (/brands/) and brand category pages (/brands/category/{slug}/).
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

get_header();

$marhaba_current = is_tax( 'brand_category' ) ? get_queried_object() : null;
$marhaba_cats    = get_terms( array( 'taxonomy' => 'brand_category', 'hide_empty' => true ) );
$marhaba_cats    = is_wp_error( $marhaba_cats ) ? array() : $marhaba_cats;

// Order categories by their first brand's position (Brands → Order), not alphabetically.
$marhaba_rank = array();
foreach ( marhaba_get_brands() as $marhaba_pos => $marhaba_b ) {
	foreach ( (array) wp_get_post_terms( $marhaba_b->ID, 'brand_category', array( 'fields' => 'ids' ) ) as $marhaba_tid ) {
		if ( ! isset( $marhaba_rank[ $marhaba_tid ] ) ) {
			$marhaba_rank[ $marhaba_tid ] = $marhaba_pos;
		}
	}
}
usort(
	$marhaba_cats,
	function ( $x, $y ) use ( $marhaba_rank ) {
		$rx = isset( $marhaba_rank[ $x->term_id ] ) ? $marhaba_rank[ $x->term_id ] : PHP_INT_MAX;
		$ry = isset( $marhaba_rank[ $y->term_id ] ) ? $marhaba_rank[ $y->term_id ] : PHP_INT_MAX;
		return $rx <=> $ry;
	}
);

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'title'    => $marhaba_current ? $marhaba_current->name : __( 'Our Brands', 'marhaba' ),
		'subtitle' => $marhaba_current && $marhaba_current->description
			? $marhaba_current->description
			: __( 'Established international and regional brands, selected to meet the technical, functional and aesthetic requirements of modern construction.', 'marhaba' ),
	)
);

// Group posts by category; brands without a category go last.
$marhaba_grouped = array();
while ( have_posts() ) {
	the_post();
	$marhaba_terms = get_the_terms( get_the_ID(), 'brand_category' );
	$marhaba_key   = $marhaba_terms && ! is_wp_error( $marhaba_terms ) ? $marhaba_terms[0]->term_id : 0;
	$marhaba_grouped[ $marhaba_key ][] = get_post();
}
?>
<section class="entry brands-page">
	<div class="container">
		<?php if ( count( $marhaba_cats ) > 1 ) : ?>
			<nav class="aud-tabs brand-filter" aria-label="<?php esc_attr_e( 'Brand categories', 'marhaba' ); ?>">
				<a class="aud-tab<?php echo $marhaba_current ? '' : ' is-active'; ?>" href="<?php echo esc_url( get_post_type_archive_link( 'brand' ) ); ?>"><?php esc_html_e( 'All brands', 'marhaba' ); ?></a>
				<?php foreach ( $marhaba_cats as $marhaba_cat ) : ?>
					<a class="aud-tab<?php echo $marhaba_current && $marhaba_current->term_id === $marhaba_cat->term_id ? ' is-active' : ''; ?>" href="<?php echo esc_url( get_term_link( $marhaba_cat ) ); ?>"><?php echo esc_html( $marhaba_cat->name ); ?></a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>

		<?php if ( ! $marhaba_grouped ) : ?>
			<p><?php esc_html_e( 'No brands published yet.', 'marhaba' ); ?></p>
		<?php endif; ?>

		<?php
		$marhaba_order = array_merge( wp_list_pluck( $marhaba_cats, 'term_id' ), array( 0 ) );
		foreach ( $marhaba_order as $marhaba_key ) :
			if ( empty( $marhaba_grouped[ $marhaba_key ] ) ) {
				continue;
			}
			$marhaba_cat = $marhaba_key ? get_term( $marhaba_key, 'brand_category' ) : null;
			?>
			<div class="brand-group">
				<?php if ( ! $marhaba_current && $marhaba_cat ) : ?>
					<h2 class="brand-group__title"><span class="eyebrow"><?php echo esc_html( $marhaba_cat->name ); ?></span></h2>
				<?php endif; ?>
				<div class="brand-cards">
					<?php foreach ( $marhaba_grouped[ $marhaba_key ] as $marhaba_brand ) : ?>
						<a class="brand-card reveal" href="<?php echo esc_url( get_permalink( $marhaba_brand ) ); ?>">
							<span class="brand-card__logo"><?php marhaba_brand_logo( $marhaba_brand->ID ); ?></span>
							<h3><?php echo esc_html( get_the_title( $marhaba_brand ) ); ?></h3>
							<?php if ( marhaba_brand( 'tagline', $marhaba_brand->ID ) ) : ?>
								<span class="brand-card__tag"><?php echo esc_html( marhaba_brand( 'tagline', $marhaba_brand->ID ) ); ?></span>
							<?php endif; ?>
							<p><?php echo esc_html( get_the_excerpt( $marhaba_brand ) ); ?></p>
							<span class="link-arrow"><?php esc_html_e( 'View brand', 'marhaba' ); ?> <?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
<?php
get_footer();
