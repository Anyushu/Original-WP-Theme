<?php
$home = esc_url(home_url());
$wp_url = get_template_directory_uri();
get_header(); ?>

<div class="jumbotron py-4 py-md-5">
<div class="container">
<div class="col-md-6 px-0">
<h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
<p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
<p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
</div>
</div>
</div>

<?php get_footer();