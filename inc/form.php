<?php

// Guardar campos en el tema
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path)
{

    // update path
    $path = get_stylesheet_directory() . '/fields';


    // return
    return $path;
}

// Forumulario
add_action('acf/init', 'my_acf_form_init');
function my_acf_form_init()
{

    // Check function exists.
    if (function_exists('acf_register_form')) {

        // Register form.
        acf_register_form(array(
            'id'       => 'new-portafolio',
            'post_id' => 'new_post', // Unique identifier for the form
            'post_status' => 'pending',
            'post_title'    => true,
            'post_content'    => true,
            // PUT IN YOUR OWN FIELD GROUP ID(s)
            'field_groups' => array(1844), // Create post field group ID(s)
            'form' => true,
            'instruction_placement' => 'field',
            'return' => '/nueva-bitacora', // Redirect to new post url
            'html_before_fields' => '',
            'html_after_fields' => '',
            //'uploader' => 'basic',
            'submit_value' => 'Enviar',
            'updated_message' => 'Guardado',
        ));
    }
}

// Guardar imagen como destacada 
function acf_set_featured_image($value, $post_id, $field)
{

    if ($value != '') {
        update_post_meta($post_id, '_thumbnail_id', $value);
    } else {
        if (has_post_thumbnail()) {
            delete_post_thumbnail($post_id);
        }
    }
    return $value;
}


// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=pf_portada', 'acf_set_featured_image', 10, 3);