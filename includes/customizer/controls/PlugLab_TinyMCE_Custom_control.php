<?php

namespace Plug_Lab\Customizer\Controls;

use \WP_Customize_Control;

class PlugLab_TinyMCE_Custom_control extends WP_Customize_Control {

    /**
     * The type of control being rendered
     */
    public $type = 'tinymce_editor';

    /**
     * Enqueue our scripts and styles
     */
    public function enqueue() {
        wp_enqueue_script('pluglab-custom-controls-js', PLUGLAB_PLUGIN_URL_INC . 'customizer/js/customizer.js', array('jquery'), '1.0', true);
        wp_enqueue_style('pluglab-custom-controls-css', PLUGLAB_PLUGIN_URL_INC . 'customizer/css/customizer.css', array(), '1.0', 'all');
        wp_enqueue_editor();
    }

    /**
     * Pass our TinyMCE toolbar string to JavaScript
     */
    public function to_json() {
        parent::to_json();
        $this->json['pluglabtinymcetoolbar1'] = isset($this->input_attrs['toolbar1']) ? esc_attr($this->input_attrs['toolbar1']) : 'bold italic bullist numlist alignleft aligncenter alignright link';
        $this->json['pluglabtinymcetoolbar2'] = isset($this->input_attrs['toolbar2']) ? esc_attr($this->input_attrs['toolbar2']) : '';
        $this->json['pluglabmediabuttons'] = isset($this->input_attrs['mediaButtons']) && ( $this->input_attrs['mediaButtons'] === true ) ? true : false;
    }

    /**
     * Render the control in the customizer
     */
    public function render_content() {
        ?>
        <div class="tinymce-control">
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php if (!empty($this->description)) { ?>
                <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php } ?>
            <textarea id="<?php echo esc_attr($this->id); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_html($this->value()); ?></textarea>
        </div>
        <?php
    }

}
