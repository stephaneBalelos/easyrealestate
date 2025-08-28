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
        <div class="features-list-header">
            <div class="features-list-header-content">
                <h1><?php the_field('name'); ?></h1>
                <p>
                    <?php the_field('description'); ?>
                </p>
            </div>
            <?php if (get_field('datei')) : ?>
            <div class="features-list-header-action">
                <div class="wp-block-button is-style-fill">
                    <a href="<?php echo esc_url(get_field('datei')); ?>" target="_blank" class="wp-block-button__link wp-element-button">
                        <span>Flyer herunterladen</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE --><path fill="currentColor" d="m14 2l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm4 18V9h-5V4H6v16zm-6-1l-4-4h2.5v-3h3v3H16z"/></svg>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
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

        <div class="easyrealestate-the-content">
            <?php the_content(); ?>
        </div>
    </div>

    <?php get_template_part('templates/forms/contact', 'form', array(
        'item_id' => get_the_ID(),
        'item_name' => get_field('name'),
    )); ?>
</div>

<!-- <div class="floating-cta">
    <?php if (get_field('is_available')) : ?>
        <div class="wp-block-button is-style-fill">
            <a class="wp-block-button__link wp-element-button">Jetzt Anfragen</a>
        </div>
    <?php else : ?>
        <div class="wp-block-button is-style-fill">
            <a class="wp-block-button__link wp-element-button" aria-disabled="true" tabindex="-1">Auf der Warteliste anmelden</a>
        </div>
    <?php endif; ?>
</div> -->


<?php get_footer(); ?>