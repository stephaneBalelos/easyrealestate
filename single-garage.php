<?php
get_header();
?>

<div class="easyrealestate-container">
    <div class="easyrealestate-hero" style="background-image: url(<?php the_field('bild'); ?>);">
        <div class="easyrealestate-hero-content">
            <?php if (get_field('is_available')) : ?>
                <span class="easyrealestate-badge easyrealestate-badge-success">Verfügbar</span>
            <?php else : ?>
                <span class="easyrealestate-badge easyrealestate-badge-error">Nicht verfügbar</span>
            <?php endif; ?>
        </div>
    </div>

    <div class="easyrealestate-features-list-container">
        <h1><?php the_field('name'); ?></h1>
        <ul class="easyrealestate-features-list">
            <?php
            $features = get_field('features');
            ?>
            <?php foreach ($features as $feature): ?>
            <li class="easyrealestate-feature-item">
                <img class="easyrealestate-feature-icon" src="<?php echo esc_url($feature['icon']); ?>" alt="<?php echo esc_attr($feature['name']); ?>">
                <span><?php echo esc_html($feature['label']); ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <?php the_content(); ?>
</div>

<div class="floating-cta">
    <?php if (get_field('is_available')) : ?>
        <div class="wp-block-button is-style-fill">
            <a class="wp-block-button__link wp-element-button">Jetzt Anfragen</a>
        </div>
    <?php else : ?>
        <div class="wp-block-button is-style-fill">
            <a class="wp-block-button__link wp-element-button">Auf der Warteliste anmelden</a>
        </div>
    <?php endif; ?>
</div>


<?php wp_footer(); ?>