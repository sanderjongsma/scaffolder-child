<?php

// Block direct access
if( ! defined( 'ABSPATH' ) ) exit;

// Cuztom dir
if( ! defined( 'CUZTOM_DIR' ) ) {
    define( 'CUZTOM_DIR', get_stylesheet_directory() . '/vendor/gizburdt/cuztom/' );
}

// Cuztom url
if( ! defined( 'CUZTOM_URL' ) ) {
    define( 'CUZTOM_URL', get_stylesheet_directory_uri() . '/vendor/gizburdt/cuztom/' );
}

// Require
if(file_exists(CUZTOM_DIR . 'cuztom.php')) {
    require CUZTOM_DIR . 'cuztom.php';
}