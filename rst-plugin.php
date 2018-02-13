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

function rst_admin_enqeue_scripts() {
  global $pagenow, $typenow;
  
  if ( ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) && $typenow == 'restaurant' ) {
    wp_enqeue_style( 'rst-admin-css', plugins_url( 'css/admin-restaurants.css', __FILE__) );
    wp_enqeue_script( 'rst-resturants-js', plugins_url( 'js/admin-restaurants.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), '20180213', true );
    wp_enqeue_syle( 'jquery-style', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css' );
    wp_enqeue_script( 'rst-custom-quicktags', plugins_url( 'js/rst-quicktags.js', __FILE__ ), array( 'quicktags' ), '20180214', true );
  }


}
add_action( 'admin_enqeue_scripts', 'rst_admin_enqeue_scripts' );