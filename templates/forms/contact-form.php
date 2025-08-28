<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$item_id = $args['item_id'] ?? '';
$item_name = $args['item_name'] ?? '';
$thema = "Kontakt Anfrage";
?>
<div class="container">
    <div class="easyrealestate-form">
        <?php if ($item_name) : ?>
            <h3 class="easyrealestate-form-title">Jetzt Anfragen: "<?php echo esc_html($item_name); ?>"</h3>
            <?php $thema = "Anfrage zu \"$item_name\""; ?>
        <?php endif; ?>
        <?php echo do_shortcode('[contact-form-7 id="d85e7a9" title="Kontaktformular" html_class="easyrealestate-form thema="'. esc_attr($thema) .'"]'); ?>
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
        <button type="submit" class="easyrealestate-input">Absenden</button>
    </form> -->
    <!-- End Reference Form -->
</div>