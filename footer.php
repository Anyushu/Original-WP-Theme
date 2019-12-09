<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri(); ?>
</main>
<!-- footer -->
<footer class="footer" data-background-color="black">
<div class="container">
<nav class="float-left">
<ul>
<li>
<a href="https://www.creative-tim.com">Creative Tim</a>
</li>
<li>
<a href="https://creative-tim.com/presentation">About Us</a>
</li>
<li>
<a href="http://blog.creative-tim.com">Blog</a>
</li>
<li>
<a href="https://www.creative-tim.com/license">Licenses</a>
</li>
</ul>
</nav>
<div class="copyright float-right">&copy;<?php echo date('Y').''.bloginfo('name'); ?></div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>