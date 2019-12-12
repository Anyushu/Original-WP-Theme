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
<header>
<nav class="uk-navbar-container uk-margin" uk-navbar>
<div class="uk-navbar-left">
<a class="uk-navbar-item uk-logo" href="#">
<img src="<?php echo $wp_url; ?>/lib/images/logo.svg" width="120" alt="">
</a>
<ul class="uk-navbar-nav">
<li>
<a href="#">
<span class="uk-icon uk-margin-small-right" uk-icon="icon: star"></span>
Features
</a>
</li>
</ul>
<div class="uk-navbar-item">
<div>Some <a href="#">Link</a></div>
</div>
<div class="uk-navbar-item">
<form action="javascript:void(0)">
<input class="uk-input uk-form-width-small" type="text" placeholder="Input">
<button class="uk-button uk-button-default">Button</button>
</form>
</div>
</div>
</nav>
</header>
<main>