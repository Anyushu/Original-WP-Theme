<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="p:domain_verify" content="5f019d2908ce499cbe840ea8100c429a">
<meta name="msvalidate.01" content="C592CDA10B30CD7B306D683352521918">
<?php if (!is_user_logged_in()): ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NN3ZTBZ');</script>
<!-- End Google Tag Manager -->
<?php endif; ?>
<?php wp_head(); ?>
<link rel="icon" href="<?php echo $wp_url; ?>/lib/images/favicon.ico">
<!-- Stylesheets -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/styles/default.min.css">
<link rel="stylesheet" href="<?php echo $wp_url; ?>/lib/fas/css/all.min.css">
<link rel="stylesheet" href="<?php echo $wp_url; ?>/lib/css/common/bootstrap.css">
<link rel="stylesheet" href="<?php echo $wp_url; ?>/lib/css/atom-one-dark.css">
<link rel="stylesheet" href="<?php echo $wp_url; ?>/lib/css/styles.css">
</head>
<body>
<?php if (!is_user_logged_in()): ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NN3ZTBZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php endif; ?>
<header>
<div class="container-fluid position-relative no-side-padding">
<?php if (is_single()): ?>
<div>
<a href="<?php echo $home; ?>/" class="logo"><img src="<?php echo $wp_url; ?>/lib/images/logo.svg" alt="<?php echo bloginfo('name'); ?>"></a>
</div>
<?php else: ?>
<h1>
<a href="<?php echo $home; ?>/" class="logo"><img src="<?php echo $wp_url; ?>/lib/images/logo.svg" alt="<?php echo bloginfo('name'); ?>"></a>
</h1>
<?php endif; ?>
<div class="menu-nav-icon" data-nav-menu="#main-menu">
<i class="fas fa-bars"></i>
</div>
<ul class="main-menu visible-on-click" id="main-menu">
<?php wp_list_categories('orderby=ID&order=asc&title_li=&depth=1&current_category='); ?>
</ul>
<div class="src-area">
<form method="get" action="<?php echo $home; ?>/">
<button class="src-btn" type="submit">
<i class="fas fa-search"></i>
</button>
<input class="src-input" type="text" name="s" placeholder="キーワードで記事検索">
</form>
</div>
</div>
</header>
<main role="main">
