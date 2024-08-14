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
    <main class="wct-screen">

        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <div>
                <h1 class="text-xl font-semibold mb-2 mt-2"><?= esc_html(get_the_title()); ?></h1>
                    <?= wp_kses_post(get_the_content()); ?>
                </div>
            <?php endwhile; ?>

        <?php else: ?>
            <p class="text-center text-gray-500">Nothing to display</p>
        <?php endif; ?>

    </main>
</div>

<?php wct_get_footer(); ?>