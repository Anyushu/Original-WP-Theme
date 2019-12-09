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
<body class="sidebar-collapse">

<header>
<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
<div class="container">
<div class="navbar-translate">
<a class="navbar-brand" href="<?php echo $home; ?>/">
<?php bloginfo('name'); ?>
<!-- <img src="<?php echo $wp_url; ?>/lib/images/logo.svg" alt="<?php bloginfo('name'); ?>" width="130"> -->
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="sr-only">Toggle navigation</span>
<span class="navbar-toggler-icon"></span>
<span class="navbar-toggler-icon"></span>
<span class="navbar-toggler-icon"></span>
</button>
</div>
<div class="collapse navbar-collapse">
<ul class="navbar-nav ml-auto">
<li class="dropdown nav-item">
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
<i class="material-icons">category</i>Category
</a>
<div class="dropdown-menu dropdown-with-icons">
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
<a class="dropdown-item" href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
<?php endforeach; ?>
</div>
</li>
</ul>
<form id="search-form" class="form-inline">
<div class="form-group bmd-form-group">
<input type="text" class="form-control" placeholder="Search">
</div>
<button type="submit" class="btn btn-primary btn-raised btn-fab btn-round">
<i class="material-icons">search</i>
</button>
</form>
</div>
</div>
</nav>
</header>
<?php if (is_front_page() || is_home()): ?>
<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?php echo $wp_url; ?>/lib/images/bg2.jpg');">
<div class="container">
<div class="row">
<div class="col-md-8 ml-auto mr-auto">
<div class="brand">
<h1>Material Kit.</h1>
<h3>A Badass Bootstrap 4 UI Kit based on Material Design.</h3>
</div>
</div>
</div>
</div>
</div>
<?php endif; ?>
<main class="main main-raised">