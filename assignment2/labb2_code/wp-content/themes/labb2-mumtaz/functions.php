<?php

//For getting page title and pictures
function mumtaz_theme_support(){
    add_theme_support( 'title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','mumtaz_theme_support');
//Creating main menu, sidebar blog menu and sidebar menu
function mumtaz_menus(){
    $locations = array(
        'primary' => "Desktop menu",
        'sidebar' => "Sidebar menu"
    );
    register_nav_menus($locations);
}
add_action('init','mumtaz_menus');

//css file, bootstrap file and fontawsome
function mumtaz_register_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('mumtaz-bootrstrap',get_template_directory_uri(  )."/assets/css/bootstrap.css",array(),'v3.3.7','all');
    wp_enqueue_style('mumtaz-css',get_template_directory_uri(  )."/assets/css/style.css",array(),$version,'all');
    wp_enqueue_style('mumtaz-fontawsome',get_template_directory_uri(  )."/assets/css/bootstrap.css",array(),'4.6.3','all');
    
}
add_action('wp_enqueue_scripts','mumtaz_register_styles');

/*
add_action( 'wp_enqueue_scripts', 'mywptheme_child_deregister_styles', 11 );
function mywptheme_child_deregister_styles() {
    wp_dequeue_style( 'twentyten' );
    wp_deregister_style( 'twentyten' );
}
*/
//for js and jquery files
function mumtaz_register_scripts(){
    wp_enqueue_script('mumtaz-jquery',get_template_directory_uri(  )."/assets/js/jquery.js",array(),'3.1.0',false);
    wp_enqueue_script('mumtaz-script',get_template_directory_uri(  )."/assets/js/script.js",array(),'1.0',true);
}
add_action('wp_enqueue_scripts','mumtaz_register_scripts');

//footer area widgets
function mumtaz_widget_areas(){
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
        ),
        array(
            'name' => 'Footer Area',
            'id' => 'sidebar-1',
            'description' => 'Footer widget area'
        )
    );
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
        ),
        array(
            'name' => 'Footer Area',
            'id' => 'sidebar-2',
            'description' => 'Footer widget area'
        )
    );
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
        ),
        array(
            'name' => 'Footer Area',
            'id' => 'sidebar-3',
            'description' => 'Footer widget area'
        )
    );
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
        ),
        array(
            'name' => 'Footer Area',
            'id' => 'sidebar-4',
            'description' => 'Footer widget area'
        )
    );
}
add_action('widgets_init','mumtaz_widget_areas');

/*********************************/
/* Change Search Button Text
/**************************************/

// Add to your child-theme functions.php
add_filter('get_search_form', 'my_search_form_text');
 
function my_search_form_text($text) {
     $text = str_replace('value="Search"', 'value="Sök"', $text); //set as value the text you want
     return $text;
}

//To remove sidebar complementry from Shop page

function disable_woo_commerce_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 
}

add_action('init', 'disable_woo_commerce_sidebar');


/* Custom Post Type Start */
function mumtaz_create_posttype() {
    register_post_type( 'New Arrivals',
    // CPT Options
    array(
      'labels' => array(
       'name' => __( 'New Arrivals' ),
       'singular_name' => __( 'New Arrival' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'new_arrivals'),
     )
    );
    }
    // Hooking up our function to theme setup
    add_action( 'init', 'mumtaz_create_posttype' );
    /* Custom Post Type End */

add_theme_support( 'woocommerce' );
?>

