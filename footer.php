    <?php get_template_part('templates/contact'); ?>
    <footer>
        <?php 
            wp_nav_menu([
                'theme_location' => 'footer',
                'container' => false,
                'menu_class' => 'footer-class',
            ])
        ?>
        <div class="footer-p">
            <p>Tous droits réservés</p>
        </div>
        
    </footer>
    <?php wp_footer() ?>
</body>
</html>