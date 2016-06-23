<?php

// Block direct access
if (! defined('ABSPATH')) {
    exit;
}

// Cuztom url
if (! defined('CUZTOM_URL')) {
    define('CUZTOM_URL', get_stylesheet_directory_uri().'/vendor/gizburdt/cuztom');
}

// Require
if (file_exists(get_stylesheet_directory().'/vendor/autoload.php')) {
    require_once get_stylesheet_directory().'/vendor/autoload.php';
}
