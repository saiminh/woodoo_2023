<?php

if ( ! function_exists( 'woodoo2023' ) ) :
  function woodoo2023()  {
    // Adding support for core block visual styles.
    add_theme_support( 'wp-block-styles' );
    // Enqueue editor styles.
    add_editor_style( 'style-editor.css' );
  }
  add_action( 'after_setup_theme', 'woodoo2023' );
endif;

function woodoo2023_scripts() {
  wp_enqueue_style( 
    'woodoo2023-style', 
    get_template_directory_uri() . '/style.css', 
    array(), 
    wp_get_theme()->get( 'Version' ) 
  );
  // No site-wide JS at the moment
  // wp_enqueue_script( 'header', get_template_directory_uri().'/assets/js/index.js', array(), false, true );

  // Enqueue JS only for certain pages
  // ––––––––––––––––––––––––––––––––
  // global $post;
  // if( $post && strpos( $post->post_content, 'peak-faq' ) !== false) {
  //   wp_enqueue_script( 'faqs', get_template_directory_uri().'/assets/js/faqs.min.js', array(), false, true );
  // }
  // if( is_home() || is_archive() || is_search() ) {
  //   wp_enqueue_script( 'faqs', get_template_directory_uri().'/assets/js/cat-filter.min.js', array(), false, true );
  // }
}
add_action( 'wp_enqueue_scripts', 'woodoo2023_scripts' );

require_once get_template_directory() . '/inc/custom-post-template.php';
require_once get_template_directory() . '/inc/custom-post-type-partners.php';
require_once get_template_directory() . '/inc/custom-post-type-careers.php';
require_once get_template_directory() . '/inc/add-slug-to-body-class.php';
require_once get_template_directory() . '/inc/image-sizes.php';