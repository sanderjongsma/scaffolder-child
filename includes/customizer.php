<?php

// Block direct access
if (! defined('ABSPATH')) {
    exit;
}

class Scaffold_Customizer
{
    public function __construct()
    {
        add_action('customize_register', array(&$this, 'register'));
    }

    public function register($customize)
    {
        $this->add_sections($customize);
        $this->add_settings($customize);
        $this->add_controls($customize);
    }

    public function add_sections($customize)
    {
        // Section
        $customize->add_section('section', array(
            'title'         => __('Section', 'scaffolder'),
            'priority'      => 130
        ));
    }

    public function add_settings($customize)
    {
        // Section
        $customize->add_setting('setting');
    }

    public function add_controls($customize)
    {
        // Section
        $customize->add_control('setting', array(
            'section'   => 'section',
            'settings'  => 'setting',
            'label'     => 'Setting',
        ));
    }
}

$customizer = new Scaffold_Customizer();
