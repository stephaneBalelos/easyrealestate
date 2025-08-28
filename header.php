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
            <a class="easyrealestate-logo" href="<?php echo esc_url(home_url('/')); ?>">
                <img width="100" src="<?php echo esc_url(the_field('logo', 'option')); ?>" alt="Logo">
            </a>
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