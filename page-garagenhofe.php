<?php
get_header('no-nav');
?>

<main>
    <div class="easyrealestate-app-container">
        <div class="easyrealestate-app-content">
            <div class="easyrealestate-app-map">
                <div class="map" style="background-image: url(<?php echo EASYREALESTATE_URL . '/dist/map.png'; ?>);">
                </div>
                <div class="easyrealestate-app-map-infobox">
                    <div class="easyrealestate-app-map-infobox-content">
                        <button close-btn class="easyrealestate-app-map-infobox-close-btn">&times;</button>
                        <h2 title>Information</h2>
                        <p content>Hier könnten Informationen zur ausgewählten Garage angezeigt werden.</p>
                    </div>
                </div>
            </div>
            <div class="easyrealestate-app-list">
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
                <div class="easyrealestate-app-list-items-container">
                    <div class="easyrealestate-app-list-items">
                        <div class="easyrealestate-app-list-item"
                            data-id="1"
                            data-title="Garagenhof Beispiel 1"
                            data-description="Beschreibung der Garage 1"
                            data-img="<?php echo EASYREALESTATE_URL . '/dist/garage-placeholder.jpg'; ?>"
                            data-available="true"
                            data-lat="53.53238971683533"
                            data-lng="8.106689978965917">
                            <div class="easyrealestate-app-list-item-image">
                                <img src="<?php echo EASYREALESTATE_URL . '/dist/garage-placeholder.jpg'; ?>" alt="<?php the_title(); ?>" />
                                <div class="easyrealestate-app-list-item-details-available">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 8a4 4 0 0 0-4 4a4 4 0 0 0 4 4a4 4 0 0 0 4-4a4 4 0 0 0-4-4" />
                                    </svg>
                                    <span> Verfügbar</span>
                                </div>
                            </div>
                            <div class="easyrealestate-app-list-item-details">
                                <h3>Garagenhof Beispiel 1</h3>
                                <p>Beschreibung der Garage. Größe, Lage, Preis etc. Lassen sie sich selbst überzeugen! Kommen sie einfach vorbei oder rufen Sie uns an! dljsa d ao sd ajosda sp das pd askpdpia spda sp</p>
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
                        <div class="easyrealestate-app-list-item"
                            data-id="2"
                            data-title="Garagenhof Beispiel 2"
                            data-description="Beschreibung der Garage 2"
                            data-img="<?php echo EASYREALESTATE_URL . '/dist/garage-placeholder.jpg'; ?>"
                            data-available="false"
                            data-lat="53.52225993419428"
                            data-lng="8.122976342050313">
                            <div class="easyrealestate-app-list-item-image">
                                <img src="<?php echo EASYREALESTATE_URL . '/dist/garage-placeholder.jpg'; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <div class="easyrealestate-app-list-item-details">
                                <h2>Garagenhof Beispiel 1</h2>
                                <p>Beschreibung der Garage. Größe, Lage, Preis etc.</p>
                            </div>
                        </div>
                        <div class="easyrealestate-app-list-item">
                            <div class="easyrealestate-app-list-item-image">
                                <img src="<?php echo EASYREALESTATE_URL . '/dist/garage-placeholder.jpg'; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <div class="easyrealestate-app-list-item-details">
                                <h2>Garagenhof Beispiel 1</h2>
                                <p>Beschreibung der Garage. Größe, Lage, Preis etc.</p>
                            </div>
                        </div>
                        <div class="easyrealestate-app-list-item">
                            <div class="easyrealestate-app-list-item-image">
                                <img src="<?php echo EASYREALESTATE_URL . '/dist/garage-placeholder.jpg'; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <div class="easyrealestate-app-list-item-details">
                                <h2>Garagenhof Beispiel 1</h2>
                                <p>Beschreibung der Garage. Größe, Lage, Preis etc.</p>
                            </div>
                        </div>
                        <div class="easyrealestate-app-list-item">
                            <div class="easyrealestate-app-list-item-image">
                                <img src="<?php echo EASYREALESTATE_URL . '/dist/garage-placeholder.jpg'; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <div class="easyrealestate-app-list-item-details">
                                <h2>Garagenhof Beispiel 1</h2>
                                <p>Beschreibung der Garage. Größe, Lage, Preis etc.</p>
                            </div>
                        </div>
                        <div class="easyrealestate-app-list-item">
                            <div class="easyrealestate-app-list-item-image">
                                <img src="<?php echo EASYREALESTATE_URL . '/dist/garage-placeholder.jpg'; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <div class="easyrealestate-app-list-item-details">
                                <h2>Garagenhof Beispiel 1</h2>
                                <p>Beschreibung der Garage. Größe, Lage, Preis etc.</p>
                            </div>
                        </div>
                        <div class="easyrealestate-app-list-item">
                            <div class="easyrealestate-app-list-item-image">
                                <img src="<?php echo EASYREALESTATE_URL . '/dist/garage-placeholder.jpg'; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <div class="easyrealestate-app-list-item-details">
                                <h2>Garagenhof Beispiel 1</h2>
                                <p>Beschreibung der Garage. Größe, Lage, Preis etc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="easyrealestate-app-view-toggle">
            <button class="easyrealestate-app-view-toggle-button">Toggle View</button>
        </div>
    </div>
</main>

<?php
wp_footer();
?>