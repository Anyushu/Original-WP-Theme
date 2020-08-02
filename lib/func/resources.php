<?php

// CSSの管理
function add_enqueue_styles()
{
    wp_enqueue_style(
        'main-style',
        get_template_directory_uri().'/lib/css/style.css',
        [],
        '1.0.3',
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


// head内
function add_head_code()
{
    $html = <<<EOM

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NN3ZTBZ');</script>

EOM;
    echo $html;
}
add_action('wp_head', 'add_head_code', 99);


// bodyの開始
function add_body_open()
{
    $html = <<<EOM

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NN3ZTBZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

EOM;
    echo $html;
}
add_action('wp_body_open', 'add_body_open');
