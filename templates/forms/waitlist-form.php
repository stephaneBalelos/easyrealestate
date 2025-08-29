<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$item_id = $args['item_id'] ?? '';
$item_name = $args['item_name'] ?? '';

$waitlist_title = get_field('waitlist_title', 'option');
$waitlist_description = get_field('waitlist_description', 'option');

$posts = get_posts(array(
    'post_type' => 'garage',
    'posts_per_page' => 999,
));


?>
<div class="container">
    <div class="easyrealestate-form">
        <h3 class="easyrealestate-form-title"><?php echo esc_html($waitlist_title); ?></h3>
        <p><?php echo esc_html($waitlist_description); ?></p>

        <div class="easyrealestate-label">
            Wählen Sie Ihre Wunschgaragenhof
        </div>
        <div garage-select="waitlist-form" class="easyrealestate-form-group easyrealestate-form-group--select">
            <?php foreach ($posts as $post) : setup_postdata($post); ?>
                <div class="easyrealestate-form-group--select-item">
                    <input type="radio" name="garages" id="<?php the_ID(); ?>" value="<?php the_field('name'); ?>">
                    <label for="<?php the_ID() ?>">
                        <img width="50" src="<?php the_field('bild'); ?>" alt="<?php the_field('name'); ?>" class="easyrealestate-form-group--select-item-image">
                        <div class="easyrealestate-form-group--select-item-details">
                            <h5><?php the_field('name'); ?></h5>
                            <p><?php the_field('description'); ?></p>
                        </div>
                    </label>
                </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        </div>

        <?php echo do_shortcode('[contact-form-7 id="0ea9189" title="Warteliste Formular" html_id="waitlist-form"]'); ?>
    </div>
    <!-- Reference Form -->
    <!-- <form class="easyrealestate-form" aria-labelledby="contact-form-title">
        <h2 id="contact-form-title" class="screen-reader-text">Kontakt Formular</h2>
        <div class="easyrealestate-form-group">
            <label for="vorname" class="easyrealestate-label">Ihr Vornamen</label>
            <span class="easyrealestate-hint">Geben Sie Ihren Vornamen ein</span>
            [text* vorname autocomplete:vorname id:vorname class:easyrealestate-input]
        </div>
        <div class="easyrealestate-form-group">
            <label for="nachname" class="easyrealestate-label">Ihr Nachname</label>
            <span class="easyrealestate-hint">Geben Sie Ihren Nachnamen ein</span>
            [text* nachname autocomplete:nachname id:nachname class:easyrealestate-input]
        </div>
        <div class="easyrealestate-form-group">
            <label for="email" class="easyrealestate-label">E-Mail</label>
            <span class="easyrealestate-hint">Wir werden Ihre E-Mail-Adresse niemals weitergeben.</span>
            [email* email autocomplete:email id:email class:easyrealestate-input placeholder "max.muestermann@web.de"]
        </div>
        <div class="easyrealestate-form-group">
            <label for="phone" class="easyrealestate-label">Telefon</label>
            <span class="easyrealestate-hint">Optional. Format: +1234567890</span>
            [tel* phone autocomplete:tel id:phone class:easyrealestate-input]
        </div>
        <div class="easyrealestate-form-group">
            <label for="message" class="easyrealestate-label">Nachricht</label>
            <span class="easyrealestate-hint">Wie können wir Ihnen helfen?</span>
            [textarea* message id:message class:easyrealestate-textarea rows:5]
        </div>
        <div class="easyrealestate-form-group">
            <p>Ich habe die <a href="/datenschutz" target="_blank" rel="noopener">Datenschutzerklärung</a> gelesen und akzeptiere sie.</p>
        </div>
        <button type="submit" class="easyrealestate-input">Absenden</button> -->
    </form>
    <!-- End Reference Form -->
</div>