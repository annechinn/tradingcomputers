<?php

/*
 * Plugin Name:       Elementor Widgets for Trading Computers
 * Description:       Adds an Elementor Widget for Trading Computers
 * Version:           1.0.0
 * Text Domain:       elementor-widgets-for-tc
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('TC_ELEMENTOR_PLUGIN_DIR', plugin_dir_path(__FILE__) );

require_once 'includes/class-init.php';

( new \Trading_Computers\Elementor\Init() )->init();