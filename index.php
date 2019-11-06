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
<div class="row">
<div class="col-lg-8 col-md-12 no-right-padding">
<div class="main-post">
<div class="blog-post-inner">
<h2 class="title post-ttl">
<a href="<?php echo $permalink; ?>">
<?php echo $ttl; ?>
</a>
</h2>
<article class="post-inner content">
<?php the_content(); ?>
</article>
</div>
<div class="post-icons-area">
<ul class="icons">
<li>SHARE :</li>
<li>
<a href="https://www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" rel="nofollow" target="_blank">
<i class="ion-social-facebook"></i>
</a>
</li>
<li>
<a href="https://twitter.com/intent/tweet?text=<?php echo $permalink; ?>&<?php echo $ttl; ?>" rel="nofollow" target="_blank">
<i class="ion-social-twitter"></i>
</a>
</li>
<li>
<a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&media=<?php echo $img_full; ?>&description=" rel="nofollow" target="_blank">
<i class="ion-social-pinterest"></i>
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