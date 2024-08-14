<?php

/**
 * Template Overrides for WooCommerce pages
 *
 * @link https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/#section-3
 *
 * @package WCT One
 */

function wct_wc_modify()
{
    function wct_main_content_start(): void
    {
        echo '<div class="flex flex-col md:flex-row wct-screen bg-gray-300">';
    }

    function wct_sidebar(): void
    {
        echo '<aside class="sidebar-shop w-full md:w-1/4 p-4 bg-gray-300 order-2 md:order-1">';
        woocommerce_get_sidebar();
        echo '</aside><!-- END Sidebar -->';
    }


    function wct_product_section_start(): void
    {
        if(is_shop()){
            echo '<!-- START Product Section Wrapper -->
            <section class="w-full md:w-3/4 p-4 bg-gray-100 order-1 md:order-2">';
        }
        else {
            echo '<!-- START Product Section Wrapper -->
            <section class="w-full p-4 bg-gray-100 order-1 md:order-2">';
        }

    }

    function wct_product_list_start(): void
    {
        echo '<!-- START Product List -->';
    }

    function wct_close_section(): void
    {
        echo '</section><!-- END Section Wrapper -->';
    }

    function wct_close_div(): void
    {
        echo '</div><!-- END Main Content Wrapper -->';
    }




    // Entferne die Standard-Sidebar von WooCommerce
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

    add_action('woocommerce_before_main_content', 'wct_get_header', 0);

    // Hauptinhalt starten
    add_action('woocommerce_before_main_content', 'wct_main_content_start', 10);

    // IS_SHOP ist die Startseite des Shops 
    if (is_shop()) {
        // Add Sidebar
        add_action('woocommerce_before_main_content', 'wct_sidebar', 11);
    }

    // Produktbereich
    add_action('woocommerce_before_main_content', 'wct_product_section_start', 12);
    add_action('woocommerce_before_main_content', 'wct_product_list_start', 13);
    add_action('woocommerce_after_shop_loop', 'wct_close_section', 15);

    // Hauptinhalt und Produktbereich schließen
    add_action('woocommerce_after_main_content', 'wct_close_div', 5);


    // Produkt beschreibung in Produkt Loop (Textauszug)
    add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);


    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
    add_action('woocommerce_shop_loop_item_title', 'wct_product_title', 10);
    function wct_product_title()
    {
        echo '<h2 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'wct_product_title')) . '">' . get_the_title() . '</h2>';
    }
}


add_action('wp', 'wct_wc_modify');
