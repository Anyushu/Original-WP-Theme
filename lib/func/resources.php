<?php

// CSSの管理
function twpp_enqueue_styles()
{
    wp_enqueue_style(
        'main-style',
        get_template_directory_uri().'/lib/css/style.css',
        [],
        '1.0.0',
        'all'
    );
}
add_action('wp_enqueue_scripts', 'twpp_enqueue_styles');

// JSの管理
// function add_my_scripts()
// {
//     wp_enqueue_script(
//         'base-script',
//         get_template_directory_uri().'/lib/js/bundle.js',
//         [],
//         '1.0.0',
//         true
//     );
// }
// add_action('wp_enqueue_scripts', 'add_my_scripts');
