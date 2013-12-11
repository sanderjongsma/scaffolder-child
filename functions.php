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
	define( 'SCAFFOLD_VENDOR_DIR', WP_CONTENT_URL . '/vendor' ); // get_template_directory_uri()
}


if( ! function_exists( 'scaffold_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function scaffold_child_setup()
{
}
endif;
add_action( 'after_theme_setup', 'scaffold_child_setup' );

/**
 * Enqueue scripts and styles.
 */
function scaffold_child_styles_scripts()
{
}
add_action( 'init', 'scaffold_child_styles_scripts' );

/**
 * Register styles.
 */
function scaffold_child_register_styles()
{
}

/**
 * Enqueue styles.
 */
function scaffold_child_enqueue_styles()
{
}

/**
 * Register scripts
 */
function scaffold_child_register_scripts() 
{
}

/**
 * Enqueue scripts
 */
function scaffold_child_enqueue_scripts()
{	
	// Localize
	scaffold_child_localize_scripts();
}

/**
 * Localize scripts.
 */
function scaffold_child_localize_scripts()
{
}

/**
 * All scaffold filters
 */
require get_stylesheet_directory() . '/includes/filters.php';

/**
 * All scaffold filters for admin
 */
require get_stylesheet_directory() . '/includes/filters-admin.php';

/**
 * Helper functions
 */
require get_stylesheet_directory() . '/includes/helpers.php';

