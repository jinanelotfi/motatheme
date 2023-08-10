<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style('motatheme-style', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), filemtime(get_stylesheet_directory() . './dist/css/style.css'));
}


function motatheme_supports() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
    add_theme_support('custom-logo');
}

function motatheme_menu_class ($classes) {
    $classes[] = 'nav-item';
    return $classes;
}

function motatheme_menu__link_class ($attrs) {
    $attrs['class'] = 'nav-link';
    return $attrs;
}

add_action('after_setup_theme', 'motatheme_supports');
add_filter('nav_menu_css_class', 'motatheme_menu_class');
add_filter('nav_menu_link_attributes', 'motatheme_menu__link_class');