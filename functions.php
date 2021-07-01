<?php

function university_files() {
  wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ));
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_stylesheet_uri());
  wp_localize_script('custom-script', 'universityData', array(
    'nonce' => wp_create_nonce('wp_rest')
  ));
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features() {
  add_theme_support('title-tag');
  
}

add_action('after_setup_theme', 'university_features');

function remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

function university_post_types() {
  // Event Post Type
  register_post_type('event', array(
    'show_in_rest' => true,
    'capability_type' => 'event',
    'map_meta_cap' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array('slug' => 'events'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar'
  ));

  // Program Post Type
  register_post_type('program', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor'),
    'rewrite' => array('slug' => 'programs'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Programs',
      'add_new_item' => 'Add New Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ),
    'menu_icon' => 'dashicons-awards'
  ));

  // Professor Post Type
  register_post_type('professor', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'public' => true,
    'labels' => array(
      'name' => 'Professors',
      'add_new_item' => 'Add New Professor',
      'edit_item' => 'Edit Professor',
      'all_items' => 'All Professors',
      'singular_name' => 'Professor'
    ),
    'menu_icon' => 'dashicons-welcome-learn-more'
  ));

  register_post_type('Note', array(
    'capability_type'=> 'note',
    'map_meta_cap' => true,
    'show_in_rest' => true,
    'supports' => array('title', 'editor'),
    'public' => false, //search
    'show_ui' => true,
    'labels' => array(
      'name' => 'Notes',
      'add_new_item' => 'Add Notes',
      'edit_item' => 'Edit Notes',
      'all_items' => 'All Notes',
      'singular_name' => 'Note'
    ),
    'menu_icon' => 'dashicons-welcome-write-blog'
  ));
}

add_action('init', 'university_post_types');

function redirect_to_frontend() {
  $currentUser = wp_get_current_user();
  if(count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }

}
add_action('admin_init', 'redirect_to_frontend');

function no_sub_admin_bar() {
  $currentUser = wp_get_current_user();
  if(count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }

}
add_action('wp_loaded', 'no_sub_admin_bar');

function ourHeaderUrl() {
  return esc_url(site_url('/'));
}

add_filter('login_headerurl', 'ourHeaderUrl');


add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS() {
  wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}

add_filter('login_headertitle', 'custom_login_title');

function custom_login_title() {
  return get_bloginfo('name');
}



