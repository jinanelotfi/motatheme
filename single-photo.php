<?php get_header(); ?>

<main class="single-photo">

    <?php while (have_posts()) : the_post(); ?>
        <div class="photo-details">
            <div class="info-block">
                <h1><?php the_title(); ?></h1>
                <p>Réf. photo: <?php echo get_field('reference'); ?></p>
                <p>Catégorie: <?php echo get_the_term_list(get_the_ID(), 'categorie', '', ', '); ?></p>
                <p>Format: <?php echo get_the_term_list(get_the_ID(), 'format', '', ', '); ?></p>
                <p>Date de prise de vue: <?php echo get_the_date('Y'); ?></p>                    
            </div>
            <div class="photo-block">
                <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" class="lightbox-link">
                    <?php the_post_thumbnail('full', ['class' => 'full-image']); ?>
                </a>
            </div>
        </div>
        <div class="interaction-block">
            <div class="modale-single">
                <p>Cette photo vous intéresse ?</p>
                <button id="myBtn" class="prefill-reference" <?php if (is_single()) { echo 'data-reference="' . get_field('reference') . '"'; } ?>>Contact</button>
                <!-- on récupère la modale de contact -->
                <?php get_template_part('templates/contact') ?>
            </div>
            <div class="nav-links">
                <div class="nav-links-container">
                    <a href="<?php echo get_permalink(get_adjacent_post(false, '', false)); ?>" class="nav-link prev-link">
                        <span class="nav-thumbnail prev-img">
                            <?php echo get_the_post_thumbnail(get_adjacent_post(false, '', false), 'thumbnail'); ?>
                        </span>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow-left.png'; ?>" alt="flèche gauche" id="arrow-left">
                    </a>
                    <a href="<?php echo get_permalink(get_adjacent_post(false, '', true)); ?>" class="nav-link next-link">
                        <span class="nav-thumbnail next-img">
                            <?php echo get_the_post_thumbnail(get_adjacent_post(false, '', true), 'thumbnail'); ?>
                        </span>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/arrow-right.png'; ?>" alt="flèche droite" id="arrow-right">
                    </a>
                </div>
            </div>
        </div>
        <!-- Ajout du block photos similaires -->
        <?php get_template_part('templates/photo_block'); ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="button">Toutes les photos</a>
    <?php endwhile; ?>
    

</main>

<?php get_footer(); ?>
