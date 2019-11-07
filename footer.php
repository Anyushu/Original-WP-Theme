<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
if (!is_home() && !is_front_page()) {
    anyushu_breadcrumb();
}
?>
</main>
<!-- footer -->
<footer id="footer">
</footer>
<?php wp_footer(); ?>
</body>
</html>