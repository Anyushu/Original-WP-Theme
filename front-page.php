<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<section class="blog-area section">
<div class="container">
<div class="row">
<?php get_template_part('loop'); ?>
</div>
<div class="pagenavi">
<?php
if (function_exists('pagination')) {
    pagination($wp_query->max_num_pages);
}
?>
</div>
</div>
</section>
<?php get_footer();