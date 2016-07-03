<?php

// Block direct access
if (! defined('ABSPATH')) {
    exit;
}

/**
 * Add theme support.
 */
function woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'woocommerce_support');

/**
 * Dequeue styles.
 */
function woo_dequeue_styles($styles)
{
    unset($styles['woocommerce-layout']);
    unset($styles['woocommerce-general']);
    unset($styles['woocommerce-smallscreen']);

    return $styles;
}
add_filter('woocommerce_enqueue_styles', 'woo_dequeue_styles');

/**
 * Helpers.
 */
require get_stylesheet_directory().'/includes/woocommerce/helpers.php';

/**
 * Template.
 */
require get_stylesheet_directory().'/includes/woocommerce/template.php';
