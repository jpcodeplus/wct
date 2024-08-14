<?php

/**
 * WCT One functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions
 * 
 * @package WCT One
 */

require __DIR__ . '/wct/functions.php';

// Damit das Theme auch ohne WooCoomerce funtioniert
if (class_exists('WooCommerce')) {
    require __DIR__ . '/wct/woo-functions.php';
}
