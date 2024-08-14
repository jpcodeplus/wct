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
        <header class="bg-gray-200">
            <section class="serach bg-gray-100 wct-screen">{{Search}}</section>

            <section class="top-bar flex bg-gray-200 wct-screen">
                <div class="brand">{{Logo}}</div>
                <div class="secound-column flex flex-col">
                    <div class="account">{{Account}}</div>

                    <?php wp_nav_menu(
                        array(
                            'container' => 'nav',
                            'container_class' => 'main-menu',
                            'menu_class'           => 'menu-items flex gap-2',
                            'theme_location' => 'wtc_one_main_menu'
                        )
                    ); ?>

                </div>
            </section>
        </header>