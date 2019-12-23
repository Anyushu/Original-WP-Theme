<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
if (have_posts()): ?>
<!-- article wrap -->
<div class="uk-grid-column-medium uk-grid-row-medium uk-child-width-1-2@m" uk-grid>
<?php
while (have_posts()):
the_post();
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
$thumbnail = '<img class="uk-width-expand" src="'.$img_m.'" srcset="'.$img_m.' 1x, '.$img.' 2x" alt="'.$ttl.'">';
?>
<article>
<a class="uk-link-toggle" href="<?php echo $permalink; ?>">
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
<?php endwhile; ?>
<!-- article wrap -->
</div>
<?php
endif;
if (function_exists('pagination')) {
    pagination($additional_loop->max_num_pages);
}
