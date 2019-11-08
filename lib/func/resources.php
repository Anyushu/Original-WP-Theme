<?php

// CSSの管理
function twpp_enqueue_styles()
{
    wp_enqueue_style(
        'fontawesome',
        get_template_directory_uri().'/assets/vendor/font-awesome/css/font-awesome.min.css',
        [],
        filemtime(get_template_directory_uri().'/assets/vendor/font-awesome/css/font-awesome.min.css'),
        'all'
    );
    wp_enqueue_style(
        'nucleo',
        get_template_directory_uri().'/assets/vendor/nucleo/css/nucleo.css',
        [],
        filemtime(get_template_directory_uri().'/assets/vendor/nucleo/css/nucleo.css'),
        'all'
    );
    wp_enqueue_style(
        'main-style',
        get_template_directory_uri().'/lib/css/style.css',
        [],
        filemtime(get_template_directory_uri().'/lib/css/style.css'),
        'all'
    );
}
add_action('wp_enqueue_scripts', 'twpp_enqueue_styles');

// JSの管理
function add_my_scripts()
{
    wp_deregister_script('jquery');
    wp_enqueue_script(
        'jquery',
        '//code.jquery.com/jquery-3.4.1.min.js',
        [],
        '3.4.1',
        true
    );
    wp_enqueue_script(
        'popper',
        get_template_directory_uri().'/assets/vendor/popper/popper.min.js',
        ['jquery'],
        filemtime(get_template_directory_uri().'/assets/vendor/popper/popper.min.js'),
        true
    );
    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri().'/assets/vendor/bootstrap/bootstrap.min.js',
        ['jquery'],
        filemtime(get_template_directory_uri().'/assets/vendor/bootstrap/bootstrap.min.js'),
        true
    );
    wp_enqueue_script(
        'base-script',
        get_template_directory_uri().'/lib/js/app.js',
        ['jquery'],
        filemtime(get_template_directory_uri().'/lib/js/app.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'add_my_scripts');

// JSタグ変更
function filter_attribute_to_script($tag, $handle, $src)
{
    $tag = '<script src="'.esc_url($src).'"></script>'."\n";
    return $tag;
}
add_filter('script_loader_tag', 'filter_attribute_to_script', 10, 3);
