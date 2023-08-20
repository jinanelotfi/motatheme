<div class="related-photos-block">
    <h2>Vous aimerez aussi</h2>
<div class="similar-container">
<?php
    $categorie = array_map(function ($term) {
    return $term->term_id;
    }, get_the_terms(get_post(), 'categorie'));
    $query = new WP_Query([
        'post_not_in' => [get_the_ID()],
        'post_type' => 'photo',
        'posts_per_page' => 2,
        'orderby' => 'rand',
        'tax_query' => [
            [
                'taxonomy' => 'categorie',
                'operator' => 'exists',
                'terms' => $categorie
            ]
        ]
    ]);
    while($query->have_posts()): $query->the_post();
    ?>
    <div class="photo-block">
        <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" class="lightbox-link">
        <?php the_post_thumbnail('full', ['class' => 'full-image']); ?>
        </a>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>

</div>
</div>
