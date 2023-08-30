<?php get_header(); ?>
<main>

    <div class="gallery">
        <?php
        // WP_Query pour afficher les éléments du CPT "photo"
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 12,
        );

        $query = new WP_Query($args);
        ?>

        <!-- Section Filtres -->
        <?php get_template_part('templates/filter-cat'); ?>
        <?php get_template_part('templates/filter-format'); ?>
        <!-- Fin section Filtres -->


        <?php if ($query->have_posts()) : ?>
            <div class="gallery-container" id="ajax_return">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('templates/post-boucle'); ?>               
                <?php endwhile ?>
            </div>
        <?php else : ?>
            <h1>Pas d'article</h1>    
        <?php endif; ?>
        <?php wp_reset_postdata() ?>
        <!-- bouton Chargez plus -->
        <?php get_template_part('templates/load-more'); ?>
        
    </div>
    <!-- <img class="img-img" src="< echo get_template_directory_uri() . '/assets/images/nathalie-4.jpeg'; ?>" alt=""> -->
    
  


</main>
<?php get_footer(); ?>
