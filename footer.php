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
<footer class="uk-section-small uk-section-muted">
  <div class="uk-container">
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>