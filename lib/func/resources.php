<?php

// CSSの管理
function add_enqueue_styles()
{
    wp_enqueue_style(
        'main-style',
        get_template_directory_uri().'/lib/css/style.css',
        [],
        '1.0.0',
        'all'
    );
}
add_action('wp_enqueue_scripts', 'add_enqueue_styles');

function dp_deregister_styles()
{
    if (!is_single() && !is_page()) {
        wp_dequeue_style('wp-block-library'); // ブロックエディタ
    }
    if (!is_single()) {
        wp_dequeue_style('addtoany'); // シェアボタン
        wp_dequeue_style('pz-linkcard'); // リンクカード
    }
    wp_dequeue_style('wordpress-popular-posts-css'); // WPP
}
add_action('wp_print_styles', 'dp_deregister_styles', 10, 1);

// JSの管理
// function add_my_scripts()
// {
//     wp_enqueue_script(
//         'main-script',
//         get_template_directory_uri().'/lib/js/bundle.js',
//         [],
//         '1.0.0',
//         true
//     );
// }
// add_action('wp_enqueue_scripts', 'add_my_scripts');

function dp_deregister_scripts()
{
    if (!is_single()) {
        wp_dequeue_script('addtoany'); // シェアボタン
    }
}
add_action('wp_print_scripts', 'dp_deregister_scripts', 10, 1);
