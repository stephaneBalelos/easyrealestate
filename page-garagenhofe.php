<?php
get_header();

$posts = get_posts(array(
    'post_type' => 'garage',
    'posts_per_page' => 9999,
));

$gm_api_key = get_field('gm_api_key', 'option');
$gm_map_id = get_field('gm_map_id', 'option');
$map_center = get_field('map_center', 'option');
$map_zoom = get_field('map_initial_zoom', 'option');
?>

<main>
    <div class="easyrealestate-app-container">
        <div class="easyrealestate-app-content">
            <div class="easyrealestate-app-map">
                <div class="map"
                    api-key="<?php echo esc_attr($gm_api_key); ?>"
                    map-id="<?php echo esc_attr($gm_map_id); ?>"
                    center-lat="<?php echo esc_attr($map_center['latitude']); ?>"
                    center-lng="<?php echo esc_attr($map_center['longitude']); ?>"
                    zoom="<?php echo esc_attr($map_zoom); ?>">
                </div>
                <?php if ($posts) : ?>
                    <?php foreach ($posts as $post) : setup_postdata($post); ?>
                        <div data-id="<?php echo $post->ID; ?>" class="easyrealestate-app-map-infobox">
                            <div class="easyrealestate-app-list-item">
                                <div class="easyrealestate-app-list-item-image">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <img src="<?php echo the_field('bild') ?>" alt="<?php the_field('name') ?>" />
                                    </a>
                                    <?php if (get_field('is_available')) : ?>
                                        <div class="easyrealestate-app-list-item-details-available">
                                            <div class="easyrealestate-badge easyrealestate-badge-success">
                                                <span> Verfügbar</span>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="easyrealestate-app-list-item-details-available">
                                            <div class="easyrealestate-badge easyrealestate-badge-error">
                                                <span> Nicht verfügbar</span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <button close-btn class="easyrealestate-app-map-infobox-close-btn">&times;</button>
                                </div>
                                <div class="easyrealestate-app-list-item-details">
                                    <h3>
                                        <?php the_field('name'); ?>
                                    </h3>
                                    <div class="easyrealestate-app-list-item-details-features">
                                        <?php
                                        $features = get_field('features');
                                        ?>
                                        <?php foreach ($features as $feature): ?>
                                            <div class="easyrealestate-app-list-item-details-feature-item">
                                                <img width="20" height="20" src="<?php echo esc_url($feature['icon']); ?>" alt="">
                                                <span><?php echo esc_html($feature['label']); ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <div class="easyrealestate-app-list">
                <div class="easyrealestate-app-list-inner">
                    <div class="easyrealestate-app-list-header">
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                    </div>
                    <div class="easyrealestate-app-list-items-container">
                        <div class="easyrealestate-app-list-items">
                            <?php get_template_part('templates/loops/acf-garagen-post', 'list', array(
                                'post_type' => 'garage',
                                'posts_per_page' => 9999,
                            )); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="easyrealestate-app-view-toggle">
            <button map-view class="easyrealestate-app-view-toggle-button">
                <svg class="map-view" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE -->
                    <path fill="currentColor" d="M15.5 12c2.5 0 4.5 2 4.5 4.5c0 .88-.25 1.7-.69 2.4l3.08 3.1L21 23.39l-3.12-3.07c-.69.43-1.51.68-2.38.68c-2.5 0-4.5-2-4.5-4.5s2-4.5 4.5-4.5m0 2a2.5 2.5 0 0 0-2.5 2.5a2.5 2.5 0 0 0 2.5 2.5a2.5 2.5 0 0 0 2.5-2.5a2.5 2.5 0 0 0-2.5-2.5m4-12a.5.5 0 0 1 .5.5v9.31c-.58-.55-1.25-1-2-1.31V4.7l-3 1.16V10c-.7.07-1.38.24-2 .5V5.87l-4-1.4V16.5c0 .64.09 1.26.26 1.84L8 17.9l-5.34 2.07l-.16.03a.5.5 0 0 1-.5-.5V4.38c0-.23.15-.41.36-.48L8 2l6 2.1l5.34-2.07zM4 5.46v11.85l3-1.16V4.45z" />
                </svg>
                <svg class="list-view" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE -->
                    <path fill="currentColor" d="M7 5h14v2H7zm0 8v-2h14v2zM4 4.5A1.5 1.5 0 0 1 5.5 6A1.5 1.5 0 0 1 4 7.5A1.5 1.5 0 0 1 2.5 6A1.5 1.5 0 0 1 4 4.5m0 6A1.5 1.5 0 0 1 5.5 12A1.5 1.5 0 0 1 4 13.5A1.5 1.5 0 0 1 2.5 12A1.5 1.5 0 0 1 4 10.5M7 19v-2h14v2zm-3-2.5A1.5 1.5 0 0 1 5.5 18A1.5 1.5 0 0 1 4 19.5A1.5 1.5 0 0 1 2.5 18A1.5 1.5 0 0 1 4 16.5" />
                </svg>
            </button>
        </div>
    </div>
</main>

<?php
wp_footer();
?>