<?php
/**
 * Splitter Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @since Splitter Theme 0.1
 */


/**
 * REQUIRED FILES
 * Include required files.
 */

// Include scripts
require get_stylesheet_directory() . '/inc/script-loader.php';

// ACF plugin and their functions
require get_stylesheet_directory() . '/inc/acf/acf-functions.php';

// Required and recommended plugins
require get_stylesheet_directory() . '/inc/plugin-functions.php';

// Custom post and taxonomy types
require get_stylesheet_directory() . '/inc/custom-post-types.php';

// User fields and functions

//require get_template_directory() . '/inc/user-functions.php';

require get_stylesheet_directory() . '/inc/woocommerce.php';

require get_stylesheet_directory() . '/inc/ajax-func.php';


function splitter_theme_support()
{

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    //Let WordPress manage the document title.
    add_theme_support('title-tag');


    // Custom logo.
    $logo_width = 120;
    $logo_height = 90;

    add_theme_support(
        'custom-logo',
        array(
            'height' => $logo_height,
            'width' => $logo_width,
            'flex-height' => true,
            'flex-width' => true,
        )
    );

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

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for responsive embeds.
    add_theme_support('responsive-embeds');

    // Add default Gutenberg blocks styles
    add_theme_support('wp-block-styles');
}

add_action('after_setup_theme', 'splitter_theme_support');



// custom image sizes
add_image_size( 'menu-thumb', 268, 166, true );




function splitter_register_menus()
{

    $locations = array(
        'primary' => __('Primary Menu', 'splitter'),
        'footer' => __('Footer Menu', 'splitter'),
    );

    register_nav_menus($locations);
}

add_action('init', 'splitter_register_menus');


/**
 * Additional body classes
 *
 * @see https://developer.wordpress.org/reference/functions/body_class/
 * @see https://wp-kama.ru/function/body_class
 *
 * @param $classes
 *
 * @return mixed
 */
function splitter_class_names($classes)
{
	global $post;
    if (is_front_page() && is_home()) {
        $classes[] = 'home';
    }
	if (is_post_type_archive('faq')) {
		$classes[] = 'faq-page';
	}
	if( is_product() ){
		$classes[] = 'product';
	}
	if ( has_blocks( $post->post_content ) ) {
		$blocks = parse_blocks( $post->post_content );
		foreach ( $blocks as $block ) {
			switch ( $block['blockName'] ) {
				case 'acf/scroll-title':
					$classes[] .= 'revolution-page';
					break;
				case 'acf/contact':
					$classes[] .= 'contact-page';
					break;
				case 'acf/sustain-hero':
					$classes[] .= 'sustainability-page';
					break;
				case 'acf/hero-video':
					$classes[] .= 'who-we-are';
			}
		}
	}
    return $classes;
}
add_filter('body_class', 'splitter_class_names');




// May fix Select2 issues and fix fixed header
function splitter_filter_head()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'splitter_filter_head');


// Contact Form 7 span and <br/> tag filter
add_filter('wpcf7_autop_or_not', '__return_false');



// remove adminbar with bar=0
if (isset($_GET['bar']) && $_GET['bar'] == 1) {
    show_admin_bar(false);
}

// custom function image path
function get_theme_image_url( $name ) {
    return esc_attr( get_stylesheet_directory_uri() . '/assets/images/' . $name );
}

wp_deregister_style( 'storefront-style');

// add class to link in menu
function add_menu_link_class( $atts, $item, $args ) {
    $atts['class'] .= 'nav-item nav-link';

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );



//  add second logo
function your_theme_customizer_setting($wp_customize) {
// add a setting
    $wp_customize->add_setting('footer_logo');
// Add a control to upload the hover logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => 'Upload Footer Logo',
        'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
        'settings' => 'footer_logo',
        'priority' => 8 // show it just below the custom-logo
    )));
}

add_action('customize_register', 'your_theme_customizer_setting');



// redirect to cart
if (isset($_GET['add-to-cart']) && $_GET['add-to-cart'] != 0) {
	$cart = get_site_url() . '/cart';
	header('Location: ' . $cart);
}


add_filter('woocommerce_sale_flash', 'ds_change_sale_text');
function ds_change_sale_text() {
	return null;
}


// custom post type search
function template_chooser($template)
{
	global $wp_query;
	$post_type = get_query_var('post_type');
	if( $wp_query->is_search && $post_type == 'faq' )
	{
		return locate_template('faq-search.php');  //  redirect to archive-search.php
	}
	return $template;
}
add_filter('template_include', 'template_chooser');


//search only by title
function wpse_11826_search_by_title( $search, $wp_query ) {
	if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
		global $wpdb;

		$q = $wp_query->query_vars;
		$n = ! empty( $q['exact'] ) ? '' : '%';

		$search = array();

		foreach ( ( array ) $q['search_terms'] as $term )
			$search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );

		if ( ! is_user_logged_in() )
			$search[] = "$wpdb->posts.post_password = ''";

		$search = ' AND ' . implode( ' AND ', $search );
	}

	return $search;
}

add_filter( 'posts_search', 'wpse_11826_search_by_title', 10, 2 );





add_filter( "woocommerce_is_sold_individually" , "woocommerce_is_sold_individually_callback", 20, 2 );
function woocommerce_is_sold_individually_callback( $status, $product ){
	if ( $product->get_sold_individually() ){
		return true;
	}
	return false;
}



// plus and minus
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );

function bbloomer_display_quantity_plus() {
	echo '<button type="button" class="plus product__info-enumerator-numb position-absolute"" ><img
                                            id="buttonCountPlus" src="'. get_theme_image_url('product/next-arrow.svg') . '"
                                            alt="plus"></button>';
}

add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );

function bbloomer_display_quantity_minus() {
	echo '<button type="button" class="minus product__info-enumerator-numb position-absolute"" ><img
                                            id="buttonCountMinus" src="'. get_theme_image_url('product/back-arrow.svg') . '"
                                            alt="plus"></button>';
}

// -------------
// 2. Trigger update quantity script

add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );

function bbloomer_add_cart_quantity_plus_minus() {

	if ( ! is_product() && ! is_cart() ) return;

	wc_enqueue_js( "   
           
      $('form.cart,form.woocommerce-cart-form').on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max );
            } else {
               qty.val( val + step );
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min );
            } else if ( val > 1 ) {
               qty.val( val - step );
            }
         }
 
      });
        
   " );
}


function wplook_activate_gutenberg_products($can_edit, $post_type){
	if($post_type == 'product'){
		$can_edit = true;
	}

	return $can_edit;
}
add_filter('use_block_editor_for_post_type', 'wplook_activate_gutenberg_products', 10, 2);



// times ago for comments
function my_post_time_ago_function() {
	return sprintf( esc_html__( '%s ago', 'textdomain' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}
add_filter( 'the_time', 'my_post_time_ago_function' );


//add comment meta
add_action ('comment_post', 'add_meta_settings', 1);

function add_meta_settings($comment_id) {
	add_comment_meta($comment_id, 'helpful_yes', '0', true);
	add_comment_meta($comment_id, 'helpful_no', '0', true);
	add_comment_meta($comment_id, 'user_votes', array(), true);
}

