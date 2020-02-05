<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>
</main>
</div>
<?php if (!is_front_page() && !is_home()): ?>
<!-- breadcrumb -->
<hr class="uk-margin-remove">
<div class="uk-padding-small">
<div class="uk-container">
<?php
if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<div id="breadcrumbs">','</div>');
}
?>
</div>
</div>
<?php endif; ?>
<!-- footer -->
<footer class="uk-padding uk-section-muted">
<div class="uk-container uk-clearfix">
<p class="uk-margin-remove">
<a class="uk-float-left" href="<?php echo $home; ?>">
<img src="<?php echo $wp_url; ?>/lib/images/logo.svg" width="120" alt="<?php echo get_site_title(); ?>">
</a>
<a class="uk-float-right" href="#" uk-totop uk-scroll></a>
</p>
</div>
</footer>
<div class="uk-padding-small uk-section-muted socket">
<div class="uk-container">
<div class="uk-column-1-2@s">
<p class="uk-text-small uk-margin-remove uk-text-left@s uk-text-center">
<a class="uk-text-small uk-link-text uk-display-inline-block uk-margin-small-right" href="<?php echo $home; ?>/privacy-policy/">プライバシーポリシー</a>
<a class="uk-text-small uk-link-text uk-display-inline-block" href="<?php echo $home; ?>/sitemap/">サイトマップ</a>
</p>
<p class="uk-text-small uk-margin-remove uk-text-right@s uk-text-center">©2017 <a class="uk-link-text" href="<?php echo $home; ?>">Anyushu</a></p>
</div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>