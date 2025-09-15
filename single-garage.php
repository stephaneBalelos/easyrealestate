<?php
get_header();
?>

<div class="easyrealestate-container">
    <?php
    $images = [];
    $thumbnails = [];
    $main_image = get_field('bild');
    $bilder = get_field('bilder');

    // Push main image to the front of the array
    array_unshift($images, [
        'url' => $main_image['sizes']['medium_large'],
        'description' => get_field('name'),
    ]);
    // Push main image to the front of the array
    array_unshift($thumbnails, [
        'url' => $main_image['sizes']['thumbnail'],
        'description' => get_field('name'),
    ]);

    if ($bilder && count($bilder) > 0) {
        foreach ($bilder as $item) {
            $images[] = [
                'url' => $item['bild_item_image']['sizes']['medium_large'],
                'description' => $item['bild_item_beschreibung'],
            ];
            $thumbnails[] = [
                'url' => $item['bild_item_image']['sizes']['thumbnail'],
                'description' => $item['bild_item_beschreibung'],
            ];
        }
    }
    ?>
    <div class="easyrealestate-hero">
        <?php if (get_field('is_available')) : ?>
            <span class="easyrealestate-badge easyrealestate-badge-success">Verfügbar</span>
        <?php else : ?>
            <span class="easyrealestate-badge easyrealestate-badge-error">Nicht verfügbar</span>
        <?php endif; ?>

        <?php get_template_part('templates/sliders/gallery', 'slider', array(
            'images' => $images,
            'thumbnails' => $thumbnails,
            'show_thumbnails' => count($thumbnails) > 1,
        )); ?>
    </div>

    <div class="easyrealestate-features-list-container">
        <?php if (!get_field('is_available')) : ?>
            <div class="easyrealestate-features-list-top">
                <div class="easyrealestate-alert is-error">
                    <div class="easyrealestate-alert-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 2a10 10 0 0 0-10 10c0 5.25 4.25 9.5 9.5 9.95V22h1v-1.05C17.75 21.5 22 17.25 22 12a10 10 0 0 0-10-10zm0 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm-1-13h2v6h-2zm0 8h2v2h-2z" />
                        </svg>
                    </div>
                    <div class="easyrealestate-alert-content">
                        <strong>Keine Verfügbarkeit:</strong> Auf diesen Garagenhof ist momentan keine Verfügbarkeit gegeben.
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="easyrealestate-features-list-header">
            <div class="easyrealestate-features-list-header-content">
                <h1><?php the_field('name'); ?></h1>
                <p>
                    <?php the_field('description'); ?>
                </p>
            </div>
            <?php if (get_field('datei')) : ?>
                <div class="easyrealestate-features-list-header-action">
                    <div class="wp-block-button is-style-fill">
                        <a href="<?php echo esc_url(get_field('datei')); ?>" target="_blank" class="wp-block-button__link wp-element-button">
                            <span>Flyer herunterladen</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE -->
                                <path fill="currentColor" d="m14 2l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm4 18V9h-5V4H6v16zm-6-1l-4-4h2.5v-3h3v3H16z" />
                            </svg>
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