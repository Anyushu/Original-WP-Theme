<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
if (isset($_GET['s'])) {
    $s = $_GET['s'];
}
?>
<div class="slider display-table center-text">
<h2 class="h1 title display-table-cell">Search：「<?php echo $s; ?>」</h2>
</div>
<section class="blog-area section">
<div class="container">
<div class="row">
<?php get_template_part('loop'); ?>
</div>
<div class="pagenavi">
<?php
if (function_exists("pagination")) {
    pagination($wp_query->max_num_pages);
}
?>
</div>
</div>
</section>
<?php get_footer();