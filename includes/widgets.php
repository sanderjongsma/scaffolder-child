<?php

// Block direct access
if( ! defined( 'ABSPATH' ) ) exit;

require get_stylesheet_directory() . '/includes/widgets/widget-scaffold.php';

/**
 * Register widgets
 */
function scaffold_add_widgets() 
{
	register_widget( 'Scaffold_Widget' );
}
add_action( 'widgets_init', 'scaffold_add_widgets' );

/**
 * Register sidebars
 */
function scaffold_add_sidebars() 
{
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'scaffold' ),
		'id'            => 'sidebar',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle widget-title">',
		'after_title'   => '</h3>'
	) );
}
add_action( 'widgets_init', 'scaffold_add_sidebars' );