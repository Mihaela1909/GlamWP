<?php

function mytheme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menu( 'primary', 'Primary Menu' );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

function mytheme_enqueue_assets() {
	wp_enqueue_style( 'mytheme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_assets' );

/**
 * Testimonial CPT — "What users think" section.
 */
function mytheme_register_testimonial_cpt() {
	register_post_type( 'testimonial', array(
		'labels' => array(
			'name'          => 'Testimonials',
			'singular_name' => 'Testimonial',
			'add_new_item'  => 'Add New Testimonial',
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-format-quote',
		'supports'     => array( 'title', 'thumbnail' ),
	) );
}
add_action( 'init', 'mytheme_register_testimonial_cpt' );

/**
 * Site Content CPT — a single entry admin edits to manage
 */
function mytheme_register_site_content_cpt() {
	register_post_type( 'site_content', array(
		'labels' => array(
			'name'          => 'Homepage Content',
			'singular_name' => 'Homepage Content',
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-admin-home',
		'supports'     => array( 'title' ),
	) );
}
add_action( 'init', 'mytheme_register_site_content_cpt' );


/**
 * Product CPT — for the Shop / Bestsellers section.
 */
function mytheme_register_product_cpt() {
	register_post_type( 'product', array(
		'labels' => array(
			'name'          => 'Products',
			'singular_name' => 'Product',
			'add_new_item'  => 'Add New Product',
		),
		'public'       => true, // true so products can have their own pages/archive
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-cart',
		'has_archive'  => true,
		'supports'     => array( 'title', 'thumbnail', 'editor' ),
	) );
}
add_action( 'init', 'mytheme_register_product_cpt' );