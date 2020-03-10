<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
the_post();
$id = get_the_ID();
$ttl = get_the_title();
$permalink = get_the_permalink();
?>
<section class="uk-section-small">
<div class="uk-container">
<div class="uk-grid-divider" uk-grid>
<section class="uk-article uk-width-expand@m">
<h2 class="uk-article-title uk-text-bolder"><?php echo $ttl; ?></h2>
<div class="uk-article-meta">
<time datetime="<?php the_modified_time('Y-m-d'); ?>"><span class="uk-margin-small-right" uk-icon="history"></span><?php the_modified_time('Y.m.d'); ?></time>
</div>
<div class="main-article uk-margin-top">
<?php the_content(); ?>
</div>
</section>
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php get_footer();