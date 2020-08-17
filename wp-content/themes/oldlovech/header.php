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

		<header id="site-header" role="banner">

			<div class="header-inner section-inner">

			<?php wpblank_site_logo(); ?>

			<?php if ( has_nav_menu( 'primary' ) ) { ?>
				<div id="nav-toggle" class="" aria-expanded="false">
		             <span></span>
		        </div>

				<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'wpblank' ); ?>" role="navigation">
					<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary',  ) ); ?>
				</nav>
			<?php } ?>

			</div><!-- .header-inner -->

		</header><!-- #site-header -->

<div class="wrapper">
