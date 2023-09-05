<div class="filter-container">
    <div class="filter-cat-format">
        <label for="category-filter"></label>
        <select id="category-filter">
            <option value="all">Catégories</option>
            <?php
            $categories = get_terms(array(
                'taxonomy' => 'categorie',
                'hide_empty' => true,
            ));
            foreach ($categories as $category) {
                echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
            }
            ?>
        </select>

        <label for="format-filter"></label>
        <select id="format-filter">
            <option value="all">Format</option>
            <?php
            $formats = get_terms(array(
                'taxonomy' => 'format',
                'hide_empty' => true,
            ));
            foreach ($formats as $format) {
                echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
            }
            ?>
        </select>
    </div>


    <label for="date-sort"></label>
    <select id="date-sort">
        <option value="all">Trier par</option>
        <option value="DESC">Plus récentes</option>
        <option value="ASC">Plus anciennes</option>
    </select>
</div>
