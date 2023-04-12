<?php 
/**
 * Add Custom post types and their taxonomies
 *
 * @package peak2021
 */

function create_posttype() {
  register_post_type( 'partners',
  // CPT Options
    array(
      'labels' => array(
        'name' => __( 'Creative Studio Projects' ),
        'singular_name' => __( 'Creative Studio Project' ),
      ),
      'public' => true,
      'show_ui' => true,
      'show_in_rest' => true,
      'has_archive' => 'partners-archive',
      'taxonomies' => array('technology'),
      'supports' => array( 'title', 'editor', 'date', 'custom-fields', 'permalinks', 'thumbnail' ),
      'template' => array(
        array( 'core/post-featured-image', array(
          'lock' => array(
            'move'   => false,
            'remove' => false,
          ),
        ) ),
        array( 'core/group', array(
          'layout' => array(
            'type' => 'flex',
            'flexWrap' => 'nowrap',
            'justifyContent' => 'space-between',
          ), 
          'style' => array(
            'spacing' => array(
              'padding' => array(
                'right' => 'var:preset|spacing|s',
                'left' => 'var:preset|spacing|s'
              )
            )
          )), 
          array (
            array (
              'core/post-date', array(
                'format' => 'Y/n/j',
                'style' => array(
                  'color' => array(
                    'text' => 'var:preset|color|yellow'
                  ),
                )
              )
            ),
            array (
              'core/post-terms', array(
                'term' => 'technology',
                'style' => array(
                  'typography' => array (
                    'textTransform' => 'uppercase'
                  ),
                  'color' => array(
                    'text' => 'var:preset|color|yellow'
                  ),
                )
              )
            )
          )
        ),
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
            array( 'core/separator', array(
              'align' => 'wide',
              'backgroundColor' => 'base',
              'className' => 'is-style-wide',
              'style' => array(
                'color' => array(
                  'text' => 'var:preset|color|base'
                )
              )
            )),
            array( 'core/paragraph', array(
              'placeholder' => 'Write description…',
            ) ),
            array( 'create-block/woodoo-partner-logos', array(
              'partnerLogo' => ''
            ))
          ))
      )
    )
  );
  flush_rewrite_rules(); 
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype', 0 );

function create_hierarchical_taxonomy_technology() {
  // Add new taxonomy, make it hierarchical like categories
  //first do the translations part for GUI
    $labels = array(
      'name' => _x( 'Technology Platforms', 'taxonomy general name' ),
      'singular_name' => _x( 'Technology Platform', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Technology Platforms' ),
      'all_items' => __( 'All Technology Platforms' ),
      'parent_item' => __( 'Parent Technology Platform' ),
      'parent_item_colon' => __( 'Parent Technology Platform:' ),
      'edit_item' => __( 'Edit Technology Platform' ), 
      'update_item' => __( 'Update Technology Platform' ),
      'add_new_item' => __( 'Add New Technology Platform' ),
      'new_item_name' => __( 'New Technology Platform Name' ),
      'menu_name' => __( 'Technology Platforms' )
    );    
    $args = array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'technology-platform', 'with_front' => false ),
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true // Needed for tax to appear in Gutenberg editor
    );
  // Now register the taxonomy
    register_taxonomy('technology', 'partners', $args);
  }
  //hook into the init action and call create_hierarchical_taxonomy_technology when it fires
  add_action( 'init', 'create_hierarchical_taxonomy_technology', 0 );