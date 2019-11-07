<?php

// CSSの管理
function twpp_enqueue_styles()
{
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
        'fontawesome',
        '//use.fontawesome.com/releases/v5.3.1/js/all.js',
        [],
        '5.3.1',
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

function add_attribute_to_script($tag, $handle, $src)
{
    if ('fontawesome' === $handle) {
        $tag = '<script defer src="'.esc_url($src).'"></script>'."\n";
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_attribute_to_script', 10, 3);
