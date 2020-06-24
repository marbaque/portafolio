<?php

add_action( 'init', 'cp_change_post_object' );
// Change dashboard Posts to News
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
        $labels->name = 'Portafolio';
        $labels->singular_name = 'Ítem';
        $labels->add_new = 'Añadir ítems';
        $labels->add_new_item = 'Añadir ítem';
        $labels->edit_item = 'Editar ítem';
        $labels->new_item = 'Ítems';
        $labels->view_item = 'Ver ítems';
        $labels->search_items = 'Buscar ítems';
        $labels->not_found = 'No se encontraron ítems';
        $labels->not_found_in_trash = 'No hay ítems en la papelera';
        $labels->all_items = 'Ítems';
        $labels->menu_name = 'portafolios';
        $labels->name_admin_bar = 'Ítems';
}