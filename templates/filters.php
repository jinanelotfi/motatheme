<div class="wrapper">
    <div class="container-cate-form">

        <!-- Filtre Catégories -->
        <div class="dropdown categoryy active">
            <span class="container-icon">
                <input type="text" id="category-filter" placeholder="Catégorie" readonly>
                <img src="<?php echo get_template_directory_uri() . '../assets/images/chevron-down.svg'; ?>" id="chevron-cate" alt="">
            </span>
            <ul class="options-cate">
                <?php
                $categories = get_terms(array(
                    'taxonomy' => 'categorie',
                    'hide_empty' => true,
                ));
                foreach ($categories as $category) {
                    echo '<li class="option-cate" id="' . $category->slug . '">' . $category->name . '</li>';
                }
                ?>
            </ul>
            
        </div>

        <!-- Filtre Format -->
        <div class="dropdown formatt active">
            <span class="container-icon">
                <input type="text" id="format-filter" placeholder="Format" readonly>
                <img src="<?php echo get_template_directory_uri() . '../assets/images/chevron-down.svg'; ?>" id="chevron-form" alt="">
            </span>
            <ul class="options-form">
                <?php
                $formats = get_terms(array(
                    'taxonomy' => 'format',
                    'hide_empty' => true,
                ));
                foreach ($formats as $format) {
                    echo '<li class="option-form" id="' . $format->slug . '">' . $format->name . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>

    <!-- Filtre Date -->
    <div class="dropdown datee active">
        <span class="container-icon">
            <input type="text" id="date-sort" placeholder="Trier par" readonly>
            <img src="<?php echo get_template_directory_uri() . '../assets/images/chevron-down.svg'; ?>" id="chevron-date" alt="">
        </span>
        <ul class="options-date">
            <li class="option-date" data-value="desc">Les plus récentes</li>
            <li class="option-date" data-value="asc">Les plus anciennes</li>
        </ul>
    </div>
</div>

