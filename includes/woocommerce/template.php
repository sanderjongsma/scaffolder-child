<?php

// Block direct access
if (! defined('ABSPATH')) {
    exit;
}

/**
 * Template changes.
 */
function woo_template()
{
    /*
     * Conditionally.
     */
    if (is_woo()) {
        //
    }

    /**
     * Loop.
     */
    require get_stylesheet_directory().'/includes/woocommerce/template/loop.php';
}
add_action('wp', 'woo_template');
