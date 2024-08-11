<?php

/**
 * The header for the theme
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package WCT One
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site flex flex-col">
        <header>
            <section class="serach bg-gray-100">{{Search}}</section>

            <section class="top-bar flex bg-gray-200">
                <div class="brand">{{Logo}}</div>
                <div class="secound-column flex">
                    <div class="account">{{Account}}</div>
                    <nav class="main-menu">{{Menu}}</nav>
                </div>
            </section>
        </header>