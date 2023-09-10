<div class="hero-container">
    <div class="hero-image">
        <?php            
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 1,
            'orderby' => 'rand'
        );

        $query = new WP_Query($args);
        ?>

        <?php while($query->have_posts()): $query->the_post(); ?>
            <?php 
            get_template_part('templates/post-boucle'); ?>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <div class="hero-title">
        <p>Photographe Event</p>
    </div>
</div>
