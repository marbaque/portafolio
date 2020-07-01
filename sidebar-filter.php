<?php

/**
 * Isotope sidebar.
 * Muestra filtros de isotope
 */
?>
<aside id='secondary' class='filters' role='complementary'>
    <section class="widget categories">
        <ul class='filter-list' data-group='subject'>
            <?php
            $cats = get_categories();
            if (!empty($cats) && !is_wp_error($cats)) {
                foreach ($cats as $cat) {
            ?>
                    <li>
                        <input type='checkbox' value='.<?php echo $cat->slug; ?>' id='<?php echo $cat->slug; ?>'>
                        <label for='<?php echo $cat->slug; ?>'><?php echo $cat->name; ?></label>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </section><!-- .filter .widget -->

    <section class="widget tags">
        <ul class='filter-list' data-group='subject'>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'post_tag',
                'hide_empty' => false,
            ));
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
            ?>
                    <li>
                        <input type='checkbox' value='.<?php echo $term->slug; ?>' id='<?php echo $term->slug; ?>'>
                        <label for='<?php echo $term->slug; ?>'><?php echo $term->name; ?></label>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </section><!-- .filter .widget -->

    <section class="widget botones">
        <ul class="sort-clear">
            <?php // Add "Clear All" and "Sort alphabetically" buttons. 
            ?>
            <li>
                <button class="clear-all">
                    Limpiar todos
                </button>
            </li>
            <li>
                <button class="sort" data-sort-value="name">
                    Ordenar alfabéticamente por título
                </button>
            </li>
        </ul>
    </section>
</aside>