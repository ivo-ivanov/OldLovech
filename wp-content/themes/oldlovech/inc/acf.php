<?php

// Create custom Gutenberg category
function custom_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'custom',
				'title' => __( 'Custom Blocks', 'custom-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'custom_block_category', 10, 2);

// Register ACF Blocks
add_action('acf/init', 'my_acf_init');
function my_acf_init() {

	// check function exists
	if( function_exists('acf_register_block') ) {

		acf_register_block(array(
			'name'				=> 'slider',
			'title'				=> __('Slider'),
			'description'		=> __('Slider'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'images-alt2',
			'keywords'			=> array( 'slider'),
			'mode' => 'edit'
		));

		acf_register_block(array(
			'name'				=> 'Hero',
			'title'				=> __('Hero'),
			'description'		=> __('Hero block with heading, buttons and slider.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'align-right',
			'keywords'			=> array( 'hero', 'buttons', 'slider'),
			'mode' => 'edit'
		));

		acf_register_block(array(
			'name'				=> 'About',
			'title'				=> __('About'),
			'description'		=> __('About block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'editor-table',
			'keywords'			=> array( 'About' ),
			'mode' => 'edit'
		));

	}
}

function my_acf_block_render_callback( $block ) {

	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);

	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
	}
}


// Disabel all gutenberg blocks exept these here
//add_filter( 'allowed_block_types', 'misha_allowed_block_types', 10, 2 );

function misha_allowed_block_types( $allowed_blocks, $post ) {

	$allowed_blocks = array(
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/text-columns',
		'core/columns',
		'core/table',
		'core/shortcode',
		'core/group',
		'acf/slider',
		'acf/hero',
		'acf/about'
	);

	return $allowed_blocks;

}

// Email obstrufication for ACF fields
if (function_exists('eae_encode_emails') && !is_admin()){
	add_filter('acf/load_value', 'eae_encode_emails');
}

// Add ACF Options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

// Use local JSON
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/inc/acf-json';


    // return
    return $path;

}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {

    // remove original path (optional)
    unset($paths[0]);


    // append path
    $paths[] = get_stylesheet_directory() . '/inc/acf-json';


    // return
    return $paths;

}


?>
