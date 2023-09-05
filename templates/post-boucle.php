<?php
if (isset($context) && $context === 'photo_block') {
    $link = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
} else {
    $image_url = get_permalink();
    $link = $image_url;
}
?>

<div class="gallery-boucle" >
    <?php the_post_thumbnail('full', ['class' => 'sim-image']); ?>
    <?php get_template_part('templates/overlay') ?>    
</div>