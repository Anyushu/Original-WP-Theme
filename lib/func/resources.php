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
        get_template_directory_uri().'/lib/css/style.min.css',
        [],
        filemtime(get_template_directory_uri().'/lib/css/style.min.css'),
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
        get_template_directory_uri().'/lib/js/index.js',
        [],
        filemtime(get_template_directory_uri().'/lib/js/index.js'),
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
