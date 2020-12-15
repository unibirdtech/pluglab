<?php
/**
 Plugin Name: Pluglab
 Plugin URI:
 Description: Pluglab contain all features which are required to create a complete website. Main motive behind this plugin is to boost up functionality of Unibird themes.
 Version: 0.0.1
 Author: UnibirdTech
 Text Domain: pluglab
 Author URI:
 */
define('PLUGLAB_VERSION', '0.0.1');
define('PLUGLAB__PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PLUGLAB_PLUGIN_INC', PLUGLAB__PLUGIN_DIR . 'includes/');
define('PLUGLAB_PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGLAB_PLUGIN_URL_INC', PLUGLAB_PLUGIN_URL . 'includes/');

require_once( PLUGLAB_PLUGIN_INC . 'class.pluglab.php' );

$PlugLab = new \Plug_Lab\Pluglab();