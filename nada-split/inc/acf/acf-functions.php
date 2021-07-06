<?php
/**
 * ACF functions
 * @see https://www.advancedcustomfields.com/resources/
 */


/**
 * Include ACF in theme
 */
define( 'SPLITTER_ACF_PATH', get_stylesheet_directory() . '/inc/acf/acf-plugin/' );
define( 'SPLITTER_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/acf-plugin/' );

include_once( SPLITTER_ACF_PATH . 'acf.php' );

function slitter_acf_settings_url() {
	return SPLITTER_ACF_URL;
}

add_filter( 'acf/settings/url', 'slitter_acf_settings_url' );


/**
 * Add ACF json save path
 */
function splitter_acf_json_save_point() {
	return get_stylesheet_directory() . '/inc/acf/acf-json';
}

add_filter( 'acf/settings/save_json', 'splitter_acf_json_save_point' );


/**
 * Add options page
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_sub_page( array(
		'page_title' => 'Theme Preferences',
		'menu_title' => 'Preferences',
		'menu_slug'  => 'theme-preferences',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
	acf_add_options_sub_page( array(
		'page_title'  => 'Theme Footer Settings',
		'menu_title'  => 'Footer',
		'parent_slug' => 'theme-preferences',
	) );
}


/**
 * Register Gutenberg blocks via ACF Pro
 * @see https://www.advancedcustomfields.com/resources/acf_register_block_type/
 */
