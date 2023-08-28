<label for="format-filter">Filtrer par format:</label>
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
