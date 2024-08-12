<?php

/**
 * This main template file
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package WCT One
 */

 wct_get_header();

?>

<div class="content-area grow">
    <main>
        <section class="slider">{{Slider}}</section>
        <section class="popular-products">{{Popular Products}}</section>
        <section class="new-arrivals">{{New Arrivals}}</section>
        <section class="deal-of-the-week">{{Deal of the Week}}</section>

        <?php wct_blog_list(); ?>

    </main>
</div>

<?php  wct_get_footer(); ?>