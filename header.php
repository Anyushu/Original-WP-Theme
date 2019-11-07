<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri().'/lib';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php wp_head(); ?>
</head>
<body>
<!-- header -->
<header id="header">
<nav class="navbar" role="navigation" aria-label="main navigation">
<div class="navbar-brand">
<a class="navbar-item" href="<?php echo $home; ?>"><img src="<?php echo $wp_url; ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>" width="112"></a>
<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
<span aria-hidden="true"></span>
<span aria-hidden="true"></span>
<span aria-hidden="true"></span>
</a>
</div>
<div id="navbarBasicExample" class="navbar-menu">
<div class="navbar-start">
<a class="navbar-item">Home</a>
<a class="navbar-item">Documentation</a>
<div class="navbar-item has-dropdown is-hoverable">
<a class="navbar-link">More</a>
<div class="navbar-dropdown">
<a class="navbar-item">About</a>
<a class="navbar-item">Jobs</a>
<a class="navbar-item">Contact</a>
<hr class="navbar-divider">
<a class="navbar-item">Report an issue</a>
</div>
</div>
</div>
<div class="navbar-end">
<div class="navbar-item">
<div class="buttons">
<a class="button is-primary"><strong>Sign up</strong></a>
<a class="button is-light">Log in</a>
</div>
</div>
</div>
</div>
</nav>
</header>
<!-- main -->
<main id="main">
