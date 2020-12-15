<?php

namespace Plug_Lab;

class Pluglab {

    function __construct() {
        add_action('plugins_loaded', array($this, 'register'));
        add_action('plugins_loaded', array($this, 'textdomain'));
        add_action('plugins_loaded', array($this, 'load'));
    }

    public function textdomain() {
        load_plugin_textdomain('pluglab');
    }

    function load() {
        if('Shapro'==wp_get_theme()->name) new \Plug_Lab\Theme\Shapro\pluglab_shapro();
    }
    
    public function register() {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class) {

        if (strpos($class, __NAMESPACE__) !== 0) {
            return;
        }

        $class = str_replace(__NAMESPACE__, '', $class);
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

        $path = PLUGLAB_PLUGIN_INC . $class;

        if (file_exists($path)) {
            require_once($path);
        }
    }

}
