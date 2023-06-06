<?php 

if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

  function mytheme_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => 'Primary Menu',
        'footer_tech_menu'  => 'Footer Technology Platforms Menu',
        'footer_pages_menu'  => 'Footer Pages Menu',
        'footer_legal_menu'  => 'Footer Legal Menu',
        'footer_privacy_menu'  => 'Footer Privacy Menu',
    ) );
  }
  add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}