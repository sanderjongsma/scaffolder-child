<?php

// Block direct access
if (! defined('ABSPATH')) {
    exit;
}

/**
 * Excerpt length.
 */
function scaffolder_excerpt_length($length)
{
    return 55;
}
add_filter('excerpt_length', 'scaffolder_excerpt_length');

/**
 * Exceprt more link.
 */
function scaffolder_excerpt_more($more)
{
    return ' [...]';
}
add_filter('excerpt_more', 'scaffolder_excerpt_more');
