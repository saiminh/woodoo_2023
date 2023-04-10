<?php 
/**
 * Add Custom post types and their taxonomies
 *
 * @package peak2021
 */

function woodoo_post_block_template() {

$post_type_object = get_post_type_object( 'post' );
$post_type_object->template = array(
  array( 'core/group', array(
    'align' => 'wide',
    'className' => 'custom-post-block-template',
    'backgroundColor' => 'offwhite',
    'textColor' => 'black',
    'style' => array(
      'spacing' => array(
        'padding' => array(
          'top' => '0px',
          'right' => '0px',
          'bottom' => '0px',
          'left' => '0px'
        )
      )
    )
  ), array(
    array('core/post-featured-image', array()),
    array( 'core/group', array(
      'style' => array(
        'spacing' => array(
          'padding' => array(
            'top' => 'var:preset|spacing|s',
            'right' => 'var:preset|spacing|s',
            'bottom' => 'var:preset|spacing|s',
            'left' => 'var:preset|spacing|s'
          )
        )
      )
    ), array(
      array('core/post-title', array()),
      array('core/post-excerpt', array()),
      array('create-block/woodoo-post-meta', array())
    ))
  ) ),
);
}
add_action( 'init', 'woodoo_post_block_template');

