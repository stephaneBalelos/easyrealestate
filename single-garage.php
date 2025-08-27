<?php
get_header();
?>

<div class="easyrealestate-container">
    <div class="easyrealestate-hero" style="background-image: url(<?php the_field('bild'); ?>);">
        <div class="easyrealestate-hero-content">
            <span class="easyrealestate-badge easyrealestate-badge-success">Verfügbar</span>
        </div>
    </div>

    <div class="easyrealestate-features-list-container">
        <h1><?php the_field('name'); ?></h1>
        <ul class="easyrealestate-features-list">
            <li class="easyrealestate-feature-item">
                <img class="easyrealestate-feature-icon" src="<?php echo EASYREALESTATE_URL . '/dist/MdiArrowExpandAll.png'; ?>" alt="Feature 1">
                <span>12 m²</span>
            </li>
            <li class="easyrealestate-feature-item">
                <img class="easyrealestate-feature-icon" src="<?php echo EASYREALESTATE_URL . '/dist/MdiArrowExpandAll.png'; ?>" alt="Feature 1">
                <span>12 m²</span>
            </li>
            <li class="easyrealestate-feature-item">
                <img class="easyrealestate-feature-icon" src="<?php echo EASYREALESTATE_URL . '/dist/MdiArrowExpandAll.png'; ?>" alt="Feature 1">
                <span>12 m²</span>
            </li>
        </ul>
    </div>

    <?php the_content(); ?>
</div>

<div class="floating-cta">
    <div class="wp-block-button is-style-fill">
        <a class="wp-block-button__link wp-element-button">Jetzt Anfragen</a>
    </div>
</div>


<?php get_footer(); ?>