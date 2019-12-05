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
<body class="bg-secondary">
<header class="header-global">
<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-light bg-white headroom">
<div class="container container-lg">
<a class="navbar-brand" href="<?php echo $home; ?>">
<img src="<?php echo $wp_url; ?>/lib/images/logo.svg" alt="<?php bloginfo('name') ?>">
</a>
<!-- ハンバーガーボタン -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div id="navbar-default" class="collapse navbar-collapse">
<div class="navbar-collapse-header">
<div class="row">
<div class="col-6 collapse-brand">
<a href="<?php echo $home; ?>">
<img src="<?php echo $wp_url; ?>/lib/images/logo.svg" alt="<?php bloginfo('name') ?>">
</a>
</div>
<!-- 閉じるボタン -->
<div class="col-6 collapse-close">
<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
<span></span>
<span></span>
</button>
</div>
</div>
</div>
<!-- 記事カテゴリー -->
<ul class="navbar-nav mr-lg-auto">
<li class="nav-item dropdown">
<a class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">記事カテゴリー</a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
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
<!-- 検索 -->
<form class="form-inline">
<div class="input-group input-group-alternative">
<input class="form-control" placeholder="キーワードで検索" type="text">
<div class="input-group-append">
<span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
</div>
</div>
</form>
</div>
</div>
</nav>
</header>
<main>