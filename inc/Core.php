<?php

/**
 * Main theme class.
 *
 * @author Dock 26
 * @package easyrealestate
 * @since 1.0.0
 */

namespace Easyrealestate;

/**
 * Class Core
 *
 * @package easyrealestate
 */
class Core
{
    /**
     * Core instance.
     *
     * @var Core
     */
    public static $instance = null;

    /**
     * Get the static instance of the class.
     *
     * @return Core
     */
    public static function get_instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Core constructor.
     */
    public function __construct()
    {
        $this->run_hooks();
    }

    /**
     * Run theme hooks.
     *
     * @return void
     */
    public function run_hooks()
    {
        add_action('after_setup_theme', [$this, 'setup_theme']);
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
        add_action('enqueue_block_editor_assets', array($this, 'add_editor_styles'));
    }

    /**
     * Setup theme.
     *
     * @return void
     */
    public function setup_theme()
    {
        // Add theme support, register menus, etc.
    }

    /**
     * Enqueue scripts and styles.
     *
     * @return void
     */
    public function enqueue()
    {
        // Enqueue theme scripts and styles.
        $uri = EASYREALESTATE_URL . '/dist/assets/css/easyrealestate.css';
        wp_enqueue_style('easyrealestate-style', $uri, array(), EASYREALESTATE_VERSION);

        $uri = EASYREALESTATE_URL . '/dist/assets/js/main.iife.js';
        wp_enqueue_script('easyrealestate-script', $uri, array(), EASYREALESTATE_VERSION,);
    }

    /**
     * Add editor styles.
     *
     * @return void
     */
    public function add_editor_styles()
    {
        // Add editor styles for Gutenberg.
    }
}
