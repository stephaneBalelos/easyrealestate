<?php
get_header();
?>

<?php
if ('posts' == get_option('show_on_front')) {
    include(get_home_template());
} else {
    // Custom content markup goes here
    echo '<h1>Welcome to the Custom Front Page</h1>';
    echo '<p>This is a static front page.</p>';
}

?>

<?php the_content(); ?>



<?php get_footer(); ?>