<?php

// Block direct access
if (! defined('ABSPATH')) {
    exit;
}

// Error reporting
if (defined('WP_DEBUG') && WP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Set content_width
if (! isset($content_width)) {
    $content_width = 640;
}

// Environment
if (! defined('SCAFFOLDER_ENV')) {
    define('SCAFFOLDER_ENV', 'production');
}

// Assets/vendor url
if (! defined('SCAFFOLDER_BOWER_URL')) {
    define('SCAFFOLDER_BOWER_URL', get_stylesheet_directory_uri().'/assets/vendor');
}

// Build url
if (! defined('SCAFFOLDER_BUILD_URL')) {
    define('SCAFFOLDER_BUILD_URL', get_stylesheet_directory_uri().'/assets/build');
}

// Scaffolder setup
if (! function_exists('scaffolder_child_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function scaffolder_child_setup()
{
    // Theme support
    // add_theme_support( 'post-formats', array( /* 'aside', 'link', 'gallery', 'status', 'quote', 'image' */ ) );

    // Image sizes
    // add_image_size( 'name', width, height, true );

    // Menus
    // register_nav_menus( array(
    //     'extra' => __( 'Extra', 'scaffolder' ),
    // ) );
}
endif;
add_action('scaffolder_child_init', 'scaffolder_child_setup');

/**
 * Enqueue scripts and styles.
 */
function scaffolder_child_assets()
{
    // Styles
    add_action('wp_enqueue_scripts', 'scaffolder_child_dequeue_styles', 20, 2);
    add_action('wp_enqueue_scripts', 'scaffolder_child_register_styles', 20, 2);
    add_action('wp_enqueue_scripts', 'scaffolder_child_enqueue_styles', 20, 2);

    // Scripts
    add_action('wp_enqueue_scripts', 'scaffolder_child_dequeue_scripts', 20, 2);
    add_action('wp_enqueue_scripts', 'scaffolder_child_register_scripts', 20, 2);
    add_action('wp_enqueue_scripts', 'scaffolder_child_enqueue_scripts', 20, 2);
}
add_action('init', 'scaffolder_child_assets');

/**
 * Dequeue styles.
 */
function scaffolder_child_dequeue_styles()
{
    wp_dequeue_style('jquery-bxslider');
    wp_dequeue_style('jquery-fancybox');
}

/**
 * Register styles.
 */
function scaffolder_child_register_styles()
{
    if (is_scaffolder_env('local')) {
        // Assets
    }
}

/**
 * Enqueue styles.
 */
function scaffolder_child_enqueue_styles()
{
    if (is_scaffolder_env('local')) {
        // Assets
    }
}

/**
 * Dequeue scripts.
 */
function scaffolder_child_dequeue_scripts()
{
    wp_dequeue_script('enquire');
    wp_dequeue_script('jquery-bxslider');
    wp_dequeue_script('jquery-fancybox');
    wp_dequeue_script('jquery-fitvids');
}

/**
 * Register scripts.
 */
function scaffolder_child_register_scripts()
{
    if (is_scaffolder_env('local')) {
        // Assets
    }

    // Theme
    wp_register_script('functions', SCAFFOLDER_BUILD_URL.'/js/functions.js', array('jquery', 'jquery-ui-core', 'jquery-ui-tabs'), '', true);
}

/**
 * Enqueue scripts.
 */
function scaffolder_child_enqueue_scripts()
{
    if (is_scaffolder_env('local')) {
        // Assets
    }

    // Theme
    wp_enqueue_script('functions');

    // Localize
    scaffolder_child_localize_scripts();
}

/**
 * Localize scripts.
 */
function scaffolder_child_localize_scripts()
{
    wp_localize_script('functions', 'Scaffolder', array(
        'template_uri'      => get_template_directory_uri(),
        'stylesheet_uri'    => get_stylesheet_directory_uri(),
        'home_url'          => get_home_url(),
        'ajax_url'          => admin_url('admin-ajax.php')
    ));
}

/*
 * Allow automatic updates
 */
add_filter('automatic_updates_is_vcs_checkout', '__return_false', 1);

/**
 * Libraries.
 */
require get_stylesheet_directory().'/includes/composer.php';

/**
 * All scaffolder filters.
 */
require get_stylesheet_directory().'/includes/filters.php';

/**
 * All scaffolder filters for admin.
 */
require get_stylesheet_directory().'/includes/filters-admin.php';

/**
 * Helper functions.
 */
require get_stylesheet_directory().'/includes/helpers.php';

/**
 * Customizer.
 */
require get_stylesheet_directory().'/includes/customizer.php';

/**
 * Template additions / changes.
 */
require get_stylesheet_directory().'/includes/template.php';

/**
 * Widgets / sidebars.
 */
require get_stylesheet_directory().'/includes/widgets.php';

/**
 * Content types; Post types, Meta boxes.
 */
require get_stylesheet_directory().'/includes/content-types.php';

/**
 * Shortcodes.
 */
require get_stylesheet_directory().'/includes/shortcodes.php';

/*
 * Woocommerce.
 */
// require get_stylesheet_directory().'/includes/woocommerce.php';
