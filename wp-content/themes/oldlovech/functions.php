<?php
/**
 * WPBlank Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage WPBlank
 * @since WPBlank Theme 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wpblank_theme_support() {


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WPBlank Theme, use a find and replace
	 * to change 'wpblank' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wpblank' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );


	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */
	$loader = new wpblank_Script_Loader();
	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );

}

add_action( 'after_setup_theme', 'wpblank_theme_support' );

/**
 * REQUIRED FILES
 * Include required files.
 */

require get_template_directory() . '/inc/template-tags.php';

// Custom script loader class.
require get_template_directory() . '/classes/class-wpblank-script-loader.php';


/**
 * Register and Enqueue Styles.
 */
function wpblank_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'wpblank-style', get_stylesheet_uri(), array(), $theme_version );
	wp_style_add_data( 'wpblank-style', 'rtl', 'replace' );


}

add_action( 'wp_enqueue_scripts', 'wpblank_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function wpblank_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	//Include WP jQuery
    wp_enqueue_script('jquery');

	wp_enqueue_script( 'wpblank-js', get_template_directory_uri() . '/assets/js/custom.js', array(), $theme_version, false );
	wp_script_add_data( 'wpblank-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'wpblank_register_scripts' );


/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function wpblank_menus() {

	$locations = array(
		'primary'  => __( 'Primary Menu', 'wpblank' ),
		'secondary'   => __( 'Secondary Menu', 'wpblank' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'wpblank_menus' );

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 *
 * @return string $html
 */
function wpblank_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'wpblank_get_custom_logo' );

/**
 * Enqueue supplemental block editor styles.
 */
function wpblank_block_editor_styles() {

	// Enqueue the editor styles.
	wp_enqueue_style( 'wpblank-block-editor-styles', get_theme_file_uri( '/assets/css/editor-style-block.css' ), array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_style_add_data( 'wpblank-block-editor-styles', 'rtl', 'replace' );

	// Enqueue the editor script.
	wp_enqueue_script( 'wpblank-block-editor-script', get_theme_file_uri( '/assets/js/editor-script-block.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'wpblank_block_editor_styles', 1, 1 );


// Allow the Editor Role to change Theme Settings and use Customizer
$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );
