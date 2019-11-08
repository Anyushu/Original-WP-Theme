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
<?php wp_head(); ?>
</head>
<body class="bg-secondary">

<header>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
<div class="container">
<a class="navbar-brand" href="<?php echo $home; ?>">
<img src="<?php echo $wp_url; ?>/lib/images/logo.svg" alt="<?php bloginfo('name') ?>">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbar-default">
<div class="navbar-collapse-header">
<div class="row">
<div class="col-6 collapse-brand">
<a href="<?php echo $home; ?>">
<img src="<?php echo $wp_url; ?>/lib/images/logo.svg" alt="<?php bloginfo('name') ?>">
</a>
</div>
<div class="col-6 collapse-close">
<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
<span></span>
<span></span>
</button>
</div>
</div>
</div>

<ul class="navbar-nav ml-lg-auto">
<li class="nav-item">
<a class="nav-link nav-link-icon" href="#">
<i class="ni ni-favourite-28"></i>
<span class="nav-link-inner--text">Discover</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link nav-link-icon" href="#">
<i class="ni ni-notification-70"></i>
<span class="nav-link-inner--text">Profile</span>
</a>
</li>
<li class="nav-item dropdown">
<a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="ni ni-settings-gear-65"></i>
<span class="nav-link-inner--text">Settings</span>
</a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
<a class="dropdown-item" href="#">Action</a>
<a class="dropdown-item" href="#">Another action</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Something else here</a>
</div>
</li>
</ul>

</div>
</div>
</nav>
</header>