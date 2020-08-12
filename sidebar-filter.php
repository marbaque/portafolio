<?php

/**
 * Isotope sidebar.
 * Muestra filtros de isotope
 */
?>
<aside id='secondary' class='filters' role='complementary'>   
    <section class="cat-links">
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

    <section class="botones">
        <ul class="sort-clear">
            <?php // Add "Clear All" and "Sort alphabetically" buttons. 
            ?>
            <li>
                <button class="clear-all" title="Limpiar todos">
                <span class="screen-reader-text">Limpiar todos</span>
                </button>
            </li>
            <li>
                <button class="sort" data-sort-value="name" title="Ordenar alfabéticamente por título">
                    <span class="screen-reader-text">Ordenar alfabéticamente por título</span>
                </button>
            </li>
        </ul>
    </section>
</aside>