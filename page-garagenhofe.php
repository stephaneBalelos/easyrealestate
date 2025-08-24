<?php
get_header('no-nav');
?>

<main>
    <div class="easyrealestate-app-container">
        <div class="easyrealestate-app-content">
            <div class="easyrealestate-app-map">
                <div class="map" style="background-image: url(<?php echo EASYREALESTATE_URL . '/dist/map.png'; ?>);">
                </div>
            </div>
            <div class="easyrealestate-app-list">
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
                <div class="easyrealestate-app-list-items-container">
                    <div class="easyrealestate-app-list-items">
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