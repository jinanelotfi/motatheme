<a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" class="lightbox-link">
    <?php the_post_thumbnail('full', ['class' => 'sim-image']); ?>
</a>