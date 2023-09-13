<?php
/*
Template Name: Page avec Contenu
*/

get_header();
?>

<div class="page-content-default">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>
