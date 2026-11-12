<?php
/**
 * Site header: top bar, sticky header, mobile drawer.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

$marhaba_phone   = marhaba_opt( 'phone' );
$marhaba_email   = marhaba_opt( 'email' );
$marhaba_insta   = marhaba_opt( 'instagram' );
$marhaba_profile = marhaba_opt( 'profile_url' );
$marhaba_arabic  = marhaba_opt( 'arabic_url' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'marhaba' ); ?></a>

<?php get_template_part( 'template-parts/icons' ); ?>

<div class="topbar">
	<div class="container">
		<div class="topbar__left">
			<?php if ( $marhaba_phone ) : ?>
				<a class="topbar__item" href="<?php echo esc_attr( marhaba_tel( $marhaba_phone ) ); ?>"><?php echo marhaba_icon( 'i-phone' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $marhaba_phone ); ?></a>
			<?php endif; ?>
			<?php if ( $marhaba_email ) : ?>
				<a class="topbar__item" href="mailto:<?php echo esc_attr( $marhaba_email ); ?>"><?php echo marhaba_icon( 'i-mail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $marhaba_email ); ?></a>
			<?php endif; ?>
			<span class="topbar__item"><?php echo marhaba_icon( 'i-pin' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( marhaba_opt( 'location' ) ); ?></span>
		</div>
		<div class="topbar__right">
			<?php if ( $marhaba_profile ) : ?>
				<a class="topbar__item" href="<?php echo esc_url( $marhaba_profile ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Download Company Profile', 'marhaba' ); ?></a>
			<?php endif; ?>
			<?php if ( $marhaba_insta ) : ?>
				<a class="topbar__item" href="<?php echo esc_url( 'https://instagram.com/' . $marhaba_insta ); ?>" target="_blank" rel="noopener"><?php echo marhaba_icon( 'i-insta' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>@<?php echo esc_html( $marhaba_insta ); ?></a>
			<?php endif; ?>
			<?php if ( $marhaba_arabic ) : ?>
				<a class="lang" href="<?php echo esc_url( $marhaba_arabic ); ?>" lang="ar">عربي</a>
			<?php endif; ?>
		</div>
	</div>
</div>

<header class="header" id="header">
	<div class="container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) . ' — ' . __( 'Home', 'marhaba' ) ); ?>">
			<?php marhaba_logo(); ?>
		</a>

		<nav class="nav" aria-label="<?php esc_attr_e( 'Main', 'marhaba' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'menu',
					'depth'          => 2,
					'fallback_cb'    => 'marhaba_nav_fallback',
				)
			);
			?>
		</nav>

		<div class="header__actions">
			<a href="<?php echo esc_url( marhaba_anchor( 'contact' ) ); ?>" class="btn btn--primary"><?php esc_html_e( 'Request a Quote', 'marhaba' ); ?> <?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
			<button class="icon-btn burger" id="burger" aria-label="<?php esc_attr_e( 'Open menu', 'marhaba' ); ?>" aria-controls="drawer" aria-expanded="false"><?php echo marhaba_icon( 'i-menu' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></button>
		</div>
	</div>
</header>

<div class="drawer" id="drawer" aria-hidden="true">
	<div class="drawer__panel">
		<button class="icon-btn drawer__close" id="drawerClose" aria-label="<?php esc_attr_e( 'Close menu', 'marhaba' ); ?>"><?php echo marhaba_icon( 'i-close' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></button>
		<nav aria-label="<?php esc_attr_e( 'Mobile', 'marhaba' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'depth'          => 2,
					'fallback_cb'    => 'marhaba_drawer_fallback',
				)
			);
			?>
		</nav>
		<a href="<?php echo esc_url( marhaba_anchor( 'contact' ) ); ?>" class="btn btn--primary"><?php esc_html_e( 'Request a Quote', 'marhaba' ); ?> <?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
		<?php $marhaba_wa = preg_replace( '/\D/', '', marhaba_opt( 'whatsapp' ) ); ?>
		<div class="drawer__contact">
			<?php if ( $marhaba_phone ) : ?>
				<a href="<?php echo esc_attr( marhaba_tel( $marhaba_phone ) ); ?>"><?php echo marhaba_icon( 'i-phone' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $marhaba_phone ); ?></a>
			<?php endif; ?>
			<?php if ( $marhaba_wa ) : ?>
				<a href="<?php echo esc_url( 'https://wa.me/' . $marhaba_wa ); ?>" target="_blank" rel="noopener"><?php echo marhaba_icon( 'i-whatsapp' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php esc_html_e( 'WhatsApp us', 'marhaba' ); ?></a>
			<?php endif; ?>
			<?php if ( $marhaba_email ) : ?>
				<a href="mailto:<?php echo esc_attr( $marhaba_email ); ?>"><?php echo marhaba_icon( 'i-mail' ); // phpcs:ignore WordPress.Security.EscapeOutput ?><?php echo esc_html( $marhaba_email ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>

<main id="main">
