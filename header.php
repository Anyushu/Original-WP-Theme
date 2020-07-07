<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="theme-color" content="#247ba0">
<meta name="p:domain_verify" content="5f019d2908ce499cbe840ea8100c429a">
<meta name="msvalidate.01" content="C592CDA10B30CD7B306D683352521918">
<meta property="fb:app_id" content="321970501560993">
<?php wp_head(); ?>
<?php if (!is_user_logged_in()): ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NN3ZTBZ');</script>
<?php endif; ?>
</head>
<body>
<?php if (!is_user_logged_in()): ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NN3ZTBZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php endif; ?>
<!-- header -->
<header uk-sticky="show-on-up: true; animation: uk-animation-slide-top; bottom: #bottom">
<div class="uk-offcanvas-content">
<div class="uk-section-xsmall uk-section-default uk-box-shadow-small">
<div class="uk-container uk-container-expand">
<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
<div class="uk-navbar-left">
<a href="#menu" uk-icon="icon: list" uk-toggle></a>
</div>
<div class="uk-navbar-center">
<?php if (!is_single()): ?>
<h1 class="uk-margin-remove"><a class="uk-navbar-item" href="<?php echo $home; ?>"><img src="<?php echo $wp_url; ?>/lib/images/logo.png" width="120" srcset="<?php echo $wp_url; ?>/lib/images/logo.png 1x, <?php echo $wp_url; ?>/lib/images/logo@2x.png 2x" alt="<?php echo get_site_title(); ?>"></a></h1>
<?php else: ?>
<a class="uk-navbar-item" href="<?php echo $home; ?>"><img src="<?php echo $wp_url; ?>/lib/images/logo.png" width="120" srcset="<?php echo $wp_url; ?>/lib/images/logo.png 1x, <?php echo $wp_url; ?>/lib/images/logo@2x.png 2x" alt="<?php echo get_site_title(); ?>"></a>
<?php endif; ?>
</div>
<div class="uk-navbar-right">
<a href="#search" uk-search-icon uk-toggle></a>
</div>
</nav>
</div>
</div>
</header>
<!-- offcanvas -->
<div id="menu" uk-offcanvas="mode: push" class="uk-offcanvas">
<div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
<button class="uk-offcanvas-close uk-close uk-icon" type="button" uk-close></button>
<ul class="uk-nav uk-nav-default uk-margin-bottom">
<li class="uk-heading-divider uk-text-bold uk-margin-small-bottom">カテゴリー</li>
<?php
$args = [
    'orderby' => 'id',
    'order' => 'asc',
    'hide_empty' => 0,
];
$categories = get_categories($args);
foreach ($categories as $category):
    $cat_link = get_category_link($category->term_id);
    $cat_name = $category->name;
?>
<li><a class="uk-link-text" href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a></li>
<?php endforeach; ?>
</ul>
<ul class="uk-nav uk-nav-default">
<li class="uk-heading-divider uk-text-bold uk-margin-small-bottom">ページ</li>
<li><a class="uk-link-text" href="<?php echo $home; ?>">トップ</a></li>
<?php
$pages = get_page_list();
foreach ($pages as $key => $page): ?>
<li><a class="uk-link-text" href="<?php echo get_page_link($page->ID); ?>"><?php echo $page->post_title; ?></a></li>
<?php endforeach; wp_reset_query(); ?>
</ul>
</div>
</div>
<!-- modal -->
<div id="search" class="uk-modal-full uk-modal" uk-modal>
<div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
<button class="uk-modal-close-full" type="button" uk-close></button>
<form class="uk-search uk-search-large" action="<?php echo $home; ?>" method="get">
<input class="uk-search-input uk-text-center" type="search" name="s" placeholder="Search..." autofocus>
</form>
</div>
</div>

<main>