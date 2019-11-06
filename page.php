<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
the_post();
$ttl = get_the_title();
$permalink = get_the_permalink();
$img = get_the_post_thumbnail_url(get_the_ID(), 'large');
$img_full = get_the_post_thumbnail_url(get_the_ID(), 'full');
$comment = get_comments_number(get_the_ID());
$view = getPostViews(get_the_ID());
$user = get_users(get_the_ID());
$user_id = $user[0]->ID;
$user_name = get_the_author();;
$avatar = get_avatar_url($user_id, 120);
?>
<div class="slider">
<div class="display-table  center-text">
<h2 class="h1 title display-table-cell"><?php the_title(); ?></h2>
</div>
</div>
<section class="post-area section">
<div class="container">
<div id="main-wrap" class="row">
<div id="main-content" class="col-lg-8 col-md-12 no-right-padding">
<div class="main-post">
<div class="blog-post-inner">
<div class="post-inner content">
<?php the_content(); ?>
</div>
</div>
<div class="post-icons-area">
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
</section>
<?php get_footer();