<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
if (isset($_GET['s'])) {
    $s = $_GET['s'];
}
?>
<section class="uk-section-small">
<div class="uk-container">
<div class="uk-grid-divider" uk-grid>
<div class="uk-width-expand@m">
<h2 class="uk-heading-line uk-text-lead"><span>検索：<?php echo $s; ?></span></h2>
<?php get_template_part('loop'); ?>
</div>
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php get_footer();