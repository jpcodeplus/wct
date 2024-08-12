<?php

/**
 * The footer for the theme
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package WCT One
 */
?>

<footer class="bg-gray-600">
    <section class="footer-widgets">{{Footer Widgets}}</section>
    <section class="copyright">{{Copyright}}</section>

    <?php wp_nav_menu(
        array(
            'container' => 'nav',
            'container_class' => 'footer-menu',
            'menu_class'           => 'menu-items flex gap-2',
            'theme_location' => 'wtc_one_footer_menu'
        )
    ); ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>