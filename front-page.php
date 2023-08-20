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
            </div>
        <?php else : ?>
            <h1>Pas d'article</h1>    
        <?php endif; ?>
    </div>


</main>
<?php get_footer(); ?>
