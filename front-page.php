<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>

<div class="jumbotron">
<div class="container">
<h1 class="display-3">映画・WEB中心のメディアサイト〜Anyushu〜</h1>
<p>主に映画とWebについての記事を投稿するブログ「Anyushu」です。
<br>しがないWebエンジニア一人で頑張って記事を更新しています。温かい目で見守ってやって下さい。</p>
<p><a class="btn btn-default btn-lg" href="#" role="button">詳しく見る</a></p>
</div>
</div>

<?php get_footer();