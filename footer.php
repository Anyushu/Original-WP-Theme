<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>
</main>
<?php if (!is_front_page() && !is_home()): ?>
<!-- breadcrumb -->
<hr class="uk-margin-remove">
<div class="uk-padding-small">
<div class="uk-container">
<?php anyushu_breadcrumb(); ?>
</div>
</div>
<?php endif; ?>
<!-- footer -->
<footer class="uk-padding-small uk-section-muted">
<div class="uk-container">
<div class="uk-column-1-2">
<p class="uk-text-small uk-margin-remove">©2017 <a class="uk-link-muted" href="<?php echo $home; ?>">Anyushu</a></p>
<p class="uk-text-small uk-margin-remove uk-text-right">
<a class="uk-text-small uk-link-muted uk-display-inline-block uk-margin-small-right" href="<?php echo $home; ?>/privacy-policy/">PrivacyPolicy</a>
<a class="uk-text-small uk-link-muted uk-display-inline-block" href="<?php echo $home; ?>/privacy-policy/">Sitemap</a>
</p>
</div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>