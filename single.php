<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header();
the_post();
$ttl = get_the_title();
$permalink = get_the_permalink();
$cat = get_the_category();
$cat = $cat[0];
$cat_id = $cat->term_id;
$post_id = get_the_ID();
$user = get_users(get_the_ID());
$user_id = $user[0]->ID;
$user_name = get_the_author();;
$avatar = get_avatar_url($user_id, 120);
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<section id="post-content" class="py-md-5 py-4">
<div class="container">
<div class="row">
<article class="col-md-9 bg-white">
<?php the_content(); ?>
</article>
<?php get_sidebar(); ?>
</div>
</div>
</section>

<?php get_footer();
