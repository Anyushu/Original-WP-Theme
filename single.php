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

<section id="post-content" class="py-md-5 py-4">
<div class="container container-lg">
<div class="row">
<article class="col-md-8">
<div class="post-content bg-white p-md-5 p-4">
<header class="post-header mb-5">
<h1 class="display-4 post-title"><?php echo $ttl; ?></h1>
<div class="post-data text-right">
<time class="font-weight-bold" datetime="<?php the_time('Y-m-d'); ?>"><i class="far fa-calendar-alt mr-1"></i><?php the_time('Y/m/d'); ?></time>
</div>
</header>
<div class="post-content">
<div class="post-thumbnail mb-3">
<?php echo $thumbnail; ?>
</div>
<?php the_content(); ?>
</div>
</div>
</article>
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer();
