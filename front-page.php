<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<div class="container">
  <section class="section">
    <?php get_template_part('loop'); ?>
  </section>
</div>
<?php get_footer();