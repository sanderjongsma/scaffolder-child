<?php

// Block direct access
if (! defined('ABSPATH')) {
    exit;
}

/**
 * Include files (widgets).
 */
require get_stylesheet_directory().'/includes/widgets/widget-scaffolder.php';

/**
 * Register widgets.
 */
function scaffolder_add_widgets()
{
    // register_widget('Scaffolder_Widget');
}
add_action('widgets_init', 'scaffolder_add_widgets');

/**
 * Register sidebars.
 */
function scaffolder_add_sidebars()
{
    register_sidebar(array(
        'name'          => __('Sidebar', 'scaffolder'),
        'id'            => 'sidebar',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widgettitle widget-title">',
        'after_title'   => '</h3>'
    ));
}
add_action('widgets_init', 'scaffolder_add_sidebars');
