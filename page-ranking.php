<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
?>
<section class="uk-section-small">
<div class="uk-container">
<div class="uk-grid-divider" uk-grid>
<section class="uk-article uk-width-expand@m">
<h2 class="uk-heading-line uk-text-lead"><span>人気記事</span></h2>
<div class="uk-grid-column-medium uk-grid-row-medium uk-child-width-1-2@m" uk-grid>
<?php
$args = get_popular_args('monthly', 10);
$posts = get_posts($args);
foreach ($posts as $post):
$id = get_the_ID();
$ttl = get_the_title();
$permalink = get_the_permalink();
$cat = get_the_category();
$cat_name = $cat[0]->name;
$img = '';
$img_m = '';
if (has_post_thumbnail()) {
    $img = get_the_post_thumbnail_url($id, 'large');
    $img_m = get_the_post_thumbnail_url($id, 'medium');
}
$thumbnail = '<img loading="lazy" class="uk-width-expand" src="'.$img_m.'" srcset="'.$img_m.' 1x, '.$img.' 2x" alt="'.$ttl.'">';
?>
<article>
<a class="uk-link-toggle" href="<?php echo $permalink; ?>" target="_blank">
<div class="uk-card uk-card-default uk-box-shadow-hover-large uk-card-small uk-box-shadow-small">
<div class="uk-card-media-top">
<?php echo $thumbnail; ?>
</div>
<div class="uk-card-body">
<h3 class="uk-card-title uk-margin-remove-top"><?php echo $ttl; ?></h3>
<p class="uk-margin-remove uk-text-right"><span class="uk-label"><?php echo $cat_name; ?></span></p>
</div>
</div>
</a>
</article>
<?php endforeach; ?>
<!-- article wrap -->
</div>
</section>
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php get_footer();