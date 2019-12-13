<?php

// 記事一覧アイキャッチ表示
function customize_manage_posts_columns($columns)
{
    $columns['thumbnail'] = __('Thumbnail');
    return $columns;
}
add_filter('manage_posts_columns', 'customize_manage_posts_columns');
function customize_manage_posts_custom_column($column_name, $post_id)
{
    if ('thumbnail' == $column_name) {
        $thum = get_the_post_thumbnail($post_id, 'thumbnail', array('style'=>'width:100px;height:auto'));
    }
    if (isset($thum) && $thum) {
        echo $thum;
    }
}
add_action('manage_posts_custom_column', 'customize_manage_posts_custom_column', 10, 2);

// サイト名取得
function get_site_title()
{
    return get_bloginfo('name');
}

// ページネーション
function pagination($pages = '', $range = 1)
{
    $showitems = ($range * 2)+1;
    $text_before = '<span uk-pagination-previous></span>';
    $text_next = '<span uk-pagination-next></span>';
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo '<ul class="uk-margin-large-top uk-pagination uk-flex-center">'."\n";
        if ($paged > 1 && $showitems < $pages) {
            echo '<li>'."<a class=\"page-link\" href='".get_pagenum_link($paged - 1)."'>{$text_before}</a></li>";
        }
        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)) {
                echo ($paged == $i)?
                '<li class="uk-active"><span>'.$i.'</span></li>'."\n":
                '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>'."\n";
            }
        }
        if ($paged < $pages && $showitems < $pages) {
            echo '<li>'."<a href=\"".get_pagenum_link($paged + 1)."\">{$text_next}</a></li>";
        }
        echo '</ul>'."\n";
    }
}

// iframe
function wrap_iframe_in_div($the_content)
{
    if (is_singular()) {
        $the_content = preg_replace('/<iframe/i', '<div class="iframe-container"><div class="iframe"><iframe', $the_content);
        $the_content = preg_replace('/<\/iframe>/i', '</iframe></div></div>', $the_content);
    }
    return $the_content;
}
add_filter('the_content', 'wrap_iframe_in_div');

// ブログカード
function nlink_scode($atts)
{
    extract(shortcode_atts(array(
        'url'=>'',
        'title'=>'',
    ), $atts));
    $id = url_to_postid($url);
    if (empty($title)) {
        $title = esc_html(get_the_title($id));
    }
    if (has_post_thumbnail($id)) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'thumbnail');
        $img_tag = "<img src='".$img[0]."' alt='{$title}'".">";
    }
    $nlink .='
<div class="blog-card">
<a href="'.$url.'" target="_blank">
<div class="blog-card-thumbnail">'.$img_tag.'</div>
<div class="blog-card-content"><p>'.$title.'</p></div>
<span class="clear"></span>
</a>
</div>';
    return $nlink;
}
add_shortcode('nlink', 'nlink_scode');

//レーティングスタータグの取得
if (!function_exists('get_rating_star_tag')) {
    function get_rating_star_tag($rate, $max = 5, $number = false)
    {
        $rate = floatval($rate);
        $max = intval($max);
        if (!is_numeric($rate) || !is_numeric($max)) {
            return $rate;
        }
        if ($rate > 100 && $max > 100) {
            return $rate;
        }
        $tag = '<div class="rating-star">';
        $rates = explode('.', $rate);
        if (!isset($rates[0])) {
            return $rate;
        }
        if (isset($rates[1])) {
            $has_herf = intval($rates[1]) == 5;
        } else {
            $has_herf = false;
        }
        if ($has_herf) {
            $before = intval($rates[0]);
            $middle = 1;
            $after = $max - 1 - $before;
        } else {
            $before = intval($rate);
            $middle = 0;
            $after = $max - $before;
            $rate = floor(floatval($rate));
        }
        for ($j=1; $j <= $before; $j++) {
            $tag .= '<i class="fas fa-star"></i>';
        }
        for ($j=1; $j <= $middle; $j++) {
            $tag .= '<i class="fas fa-star-half-alt"></i>';
        }
        for ($j=1; $j <= $after; $j++) {
            $tag .= '<i class="far fa-star"></i>';
        }
        if ($number) {
            $tag .= '<span class="rating-number">'.$rate.'</span>';
        }
        $tag .= '</div>';
        return $tag;
    }
}

//星ショートコード
if (!function_exists('rating_star_shortcode')) {
    function rating_star_shortcode($atts, $content = null)
    {
        extract(shortcode_atts(array('rate' => 5,'max' => 5,'number' => 1,), $atts));
        return get_rating_star_tag($rate, $max, $number);
    }
}
add_shortcode('star', 'rating_star_shortcode');

//popular post からquery_posts生成
function get_popular_args($range= "month", $limit = 5)
{
    $shortcode = '[wpp';
    $atts = '
          post_html="{url},"
          wpp_start=""
          wpp_end=""
          order_by="views"
          post_type="post"
          stats_comments=0
          stats_views=1';
    $atts_2 = ' range='. $range;
    $atts_3 = ' limit='. $limit;
    $shortcode .= ' ' . $atts . $atts_2 . $atts_3 . ']';
    $result = explode(",", strip_tags(do_shortcode($shortcode)));
    $ranked_post_ids = [];
    foreach ($result as $_url) {
        if (!empty($_url) && trim($_url) != '') {
            $id_string = url_to_postid($_url);
            array_push($ranked_post_ids, intval($id_string));
        }
    }
    $args = [
        'posts_per_page' => $limit,
        'post__in' => $ranked_post_ids,
        'orderby' => 'post__in'
    ];

    return $args;
}

// 固定ページ一覧
function get_page_list()
{
    $page_list = get_posts('order=desc&post_type=page');
    return $page_list;
}
