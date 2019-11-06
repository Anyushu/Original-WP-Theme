<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
if (!is_home() && !is_front_page()) {
    anyushu_breadcrumb();
}
?>

</main>
<footer>
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-6">
<div class="footer-section">
<a class="logo" href="<?php echo $home; ?>/"><img src="<?php echo $wp_url; ?>/lib/images/logo.svg" alt="<?php echo bloginfo('name'); ?>"></a>
<p class="copyright">Anyushu @ 2017. All rights reserved.</p>
<p class="copyright">Designed by<a href="https://colorlib.com/" rel="nofollow" target="_blank">Colorlib</a></p>
<ul class="icons">
<li>
<a href="https://twitter.com/Anyushu" target="_blank">
<i class="fab fa-twitter"></i>
</a>
<li>
<a href="https://www.facebook.com/Anyushu2017" target="_blank">
<i class="fab fa-facebook-f"></i>
</a>
</li>
<li>
<a href="https://www.instagram.com/anyushu2017/" target="_blank">
<i class="fab fa-instagram"></i>
</a>
</li>
<li>
<a href="https://www.pinterest.jp/anyushu/" target="_blank">
<i class="fab fa-pinterest"></i>
</a>
</li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-6">
<div class="footer-section">
<p class="title">記事カテゴリー</p>
<ul>
<?php wp_list_categories('orderby=ID&order=asc&title_li='); ?>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-6">
<div class="footer-section">
<p class="title">ページ一覧</p>
<ul>
<?php wp_list_pages('title_li='); ?>
</ul>
</div>
</div>
</div>
</div>
</footer>

<!-- script -->
<script src="<?php echo $wp_url; ?>/lib/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo $wp_url; ?>/lib/js/tether.min.js"></script>
<script src="<?php echo $wp_url; ?>/lib/js/bootstrap.js"></script>
<script src="<?php echo $wp_url; ?>/lib/js/scripts.js"></script>
<?php if (is_single()): ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<?php endif; ?>
<?php if (is_page()||is_single()): ?>
<script src="<?php echo $wp_url; ?>/lib/js/jquery.sticky-sidebar.min.js"></script>
<script>
$(window).on('load resize', function() {
  var w = $(window).width();
  var x = 991;
  if (w > x) {
    $('#sidebar').stickySidebar({
      topSpacing: 30,
      bottomSpacing: 30,
      containerSelector: '#main-wrap',
    });
  }
});
</script>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>