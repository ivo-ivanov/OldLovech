<?php
/**
 * Header file for the WP Blank theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage WPBlank
 * @since WPBlank 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/assets/images/favicon.ico" />
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

	<!--====== PRELOader ======-->
	<div class="preloader d-flex align-items-center justify-content-center">
		<div class="cssload-container">
			<div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
		</div>
	</div>
	<!--====== HEADER START ======-->
	<header class="header-absolute sticky-header">
		<div class="container container-custom-one">
			<div class="nav-container d-flex align-items-center justify-content-between">

				<!-- Site Logo -->
				<?php wpblank_site_logo(); ?>

				<!-- Main Menu -->
				<div class="nav-menu d-lg-flex align-items-center">

					<!-- Navbar Close Icon -->
					<div class="navbar-close">
						<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
					</div>

					<!-- Mneu Items -->
					<div class="menu-items" aria-label="<?php esc_attr_e( 'Horizontal', 'wpblank' ); ?>" role="navigation">
						<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary',  ) ); ?>
					</div>

					<!-- from pushed-item -->
					<div class="nav-pushed-item"></div>
				</div>

				<?php $fields = get_fields('options');
				$tel = $fields['telephone'];
				$email = $fields['email'];
				?>

				<?php if($tel || $email) { ?>
				<!-- Header Info Pussed To Menu Wrap -->
				<div class="nav-push-item">
					<!-- Header Info -->
					<div class="header-info d-lg-flex align-items-center">
						<?php if($tel) { ?>
						<div class="item">
							<i class="fal fa-phone"></i>
							<a href="tel:<?php echo esc_html($tel); ?>"><?php echo esc_html($tel); ?></a>
						</div>
						<?php } ?>

						<?php if($email) { ?>
						<div class="item">
							<i class="fal fa-envelope"></i>
							<a href="mailto:<?php echo esc_html($email);?>"><?php echo esc_html($email);?></a>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>

				<!-- Navbar Toggler -->
				<div class="navbar-toggler">
					<span></span><span></span><span></span>
				</div>
			</div>
		</div>
	</header>
	<!--====== HEADER PART END ======-->
