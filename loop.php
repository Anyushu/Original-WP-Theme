<div class="row">
<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
if (have_posts()): while (have_posts()):
the_post();
$ttl = get_the_title();
$permalink = get_the_permalink();
$cat = get_the_category();
$cat_name = $cat[0]->name;
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
$thumbnail = '<img class="card-img-top" src="'.$img_m.'" srcset="'.$img_m.' 1x, '.$img.' 2x" alt="'.$ttl.'">';
?>
<div class="col-lg-4 col-md-6">
<div class="card">
<a href="<?php echo $permalink; ?>">
<?php echo $thumbnail; ?>
<div class="card-body">
<h2 class="h3 text-dark font-weight-bold"><?php echo $ttl; ?></h2>
<div class="text-right">
<span class="badge badge-pill badge-primary"><?php echo $cat_name; ?></span>
</div>
</div>
</a>
</div>
</div>
<?php endwhile; ?>
</div>
<?php
endif;
if (function_exists('pagination')) {
    pagination($additional_loop->max_num_pages);
}
