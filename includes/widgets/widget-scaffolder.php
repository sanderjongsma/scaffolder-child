<?php

class Scaffolder_Widget extends WP_Widget
{
    /**
     * Sets up the widgets name etc.
     */
    public function __construct()
    {
        parent::__construct(
            'scaffolder',
            __('Scaffolder', 'scaffolder'),
            array(
                'description' => __('Title', 'scaffolder')
            )
        );
    }

    /**
     * Outputs the content of the widget.
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        $title = (! empty($instance['title'])) ? $instance['title'] : '';
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        echo $args['before_widget'];
            echo $title ? $args['before_title'].$title.$args['after_title'] : '';

            // Content
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin.
     *
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

        ?>

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <?php
    }

    /**
     * Processing widget options on save.
     *
     * @param array $new The new options
     * @param array $old The previous options
     */
    public function update($new, $old)
    {
        $instance          = $old;
        $instance['title'] = strip_tags($new['title']);

        return $instance;
    }
}