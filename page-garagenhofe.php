<?php
get_header('no-nav');

$posts = get_posts(array(
    'post_type' => 'garage',
    'posts_per_page' => 9999,
));
?>

<main>
    <div class="easyrealestate-app-container">
        <div class="easyrealestate-app-content">
            <div class="easyrealestate-app-map">
                <div class="map" style="background-image: url(<?php echo EASYREALESTATE_URL . '/dist/map.png'; ?>);">
                </div>
                <div class="easyrealestate-app-map-header">
                    <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                    ?>
                </div>
                <div class="easyrealestate-app-map-infobox">
                    <div class="easyrealestate-app-list-item"
                        data-id="1">
                        <div class="easyrealestate-app-list-item-image">
                            <img img src="<?php echo EASYREALESTATE_URL . '/dist/garage-placeholder.jpg'; ?>" alt="<?php the_title(); ?>" />
                            <div status class="easyrealestate-app-list-item-details-available">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 8a4 4 0 0 0-4 4a4 4 0 0 0 4 4a4 4 0 0 0 4-4a4 4 0 0 0-4-4" />
                                </svg>
                                <span> Verfügbar</span>
                            </div>
                            <button close-btn class="easyrealestate-app-map-infobox-close-btn">&times;</button>
                        </div>
                        <div class="easyrealestate-app-list-item-details">
                            <h3 title>Garagenhof Beispiel 1</h3>
                            <div class="easyrealestate-app-list-item-details-features">
                                <div class="easyrealestate-app-list-item-details-feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE -->
                                        <path fill="currentColor" d="m9.5 13.09l1.41 1.41l-4.5 4.5H10v2H3v-7h2v3.59zm1.41-3.59L9.5 10.91L5 6.41V10H3V3h7v2H6.41zm3.59 3.59l4.5 4.5V14h2v7h-7v-2h3.59l-4.5-4.5zM13.09 9.5l4.5-4.5H14V3h7v7h-2V6.41l-4.5 4.5z" />
                                    </svg>
                                    <span>12m²</span>
                                </div>
                                <div class="easyrealestate-app-list-item-details-feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE -->
                                        <path fill="currentColor" d="M20.8 16v-1.5c0-1.4-1.4-2.5-2.8-2.5s-2.8 1.1-2.8 2.5V16c-.6 0-1.2.6-1.2 1.2v3.5c0 .7.6 1.3 1.2 1.3h5.5c.7 0 1.3-.6 1.3-1.2v-3.5c0-.7-.6-1.3-1.2-1.3m-1.3 0h-3v-1.5c0-.8.7-1.3 1.5-1.3s1.5.5 1.5 1.3zM5 12h8v2H5zm0 3h7.95c-.53.54-.87 1.24-.95 2H5zm7 5H5v-2h7zm2-9H4v9H2V9l7-4l7 4v1.44c-.81.36-1.5.92-2 1.62z" />
                                    </svg>
                                    <span>Stahltor</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="easyrealestate-app-list">
                <div class="easyrealestate-app-list-header">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="easyrealestate-app-list-items-container">
                    <?php if ($posts) : ?>
                        <div class="easyrealestate-app-list-items">
                            <?php while ( have_posts() ) : the_post(); ?>
                            <div class="easyrealestate-app-list-item"
                                data-id="<?php the_ID(); ?>"
                                data-title="<?php the_field('name') ?>"
                                data-description="<?php the_excerpt(); ?>"
                                data-img="<?php echo the_field('bild') ?>"
                                data-available="true"
                                data-lat="53.53238971683533"
                                data-lng="8.106689978965917">
                                <div class="easyrealestate-app-list-item-image">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <img src="<?php echo the_field('bild') ?>" alt="<?php the_field('name') ?>" />
                                    </a>
                                    <div class="easyrealestate-app-list-item-details-available">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12 8a4 4 0 0 0-4 4a4 4 0 0 0 4 4a4 4 0 0 0 4-4a4 4 0 0 0-4-4" />
                                        </svg>
                                        <span> Verfügbar</span>
                                    </div>
                                </div>
                                <div class="easyrealestate-app-list-item-details">
                                    <h3><?php the_field('name') ?></h3>
                                    <p><?php the_field('beschreibung') ?></p>
                                    <div class="easyrealestate-app-list-item-details-features">
                                        <div class="easyrealestate-app-list-item-details-feature-item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE -->
                                                <path fill="currentColor" d="m9.5 13.09l1.41 1.41l-4.5 4.5H10v2H3v-7h2v3.59zm1.41-3.59L9.5 10.91L5 6.41V10H3V3h7v2H6.41zm3.59 3.59l4.5 4.5V14h2v7h-7v-2h3.59l-4.5-4.5zM13.09 9.5l4.5-4.5H14V3h7v7h-2V6.41l-4.5 4.5z" />
                                            </svg>
                                            <span>12m²</span>
                                        </div>
                                        <div class="easyrealestate-app-list-item-details-feature-item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE -->
                                                <path fill="currentColor" d="M20.8 16v-1.5c0-1.4-1.4-2.5-2.8-2.5s-2.8 1.1-2.8 2.5V16c-.6 0-1.2.6-1.2 1.2v3.5c0 .7.6 1.3 1.2 1.3h5.5c.7 0 1.3-.6 1.3-1.2v-3.5c0-.7-.6-1.3-1.2-1.3m-1.3 0h-3v-1.5c0-.8.7-1.3 1.5-1.3s1.5.5 1.5 1.3zM5 12h8v2H5zm0 3h7.95c-.53.54-.87 1.24-.95 2H5zm7 5H5v-2h7zm2-9H4v9H2V9l7-4l7 4v1.44c-.81.36-1.5.92-2 1.62z" />
                                            </svg>
                                            <span>Stahltor</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
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