<?php

// CSSの管理
function twpp_enqueue_styles()
{
    wp_enqueue_style(
        'nucleo',
        get_template_directory_uri().'/assets/vendor/nucleo/css/nucleo.css',
        [],
        '1.0.0',
        'all'
    );
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
function add_my_scripts()
{
    wp_deregister_script('jquery');
    wp_enqueue_script(
        'base-script',
        get_template_directory_uri().'/lib/js/bundle.js',
        [],
        '1.0.1',
        true
    );
}
add_action('wp_enqueue_scripts', 'add_my_scripts');
