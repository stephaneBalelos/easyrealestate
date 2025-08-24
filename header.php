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
    <header>
        <h1><?php bloginfo('name'); ?></h1>
        <h2><?php bloginfo('description'); ?></h2>
        header
    </header>