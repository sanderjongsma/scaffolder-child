<?php

// Block direct access
if( ! defined( 'ABSPATH' ) ) exit;

// Error reporting
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// Set content_width
if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

// Assets/vendor dir
if( ! defined( 'SCAFFOLD_VENDOR_DIR' ) ) {
	define( 'SCAFFOLD_VENDOR_DIR', WP_CONTENT_URL . '/vendor' );
}

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

