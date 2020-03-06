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
        $img_tag = '<img loading="lazy" src="'.$img[0].'" alt="'.$title.'">';
    }
    $nlink .='
<div class="blog-card uk-box-shadow-small uk-box-shadow-hover-medium">
<a class="uk-link-toggle" href="'.$url.'" target="_blank">
<div class="blog-card-thumbnail">'.$img_tag.'</div>
<div class="blog-card-content"><p>'.$title.'</p></div>
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

// パンくず
function anyushu_breadcrumb($args = [])
{
    global $post;
    $str ='';
    $defaults = array(
        'class' => 'breadcrumb',
        'home' => 'TOP',
        'search' => 'の検索結果 ',
        'tag' => '',
        'author' => '',
        'notfound' => 'Hello! My Name Is 404',
    );
    $args = wp_parse_args($args, $defaults);
    extract($args, EXTR_SKIP);
    if (!is_home() && !is_admin()) {
        $str.= '<ul class="breadcrumb__list uk-breadcrumb uk-text-truncate uk-text-nowrap">';
        $str.= '<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. home_url() .'/" itemprop="url"><span class="icon-home" itemprop="title">'. $home .'</span></a></li>';
        $my_taxonomy = get_query_var('taxonomy');
        $cpt = get_query_var('post_type');
        if ($my_taxonomy && is_tax($my_taxonomy)) {
            $my_tax = get_queried_object();
            $post_types = get_taxonomy($my_taxonomy)->object_type;
            $cpt = $post_types[0];
            $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' .get_post_type_archive_link($cpt).'" itemprop="url"><span itemprop="title">'. get_post_type_object($cpt)->label.'</span></a></li>';
            if ($my_tax->parent != 0) {
                $ancestors = array_reverse(get_ancestors($my_tax->term_id, $my_tax->taxonomy));
                foreach ($ancestors as $ancestor) {
                    $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_term_link($ancestor, $my_tax->taxonomy) .'" itemprop="url"><span itemprop="title">'. get_term($ancestor, $my_tax->taxonomy)->name .'</span></a></li>';
                }
            }
            $str.='<li class="breadcrumb__item"><span>'. $my_tax->name.'</span></li>';
        } elseif (is_category()) {
            $cat = get_queried_object();
            if ($cat->parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach ($ancestors as $ancestor) {
                    $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($ancestor) .'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor) .'</span></a></li>';
                }
            }
            $str.='<li class="breadcrumb__item"><span>'. $cat->name.'</span></li>';
        } elseif (is_post_type_archive()) {
            $cpt = get_query_var('post_type');
            $str.='<li class="breadcrumb__item"><span>'. get_post_type_object($cpt)->label.'</span></li>';
        } elseif ($cpt && is_singular($cpt)) {
            $taxes = get_object_taxonomies($cpt);
            $mytax = $taxes[0];
            $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' .get_post_type_archive_link($cpt).'" itemprop="url"><span itemprop="title">'. get_post_type_object($cpt)->label.'</span></a></li>';
            $taxes = get_the_terms($post->ID, $mytax);
            $tax = get_youngest_tax($taxes, $mytax);
            if ($tax->parent != 0) {
                $ancestors = array_reverse(get_ancestors($tax->term_id, $mytax));
                foreach ($ancestors as $ancestor) {
                    $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_term_link($ancestor, $mytax).'" itemprop="url"><span itemprop="title">'. get_term($ancestor, $mytax)->name.'</span></a></li>';
                }
            }
            $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_term_link($tax, $mytax).'" itemprop="url"><span itemprop="title">'. $tax->name.'</span></a></li>';
            $str.= '<li class="breadcrumb__item"><span>'. $post->post_title .'</span></li>';
        } elseif (is_single()) {
            $categories = get_the_category($post->ID);
            $cat = get_youngest_cat($categories);
            if ($cat->parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach ($ancestors as $ancestor) {
                    $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($ancestor).'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor). '</span></a></li>';
                }
            }
            $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($cat->term_id). '" itemprop="url"><span itemprop="title">'. $cat->cat_name.'</span></a></li>';
            $str.= '<li class="breadcrumb__item"><span>'. $post->post_title .'</span></li>';
        } elseif (is_page()) {
            if ($post->post_parent != 0) {
                $ancestors = array_reverse(get_post_ancestors($post->ID));
                foreach ($ancestors as $ancestor) {
                    $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_permalink($ancestor).'" itemprop="url"><span itemprop="title">'. get_the_title($ancestor) .'</span></a></li>';
                }
            }
            $str.= '<li class="breadcrumb__item"><span>'. $post->post_title .'</span></li>';
        } elseif (is_date()) {
            if (get_query_var('day') != 0) {
                $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_year_link(get_query_var('year')). '" itemprop="url"><span itemprop="title">'.get_query_var('year'). '年</span></a></li>';
                $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '" itemprop="url"><span itemprop="title">'. get_query_var('monthnum') .'月</span></a></li>';
                $str.='<li class="breadcrumb__item">'. get_query_var('day'). '日</li>';
            } elseif (get_query_var('monthnum') != 0) {
                $str.='<li class="breadcrumb__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_year_link(get_query_var('year')) .'" itemprop="url"><span itemprop="title">'. get_query_var('year') .'年</span></a></li>';
                $str.='<li class="breadcrumb__item">'. get_query_var('monthnum'). '月</li>';
            } else {
                $str.='<li class="breadcrumb__item">'. get_query_var('year') .'年</li>';
            }
        } elseif (is_search()) {
            $str.='<li class="breadcrumb__item"><span>「'. get_search_query() .'」'. $search .'</span></li>';
        } elseif (is_author()) {
            $str .='<li class="breadcrumb__item"><span>'. $author.get_the_author_meta('display_name', get_query_var('author')).'</span></li>';
        } elseif (is_tag()) {
            $str.='<li class="breadcrumb__item"><span>'. $tag.single_tag_title('', false). '</span></li>';
        } elseif (is_attachment()) {
            $str.= '<li class="breadcrumb__item"><span>'. $post->post_title .'</span></li>';
        } elseif (is_404()) {
            $str.='<li class="breadcrumb__item"><span>'.$notfound.'</span></li>';
        } else {
            $str.='<li class="breadcrumb__item"><span>'. wp_title('', true) .'</span></li>';
        }
        $str.='</ul>';
    }
    echo $str;
}

function get_youngest_cat($categories)
{
    global $post;
    if (count($categories) == 1) {
        $youngest = $categories[0];
    } else {
        $count = 0;
        foreach ($categories as $category) {
            $children = get_term_children($category->term_id, 'category');
            if ($children) {
                if ($count < count($children)) {
                    $count = count($children);
                    $lot_children = $children;
                    foreach ($lot_children as $child) {
                        if (in_category($child, $post->ID)) {
                            $youngest = get_category($child);
                        }
                    }
                }
            } else {
                $youngest = $category;
            }
        }
    }
    return $youngest;
}
