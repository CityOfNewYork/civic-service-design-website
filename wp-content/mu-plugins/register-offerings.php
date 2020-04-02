<?php

/*
 * Plugin Name: Register Offerings
 * Description: Configuration and registration for the Offerings custom post type.
 * Author: NYC Opportunity
 */
/*
add_action('init', function () {
  $labels = array(
    'name' => __('Offerings'),
    'singular_name' => __('Offering')
  );

  register_post_type('offerings', array(
    'label' => __('Offering'),
    'description' => __('Post Type Description'),
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