function splitter_register_blocks() {

	acf_register_block_type( array(
		'name'            => 'home_hero',
		'title'           => 'Home Hero block',
		'description'     => 'Display Header Hero on Home page',
		'category'        => 'formatting',
		'keywords'        => array( 'Hero', 'Home', 'Header' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/hero/home-hero.php'
	) );
	acf_register_block_type( array(
		'name'            => 'partners_slider',
		'title'           => 'Partners Slider block',
		'description'     => 'Display slider with logos',
		'category'        => 'formatting',
		'keywords'        => array( 'slider', 'partners', 'logo' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/partners-slider.php'
	) );
	acf_register_block_type( array(
		'name'            => 'principle',
		'title'           => 'Principle block',
		'description'     => 'Display Principle section',
		'category'        => 'formatting',
		'keywords'        => array( 'steps', 'Principle', 'step' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/principle.php'
	) );
	acf_register_block_type( array(
		'name'            => 'products_home',
		'title'           => 'Featured Products block',
		'description'     => 'Display Products section and video on home page ',
		'category'        => 'formatting',
		'keywords'        => array( 'featured', 'products', 'video' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/products-home.php'
	) );
	acf_register_block_type( array(
		'name'            => 'goal',
		'title'           => 'Goal block',
		'description'     => 'Display Section with goals',
		'category'        => 'formatting',
		'keywords'        => array( 'goals', 'goal' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/text/goal.php'
	) );
	acf_register_block_type( array(
		'name'            => 'importance',
		'title'           => 'Importance block',
		'description'     => 'Display text section with orange background',
		'category'        => 'formatting',
		'keywords'        => array( 'importance', 'text' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/text/importance.php'
	) );
	acf_register_block_type( array(
		'name'            => 'products',
		'title'           => 'Products block',
		'description'     => 'Display a section with products',
		'category'        => 'formatting',
		'keywords'        => array( 'products', 'home' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/products.php'
	) );
	acf_register_block_type( array(
		'name'            => 'revolution',
		'title'           => 'Revolution block',
		'description'     => 'Display a text section with green-pink background',
		'category'        => 'formatting',
		'keywords'        => array( 'revolution', 'text' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/text/revolution.php'
	) );
	acf_register_block_type( array(
		'name'            => 'benefits',
		'title'           => 'Benefits block',
		'category'        => 'formatting',
		'keywords'        => array( 'benefits', 'text' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/text/benefits.php'
	) );
	acf_register_block_type( array(
		'name'            => 'scroll_title',
		'title'           => 'Hero with scroll block',
		'description'     => 'Display a hero section with scroll down button',
		'category'        => 'formatting',
		'keywords'        => array( 'hero', 'scroll' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/hero/scroll-hero.php'
	) );
	acf_register_block_type( array(
		'name'            => 'revolution_goal',
		'title'           => 'Revolution Goal',
		'description'     => 'Display a section with goal on revolution page',
		'category'        => 'formatting',
		'keywords'        => array( 'revolution', 'goal' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/text/revolution-goal.php'
	) );
	acf_register_block_type( array(
		'name'            => 'important',
		'title'           => 'Why Its Important',
		'category'        => 'formatting',
		'keywords'        => array( 'revolution', 'important' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/text/important.php'
	) );
	acf_register_block_type( array(
		'name'            => 'stats',
		'title'           => 'Stats block',
		'description'     => 'Display a section with statistic',
		'category'        => 'formatting',
		'keywords'        => array( 'revolution', 'stats' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/text/stats.php'
	) );
	acf_register_block_type( array(
		'name'            => 'solving',
		'title'           => 'Solving block',
		'description'     => '"Solving the Problem" Section',
		'category'        => 'formatting',
		'keywords'        => array( 'problem', 'solving' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/text/solving.php'
	) );
	acf_register_block_type( array(
		'name'            => 'zero_waste',
		'title'           => 'Zero Waste block',
		'description'     => 'Zero Waste Section with steps',
		'category'        => 'formatting',
		'keywords'        => array( 'zero', 'waste' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/zero-waste.php'
	) );
	acf_register_block_type( array(
		'name'            => 'solution',
		'title'           => 'Solution Image block',
		'description'     => 'This is just simple image',
		'category'        => 'formatting',
		'keywords'        => array( 'image', 'solution' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/solution.php'
	) );
	acf_register_block_type( array(
		'name'            => 'way',
		'title'           => 'Way block',
		'description'     => 'Section with text, images and steps',
		'category'        => 'formatting',
		'keywords'        => array( 'way', 'revolution' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/way.php'
	) );
	acf_register_block_type( array(
		'name'            => 'simile',
		'title'           => 'Simile block',
		'description'     => 'Nada vs other Section',
		'category'        => 'formatting',
		'keywords'        => array( 'simile', 'revolution' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/simile.php'
	) );
	acf_register_block_type( array(
		'name'            => 'solution-2',
		'title'           => 'Solution 2 block',
		'description'     => 'Another section with image and text',
		'category'        => 'formatting',
		'keywords'        => array( 'solution', 'revolution' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/solution-2.php'
	) );
	acf_register_block_type( array(
		'name'            => 'hero_video',
		'title'           => 'Video Hero block',
		'description'     => 'Hero with video',
		'category'        => 'formatting',
		'keywords'        => array( 'hero', 'video' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/hero/video.php'
	) );
	acf_register_block_type( array(
		'name'            => 'team',
		'title'           => 'Team block',
		'description'     => 'Display a few team members',
		'category'        => 'formatting',
		'keywords'        => array( 'team', 'who' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/team.php'
	) );
	acf_register_block_type( array(
		'name'            => 'ingridients',
		'title'           => 'Ingridients block',
		'description'     => 'Display a few ingridients',
		'category'        => 'formatting',
		'keywords'        => array( 'ingridients', 'who' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/text/ingridients.php'
	) );
	acf_register_block_type( array(
		'name'            => 'history',
		'title'           => 'History block',
		'description'     => 'Display images and text next',
		'category'        => 'formatting',
		'keywords'        => array( 'history', 'who' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/history.php'
	) );
	acf_register_block_type( array(
		'name'            => 'scroll_title2',
		'title'           => 'Hero with scroll block, without button',
		'description'     => 'Display a hero section with scroll down button',
		'category'        => 'formatting',
		'keywords'        => array( 'hero', 'scroll' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/hero/scroll-hero2.php'
	) );
	acf_register_block_type( array(
		'name'            => 'contact',
		'title'           => 'Contact block',
		'description'     => 'Display Contact Form on contact page',
		'category'        => 'formatting',
		'keywords'        => array( 'contact', 'form' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/contact.php'
	) );
	acf_register_block_type( array(
		'name'            => 'sustain_hero',
		'title'           => 'Sustainability Hero block',
		'description'     => 'Display Hero section from Sustainability page',
		'category'        => 'formatting',
		'keywords'        => array( 'sustainability', 'hero' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/hero/sustain.php'
	) );
	acf_register_block_type( array(
		'name'            => 'development',
		'title'           => 'Development block',
		'description'     => 'Display section with list of products',
		'category'        => 'formatting',
		'keywords'        => array( 'development' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/development.php'
	) );
	acf_register_block_type( array(
		'name'            => 'tubes',
		'title'           => 'Tubes block',
		'description'     => 'Display section with Tubes',
		'category'        => 'formatting',
		'keywords'        => array( 'tubes' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/tubes.php'
	) );
	acf_register_block_type( array(
		'name'            => 'talk',
		'title'           => 'Talk block',
		'category'        => 'formatting',
		'keywords'        => array( 'talk' ),
		'icon'            => array( 'background' => '#fbb605', 'src' => 'format-video' ),
		'render_template' => get_stylesheet_directory() . '/template-parts/blocks/talk.php'
	) );
}

if ( function_exists( 'acf_register_block_type' ) ) {
	add_action( 'acf/init', 'splitter_register_blocks' );
}