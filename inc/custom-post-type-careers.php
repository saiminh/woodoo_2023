<?php 
/**
 * Add Custom post types and their taxonomies
 *
 * @package peak2021
 */

function create_posttype_careers() {
  register_post_type( 'careers',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Careers' ),
        'singular_name' => __( 'Career' ),
      ),
      'public' => true,
      'show_ui' => true,
      'show_in_rest' => true,
      'has_archive' => 'careers-archive',
      // 'taxonomies' => array('role', 'location'),
      'supports' => array( 'title', 'editor', 'date', 'custom-fields', 'permalinks', 'thumbnail' ),
      'template' => array(
        array( 'core/group', array(
          'style' => array(
            'spacing' => array(
              'padding' => array(
                'right' => 'var:preset|spacing|s',
                'left' => 'var:preset|spacing|s'
              )
            )
          )), array(
            array( 'core/post-title', array() ),
            array( 'create-block/careers-block', array() )
          ))
      )
    )
  );
  flush_rewrite_rules(); 
}
add_action( 'init', 'create_posttype_careers', 0 );

// function create_hierarchical_taxonomy_role() {
//     $labels = array(
//       'name' => _x( 'Roles', 'taxonomy general name' ),
//       'singular_name' => _x( 'Role', 'taxonomy singular name' ),
//       'search_items' =>  __( 'Search Roles' ),
//       'all_items' => __( 'All Roles' ),
//       'parent_item' => __( 'Parent Role' ),
//       'parent_item_colon' => __( 'Parent Role:' ),
//       'edit_item' => __( 'Edit Role' ), 
//       'update_item' => __( 'Update Role' ),
//       'add_new_item' => __( 'Add New Role' ),
//       'new_item_name' => __( 'New Role Name' ),
//       'menu_name' => __( 'Roles' )
//     );    
//     $args = array(
//       'hierarchical' => true,
//       'labels' => $labels,
//       'show_ui' => true,
//       'show_admin_column' => true,
//       'query_var' => true,
//       'rewrite' => array( 'slug' => 'role', 'with_front' => false ),
//       'public' => true,
//       'has_archive' => true,
//       'show_in_rest' => true // Needed for tax to appear in Gutenberg editor
//     );
//     register_taxonomy('role', 'careers', $args);
//   }
//   add_action( 'init', 'create_hierarchical_taxonomy_role', 0 );

//   function create_hierarchical_taxonomy_location() {
//     $labels = array(
//       'name' => _x( 'Locations', 'taxonomy general name' ),
//       'singular_name' => _x( 'Location', 'taxonomy singular name' ),
//       'search_items' =>  __( 'Search Locations' ),
//       'all_items' => __( 'All Locations' ),
//       'parent_item' => __( 'Parent Location' ),
//       'parent_item_colon' => __( 'Parent Location:' ),
//       'edit_item' => __( 'Edit Location' ), 
//       'update_item' => __( 'Update Location' ),
//       'add_new_item' => __( 'Add New Location' ),
//       'new_item_name' => __( 'New Location Name' ),
//       'menu_name' => __( 'Locations' )
//     );    
//     $args = array(
//       'hierarchical' => true,
//       'labels' => $labels,
//       'show_ui' => true,
//       'show_admin_column' => true,
//       'query_var' => true,
//       'rewrite' => array( 'slug' => 'location', 'with_front' => false ),
//       'public' => true,
//       'has_archive' => true,
//       'show_in_rest' => true // Needed for tax to appear in Gutenberg editor
//     );
//     register_taxonomy('location', 'careers', $args);
//   }
//   add_action( 'init', 'create_hierarchical_taxonomy_location', 0 );