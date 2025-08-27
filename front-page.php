<?php
get_header();
?>

<main>
    <?php
if ('posts' == get_option('show_on_front')) {
    include(get_home_template());
} else {
    the_content();
}
?>
</main>


<?php get_footer(); ?>