<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
if (!is_home() && !is_front_page()) {
    anyushu_breadcrumb();
}
?>
</main>
<!-- footer -->
<footer class="footer has-cards">
<div class="container">
<div class="row row-grid align-items-center my-md">
<div class="col-lg-6">
<h3 class="text-primary font-weight-light mb-2">Thank you for supporting us!</h3>
<h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>
</div>
<div class="col-lg-6 text-lg-center btn-wrapper">
<a target="_blank" href="https://twitter.com/Anyushu" class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip" data-original-title="Twitter">
<i class="fa fa-twitter"></i>
</a>
<a target="_blank" href="https://www.facebook.com/Anyushu2017/" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Facebook">
<i class="fa fa-facebook-square"></i>
</a>
<a target="_blank" href="https://github.com/Anyushu" class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg" data-toggle="tooltip" data-original-title="Github">
<i class="fa fa-github"></i>
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
<li class="nav-item">
<a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
</li>
<li class="nav-item">
<a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
</li>
<li class="nav-item">
<a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
</li>
<li class="nav-item">
<a href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
</li>
</ul>
</div>
</div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>