<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
the_post();
$post_id = get_the_ID();
$ttl = get_the_title();
$permalink = get_the_permalink();
$cat = get_the_category();
$tags = get_the_tags();
$cat = $cat[0];
$cat_id = $cat->term_id;
$cat_name = $cat->name;
$cat_slug = get_category_link($cat_id);
$img = '';
$img_m = '';
if (has_post_thumbnail()) {
    $img = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $img_m = get_the_post_thumbnail_url(get_the_ID(), 'large');
}
?>
<section class="uk-section-small">
<div class="uk-container">
<div class="uk-grid-divider" uk-grid>
<article id="post-main" class="post-main uk-article uk-width-expand@m">
<h1 class="uk-article-title"><?php echo $ttl; ?></h1>
<div class="uk-article-meta uk-flex">
<time class="uk-margin-right" datetime="<?php the_modified_time('Y-m-d'); ?>"><span class="uk-margin-small-right" uk-icon="history"></span><?php the_modified_time('Y.m.d'); ?></time>
<p class="uk-margin-remove-top uk-margin-remove-bottom uk-margin-right">
<a class="uk-link-text" href="<?php echo $cat_slug; ?>"><span class="uk-margin-small-right" uk-icon="folder"></span><?php echo $cat_name; ?></a>
</p>
</div>
<?php if ($img != ''): ?>
<figure>
<img data-src="<?php echo $img_m; ?>" alt="<?php echo $ttl; ?>" uk-img>
</figure>
<?php endif; ?>
<div id="toc" class="toc uk-section-muted"></div>
<div class="main-article">
<?php the_content(); ?>
<hr class="uk-divider-icon">
<?php echo do_shortcode('[addtoany]'); ?>
</div>
</article>
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php get_footer();