<!-- <div class="filter-container">
    <div class="filter-cat-format"> -->

    <!-- Catégorie -->
        <!-- <label for="category-filter"></label>
        <select id="category-filter">
            <option value="all" class="option-filter" >Catégories</option>
            <
            $categories = get_terms(array(
                'taxonomy' => 'categorie',
                'hide_empty' => true,
            ));
            foreach ($categories as $category) {
                echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
            }
            ?>
        </select> -->
    
    <!-- Format -->
        <!-- <label for="format-filter"></label>
        <select id="format-filter">
            <option value="all" class="option-filter">Format</option>
            <
            $formats = get_terms(array(
                'taxonomy' => 'format',
                'hide_empty' => true,
            ));
            foreach ($formats as $format) {
                echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
            }
            ?>
        </select>
    </div> -->

    <!-- Date -->
    <!-- <label for="date-sort"></label>
    <select id="date-sort">
        <option value="all" class="option-filter">Trier par</option>
        <option value="DESC" class="option-filter">Plus récentes</option>
        <option value="ASC" class="option-filter">Plus anciennes</option>
    </select>
</div> -->


<div class="wrapper">

    <!-- Filtre Catégories -->
    <div class="dropdown categoryy active">
        <input type="text" id="category-filter" placeholder="Catégorie" readonly>
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
        <input type="text" id="format-filter" placeholder="Format" readonly>
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

    <!-- Date -->
    <!-- <label for="date-sort"></label>
    <select id="date-sort">
        <option value="all" class="option-filter">Trier par</option>
        <option value="DESC" class="option-filter">Plus récentes</option>
        <option value="ASC" class="option-filter">Plus anciennes</option>
    </select>

     Filtre Date -->
    <div class="dropdown datee active">
        <input type="text" id="date-sort" placeholder="Trier par" readonly>
        <ul class="options-date">
            <li class="option-date" data-value="desc">Les plus récentes</li>
            <li class="option-date" data-value="asc">Les plus anciennes</li>
        </ul>
    </div>
</div>

