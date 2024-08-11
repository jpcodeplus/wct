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
     // Einbinden eines Javascripts
     wp_enqueue_script( 'wct-one-script', get_template_directory_uri().'/src/main.js', array(), '1.0.0', true );
     
     // Einbinden der StyleSheets
     wp_enqueue_style(
         'wct-one-style', 
         get_template_directory_uri().'/src/output.css', 
         array(), 
         filemtime(get_template_directory().'/src/output.css'), 
         'all'
     );
 }
 add_action('wp_enqueue_scripts', 'wct_one_scripts');
 
