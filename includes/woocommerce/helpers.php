<?php

// Block direct access
if (! defined('ABSPATH')) {
    exit;
}

/**
 * Check if woocommerce.
 *
 * @param  array $only
 * @return bool
 */
function is_woo($only = array())
{
    if (function_exists('is_woocommerce') && is_woocommerce()) {
        return true;
    }

    $pages = array(
        'woocommerce_shop_page_id',
        'woocommerce_terms_page_id',
        'woocommerce_cart_page_id',
        'woocommerce_checkout_page_id',
        'woocommerce_pay_page_id',
        'woocommerce_thanks_page_id',
        'woocommerce_myaccount_page_id',
        'woocommerce_edit_address_page_id',
        'woocommerce_view_order_page_id',
        'woocommerce_change_password_page_id',
        'woocommerce_logout_page_id',
        'woocommerce_lost_password_page_id'
    );

    foreach (array_intersect($pages, $only) as $page) {
        if (get_the_ID() == get_option($page, 0)) {
            return true;
        }
    }

    return false;
}

/**
 * Check of specific woocommerce page.
 *
 * @param  string $page
 * @return bool
 */
function is_woo_page($page)
{
    return get_the_ID() == get_option($page, 0);
}
