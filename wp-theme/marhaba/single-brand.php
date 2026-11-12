<?php
/**
 * Single brand page (layout benchmarked on saveto.com/brand/ubm).
 *
 * Banner → Introduction + key figures → What We Offer → Product Groups → Visit website → Explore other brands.
 * All content comes from Brands → Edit Brand.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$marhaba_id       = get_the_ID();
	$marhaba_name     = get_the_title();
	$marhaba_banner   = marhaba_brand( 'banner' );
	$marhaba_tagline  = marhaba_brand( 'tagline' );
	$marhaba_stats    = marhaba_brand( 'stats' );
	$marhaba_groups   = marhaba_brand( 'groups' );
	$marhaba_apps     = marhaba_brand( 'applications' );
	$marhaba_website  = marhaba_brand( 'website' );
	$marhaba_offer    = marhaba_brand( 'offer_text' );
	$marhaba_offerimg = marhaba_brand( 'offer_image' );
	$marhaba_terms    = get_the_terms( $marhaba_id, 'brand_category' );
	$marhaba_term     = $marhaba_terms && ! is_wp_error( $marhaba_terms ) ? $marhaba_terms[0] : null;
	$marhaba_icons    = array( 'i-pin', 'i-tile', 'i-store', 'i-shield' );
	?>

	<section class="brand-hero"<?php echo $marhaba_banner ? ' style="background-image:url(\'' . esc_url( $marhaba_banner ) . '\')"' : ''; ?>>
		<div class="container">
			<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'marhaba' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'marhaba' ); ?></a>
				<span>/</span>
				<a href="<?php echo esc_url( get_post_type_archive_link( 'brand' ) ); ?>"><?php esc_html_e( 'Brands', 'marhaba' ); ?></a>
				<?php if ( $marhaba_term ) : ?>
					<span>/</span>
					<a href="<?php echo esc_url( get_term_link( $marhaba_term ) ); ?>"><?php echo esc_html( $marhaba_term->name ); ?></a>
				<?php endif; ?>
			</nav>
			<h1><?php echo esc_html( $marhaba_name ); ?></h1>
			<?php if ( $marhaba_tagline ) : ?>
				<p class="brand-hero__tagline"><?php echo esc_html( $marhaba_tagline ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="section brand-intro">
		<div class="container">
			<div class="brand-intro__head reveal">
				<div class="brand-intro__logo"><?php marhaba_brand_logo( $marhaba_id ); ?></div>
				<h2 class="brand-title"><?php esc_html_e( 'Introduction', 'marhaba' ); ?></h2>
				<div class="brand-intro__text"><?php the_content(); ?></div>
			</div>

			<?php if ( $marhaba_stats ) : ?>
				<div class="brand-stats reveal">
					<?php foreach ( $marhaba_stats as $marhaba_i => $marhaba_stat ) : ?>
						<div class="brand-stat">
							<?php echo marhaba_icon( $marhaba_icons[ $marhaba_i % 4 ] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
							<strong><?php echo esc_html( $marhaba_stat['value'] ); ?></strong>
							<span><?php echo esc_html( $marhaba_stat['label'] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php if ( $marhaba_offer || $marhaba_apps ) : ?>
		<section class="brand-offer">
			<div class="brand-offer__body">
				<div class="brand-offer__inner reveal">
					<h2><?php echo esc_html( marhaba_brand( 'offer_title' ) ); ?></h2>
					<?php echo wp_kses_post( wpautop( $marhaba_offer ) ); ?>
					<?php if ( $marhaba_apps ) : ?>
						<h3><?php esc_html_e( 'Applications', 'marhaba' ); ?></h3>
						<ul class="brand-apps">
							<?php foreach ( $marhaba_apps as $marhaba_app ) : ?>
								<li><?php echo esc_html( $marhaba_app ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
			<div class="brand-offer__media">
				<?php if ( $marhaba_offerimg ) : ?>
					<img src="<?php echo esc_url( $marhaba_offerimg ); ?>" alt="" loading="lazy">
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $marhaba_groups ) : ?>
		<section class="section brand-groups">
			<div class="container">
				<h2 class="brand-title reveal"><?php echo esc_html( marhaba_brand( 'groups_title' ) ); ?></h2>
				<div class="doc-grid">
					<?php
					foreach ( $marhaba_groups as $marhaba_group ) :
						$marhaba_pdf   = $marhaba_group['pdf'];
						$marhaba_tag   = $marhaba_pdf ? 'a' : 'div';
						$marhaba_attrs = $marhaba_pdf ? ' href="' . esc_url( $marhaba_pdf ) . '" target="_blank" rel="noopener"' : '';
						?>
						<<?php echo esc_html( $marhaba_tag ); ?> class="group-card reveal<?php echo $marhaba_group['image'] ? '' : ' group-card--plain'; ?><?php echo $marhaba_pdf ? ' group-card--pdf' : ''; ?>"<?php echo $marhaba_attrs; // phpcs:ignore WordPress.Security.EscapeOutput -- escaped above ?>>
							<?php if ( $marhaba_group['image'] ) : ?>
								<img src="<?php echo esc_url( $marhaba_group['image'] ); ?>" alt="" loading="lazy">
							<?php else : ?>
								<span class="group-card__mark"><?php marhaba_brand_logo( $marhaba_id ); ?></span>
							<?php endif; ?>
							<?php if ( $marhaba_pdf ) : ?>
								<span class="group-card__badge">PDF</span>
							<?php endif; ?>
							<h3><?php echo esc_html( $marhaba_group['title'] ); ?></h3>
							<?php if ( $marhaba_pdf ) : ?>
								<span class="group-card__cta"><?php esc_html_e( 'View PDF', 'marhaba' ); ?> <?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
							<?php endif; ?>
						</<?php echo esc_html( $marhaba_tag ); ?>>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="brand-cta">
		<div class="container">
			<?php if ( $marhaba_website ) : ?>
				<a class="brand-cta__link" href="<?php echo esc_url( $marhaba_website ); ?>" target="_blank" rel="noopener">
					<?php
					/* translators: %s: brand name */
					echo esc_html( sprintf( __( 'Visit %s Website', 'marhaba' ), $marhaba_name ) );
					?>
					<span class="brand-cta__circle"><?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
				</a>
			<?php endif; ?>
			<a class="brand-cta__link" href="<?php echo esc_url( marhaba_anchor( 'contact' ) ); ?>">
				<?php
				/* translators: %s: brand name */
				echo esc_html( sprintf( __( 'Request a quote for %s', 'marhaba' ), $marhaba_name ) );
				?>
				<span class="brand-cta__circle"><?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
			</a>
		</div>
	</section>

	<?php
	$marhaba_others = marhaba_get_brands( array( 'post__not_in' => array( $marhaba_id ) ) );
	if ( $marhaba_others ) :
		?>
		<section class="section brand-others">
			<div class="container">
				<h2 class="brand-title reveal"><?php esc_html_e( 'Explore Other Brands', 'marhaba' ); ?></h2>
				<div class="brand-others__grid reveal">
					<?php foreach ( $marhaba_others as $marhaba_other ) : ?>
						<a href="<?php echo esc_url( get_permalink( $marhaba_other ) ); ?>" title="<?php echo esc_attr( get_the_title( $marhaba_other ) ); ?>">
							<?php marhaba_brand_logo( $marhaba_other->ID ); ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php
endwhile;

get_footer();
