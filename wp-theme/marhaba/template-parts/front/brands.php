<?php
/**
 * Front page section: brand tabs + logo strip, from Brands in the admin.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

$marhaba_brands = marhaba_get_brands();

if ( ! $marhaba_brands ) {
	get_template_part( 'template-parts/front/brands-static' );
	return;
}
?>
<section class="section section--sand" id="brands">
	<div class="container">
		<div class="section-head reveal">
			<div>
				<span class="eyebrow"><?php esc_html_e( 'Our Product Portfolio', 'marhaba' ); ?></span>
				<h2><?php esc_html_e( 'Established brands, selected for modern construction.', 'marhaba' ); ?></h2>
			</div>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'brand' ) ); ?>" class="btn btn--outline"><?php esc_html_e( 'All Brands', 'marhaba' ); ?> <?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
		</div>

		<div class="brand-tabs reveal">
			<div class="brand-list" role="tablist">
				<?php foreach ( $marhaba_brands as $marhaba_i => $marhaba_b ) : ?>
					<button class="<?php echo 0 === $marhaba_i ? 'is-active' : ''; ?>" data-brand="<?php echo esc_attr( $marhaba_b->post_name ); ?>"><span><?php echo esc_html( get_the_title( $marhaba_b ) ); ?><small><?php echo esc_html( marhaba_brand( 'tagline', $marhaba_b->ID ) ); ?></small></span><?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></button>
				<?php endforeach; ?>
			</div>

			<div class="brand-panels">
				<?php
				foreach ( $marhaba_brands as $marhaba_i => $marhaba_b ) :
					$marhaba_groups = marhaba_brand( 'groups', $marhaba_b->ID );
					$marhaba_media  = marhaba_brand( 'offer_image', $marhaba_b->ID );
					$marhaba_media  = $marhaba_media ? $marhaba_media : marhaba_brand( 'banner', $marhaba_b->ID );
					$marhaba_origin = marhaba_brand( 'origin', $marhaba_b->ID );
					?>
					<div class="brand-panel<?php echo 0 === $marhaba_i ? ' is-active' : ''; ?>" id="brand-<?php echo esc_attr( $marhaba_b->post_name ); ?>">
						<div class="brand-panel__body">
							<div class="brand-logo"><?php marhaba_brand_logo( $marhaba_b->ID ); ?></div>
							<h3><?php echo esc_html( marhaba_brand( 'tagline', $marhaba_b->ID ) ); ?></h3>
							<p><?php echo esc_html( get_the_excerpt( $marhaba_b ) ); ?></p>
							<?php if ( $marhaba_groups ) : ?>
								<div class="tags">
									<?php foreach ( $marhaba_groups as $marhaba_g ) : ?>
										<span><?php echo esc_html( $marhaba_g['title'] ); ?></span>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<a href="<?php echo esc_url( get_permalink( $marhaba_b ) ); ?>" class="link-arrow">
								<?php
								/* translators: %s: brand name */
								echo esc_html( sprintf( __( 'View %s', 'marhaba' ), get_the_title( $marhaba_b ) ) );
								?>
								<?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
							</a>
						</div>
						<div class="brand-panel__media">
							<?php if ( $marhaba_media ) : ?>
								<img src="<?php echo esc_url( $marhaba_media ); ?>" alt="" loading="lazy">
							<?php endif; ?>
							<?php if ( $marhaba_origin ) : ?>
								<span class="brand-origin"><?php echo esc_html( $marhaba_origin ); ?></span>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<div class="marquee" aria-hidden="true">
	<div class="marquee__track">
		<?php for ( $marhaba_loop = 0; $marhaba_loop < 2; $marhaba_loop++ ) : ?>
			<?php foreach ( $marhaba_brands as $marhaba_b ) : ?>
				<a class="marquee__item" href="<?php echo esc_url( get_permalink( $marhaba_b ) ); ?>" tabindex="-1"><?php marhaba_brand_logo( $marhaba_b->ID ); ?></a>
			<?php endforeach; ?>
		<?php endfor; ?>
	</div>
</div>
