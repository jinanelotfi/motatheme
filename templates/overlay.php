<div class="photo-icons">
    <div class="icon info-icon">
        <a href="<?php the_permalink(); ?>">
            <img class="eye-image" src="<?php echo get_template_directory_uri() . '/assets/images/eye.png'; ?>" alt="">
        </a>
    </div>
    <div class="icon full-screen-icon">
        <img class="full-screen-image" src="<?php echo get_template_directory_uri() . '/assets/images/full-screen.png'; ?>" alt="">
    </div>
    <div class="icon cat-ref-lightbox">
        <p class="reference-lightbox" ><?php echo get_field('reference'); ?></p>
        <p class="categorie-lightbox">
            <?php
            $terms = get_the_terms(get_the_ID(), 'categorie');
            if (!empty($terms)) {
                foreach ($terms as $term) {
                    echo $term->name . ' ';
                    $categoryFound = $term->slug;
                }
            }
            ?>
        </p>
    </div>
</div>