<?php

// Block direct access
if (! defined('ABSPATH')) {
    exit;
}

/**
 * Add product-inner start to loop.
 */
function woo_product_inner_start()
{
    echo '<div class="product-inner">';
}
add_action('woocommerce_before_shop_loop_item', 'woo_product_inner_start', 0);

/**
 * Add product-inner end to loop.
 */
function woo_product_inner_end()
{
    echo '</div>';
}
add_action('woocommerce_after_shop_loop_item', 'woo_product_inner_end', 100);
