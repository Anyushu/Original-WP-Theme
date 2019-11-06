<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
the_post();
$ttl = get_the_title();
$permalink = get_the_permalink();
?>
<div class="slider">
<div class="display-table  center-text">
<h2 class="h1 title display-table-cell">404 Not found！</h2>
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
<div class="post-inner content">
<h2 class="h4">お探しのページは見つかりませんでした。</h2>
</div>
</div>
</div>
</div>
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php get_footer();