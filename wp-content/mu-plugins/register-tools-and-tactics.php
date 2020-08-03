<?php

/*
 * Plugin Name: Register Tools and Tactics
 * Description: Configuration and registration for the Tools and Tactics custom post type.
 * Author: NYC Opportunity
 */
/*
add_action('init', function () {
  $labels = array(
    'name' => __('Tools and Tactics'),
    'singular_name' => __('Tools and Tactics')
  );

  register_post_type('tools-and-tactics', array(
    'label' => __('Tools and Tactics'),
    'description' => __('Civic Service Design Tools + Tactics is an \
      introduction to service design for public servants, and a set of \
      practical ways to include design methods in your work.'),
    'labels' => $labels,
    'show_in_rest' => true,
    'supports' => ['title', 'editor'],
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'post'
  ));
}, 0);
*/
