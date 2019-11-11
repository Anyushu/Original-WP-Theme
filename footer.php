<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>
</main>
<!-- footer -->
<footer class="footer bg-white">
<div class="container container-lg">
<div class="row row-grid align-items-center my-md">
<div class="col-lg-6">
<div class="d-block">
<a class="navbar-brand" href="<?php echo $home; ?>">
<img src="<?php echo $wp_url; ?>/lib/images/logo.svg" alt="<?php bloginfo('name') ?>">
</a>
</div>
</div>
<div class="col-lg-6 text-lg-right btn-wrapper">
<a target="_blank" href="https://twitter.com/Anyushu" class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip" data-original-title="Twitter">
<i class="fab fa-twitter"></i>
</a>
<a target="_blank" href="https://www.facebook.com/Anyushu2017/" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Facebook">
<i class="fab fa-facebook-square"></i>
</a>
<a target="_blank" href="https://github.com/Anyushu" class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg" data-toggle="tooltip" data-original-title="Github">
<i class="fab fa-github"></i>
</a>
</div>
</div>
<hr>
<div class="row align-items-center justify-content-md-between">
<div class="col-md-6">
<div class="copyright">© <?php echo date('Y'); ?> <a href="<?php echo $home; ?>">Anyushu</a></div>
</div>
<div class="col-md-6">
<ul class="nav nav-footer justify-content-end">
<?php
$pages = get_page_list();
foreach ($pages as $key => $page): ?>
<li class="nav-item">
<a href="<?php echo get_page_link($page->ID); ?>" class="nav-link"><?php echo $page->post_title; ?></a>
</li>
<?php endforeach; wp_reset_query(); ?>
</ul>
</div>
</div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>