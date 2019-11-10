<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
?>
<aside id="sidebar" class="col-md-3 ml-auto bg-white">
<div class="single-post info-area">
<div class="popular-area sidebar-area">
<h3 class="h5 title">今月の人気記事</h3>
<ol class="popular-posts">
<?php
$args = get_popular_args('monthly', '5');
$posts = get_posts($args);
foreach ($posts as $post):
$ttl = get_the_title();
$permalink = get_the_permalink();
$comment = get_comments_number(get_the_ID());
$view = getPostViews(get_the_ID());
$excerpt = get_the_excerpt();
$img = '';
if (has_post_thumbnail()) {
    $img = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
    if ($img == false) {
        $img = $wp_url.'/lib/images/blog-1-1000x600.jpg';
    }
} else {
    $img = $wp_url.'/lib/images/blog-1-1000x600.jpg';
}
?>
<li>
<a href="<?php echo $permalink; ?>"><img src="<?php echo $img; ?>" alt="<?php echo $ttl; ?>"></a>
<a href="<?php echo $permalink; ?>"><?php echo $ttl; ?></a>
</li>
<?php
endforeach;
wp_reset_query();
?>
</ol>
</div>
<?php if (is_single()):
foreach ((get_the_category()) as $cat) {
    $catid = $cat->cat_ID ;
    break ;
}
?>
<div class="popular-area sidebar-area">
<h3 class="h5 title">関連記事</h3>
<ol class="popular-posts">
<?php
$posts = get_posts('numberposts=6&category='.$catid.'&orderby=rand&exclude='.get_the_ID());
foreach ($posts as $post):
$ttl = get_the_title();
$permalink = get_the_permalink();
$comment = get_comments_number(get_the_ID());
$view = getPostViews(get_the_ID());
$excerpt = get_the_excerpt();
$img = '';
if (has_post_thumbnail()) {
    $img = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
    if ($img == false) {
        $img = $wp_url.'/lib/images/blog-1-1000x600.jpg';
    }
} else {
    $img = $wp_url.'/lib/images/blog-1-1000x600.jpg';
}
?>
<li>
<a href="<?php echo $permalink; ?>"><img src="<?php echo $img; ?>" alt="<?php echo $ttl; ?>"></a>
<a href="<?php echo $permalink; ?>"><?php echo $ttl; ?></a>
</li>
<?php
endforeach;
wp_reset_query();
?>
</ol>
</div>
<?php endif; ?>

<div class="sidebar-area tag-area">
<h3 class="h5 title">おすすめタグ</h3>
<ul>
<?php
$args=array(
    'orderby' => 'count',
    'order' => 'DESC',
    'number' => '15',
);
$posttags = get_tags($args);
if ($posttags) {
    foreach ($posttags as $tag) {
        echo '<li><a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a></li>';
    }
}
?>
</ul>
</div>
<?php dynamic_sidebar('side-bar'); ?>
</div>
</aside>