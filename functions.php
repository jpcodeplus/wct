<?php

/**
 * WCT One functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions
 * 
 * @package WCT One
 */

require __DIR__ . '/wct/functions.php';


function wct_one_scripts()
{
    // Einbinden eines Javascripts
    wp_enqueue_script('wct-one-script', get_template_directory_uri() . '/src/main.js', array(), '1.0.0', true);

    // Einbinden der StyleSheets
    wp_enqueue_style(
        'wct-one-style',
        get_template_directory_uri() . '/src/output.css',
        array(),
        filemtime(get_template_directory() . '/src/output.css'),
        'all'
    );
}
add_action('wp_enqueue_scripts', 'wct_one_scripts');



function wct_one_config()
{
    // Einbinden der Menüs
    register_nav_menus(array(
        'wtc_one_main_menu' => 'Main Menu',
        'wtc_one_footer_menu' => 'Footer Menu',
    ));

    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'wct_one_config', 0);
