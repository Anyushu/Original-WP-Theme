<?php
get_header();

$wp_styles = wp_styles();
$wp_scripts = wp_scripts(); ?>

<section class="uk-section-small">
<div class="uk-container">
<?php
echo "=css= <br>";

foreach ($wp_styles->queue as $handle) {
    echo $handle.'<br>';
}

echo "<br>=scripts= <br>";

foreach ($wp_scripts->queue as $handle) {
    echo $handle.'<br>';
}
?>
</div>
</section>

<?php
get_footer();
