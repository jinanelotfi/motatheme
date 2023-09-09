<div class="wrapper">
    <div class="dropdown categoryy active" >
        <input type="text" placeholder="Catégorie" readonly >
        <ul class="options">
            <?php 
                 $categories = get_terms(array(
                    'taxonomy' => 'categorie',
                    'hide_empty' => true,
                ));
                foreach ($categories as $category) {
                    echo '<li class="option" id="' . $category->slug . '">' . $category->name . '</li>';
                }
            ?>

        </ul>
    </div>
</div>