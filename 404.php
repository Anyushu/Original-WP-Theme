<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
the_post();
$id = get_the_ID();
$ttl = get_the_title();
$permalink = get_the_permalink();
?>
<section class="uk-section-small">
<div class="uk-container">
<div class="uk-grid-divider" uk-grid>
<section class="uk-article uk-width-expand@m">
<h2 class="uk-article-title">404 Not found！</h2>
<p>お探しのページは見つかりませんでした。</p>
<form class="uk-search uk-search-default" action="<?php echo $home; ?>" method="get">
<button class="uk-search-icon-flip" type="submit" uk-search-icon></button>
<input class="uk-search-input" type="search" name="s" placeholder="記事を探す">
</form>
</section>
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php get_footer();