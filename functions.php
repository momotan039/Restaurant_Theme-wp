<?php
//setup theme
function theme_setup() {
    add_theme_support('post-thumbnails'); // Enable featured images
    register_nav_menu('header-menu', __('Header Menu'));//enable menu 
}
add_action('after_setup_theme', 'theme_setup');

//add css files
function css_enqueue_styles() {
    // Get the theme directory URL
    $theme_uri = get_template_directory_uri();

    // Enqueue Styles
    wp_enqueue_style('animate', $theme_uri . '/assets/lib/animate/animate.min.css');
    wp_enqueue_style('owlcarousel', $theme_uri . '/assets/lib/owlcarousel/assets/owl.carousel.min.css');
    wp_enqueue_style('tempusdominus', $theme_uri . 'lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css');
    wp_enqueue_style('bootstrap', $theme_uri . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('style', $theme_uri . '/assets/css/style.css');

    // Enqueue WordPress default stylesheet
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'css_enqueue_styles');

//add js files
function js_enqueue_scripts() {
    $theme_uri = get_template_directory_uri();
    // Enqueue Scripts
    wp_enqueue_script('wow', $theme_uri . '/assets/lib/wow/wow.min.js', array('jquery'), null, true);
    wp_enqueue_script('easing', $theme_uri . '/assets/lib/easing/easing.min.js', array('jquery'), null, true);
    wp_enqueue_script('waypoints', $theme_uri . '/assets/lib/waypoints/waypoints.min.js', array('jquery'), null, true);
    wp_enqueue_script('counterup', $theme_uri . '/assets/lib/counterup/counterup.min.js', array('jquery'), null, true);
    wp_enqueue_script('owlcarousel', $theme_uri . '/assets/lib/owlcarousel/owl.carousel.min.js', array('jquery'), null, true);
    wp_enqueue_script('moment', $theme_uri . '/assets/lib/tempusdominus/js/moment.min.js', array('jquery'), null, true);
    wp_enqueue_script('moment-timezone', $theme_uri . '/assets/lib/tempusdominus/js/moment-timezone.min.js', array('jquery'), null, true);
    wp_enqueue_script('tempusdominus', $theme_uri . '/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js', array('jquery'), null, true);
    wp_enqueue_script('main', $theme_uri . '/assets/js/main.js', array('jquery'), null, true);

}
add_action('wp_enqueue_scripts', 'js_enqueue_scripts');

// load theme settings
require_once get_template_directory() . '/inc/theme-settings.php';
