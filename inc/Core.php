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

        // Prevent Contact Form 7 from adding extra <p> and <br> tags
        // For mail.
        // For form output.
        add_filter('wpcf7_autop_or_not', '__return_false');

        // Pass parameters to contact form 7 via shortcode attributes
        add_filter('shortcode_atts_wpcf7', [$this, 'custom_shortcode_atts_wpcf7_filter'], 10, 3);
    }

    /**
     * Setup theme.
     *
     * @return void
     */
    public function setup_theme()
    {
        // Add theme support, register menus, etc.

        // Add ShortCode for garage Listing
        add_shortcode('garage_listing', [$this, 'render_garage_listing']);
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

        $uri = EASYREALESTATE_URL . '/dist/assets/js/main.es.js';
        wp_enqueue_script_module('easyrealestate-main-script', $uri, array(), EASYREALESTATE_VERSION);

        $uri = EASYREALESTATE_URL . '/dist/assets/js/header.es.js';
        wp_enqueue_script_module('easyrealestate-header-script', $uri, array(), EASYREALESTATE_VERSION);

        $uri = EASYREALESTATE_URL . '/dist/assets/js/forms.es.js';
        wp_enqueue_script_module('easyrealestate-forms-script', $uri, array(), EASYREALESTATE_VERSION);

        $uri = EASYREALESTATE_URL . '/dist/assets/js/sliders.es.js';
        wp_enqueue_script_module('easyrealestate-sliders-script', $uri, array(), EASYREALESTATE_VERSION);

        if (is_page('garagenhofe')) {
            $uri = EASYREALESTATE_URL . '/dist/assets/js/app.es.js';
            wp_enqueue_script_module('easyrealestate-garagenhofe-script', $uri, array(), EASYREALESTATE_VERSION);
        }
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


    /**
     * Custom shortcode attributes for Contact Form 7.
     *
     * @param array $out    The output attributes.
     * @param array $pairs  The shortcode attribute pairs.
     * @param array $atts   The shortcode attributes.
     * @return array
     */
    public function custom_shortcode_atts_wpcf7_filter($out, $pairs, $atts)
    {
        $my_attrs = array('thema', 'garage_name');

        foreach ($my_attrs as $my_attr) {
            if (isset($atts[$my_attr])) {
                $out[$my_attr] = $atts[$my_attr];
            }
        }

        return $out;
    }

    /**
     * Render garage listing.
     *
     * @param array $atts Shortcode attributes.
     * @return string
     */
    public function render_garage_listing($atts)
    {
        // Shortcode logic for rendering garage listing.
        $output = '';
        $output .= '<div class="easyrealestate-garage-listing">';
        // Load garage listing template part
        ob_start();
        get_template_part('templates/loops/acf-garagen-post', 'list', array(
            'post_type' => 'garage',
            'posts_per_page' => 9999,
        ));
        $output .= ob_get_clean();
        $output .= '</div>';

        return $output;
    }
}
