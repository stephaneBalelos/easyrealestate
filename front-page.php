<?php
get_header();
?>

<?php
if ('posts' == get_option('show_on_front')) {
    include(get_home_template());
} else {
    the_content();
}

?>


<?php get_footer(); ?>