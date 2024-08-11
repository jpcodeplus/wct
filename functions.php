<?php

/**
 * WCT One functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions
 * 
 * @package WCT One
 */

function wct_one_scripts()
{
    // Einbinden der StyleSheets
    // filemtime( get_template_directory().'/style.css') - wenn der cache nicht richtig läüft anstatt der versionsnummer (1.0) aber nur im DEV prozess
    wp_enqueue_style('wct-one-style', get_template_directory_uri().'/src/output.css', array(), filemtime(get_template_directory().'/src/output.css'), 'all');
}
add_action('wp_enqueue_scripts', 'wct_one_scripts');
