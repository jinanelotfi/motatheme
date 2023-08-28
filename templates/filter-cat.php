<label for="category-filter">Filtrer par catégorie:</label>
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

<label for="date-sort">Trier par date:</label>
<select id="date-sort">
    <option value="DESC">Plus récentes</option>
    <option value="ASC">Plus anciennes</option>
</select>
