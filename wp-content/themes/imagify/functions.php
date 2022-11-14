<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.0.0' );

//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );


/* * ********************
 * Add Custom CSS
 * ******************* */
add_action('wp_enqueue_scripts', 'custom_style_sheet', 2);
function custom_style_sheet()
{
    // wp_enqueue_style('slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array());
    // wp_enqueue_style('slicktheme', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css', array());
    wp_enqueue_style('font-awesome.min', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array());
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', array());
    wp_enqueue_style('aos', get_stylesheet_directory_uri() . '/css/aos.css', array());
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/css/slick.min.css', array());
    wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/css/slick-theme.min.css', array());
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/css/custom.css', array());
}


/* * ********************
 * Add Custom Js
 * ******************* */

add_action('wp_enqueue_scripts', 'custom_enqueue_script');
function custom_enqueue_script()
{
    wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/js/slick.min.js', array('jquery'), '', true);
    wp_enqueue_script('aos', get_stylesheet_directory_uri() . '/js/aos.js', array('jquery'), '', true);
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '', true);
}

/* * ********************
 * Custom Post Type
 * ******************* */

add_action('init', 'theme_custom_init');

function theme_custom_init()
{

    /* Events Post Type  */
    $labels = array(
        'name' => _x('Slides', 'post type general name'),
        'singular_name' => _x('Slide', 'post type singular name'),
        'add_new' => _x('Add New', 'Slide'),
        'add_new_item' => __('Add New Slide'),
        'edit_item' => __('Edit Slide'),
        'new_item' => __('New Slide'),
        'all_items' => __('All Slides'),
        'view_item' => __('View All Slides'),
        'search_items' => __('Search Slides'),
        'not_found' => __('No Slides found'),
        'not_found_in_trash' => __('No Slides found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Slides'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
    );
    register_post_type('slide', $args);
}