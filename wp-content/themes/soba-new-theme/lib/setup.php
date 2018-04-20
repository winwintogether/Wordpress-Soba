<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');
  add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

  add_post_type_support( 'page', 'excerpt' );
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Top Navigation', 'sage'),
    'drill_menu' => __('Mobile Menu', 'sage'),
    'topbar_menu' => __('Main Navigation', 'sage'),
    'staff_navigation' => __('Staff Menu', 'sage')
    
  ]);

  add_theme_support('post-thumbnails');
  add_image_size( 'staff-thumb', 600, 600 ); //300 pixels wide (and unlimited height)
  add_image_size( 'secondary-featured', 619, 309, array( 'top', 'left') ); 
  add_image_size( 'normal-loop', 619, 294, array( 'top', 'left') ); 
  add_image_size( 'gallery-thumb', 300, 300, array( 'top', 'left') ); 
  add_image_size( 'main-thumb', 617, 441, array( 'top', 'left') ); 
  add_image_size( 'slider-thumb', 330, 330, array( 'top', 'left') ); 
  add_image_size( 'featured-service', 600, 600, array( 'top', 'left') ); 
  add_image_size( 'featured-service-two', 1000, 500, array( 'top', 'left') ); 
  add_image_size( 'video-thumb', 700, 400, array( 'top', 'left') ); 

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

    register_sidebar([
        'name' => __('Widget Area 1', 'sage'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s widget_container">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ]);

    // Define Sidebar Widget Area 2
    register_sidebar([
        'name' => __('Footer Widget 1', 'sage'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'footer-widget-1',
        'before_widget' => '<div id="%1$s" class="%2$s grid_3 widget_container">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ]);

    register_sidebar([
        'name' => __('Footer Widget 2', 'sage'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'footer-widget-2',
        'before_widget' => '<div id="%1$s" class="%2$s grid_3 widget_container">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ]);

     register_sidebar([
        'name' => __('Footer Widget 3', 'sage'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'footer-widget-3',
        'before_widget' => '<div id="%1$s" class="%2$s grid_3 widget_container">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ]);

    register_sidebar([
        'name' => __('Footer Widget 4', 'sage'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'footer-widget-4',
        'before_widget' => '<div id="%1$s" class="%2$s grid_3 widget_container_no_border">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_page_template('template-custom.php'),
    is_page_template('full-width.php'),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
  wp_localize_script( 'sage/js', 'ajax_posts', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'noposts' => __('No older posts found', 'html5blank'),
  ));

}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);


