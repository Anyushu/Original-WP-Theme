<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php wp_head(); ?>
</head>
<body>
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
<a class="uk-navbar-item" href="<?php echo $home; ?>"><img src="<?php echo $wp_url; ?>/lib/images/logo.svg" width="120" alt="<?php echo get_site_title(); ?>"></a>
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
<h3>カテゴリー</h3>
<ul class="uk-nav uk-nav-default">
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
<li><a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a></li>
<?php endforeach; ?>
</ul>
</div>
</div>
<!-- modal -->
<div id="search" class="uk-modal-full uk-modal" uk-modal>
<div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
<button class="uk-modal-close-full" type="button" uk-close></button>
<form class="uk-search uk-search-large">
<input class="uk-search-input uk-text-center" type="search" placeholder="Search..." autofocus>
</form>
</div>
</div>
<main>