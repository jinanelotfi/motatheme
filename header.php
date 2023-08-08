<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head() ?>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><?php bloginfo('name') ?></a>        
            <div id="navbarSupportedContent">
            <?php
                if(function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
            ?>
            <?php 
                wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                    'menu_class' => 'navbar-nav me-auto',
                ])
            ?>
        </div>
    </div>
    </nav>