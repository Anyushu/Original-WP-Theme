<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
the_post();
$ttl = get_the_title();
$permalink = get_the_permalink();
$cat = get_the_category();
$cat = $cat[0];
$cat_id = $cat->term_id;
$post_id = get_the_ID();
$user = get_users(get_the_ID());
$user_id = $user[0]->ID;
$user_name = get_the_author();;
$avatar = get_avatar_url($user_id, 120);
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>
<article class="post-area section">
<div class="container">
<div id="main-wrap" class="row">
<div id="main-content" class="col-lg-8 col-md-12 no-right-padding">
<div class="main-post">
<div class="blog-post-inner">
<div class="post-thumbnail mb-3">
<img src="<?php echo $img; ?>" alt="<?php echo $ttl; ?>">
</div>
<h1 class="title post-ttl"><a href="<?php echo $permalink; ?>" title="<?php echo $ttl; ?>"><?php echo $ttl; ?></a></h1>
<div class="updated-date text-right mb-4">
<a class="mr-4" href="<?php echo $home.'/'.$cat->slug; ?>">
<i class="mr-2 fas fa-folder"></i><?php echo get_cat_name($cat->term_id); ?></a>
<time datetime="<?php the_modified_date('Y-m-d'); ?>"><i class="mr-2 fas fa-sync"></i><?php the_modified_date('Y. m. d'); ?></time>
</div>
<div class="post-inner content mt-3">
<?php the_content(); ?>
</div>
<ul class="tags">
<?php
$tags = get_the_tags();
if ($tags):
foreach ($tags as $tag):
?>
<li>
<a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
</li>
<?php endforeach; endif; ?>
</ul>
</div>

<div class="post-info">
<div class="left-area">
<a class="avatar" href="https://twitter.com/Anyushu" rel="nofollow" target="_blank"><img src="<?php echo $avatar; ?>" alt="Anyushu"></a>
</div>
<div class="middle-area">
<a class="name" href="https://twitter.com/Anyushu" rel="nofollow" target="_blank">
<?php echo $user_name; ?>
</a>
<time datetime="<?php the_time('Y-m-d')?>" class="date">&nbsp;on&nbsp;<?php the_time('Y. m. d')?></time>
</div>
</div>
<div class="post-icons-area">
<ul class="post-icons">
<li>
<a href="<?php echo $home.'/'.$cat->slug; ?>">
<i class="fas fa-folder"></i><?php echo get_cat_name($cat->term_id); ?></a>
</li>
<li>
<a href="<?php echo $permalink; ?>" title="<?php echo $ttl; ?>">
<i class="fas fa-eye"></i><?php if (function_exists('wpp_get_views')) echo wpp_get_views($post_id, 'all'); ?></a>
</li>
</ul>
<ul class="icons">
<li>SHARE :</li>
<li>
<a href="https://www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" rel="nofollow" target="_blank">
<i class="fab fa-facebook-f"></i>
</a>
</li>
<li>
<a href="https://twitter.com/intent/tweet?text=<?php echo $permalink; ?>&<?php echo $ttl; ?>" rel="nofollow" target="_blank">
<i class="fab fa-twitter"></i>
</a>
</li>
<li>
<a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&media=<?php echo $img_full; ?>&description=" rel="nofollow" target="_blank">
<i class="fab fa-pinterest"></i>
</a>
</li>
<li>
<a href="https://feedly.com/i/subscription/feed%2Fhttps%3A%2F%2Fanyushu.com%2Ffeed%2F" rel="nofollow" target="blank">
<i class="fas fa-rss"></i>
</a>
</li>
</ul>
</div>
</div>
</div>
<?php get_sidebar(); ?>
</div>
</div>
</article>
<?php
foreach ((get_the_category()) as $cat) {
    $catid = $cat->cat_ID ;
    break ;
}
?>
<section class="blog-area section">
<div class="container">
<h3 class="title mb-5 text-center">他のおすすめ記事</h3>
<div class="row">
<?php
$posts = get_posts('numberposts=6&category='.$catid.'&orderby=rand&exclude='.get_the_ID());
foreach($posts as $post):
$ttl = get_the_title();
$permalink = get_the_permalink();
$comment = get_comments_number(get_the_ID());
$view = getPostViews(get_the_ID());
$excerpt = get_the_excerpt();
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
<h4 class="title"><a href="<?php echo $permalink; ?>"><?php echo $ttl; ?></a></h4>
<time class="blog-info-time" datetime="<?php the_time('Y-m-d'); ?>"><i class="far fa-calendar-alt"></i><?php the_time('Y.m.d'); ?></time>
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
<?php
endforeach;
wp_reset_query();
?>
</div>
<div class="text-center">
<a class="load-more-btn" href="<?php echo get_category_link($cat_id); ?>">もっと読む</a>
</div>
</div>
</section>
<?php get_footer();