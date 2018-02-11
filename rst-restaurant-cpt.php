<?php

function rst_register_post_type() {

$singular = 'Restaurant';
$plural = 'Restaurants';

$labels = array(
  'name'                    => $plural,
  'singular_name'           => $singular,
  'add_name'                => 'Add New',
  'add_new_item'            => 'Add New '. $singular,
  'edit'                    => 'Edit ',
  'edit_item'               => 'Edit '.$singular,
  'new_item'                => 'New '. $singular,
  'view'                    => 'View '. $singular,
  'view_item'               => 'View '. $singular,
  'search_term'             => 'Search '. $singular,
  'parent'                  => 'Parent '. $singular,
  'not_found'               => 'No '. $plural.' found',
  'not_found_in_trash'      => 'No '.$plural.' found in Trash'
);

$args = array(
  'labels'                  => $labels,
  'public'                  => true,
  'publicly_queryable'      => true,
  'exclude_from_search'     => false,
  'show_ui_in_nav_menus'    => true,
  'show_ui'                 => true,
  'show_in_admin_bar'       => true,
  'menu_position'           => 10,
  'menu_icon'               => 'dashicons_businessman',
  'can_export'              => true,
  'delete_with_user'        => false,
  'hierarchical'            => false,
  'has_archive'             => true,
  'query_var'               => true,
  'capability_type'         => 'post',
  'map_meta_cap'            => true,
  // 'capabilities'           => array(),
  'rewrite'                 => array(
    'slug'                    => 'restaurants',
    'with_front'              => true,
    'pages'                   => true,
    'feeds'                   => true,
  ),
  'supports'                => array(
    'title'
  )
);
register_post_type( 'restaurant', $args );

}
add_action( 'init', 'rst_register_post_type' );

// Taxonomy
function rst_register_taxonomy(){

$plural = 'Locations';
$singular = 'Location';

$labels = array(
  'name'                        => $plural,
  'singular_name'               => $singular,
  'search_items'                => 'Search ' . $plural,
  'popular_items'               => 'Popular ' . $plural,
  'all_items'                   => 'All ' . $plural,
  'parent_item'                 => null,
  'parent_item_column'          => null,
  'edit_item'                   => 'Edit ' . $singular,
  'update_item'                 => 'Update ' . $singular,
  'add_new_item'                => 'Add New ' . $singular,
  'new_item_name'               => 'New ' . $singular . ' Name',
  'separate_items_with_commas'  => 'Separate ' . $plural . ' with commas',
  'add_or_remove_items'         => 'Add or remove ' . $plural,
  'choose_from_most_used'       => 'Choose from most used ' . $plural,
  'not_found'                   => 'No ' . $plural . ' found',
  'menu_name'                   => $plural,
);

$args = array(
  'hierarchical'                => true,
  'labels'                      => $labels,
  'show_ui'                     => true,
  'show_admin_column'           => true,
  'update_count_callback'       => '_update_post_term_count',
  'query_var'                   => true,
  'rewrite'                     => array( 
    'slug'                        => 'location' 
                                   ),
);

register_taxonomy( 'location', 'restaurant', $args );

};

add_action( 'init', 'rst_register_taxonomy' );