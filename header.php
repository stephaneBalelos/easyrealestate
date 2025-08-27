<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" />
    <?php wp_head(); ?>
</head>

<body>
    <?php wp_body_open(); ?>
    <header class="easyrealestate-header">
        <div class="easyrealestate-header-inner">
            <div class="easyrealestate-logo">
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
                <a class="easyrealestate-logo-link" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </div>
            <button id="menu-toggle" aria-label="<?php esc_attr_e('Toggle Menu', 'easyrealestate'); ?>">
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <nav class="easyrealestate-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'easyrealestate-menu',
                ));
                ?>
            </nav>
        </div>
    </header>