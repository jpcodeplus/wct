<?php
/*
Template Name: Home Page
*/

get_header();
?>

<div class="content-area grow">
    <main>
        <section class="slider">{{Slider}}</section>
        <section class="popular-products">{{Popular Products}}</section>
        <section class="new-arrivals">{{New Arrivals}}</section>
        <section class="deal-of-the-week">{{Deal of the Week}}</section>

        <section class="wct-blog">
            <?php if (have_posts()): ?>
                <h1 class="text-2xl font-bold">News</h1>
                <?php while (have_posts()): the_post(); ?>
                    <!-- Hier kannst du den Code für die Darstellung des Blog-Posts einfügen -->
                    <article class="m-4 bg-slate-100 p-4 rounded-lg">
                        <h2 class="text-xl font-bold"><?php the_title(); ?> </h2>
                        <div class=" max-w-3xl"><?php the_content(); ?> </div>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Nothing to display</p>
            <?php endif; ?>
        </section>

    </main>
</div>

<?php get_footer(); ?>