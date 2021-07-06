<?php

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

/**
 * Register custom post type
 */
function splitter_post_type() {
	register_post_type( 'faq', array(
		'label'              => 'FAQ',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_icon'          => 'dashicons-list-view',
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor') // if Gutenberg don`t working check is 'show_in_rest' set TRUE
	) );
}

add_action( 'init', 'splitter_post_type' );


/**
 * Register custom post type
 */

function splitter_category_taxonomy() {
	register_taxonomy( 'splitter_category', [ 'splitter' ], [
		'label'             => 'Splitter category',
		'description'       => '',
		'public'            => true,
		'hierarchical'      => true,
		'rewrite'           => true,
		'capabilities'      => array(),
		'meta_box_cb'       => 'post_categories_meta_box',
		'show_admin_column' => false,
		'show_in_rest'      => true,
		'rest_base'         => null,
	] );
}

//add_action( 'init', 'splitter_category_taxonomy' );