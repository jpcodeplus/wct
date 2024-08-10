<?php 

/**
 * This main template file
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package WCT One
 */

get_header(); ?>

<div class="content-area">
    <main>
        <section class="slider"></section>
        <section class="popular-products">{{Popular Products}}</section>
        <section class="new-arrivals">{{New Arrivals}}</section>
        <section class="deal-of-the-week">{{Deal of the Week}}</section>
        <section class="wct-blog">{{News}}</section>
    </main>
</div>

<?php get_footer(); ?>