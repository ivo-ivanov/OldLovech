<?php
/**
 * Custom template tags for this theme.
 *
 * @package WordPress
 * @subpackage WPBlank
 * @since WPBlank 1.0
 */

 // Exit if accessed directly.
 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }

  /**
   * Logo & Description
   */
  /**
   * Displays the site logo, either text or image.
   *
   * @param array   $args Arguments for displaying the site logo either as an image or text.
   * @param boolean $echo Echo or return the HTML.
   *
   * @return string $html Compiled HTML based on our arguments.
   */
  function wpblank_site_logo( $args = array(), $echo = true ) {
  	$logo       = get_custom_logo();
  	$site_title = get_bloginfo( 'name' );
  	$contents   = '';
  	$classname  = '';

  	$defaults = array(
  		'logo'        => '%1$s<span class="screen-reader-text">%2$s</span>',
  		'logo_class'  => 'site-logo',
  		'title'       => '<a href="%1$s">%2$s</a>',
  		'title_class' => 'site-title',
  		'home_wrap'   => '<h1 class="%1$s">%2$s</h1>',
  		'single_wrap' => '<div class="%1$s faux-heading">%2$s</div>',
  		'condition'   => ( is_front_page() || is_home() ) && ! is_page(),
  	);

  	$args = wp_parse_args( $args, $defaults );

  	/**
  	 * Filters the arguments for `wpblank_site_logo()`.
  	 *
  	 * @param array  $args     Parsed arguments.
  	 * @param array  $defaults Function's default arguments.
  	 */
  	$args = apply_filters( 'wpblank_site_logo_args', $args, $defaults );

  	if ( has_custom_logo() ) {
  		$contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
  		$classname = $args['logo_class'];
  	} else {
  		$contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
  		$classname = $args['title_class'];
  	}

  	$wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

  	$html = sprintf( $args[ $wrap ], $classname, $contents );

  	/**
  	 * Filters the arguments for `wpblank_site_logo()`.
  	 *
  	 * @param string $html      Compiled html based on our arguments.
  	 * @param array  $args      Parsed arguments.
  	 * @param string $classname Class name based on current view, home or single.
  	 * @param string $contents  HTML for site title or logo.
  	 */
  	$html = apply_filters( 'wpblank_site_logo', $html, $args, $classname, $contents );

  	if ( ! $echo ) {
  		return $html;
  	}

  	echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

  }
