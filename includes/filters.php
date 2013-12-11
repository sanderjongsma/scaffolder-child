<?php

// Block direct access
if( ! defined( 'ABSPATH' ) ) exit;

/**
 * Excerpt length
 */
function scaffold_excerpt_length( $length ) 
{
    return 55;
}
add_filter( 'excerpt_length', 'scaffold_excerpt_length' );

/**
 * Exceprt more link
 */
function scaffold_excerpt_more( $more ) 
{
    return ' [...]';
}
add_filter( 'excerpt_more', 'scaffold_excerpt_more' );