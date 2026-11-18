<?php
/**
 * Front page section: Projects photo gallery (replaces the old Sectors icons).
 * Photos come from Projects in the admin; clicking a photo opens it in a lightbox.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

$marhaba_items = marhaba_project_items( 8 );
if ( ! $marhaba_items ) {
	return;
}
?>
<section class="section section--ink" id="projects">
	<div class="container">
		<div class="section-head reveal">
			<div>
				<span class="eyebrow"><?php esc_html_e( 'Our Projects', 'marhaba' ); ?></span>
				<h2><?php esc_html_e( 'Finishing work across every kind of space.', 'marhaba' ); ?></h2>
			</div>
			<p><?php esc_html_e( 'Residential, commercial, institutional and infrastructure projects across the Kingdom of Bahrain.', 'marhaba' ); ?></p>
		</div>

		<div class="gallery" data-gallery>
			<?php foreach ( $marhaba_items as $marhaba_i => $marhaba_item ) : ?>
				<a class="gallery__item reveal" href="<?php echo esc_url( $marhaba_item['image'] ); ?>" data-index="<?php echo (int) $marhaba_i; ?>" data-caption="<?php echo esc_attr( trim( $marhaba_item['title'] . ( $marhaba_item['note'] ? ' — ' . $marhaba_item['note'] : '' ) ) ); ?>">
					<img src="<?php echo esc_url( $marhaba_item['thumb'] ); ?>" alt="<?php echo esc_attr( $marhaba_item['title'] ); ?>" loading="lazy">
					<span class="gallery__caption">
						<?php if ( $marhaba_item['type'] ) : ?>
							<small><?php echo esc_html( $marhaba_item['type'] ); ?></small>
						<?php endif; ?>
						<strong><?php echo esc_html( $marhaba_item['title'] ); ?></strong>
					</span>
					<span class="gallery__zoom" aria-hidden="true"><?php echo marhaba_icon( 'i-search' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Project photo', 'marhaba' ); ?>" hidden>
	<button class="lightbox__close" type="button" aria-label="<?php esc_attr_e( 'Close', 'marhaba' ); ?>"><?php echo marhaba_icon( 'i-close' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></button>
	<button class="lightbox__nav lightbox__nav--prev" type="button" aria-label="<?php esc_attr_e( 'Previous photo', 'marhaba' ); ?>"><?php echo marhaba_icon( 'i-left' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></button>
	<figure class="lightbox__figure">
		<img alt="">
		<figcaption></figcaption>
	</figure>
	<button class="lightbox__nav lightbox__nav--next" type="button" aria-label="<?php esc_attr_e( 'Next photo', 'marhaba' ); ?>"><?php echo marhaba_icon( 'i-right' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></button>
</div>
