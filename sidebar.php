<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
?>
<aside id="sidebar" class="uk-width-1-3@m">
<div class="uk-margin-large-bottom">
<h3 class="uk-heading-line uk-text-center uk-text-lead"><span>カテゴリー</span></h3>
<ul class="uk-list">
<?php
$args = [
    'orderby' => 'id',
    'order' => 'asc',
    'hide_empty' => 0,
];
$categories = get_categories($args);
foreach ($categories as $category):
    $cat_link = get_category_link($category->term_id);
    $cat_name = $category->name;
?>
<li><a class="uk-link-text" href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a></li>
<?php endforeach; ?>
</ul>
</div>
<div class="uk-margin-large-bottom">
<h3 class="uk-heading-line uk-text-center uk-text-lead"><span>今月の人気記事</span></h3>
<?php
$args = get_popular_args('monthly', '5');
$posts = get_posts($args);
foreach ($posts as $post):
$ttl = get_the_title();
$permalink = get_the_permalink();
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
<div class="uk-flex-middle" uk-grid>
<div class="uk-width-auto">
<a class="uk-link-toggle" href="<?php echo $permalink; ?>">
<img width="80" height="80" src="<?php echo $img; ?>" alt="<?php echo $ttl; ?>">
</a>
</div>
<div class="uk-padding-small uk-width-expand">
<a class="uk-link-toggle" href="<?php echo $permalink; ?>">
<h4 class="uk-text-small uk-card-title uk-margin-remove-bottom"><?php echo $ttl; ?></h4>
<p class="uk-text-meta uk-margin-small-top uk-margin-remove-bottom"><time datetime="<?php the_modified_time('Y-m-d'); ?>"><?php the_modified_time('Y.m.d'); ?></time></p>
</a>
</div>
</div>
<?php
endforeach;
wp_reset_query();
?>
</div>

<?php if (is_single()):
foreach ((get_the_category()) as $cat) {
    $catid = $cat->cat_ID ;
    break ;
}
?>
<div class="uk-margin-large-bottom">
<h3 class="uk-heading-line uk-text-center uk-text-lead"><span>関連記事</span></h3>
<?php
$posts = get_posts('numberposts=5&category='.$catid.'&orderby=rand&exclude='.get_the_ID());
foreach ($posts as $post):
$ttl = get_the_title();
$permalink = get_the_permalink();
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
<div class="uk-flex-middle" uk-grid>
<div class="uk-width-auto">
<a class="uk-link-toggle" href="<?php echo $permalink; ?>">
<img width="80" height="80" src="<?php echo $img; ?>" alt="<?php echo $ttl; ?>">
</a>
</div>
<div class="uk-padding-small uk-width-expand">
<a class="uk-link-toggle" href="<?php echo $permalink; ?>">
<h4 class="uk-text-small uk-card-title uk-margin-remove-bottom"><?php echo $ttl; ?></h4>
<p class="uk-text-meta uk-margin-small-top uk-margin-remove-bottom"><time datetime="<?php the_modified_time('Y-m-d'); ?>"><?php the_modified_time('Y.m.d'); ?></time></p>
</a>
</div>
</div>
<?php
endforeach;
wp_reset_query();
?>
</div>
<?php endif; ?>
<div class="uk-margin-large-bottom">
<h3 class="uk-heading-line uk-text-center uk-text-lead"><span>おすすめタグ</span></h3>
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
<div class="uk-margin-large-bottom">
<div class="uk-card uk-card-default uk-card-small uk-box-shadow-small">
<div class="uk-card-header">
<div class="uk-grid-small uk-flex-middle" uk-grid>
<div class="uk-width-auto">
<img class="uk-border-circle" width="40" height="40" src="<?php echo $wp_url; ?>/lib/images/me.jpg" alt="Anyushuについて">
</div>
<div class="uk-width-expand">
<h3 class="uk-card-title uk-margin-remove-bottom">Anyushuについて</h3>
</div>
</div>
</div>
<div class="uk-card-body">
<p>主に映画とWebについての記事を投稿するブログ「Anyushu」です。現役のWebエンジニアが記事を更新しています。</p>
</div>
<div class="uk-card-footer">
<a href="https://twitter.com/Anyushu" class="uk-icon-button uk-margin-small-right" uk-icon="twitter" target="_blank"></a>
<a href="https://www.facebook.com/Anyushu2017" class="uk-icon-button uk-margin-small-right" uk-icon="facebook" target="_blank"></a>
<a href="https://www.instagram.com/anyushu2017/" class="uk-icon-button" uk-icon="instagram" target="_blank"></a>
</div>
</div>
</div>
</aside>