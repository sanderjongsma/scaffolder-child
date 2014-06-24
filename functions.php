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

// Assets/vendor url
if( ! defined( 'SCAFFOLD_VENDOR_URL' ) ) {
	define( 'SCAFFOLD_VENDOR_URL', WP_CONTENT_URL . '/vendor' ); // get_stylesheet_directory_uri()
}

// Assets/vendor dir
if( ! defined( 'SCAFFOLD_VENDOR_DIR' ) ) {
	define( 'SCAFFOLD_VENDOR_DIR', WP_CONTENT_DIR . '/vendor' ); // get_template_directory()
}

// Cuztom dir
if( ! defined( 'CUZTOM_DIR' ) ) {
	define( 'CUZTOM_DIR', SCAFFOLD_VENDOR_DIR . '/gizburdt/cuztom/' ); // get_template_directory()
}

// Cuztom url
if( ! defined( 'CUZTOM_URL' ) ) {
	define( 'CUZTOM_URL', SCAFFOLD_VENDOR_URL . '/gizburdt/cuztom/' ); // get_stylesheet_directory_uri()
}

if( ! function_exists( 'scaffold_child_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function scaffold_child_setup()
{
	// Theme support

	// Image sizes	
	// add_image_size( 'name', width, height, true );

	// Menus
}
endif;
add_action( 'scaffold_child_init', 'scaffold_child_setup' );

/**
 * Enqueue scripts and styles.
 */
function scaffold_child_assets()
{
	// Styles
	add_action( 'wp_enqueue_scripts', 	'scaffold_child_dequeue_styles', 20, 2 );
	add_action( 'wp_enqueue_scripts', 	'scaffold_child_register_styles', 20, 2 );
	add_action( 'wp_enqueue_scripts', 	'scaffold_child_enqueue_styles', 20, 2 );

	// Scripts
	add_action( 'wp_enqueue_scripts', 	'scaffold_child_dequeue_scripts', 20, 2 );
	add_action( 'wp_enqueue_scripts', 	'scaffold_child_register_scripts', 20, 2 );
	add_action( 'wp_enqueue_scripts', 	'scaffold_child_enqueue_scripts', 20, 2 );
}
add_action( 'init', 'scaffold_child_assets' );

/**
 * Dequeue styles.
 */
function scaffold_child_dequeue_styles()
{
	wp_dequeue_style( 'jquery-bxslider' );
	wp_dequeue_style( 'jquery-fancybox' );
}

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
 * Dequeue scripts.
 */
function scaffold_child_dequeue_scripts()
{
	wp_dequeue_script( 'jquery-caroufredsel' );
	wp_dequeue_script( 'jquery-bxslider' );
	wp_dequeue_script( 'jquery-fancybox' );
}

/**
 * Register scripts
 */
function scaffold_child_register_scripts() 
{
	// Theme
	wp_register_script( 'functions', get_stylesheet_directory_uri() . '/assets/js/functions.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-tabs' ), '', true);
}

/**
 * Enqueue scripts
 */
function scaffold_child_enqueue_scripts()
{
	// Theme
	wp_enqueue_script( 'functions' );
	
	// Localize
	scaffold_child_localize_scripts();
}

/**
 * Localize scripts.
 */
function scaffold_child_localize_scripts()
{
	wp_localize_script( 'functions', 'Scaffold', array(
		'template_uri'		=> get_template_directory_uri(),
		'stylesheet_uri'	=> get_stylesheet_directory_uri(),
		'home_url'			=> get_home_url(),
		'ajax_url'			=> admin_url( 'admin-ajax.php' )
	) );
}

/**
 * Libraries
 */
require SCAFFOLD_VENDOR_DIR . '/gizburdt/cuztom/cuztom.php';

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

/**
 * Customizer
 */
require get_stylesheet_directory() . '/includes/customizer.php';

/**
 * Template additions / changes
 */
require get_stylesheet_directory() . '/includes/template.php';

/**
 * Widgets / sidebars
 */
require get_stylesheet_directory() . '/includes/widgets.php';

/**
 * Content types; Post types, Meta boxes
 */
require get_stylesheet_directory() . '/includes/content-types.php';

/**
 * Shortcodes
 */
require get_stylesheet_directory() . '/includes/shortcodes.php';
