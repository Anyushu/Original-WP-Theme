<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
?>
<section class="uk-section-small">
<div class="uk-container">
<div class="uk-grid-divider" uk-grid>
<div class="uk-width-expand@m">
<h2><?php single_cat_title(); ?></h2>
<?php get_template_part('loop'); ?>
</div>
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php get_footer();