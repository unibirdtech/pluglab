<?php

namespace Plug_Lab\Theme\Shapro;

use Plug_Lab\Theme\Shapro\PlugLab_Customizer_Assistant as customizer_configuration;
use Plug_Lab\Theme\Shapro\pluglab_initialise_customizer_settings as customizer_settings;

class pluglab_shapro extends \Plug_Lab\Theme\Shapro\pluglab_layouts {

    public function __construct() {
        /**
         * HomeTemplate scripts
         */
        add_action('init', array($this, 'load'));
    }

    public function load() {
        /**
         * Include helper functions
         */
        require_once( PLUGLAB_PLUGIN_INC . 'customizer/helper_functions.php' );

        /**
         * Initialize Customizer settings
         */
        new customizer_configuration();
        /**
         * Initialize Customizer settings
         */
        new customizer_settings();
        /**
         * LayOut
         */
        add_action('shapro_header_layouts', array($this, 'top_header'), 1);
        add_action('shapro_hometemplate_layouts', array($this, 'slider'), 1);
        add_action('shapro_hometemplate_layouts', array($this, 'callout'), 2);
        add_action('shapro_hometemplate_layouts', array($this, 'service'), 3);
        add_action('shapro_hometemplate_layouts', array($this, 'cta'), 4);
        add_action('shapro_hometemplate_layouts', array($this, 'testimonial'), 5);
        add_action('shapro_hometemplate_layouts', array($this, 'blog'), 6);
    }

}
