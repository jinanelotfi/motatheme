<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <?php wp_head() ?>
</head>
<body>
    <nav class="navbar">
        <div class="container-navigation">
            <!-- <a class="navbar-brand" href="#">< bloginfo('name') ?></a>         -->            
            <?php
                if(function_exists('the_custom_logo')) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'large');
                }
            ?>
            <img class="logo-site" src="<?php echo $logo[0] ?>" alt="logo">
            <div class="main-navigation">            
                <?php 
                    wp_nav_menu([
                        'theme_location' => 'header',
                        'container' => false,
                        'menu_class' => 'navbar-nav',
                    ])
                ?>
            </div>
        </div>
    </nav>