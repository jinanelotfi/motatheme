<?php get_header(); ?>
<main>

    <div class="gallery">
        <?php
        // WP_Query pour afficher les éléments du CPT "photo"
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => -1,
        );

        $query = new WP_Query($args);
        ?>

        <?php if ($query->have_posts()) : ?>
            <div class="gallery-container">
                <!-- <div class="gallery-item"> -->
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <!-- <div class="gallery-item"> -->
                        <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail('medium', ['class' => 'image-gallery']) ?>
                        </a>
                    <!-- </div> -->
                    
                    
                <?php endwhile ?>
                
                <?php wp_reset_postdata() ?>
                <!-- </div> -->
                <?php get_template_part('templates/load-more'); ?>
            </div>
        <?php else : ?>
            <h1>Pas d'article</h1>    
        <?php endif; ?>
    </div>


</main>
<?php get_footer(); ?>


<?php function mota_galerie_request() {
    $query = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 4,
        'paged' => $_POST['paged'],
    ]);

    $response = ''; ?>

    <?php if($query->have_posts()) : ?>
        <div class="gallery-container">
            <?php while($query->have_posts()) : $query->the_post();
            $response .= get_template_part('templates/post-boucle'); ?>
        <?php endwhile; ?>
        </div>    
    <?php else : 
        $response = ''; 
    endif; 

    

    echo $response;
    exit;
    wp_die();
} 

add_action('wp_ajax_request_gallery', 'mota_galerie_request');
add_action('wp_ajax_nopriv_request_gallery', 'mota_galerie_request');

?>
