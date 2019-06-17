<?php
/**
 * Plugin Name: WP Rating
 * Plugin URI:  http://boxxom.com
 * Description: A rating Plugin
 * Version:     1.0.0
 * Author:      Sebastian Vogt
 * Author URI:  http://boxxom.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-rating
 * Domain Path: /languages
 */



 // Register Custom Post Type
 function wp_rating_add_post_type() {

 	$labels = array(
 		'name'                  => _x( 'Ratings', 'Post Type General Name', 'wp-rating' ),
 		'singular_name'         => _x( 'Rating', 'Post Type Singular Name', 'wp-rating' ),
 		'menu_name'             => __( 'Ratings', 'wp-rating' ),
 		'name_admin_bar'        => __( 'Ratings', 'wp-rating' ),
 		'archives'              => __( 'Item Archives', 'wp-rating' ),
 		'attributes'            => __( 'Item Attributes', 'wp-rating' ),
 		'parent_item_colon'     => __( 'Parent Item:', 'wp-rating' ),
 		'all_items'             => __( 'All Items', 'wp-rating' ),
 		'add_new_item'          => __( 'Add New Item', 'wp-rating' ),
 		'add_new'               => __( 'Add New', 'wp-rating' ),
 		'new_item'              => __( 'New Item', 'wp-rating' ),
 		'edit_item'             => __( 'Edit Item', 'wp-rating' ),
 		'update_item'           => __( 'Update Item', 'wp-rating' ),
 		'view_item'             => __( 'View Item', 'wp-rating' ),
 		'view_items'            => __( 'View Items', 'wp-rating' ),
 		'search_items'          => __( 'Search Item', 'wp-rating' ),
 		'not_found'             => __( 'Not found', 'wp-rating' ),
 		'not_found_in_trash'    => __( 'Not found in Trash', 'wp-rating' ),
 		'featured_image'        => __( 'Featured Image', 'wp-rating' ),
 		'set_featured_image'    => __( 'Set featured image', 'wp-rating' ),
 		'remove_featured_image' => __( 'Remove featured image', 'wp-rating' ),
 		'use_featured_image'    => __( 'Use as featured image', 'wp-rating' ),
 		'insert_into_item'      => __( 'Insert into item', 'wp-rating' ),
 		'uploaded_to_this_item' => __( 'Uploaded to this item', 'wp-rating' ),
 		'items_list'            => __( 'Items list', 'wp-rating' ),
 		'items_list_navigation' => __( 'Items list navigation', 'wp-rating' ),
 		'filter_items_list'     => __( 'Filter items list', 'wp-rating' ),
 	);
 	$args = array(
 		'label'                 => __( 'Rating', 'wp-rating' ),
 		'labels'                => $labels,
 		'supports'              => array( 'title', 'editor' ),
 		'hierarchical'          => false,
 		'public'                => true,
 		'show_ui'               => true,
 		'show_in_menu'          => true,
 		//'menu_position'         => 5,
 		'show_in_admin_bar'     => true,
 		'show_in_nav_menus'     => true,
 		'can_export'            => true,
 		'has_archive'           => true,
 		'exclude_from_search'   => false,
 		'publicly_queryable'    => true,
 		'capability_type'       => 'post',
 	);
 	register_post_type( 'wp_rating', $args );

 }
 add_action( 'init', 'wp_rating_add_post_type', 0 );



function wp_rating_add_custom_meta_box() {


  add_meta_box(
    'wp_rating_editor',
    __('Rating', 'wp-rating'),
    'wp_rating_editor',
    'wp_rating',
    'advanced',
    'high'
  );
}

function wp_rating_editor($post) {
  $output = '';
  $output .= '<p>Willkommen bei Rating!</p>';
  $output .= "<p>$post->ID</p>";
  echo $output;
  /*echo 'Test <br/>';
  var_dump($post);
  echo '<br/>';
  print_r($post);
  echo "<h3>$post->ID</h3>";*/
}

 add_action('add_meta_boxes', 'wp_rating_add_custom_meta_box');
