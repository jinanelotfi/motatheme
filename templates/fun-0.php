<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
    wp_enqueue_style('motatheme-style', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), filemtime(get_stylesheet_directory() . '/dist/css/style.css'));
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/parts/main.js', array(), filemtime(get_stylesheet_directory() . '/parts/main.js'), true);
    // wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/parts/main.js', array(), filemtime(get_stylesheet_directory() . '/parts/script.js'), true);
    $args = array(
        'post_type' => 'photo', // Remplacez par le type de publication que vous chargez
        'posts_per_page' => -1, // Charger toutes les publications
    );

    $posts_query = new WP_Query($args);

    $post_ids = wp_list_pluck($posts_query->posts, 'ID');

    $posts_per_page = 1; // Nombre de publications par page
    $total_posts = $posts_query->found_posts; // Nombre total de publications

    $your_max_page_number = ceil($total_posts / $posts_per_page);

    wp_enqueue_script('capitaine', get_template_directory_uri() . '/parts/script.js', ['jquery'], '1.0', true);
    wp_localize_script('capitaine', 'load_more_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'posts' => json_encode($post_ids),
        'current_page' => 1,
        'max_page' => $your_max_page_number,
    ));

    
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



// script Ajax
function capitaine_load_comments() {

    // Ces lignes sont commentées pour pouvoir faire fonctionner le bouton sans être connecté ou publié

	// Vérification de sécurité
  	// if( 
	// 	! isset( $_REQUEST['nonce'] ) or 
    //    	! wp_verify_nonce( $_REQUEST['nonce'], 'capitaine_load_comments' ) 
    // ) {
    // 	wp_send_json_error( "Vous n’avez pas l’autorisation d’effectuer cette action.", 403 );
  	// }
    
    // On vérifie que l'identifiant a bien été envoyé
    // if( ! isset( $_POST['postid'] ) ) {
    // 	wp_send_json_error( "L'identifiant de l'article est manquant.", 403 );
  	// }
    // Fin du commentaire des lignes de code de sécurité et vérification 

    
  	// Récupération des données du formulaire
  	$post_id = intval( $_POST['postid'] );
    
	// Vérifier que l'article est publié, et public
	// if( get_post_status( $post_id ) !== 'publish' ) {
    // 	wp_send_json_error( "Vous n'avez pas accès aux commentaires de cet article.", 403 );
	// }

  	// Utilisez sanitize_text_field() pour les chaines de caractères.
  	// exemple : 
    $name = sanitize_text_field( $_POST['name'] );

  	// Requête des commentaires
  	// $comments = get_comments([
    // 	'post_id' => $post_id,
    // 	'status' => 'approve'
  	// ]);

  	// // Préparer le HTML des commentaires
  	// $html = wp_list_comments([
    // 	'per_page' => -1,
    // 	'avatar_size' => 76,
    // 	'echo' => false,
  	// ], $comments );
      $args = array(
        'post_type' => 'photo',
        'paged' => $_POST['page'] + 1,
    );

    $query = new WP_Query($args);

    ob_start(); // Début de la capture de sortie
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <!-- Capture le contenu du template photo_block.php -->
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', ['class' => 'image-gallery']); ?>
            </a>
        <?php endwhile;
    endif;
    $gallery_html = ob_get_clean(); // Fin de la capture et récupération du contenu

    // Envoyer les données au navigateur
    wp_send_json_success(array('gallery_html' => $gallery_html));
    
    
    
    

  	// Envoyer les données au navigateur
	// wp_send_json_success( $query );
}

add_action( 'wp_ajax_capitaine_load_comments', 'capitaine_load_comments' );
add_action( 'wp_ajax_nopriv_capitaine_load_comments', 'capitaine_load_comments' );