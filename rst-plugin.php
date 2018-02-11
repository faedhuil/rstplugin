<?php
/**
 * Plugin Name: Restaurantx Plugin
 * Description: A custom Post type for listing Restaurants
 * Author: Aljoscha Schneider
 * Version: 0.0.1
 * License: GPLv2
 */

 // Exit if accessed directly
 if ( ! defined( 'ABSPATH' ) ) {
   exit;
 }

require_once ( plugin_dir_path( __FILE__ ) . 'rst-restaurant-cpt.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'rst-restaurant-render-admin.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'rst-restaurant-fields.php' );