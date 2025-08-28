<?php
get_header();
?>

<main class="easyrealestate-container">
    <h1>
        404 - Seite nicht gefunden
    </h1>

    <p>Die von Ihnen gesuchte Seite konnte nicht gefunden werden.</p>

    <div class="wp-block-button is-style-fill">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="wp-block-button__link wp-element-button">Zurück zur Startseite</a>
    </div>
</main>

<?php get_footer(); ?>