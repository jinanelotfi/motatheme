<div class="photo-icons">
    <div class="icon info-icon">
        <a href="<?php the_permalink(); ?>">
            <img class="eye-image" src="<?php echo get_template_directory_uri() . '/assets/images/eye.png'; ?>" alt="">
        </a>
    </div>

        <?php
        $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
        $reference = get_field('reference');
        $category = '';
        $terms = get_the_terms(get_the_ID(), 'categorie');
            if (!empty($terms)) {
                foreach ($terms as $term) {
                         $category = $term->name; 
                }
            }
        

        ?>
    <div class="icon full-screen-icon" id="fullScreenIcon" data-url="<?php echo $image_url; ?>" data-reference="<?php echo $reference; ?>">       

        <img class="full-screen-image" src="<?php echo get_template_directory_uri() . '/assets/images/full-screen.png'; ?>" alt="">


    </div>
    <div id="info-lightbox" class="icon cat-ref-lightbox">


        
        <p id="reference-lightbox" class="reference-lightbox" data-url="<?php echo $reference; ?>"><?php echo $reference; ?></p>
        <p id="categorie-lightbox" class="categorie-lightbox" data-url="<?php echo $category; ?><?php echo $category; ?>
            
        </p>
    </div>
</div>