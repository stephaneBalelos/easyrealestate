<?php
/**
 * Easy Real Estate functions file
 *
 * @author Dock 26
 * @package easyrealestate
 * @since 1.0.0
 */

namespace Easyrealestate;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Bootstrap the theme.
 *
 * @return void
 */
function bootstrap() {

	define_constants();

	load_dependencies();

	run();
}


/**
 * Define theme constants.
 *
 * @return void
 */
function define_constants() {
    // Define theme version.
    if ( ! defined( 'EASYREALESTATE_VERSION' ) ) {
        define( 'EASYREALESTATE_VERSION', '0.6.4' );
    }

    // Define theme directory.
    if ( ! defined( 'EASYREALESTATE_DIR' ) ) {
        define( 'EASYREALESTATE_DIR', get_template_directory() );
    }

    // Define theme URL.
    if ( ! defined( 'EASYREALESTATE_URL' ) ) {
        define( 'EASYREALESTATE_URL', get_template_directory_uri() );
    }
}

/**
 * Load theme dependencies.
 *
 * @return void
 */
function load_dependencies() {
	require_once EASYREALESTATE_DIR . '/inc/Core.php';
}

/**
 * Run theme core.
 *
 * @return void
 */
function run() {
	Core::get_instance();
}

bootstrap();