<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
?>
<aside id="sidebar" class="uk-width-1-3@m">
<div class="uk-margin-large-bottom">
<h3 class="uk-heading-line uk-text-center uk-text-lead"><span>カテゴリー</span></h3>
<ul class="uk-list uk-list-bullet">
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
<div class="uk-flex-middle uk-margin-remove-top" uk-grid>
<div class="uk-width-auto">
<a class="uk-link-toggle" href="<?php echo $permalink; ?>" target="_blank">
<img width="80" height="80" src="<?php echo $img; ?>" srcset="<?php echo $img; ?> 1x, <?php echo $img; ?> 2x" alt="<?php echo $ttl; ?>">
</a>
</div>
<div class="uk-padding-small uk-width-expand">
<a class="uk-link-toggle" href="<?php echo $permalink; ?>" target="_blank">
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

<?php if (!is_page('ranking')): ?>
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
}
?>
<div class="uk-flex-middle uk-margin-remove-top" uk-grid>
<div class="uk-width-auto">
<a class="uk-link-toggle" href="<?php echo $permalink; ?>" target="_blank">
<img loading="lazy" width="80" height="80" src="<?php echo $img; ?>" srcset="<?php echo $img; ?> 1x, <?php echo $img; ?> 2x" alt="<?php echo $ttl; ?>">
</a>
</div>
<div class="uk-padding-small uk-width-expand">
<a class="uk-link-toggle" href="<?php echo $permalink; ?>" target="_blank">
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
<div class="uk-flex uk-flex-wrap">
<?php
$args=array(
    'orderby' => 'count',
    'order' => 'DESC',
    'number' => '15',
);
$posttags = get_tags($args);
if ($posttags) {
    foreach ($posttags as $tag) {
        echo '<a class="uk-badge uk-padding-small uk-margin-small-top uk-margin-small-right" href="'.get_tag_link($tag->term_id).'">#'.$tag->name.'</a>';
    }
}
?>
</div>
</div>

<div class="uk-margin-large-bottom">
<div class="uk-card uk-card-default uk-card-small uk-box-shadow-small">
<div class="uk-card-header">
<div class="uk-grid-small uk-flex-middle" uk-grid>
<div class="uk-width-auto">
<img loading="lazy" class="uk-border-circle" width="40" height="40" src="<?php echo $wp_url; ?>/lib/images/me.jpg" alt="Anyushuについて">
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
<a href="https://twitter.com/Anyushu" class="uk-icon-button uk-margin-small-right" uk-icon="twitter" target="_blank" rel="noopener noreferrer"></a>
<a href="https://www.facebook.com/Anyushu2017" class="uk-icon-button uk-margin-small-right" uk-icon="facebook" target="_blank" rel="noopener noreferrer"></a>
<a href="https://www.instagram.com/anyushu2017/" class="uk-icon-button uk-margin-small-right" uk-icon="instagram" target="_blank" rel="noopener noreferrer"></a>
<a href="mailto:info@anyushu.com" class="uk-icon-button" uk-icon="mail" target="_blank"></a>
</div>
</div>
</div>

<?php if (!is_user_logged_in()): ?>
<div class="side__ads">
<a href="https://px.a8.net/svt/ejp?a8mat=35PWPM+E22GZ6+CO4+102V9D" rel="nofollow">
<img alt="wpX" src="https://www26.a8.net/svt/bgt?aid=191005402850&wid=001&eno=01&mid=s00000001642006060000&mc=1"></a>
<img border="0" width="1" height="1" src="https://www11.a8.net/0.gif?a8mat=35PWPM+E22GZ6+CO4+102V9D" alt="A8net">
</div>
<?php endif; ?>

<?php dynamic_sidebar(); ?>

</aside>