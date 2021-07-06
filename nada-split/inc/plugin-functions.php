<?php
/**
 * Plugins activation
 * @see https://github.com/TGMPA/TGM-Plugin-Activation/blob/develop/example.php
 *
 * @package    TGM-Plugin-Activation
 * @version    2.6.1 for parent theme plugin_activator
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */


require_once get_stylesheet_directory() . '/classes/class-tgm-plugin-activation.php';

function splitter_register_required_plugins()
{
    $plugins = array(
	    array(
		    'name'     => 'SVG Support',
		    'slug'     => 'svg-support',
		    'required' => true,
	    ),
	    array(
		    'name'     => 'Regenerate Thumbnails',
		    'slug'     => 'regenerate-thumbnails',
		    'required' => true,
	    ),
	    array(
		    'name'     => 'Contact Form 7',
		    'slug'     => 'contact-form-7',
		    'required' => true,
	    ),
	    array(
		    'name'     => 'All-in-One WP Migration',
		    'slug'     => 'all-in-one-wp-migration',
		    'required' => false,
	    ),
	    array(
		    'name'     => 'Query Monitor',
		    'slug'     => 'query-monitor',
		    'required' => false,
	    ),
	    array(
		    'name'     => 'Show current template',
		    'slug'     => 'show-current-template',
		    'required' => false,
	    ),
    );

    $config = array(
        'id' => 'splitter',                       // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                     // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins',        // Menu slug.
        'parent_slug' => 'themes.php',            // Parent menu slug.
        'capability' => 'edit_theme_options',     // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true,                    // Show admin notices or not.
        'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message' => '',                          // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'splitter_register_required_plugins');
