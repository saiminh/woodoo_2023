<?php 

if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

  function mytheme_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => 'Primary Menu',
        'footer_menu'  => 'Footer Menu',
    ) );
  }
  add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}