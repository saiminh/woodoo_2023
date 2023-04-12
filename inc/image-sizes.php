<?php

function woodoo_add_image_sizes() {
  add_image_size( 'square-xs', 320, 320, true );
  add_image_size( 'square-s', 480, 480, true );
  add_image_size( 'square', 640, 640, true );
  add_image_size( 'square-l', 720, 720, true );
  add_image_size( 'square-xl', 1080, 1080, true );
  add_image_size( 'square-xxl', 1280, 1280, true );
  add_image_size( 'portrait-xs', 480, 538, true ); 
  add_image_size( 'portrait-s', 640, 717, true ); 
  add_image_size( 'portrait', 840, 940, true ); // aspect 0.8936170213
  add_image_size( 'portrait-l', 1040, 1165, true );
  add_image_size( 'portrait-xl', 1680, 1880, true );
  add_image_size( 'slider-gallery-xs', 390, 200, true);
  add_image_size( 'slider-gallery-s', 701, 360, true);
  add_image_size( 'slider-gallery', 1130, 580, true);
  add_image_size( 'slider-gallery-l', 1948, 1000, true);
  add_image_size( 'slider-gallery-xl', 2337, 1200, true);
  
  
  // add_image_size( 'hero', 1920, 1280 );
  // add_image_size( 'founder-photo-x-large', 1060, 871, true );
  // add_image_size( 'founder-photo-large', 760, 624, true );
  // add_image_size( 'founder-photo', 560, 460, true );
  // add_image_size( 'founder-photo-s', 460, 378, true );
  // add_image_size( 'teammember-photo-small', 320, 480, true );
  // add_image_size( 'teammember-photo-medium', 480, 720, true );
  // add_image_size( 'teammember-photo-large', 700, 1050, true );
  // add_image_size( 'teammember-photo-full', 1280, 1920, true );
}
add_action('after_setup_theme', 'woodoo_add_image_sizes');

function woodoo_custom_sizes( $sizes ) {
  return array_merge( $sizes, array(
    'square' => __( 'Square (33% wide)' ),
    'square-s' => __( 'Square (25% wide)' ),
    'portrait' => __( 'Half Hero' ),
    'slider-gallery' => __( 'Slider Gallery' ),
    'slider-gallery-s' => __( '50% Landscape rectangle' ),
    ) );
}

add_filter( 'image_size_names_choose', 'woodoo_custom_sizes' );

function my_content_image_sizes_attr( $sizes, $size, $image_src, $image_meta, $attachment_id ) {
  $width = $size[0];
  $height = $size[1];
  
  if ( str_contains( $image_src, 'image-549-scaled' )) {
    $sizes = '(min-width: 782px) 100vw, 400vw';
  }
  //square 33%
  if ( $width == 640 && $height == 640 ) {
    $sizes = '(min-width: 782px) 32vw, 100vw';
  }
  //square 25%
  if ( $width == 480 && $height == 480 ) {
    $sizes = '(min-width: 782px) 23vw, 100vw';
  }
  //portrait 50%
  if ( $width == 840 && $height == 940 ) {
    $sizes = '(min-width: 782px) 50vw, 100vw';
  }
  //slider gallery
  if ( $width == 1130 && $height == 580 ) {
    $sizes = '(min-width: 782px) 85vw, 78vw';
  }
  //50% Landscape Rectangle
  if ( $width == 701 && $height == 360 ) {
    $sizes = '(min-width: 782px) 95vw, 47vw';
  }
  if ( get_post_type() == 'partners' ) {
    $sizes = '(min-width: 782px) 22vw, 100vw';
  }
  
  return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'my_content_image_sizes_attr', 10, 5 );

