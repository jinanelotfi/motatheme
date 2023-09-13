<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
    wp_enqueue_style('motatheme-style', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), filemtime(get_stylesheet_directory() . '/dist/css/style.css'));
    
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/parts/main.js', array(), filemtime(get_stylesheet_directory() . '/parts/main.js'), true);
    
    // Chargement des scripts pour Ajax bouton load-more
    wp_enqueue_script('load-more', get_template_directory_uri() . '/parts/script.js', array('jquery'), filemtime(get_stylesheet_directory() . '/parts/script.js'), true);
    wp_localize_script('load-more', 'load_js', array('ajax_url' => admin_url('admin-ajax.php')));

   
    
}


function motatheme_supports() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
    register_nav_menu('toggle', 'Menu burger');
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

function motatheme_init() {
    register_taxonomy('categorie', 'photo',[
        'labels' => [
            'name' => 'Catégories',
            'singular_name' => 'Catégorie',
            'plural_name' => 'Catégories',
            'search_icons' => 'Rechercher une catégorie',
            'all_items' => 'Toutes les catégories',
            'edit_items' => 'Editer la catégorie',
            'update_item' => 'Mettre à jour la catégorie',
            'add_new_item' => 'Ajouter une nouvelle catégorie',
            'new_item_name' => 'Nom de la nouvelle catégorie',
            'menu_name' => 'Catégories',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'has_archive' => true,
    ]);
};

add_action('init', 'motatheme_init');
add_action('after_setup_theme', 'motatheme_supports');
add_filter('nav_menu_css_class', 'motatheme_menu_class');
add_filter('nav_menu_link_attributes', 'motatheme_menu__link_class');



// script Ajax bouton load more
function mota_galerie_request() {
    $query = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $_POST['paged'],
    ]);

    $response = '';

    if($query->have_posts()) {
        while($query->have_posts()) : $query->the_post();
        $response .= get_template_part('templates/post-boucle');
        endwhile;       
    } else {
        $response = '';
    }

    echo $response;
    exit;
    wp_die();

    
}

add_action('wp_ajax_request_gallery', 'mota_galerie_request');
add_action('wp_ajax_nopriv_request_gallery', 'mota_galerie_request');


// script Filtres
function mota_galerie_request_by_category() {
    $category = isset($_POST['category']) ? $_POST['category'] : 'all';
    $format = isset($_POST['format']) ? $_POST['format'] : 'all';
    $date = isset($_POST['date']) ? $_POST['date'] : 'desc';
    $tax_query =  array('relation' => 'AND');

    if ($category !== 'all') {
        $tax_query[] = array(
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $category,
          );
    }    

    if ($format !== 'all') {
        $tax_query[] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format,
          );
    }

    $query_args = array(
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'orderby' => 'date',
        'order' => $date,
        'paged' => $_POST['paged'],
        'tax_query' => $tax_query
    );

    $query = new WP_Query($query_args);

    $response = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            $response .= get_template_part('templates/post-boucle');
        endwhile;
    } else {
        $response = '';
    }

    echo $response;
    exit;

}

add_action('wp_ajax_request_gallery_by_category', 'mota_galerie_request_by_category');
add_action('wp_ajax_nopriv_request_gallery_by_category', 'mota_galerie_request_by_category');






