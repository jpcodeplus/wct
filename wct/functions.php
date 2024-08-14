<?php


function wct_get_header()
{
    get_template_part('/partials/header');
}

function wct_get_footer()
{
    get_template_part('/partials/footer');
}

function wct_blog_list()
{
    get_template_part('/partials/blog-list');
}

// Function to get tags with Clean Code principles
function wct_get_post_tags(): string
{
    $tags = get_the_tags();

    if (empty($tags)) {
        return '<p>No tags found.</p>';
    }

    $tag_links = array_map(fn($tag) => sprintf(
        "<a href='%s' class='text-blue-500 hover:underline'>%s</a>",
        esc_url(get_tag_link($tag->term_id)),
        esc_html($tag->name)
    ), $tags);

    return '<p>Tags: ' . implode(', ', $tag_links) . '</p>';
}

// Function to get categories with Clean Code principles
function wct_get_post_categories(): string
{
    $categories = get_the_category();

    if (empty($categories)) {
        return '<p>No categories found.</p>';
    }

    $category_links = array_map(fn($category) => sprintf(
        "<a href='%s' class='text-blue-500 hover:underline'>%s</a>",
        esc_url(get_category_link($category->term_id)),
        esc_html($category->name)
    ), $categories);

    return '<p>Categories: ' . implode(', ', $category_links) . '</p>';
}



// Optimierte Pagination-Funktion in functions.php
function wct_pagination()
{
    global $wp_query;

    // Argumente für die Pagination
    $args = array(
        'base'         => get_pagenum_link(1) . '%_%', // Basis-URL für die Seiten
        'format'       => '?paged=%#%', // Format für die Seitenzahlen
        'total'        => $wp_query->max_num_pages, // Gesamtanzahl der Seiten
        'current'      => max(1, get_query_var('paged')), // Aktuelle Seite
        'prev_text'    => '&laquo;', // Unicode für « (Previous)
        'next_text'    => '&raquo;', // Unicode für » (Next)
        'type'         => 'plain', // Typ der Pagination-Links
        'end_size'     => 1, // Anzahl der Seitenlinks am Anfang und Ende
        'mid_size'     => 1, // Anzahl der Seitenlinks um die aktuelle Seite herum
    );

    // Generiere die Pagination-Links
    $pagination = paginate_links($args);

    // Ersetze die Standardausgabe durch benutzerdefiniertes HTML
    $pagination = str_replace(
        array('<a', '</a>', '<span', '</span>', '<li>', '</li>'),
        array('<li><a class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100"', '</a></li>', '<li><span class="px-4 py-2 border border-gray-300 rounded bg-blue-100 text-blue-600"', '</span></li>', '<li>', '</li>'),
        $pagination
    );

    // Ausgabe der Pagination
    return  '<nav class="flex justify-center gap-2 mt-4">' . $pagination . '</nav>';
}



function wct_time_ago(int $timestamp): string {
    // Hole den aktuellen Zeitstempel
    $current_time = current_time('timestamp');
    $time_diff = $current_time - $timestamp;

    // Definiere die Zeitabschnitte und ihre Schwellenwerte
    $time_intervals = [
        ['label' => __('Jahr', 'wct-one'), 'value' => 29_030_400],
        ['label' => __('Monat', 'wct-one'), 'value' => 2_419_200],
        ['label' => __('Woche', 'wct-one'), 'value' => 604_800],
        ['label' => __('Tag', 'wct-one'), 'value' => 86_400],
        ['label' => __('Stunde', 'wct-one'), 'value' => 3_600],
        ['label' => __('Minute', 'wct-one'), 'value' => 60],
        ['label' => __('Sekunde', 'wct-one'), 'value' => 1]
    ];

    // Schleife durch die Zeitabschnitte und berechne die passende Einheit
    foreach ($time_intervals as $interval) {
        if ($time_diff >= $interval['value']) {
            $count = intdiv($time_diff, $interval['value']);
            return sprintf(
                _n('%d ' . $interval['label'], '%d ' . $interval['label'] . 'n', $count, 'wct-one'),
                $count
            );
        }
    }

    // Falls kein Intervall passt, sollte dies niemals passieren
    return __('Jetzt', 'wct-one');
}


/**
 * Gibt eine Liste aller Tags im gesamten System zurück.
 *
 * @return string HTML-Ausgabe der verlinkten Tags.
 */
function wct_get_all_tags(): string {
    $tags = get_tags();

    if (empty($tags)) {
        return '<p>Es sind keine Tags verfügbar.</p>'; // Nachricht, wenn keine Tags gefunden wurden.
    }

    $tag_links = array_map(fn($tag) => sprintf('<a href="%s" class="inline-flex bg-blue-50 text-blue-700 text-xs font-semibold rounded p-2 py-1" rel="tag">%s</a>',
        esc_url(get_tag_link($tag->term_id)),
        esc_html($tag->name) . ' (' . esc_html($tag->count) . ')'
    ), $tags);

    return '<div class="wct-tag-list flex gap-2">' . implode('', $tag_links) . '</div>';
}

/**
 * Gibt eine Liste aller Kategorien im gesamten System zurück.
 *
 * @return string HTML-Ausgabe der verlinkten Kategorien.
 */
function wct_get_all_categories(): string {
    $categories = get_categories();

    if (empty($categories)) {
        return '<p>Es sind keine Kategorien verfügbar.</p>'; // Nachricht, wenn keine Kategorien gefunden wurden.
    }

    $category_links = array_map(fn($category) => sprintf(
        '<a href="%s" class="inline-block bg-green-100 text-green-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded" rel="category">%s</a>',
        esc_url(get_category_link($category->term_id)),
        esc_html($category->name) . ' (' . esc_html($category->count) . ')'
    ), $categories);

    return '<div class="wct-category-list">' . implode('', $category_links) . '</div>';
}

function wct_one_scripts()
{
    // Einbinden eines Javascripts
    wp_enqueue_script('wct-one-script', get_template_directory_uri() . '/src/main.js', array(), '1.0.0', true);

    // Einbinden der StyleSheets
    wp_enqueue_style(
        'wct-one-style',
        get_template_directory_uri() . '/src/output.css',
        array(),
        filemtime(get_template_directory() . '/src/output.css'),
        'all'
    );
}
add_action('wp_enqueue_scripts', 'wct_one_scripts');



function wct_one_config()
{
    // Einbinden der Menüs
    register_nav_menus(array(
        'wtc_one_main_menu' => 'Main Menu',
        'wtc_one_footer_menu' => 'Footer Menu',
    ));


    add_theme_support(
        'woocommerce',
        array(
            'thumbnail_image_with' => 255,
            'single_image_width' => 255,
            'product_grid' =>
            array(
                'default_rows'    => 10,
                'min_rows'        => 5,
                'max_rows'        => 10,
                'default_columns' => 1,
                'min_columns'     => 1,
                'max_columns'     => 1,
            ),
        )
    );

    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    if (! isset($content_width)) {
        $content_width = 600;
    }
}

add_action('after_setup_theme', 'wct_one_config', 0);


// turn on Output Buffering (hence *ob*)
ob_start();
add_action('shutdown', function () { 
    $html = ob_get_clean();
    $tidy = new \tidy;
    $tidy->parseString($html, [
        'indent' => true,
        'output-xhtml' => true,
        'wrap' => 200
    ], 'utf8');
    $tidy->cleanRepair();
    echo $tidy;
}, 0);