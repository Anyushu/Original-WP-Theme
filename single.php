<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
the_post();
$post_id = get_the_ID();
$ttl = get_the_title();
$permalink = get_the_permalink();
$cat = get_the_category();
$cat = $cat[0];
$cat_id = $cat->term_id;
$cat_name = $cat->name;
$img = '';
$img_m = '';
if (has_post_thumbnail()) {
    $img = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $img_m = get_the_post_thumbnail_url(get_the_ID(), 'large');
    if ($img == false) {
        $img = $wp_url.'/lib/images/blog-1-1000x600.jpg';
        $img_m = $wp_url.'/lib/images/blog-1-1000x600.jpg';
    }
} else {
    $img = $wp_url.'/lib/images/blog-1-1000x600.jpg';
    $img_m = $wp_url.'/lib/images/blog-1-1000x600.jpg';
}
?>
<section class="uk-section-small">
<div class="uk-container">
<div class="uk-grid-divider" uk-grid>
<article class="uk-article uk-width-expand@m">
<h1 class="uk-article-title"><?php echo $ttl; ?></h1>
<div class="uk-article-meta uk-flex">
<p class="uk-margin-right"><span class="uk-margin-small-right" uk-icon="folder"></span><?php echo $cat_name; ?></p>
<time datetime="<?php the_modified_time('Y-m-d'); ?>"><span class="uk-margin-small-right" uk-icon="history"></span><?php the_modified_time('Y.m.d'); ?></time>
</div>
<figure>
<img data-src="<?php echo $img_m; ?>" alt="<?php echo $ttl; ?>" uk-img>
</figure>
<?php the_content(); ?>
</article>
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php get_footer();