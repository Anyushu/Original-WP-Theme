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
<?php if (is_front_page() || is_home()): ?>
<h1 class="uk-margin-remove"><a class="uk-navbar-item" href="<?php echo $home; ?>"><img src="<?php echo $wp_url; ?>/lib/images/logo.svg" width="120" alt="<?php echo get_site_title(); ?>"></a></h1>
<?php else: ?>
<a class="uk-navbar-item" href="<?php echo $home; ?>"><img src="<?php echo $wp_url; ?>/lib/images/logo.svg" width="120" alt="<?php echo get_site_title(); ?>"></a>
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
<ul class="uk-nav uk-nav-default">
<li><a href="<?php echo $home; ?>">トッページ</a></li>
<?php
$pages = get_page_list();
foreach ($pages as $key => $page): ?>
<li><a href="<?php echo get_page_link($page->ID); ?>"><?php echo $page->post_title; ?></a></li>
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