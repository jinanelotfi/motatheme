<?php
if (isset($context) && $context === 'photo_block') {
    $link = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
} else {
    $image_url = get_permalink();
    $link = $image_url;
}
?>

<a href="<?php echo $link; ?>" >
    <?php the_post_thumbnail('full', ['class' => 'sim-image']); ?>
    
</a>

<!-- class="lightbox-link" -->