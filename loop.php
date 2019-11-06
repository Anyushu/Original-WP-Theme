<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
if (have_posts()): while (have_posts()):
the_post();
$ttl = get_the_title();
$permalink = get_the_permalink();
$cat = get_the_category();
$excerpt = get_the_excerpt();
$cat = $cat[0];
$img = '';
if (has_post_thumbnail()) {
    $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
    $img_m = get_the_post_thumbnail_url(get_the_ID(), 'medium');
    if ($img == false) {
        $img = $wp_url.'/lib/images/blog-1-1000x600.jpg';
        $img_m = $wp_url.'/lib/images/blog-1-1000x600.jpg';
    }
} else {
    $img = $wp_url.'/lib/images/blog-1-1000x600.jpg';
    $img_m = $wp_url.'/lib/images/blog-1-1000x600.jpg';
}
?>

<div class="col-lg-4 col-md-6">
<div class="card h-100">
<div class="single-post post-style-1">
<div class="blog-image">
<a href="<?php echo $permalink; ?>" title="<?php echo $ttl; ?>">
<img src="<?php echo $img_m; ?>" srcset="<?php echo $img_m; ?> 1x,<?php echo $img; ?> 2x" alt="<?php echo $ttl; ?>">
</a>
</div>
<div class="blog-info">
<h2 class="title"><a href="<?php echo $permalink; ?>"><?php echo $ttl; ?></a></h2>
<time class="blog-info-time" datetime="<?php the_time('Y-m-d'); ?>"><i class="mr-2 far fa-calendar-alt"></i><?php the_time('Y.m.d'); ?></time>
<ul class="post-footer">
<li>
<a href="<?php echo $home.'/'.$cat->slug; ?>">
<i class="fas fa-folder"></i><?php echo get_cat_name($cat->term_id); ?></a>
</li>
<li>
<span>
<i class="fas fa-eye"></i><?php if (function_exists('wpp_get_views')) echo wpp_get_views(get_the_ID(), 'all'); ?></span>
</li>
</ul>
</div>
</div>
</div>
</div>
<?php endwhile;
else:
?>
<p class="h3">I'm sorry. Not found</p>
<?php endif;
