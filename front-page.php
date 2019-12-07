<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>
<div class="jumbotron">
<div class="container container-lg">
<h2 class="display-3">映画・WEB中心のメディアサイト〜Anyushu〜</h2>
<p class="m-0">主に映画とWebについての記事を投稿するブログ「Anyushu」です。
<br>しがないWebエンジニア一人で頑張って記事を更新しています。温かい目で見守ってやって下さい。</p>
</div>
</div>
<section class="py-3">
<div class="container container-lg">
<?php get_template_part('loop'); ?>
</div>
</section>
<?php get_footer();