<?php
get_header();
?>

<main>
    <div class="easyrealestate-container container">
        <h1>Kontakt</h1>
        <p>Bitte füllen Sie das folgende Formular aus, um mit uns in Kontakt zu treten.</p>

        <?php get_template_part('templates/forms/contact', 'form'); ?>

    </div>
</main>


<?php
the_content();
?>

<?php
get_footer();
?>