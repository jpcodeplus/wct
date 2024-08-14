<?php

/**
 * Gibt die URL des Beitragsbildes oder ein Standardbild zurück.
 *
 * @return string Die URL des Beitragsbildes oder des Standardbildes.
 */

function get_thumbnail_url(): string
{
    return has_post_thumbnail()
        ? get_the_post_thumbnail_url(null, 'large')
        : get_template_directory_uri() . '/assets/img/post-default.png';
}
?>

<h1 class="text-3xl font-bold px-4 py-2">Blog</h1>
<section class="wct-blog-list flex mx-4 gap-4">
    <div class=" w-3/4 flex flex-col gap-6 ">
        <?php if (have_posts()): ?>

            <?php while (have_posts()): the_post(); ?>
                <!-- Blog-Post Darstellung -->
                <article class=" bg-gray-100 rounded-lg shadow-md relative">
                    <?php $thumbnail_url = get_thumbnail_url(); ?>
                    <?php $post_permalink = esc_url(get_permalink()); ?>

                    <a href="<?= $post_permalink; ?>" class="block">
                        <picture class="relative overflow-hidden rounded-lg aspect-video max-h-48 flex">
                            <!-- Verwende lazy loading für bessere Performance -->
                            <img
                                src="<?= esc_url($thumbnail_url); ?>"
                                alt="<?= esc_attr(get_the_title()); ?>"
                                class="object-cover w-full h-full"
                                loading="lazy" />
                        </picture>

                        <h2 class="text-xl font-semibold mb-2 mt-2"><?= esc_html(get_the_title()); ?></h2>
                    </a>

                    <div class="prose max-w-none mt-2">
                        <p class="text-sm">
                            Von <?= esc_html(get_the_author()); ?> <span class="opacity-25">|</span> vor
                            <time datetime="<?= esc_attr(get_the_date('c')); ?>" itemprop="datePublished"><?= esc_html(wct_time_ago(get_the_time('U'))); ?></time>
                        </p>
                        <?= wp_kses_post(get_the_content()); ?>
                        <?= wct_get_post_tags(); ?>
                        <?= wct_get_post_categories(); ?>
                    </div>
                </article>
            <?php endwhile; ?>

            <!-- Pagination -->
            <?= wct_pagination(); ?>

        <?php else: ?>
            <p class="text-center text-gray-500">Nothing to display</p>
        <?php endif; ?>
    </div>

    <!-- Sidebar -->
    <aside class="w-1/4 bg-gray-200 rounded-lg shadow-md p-4 ">
        <h2 class=" text-xl m-0">Sdebar</h2>
        <h3>Tags:</h3>
        <?= wct_get_all_tags(); ?>
        <hr class=" my-4 border-1 border-gray-400"/>
        <h3>Kategorien:</h3>
        <?= wct_get_all_categories(); ?>
    </aside>
</section>