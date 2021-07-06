<?php

function splitter_enqueue_styles() {
	$theme_version = wp_get_theme()->get( 'Version' );
    wp_deregister_style( 'storefront-style');
    wp_enqueue_style( 'nada-style', get_stylesheet_directory_uri() . '/assets/styles/main.css');

}
wp_deregister_style( 'storefront-style');

add_action( 'wp_enqueue_scripts', 'splitter_enqueue_styles' );


function splitter_enqueue_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_deregister_script( 'jquery-core');
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), null, true );

    wp_enqueue_script( 'splitter-scripts', get_stylesheet_directory_uri() . '/assets/scripts/main.js', array( 'jquery' ), $theme_version, true );
    wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/assets/scripts/custom.js', array( 'jquery' ), $theme_version, true );


    wp_register_script('myajax', get_stylesheet_directory_uri() . '/assets/scripts/myajax.js', $theme_version, true );
    wp_localize_script('myajax', 'admin_ajax',
	    array(
    	'ajax_url'    => admin_url( 'admin-ajax.php' ),
        'check_nonce' => wp_create_nonce( 'comment_meta_update' )
	    )
    );
    wp_enqueue_script('myajax');
}

add_action( 'wp_enqueue_scripts', 'splitter_enqueue_scripts' );