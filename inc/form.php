<?php
// Forumulario
add_action('acf/init', 'my_acf_form_init');
function my_acf_form_init()
{
    // Llamar API de las página de opciones del portafolio
    $pagUrl = get_field('pagina_form', 'option');

    // Check function exists.
    if (function_exists('acf_register_form')) {

        // Register form.
        acf_register_form(array(
            'id'       => 'new-portafolio',
            'post_id' => 'new_post', // Unique identifier for the form
            'post_status' => 'draft',
            'post_title'    => true,
            'post_content'    => false,
            // PUT IN YOUR OWN FIELD GROUP ID(s)
            'field_groups' => array('group_5ef1515c035ad'), // Create post field group ID(s)
            'form' => true,
            'instruction_placement' => 'field',
            'return'        => $pagUrl, // Redirect to new post url
            'honeypot' => true,
            //'html_before_fields' => '',
            //'html_after_fields' => '',
            'uploader' => 'wp',
            'submit_value' => __("Crear mi página", 'portafolios'),
            'updated_message' => __("Ítem del portafolio creado. ¡Muchas gracias!", 'portafolios'),
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


// Cambiar el autor desde el campo de pf_creador
function acf_set_author($value, $post_id, $field)
{

    if ($value != '') {
        update_post_meta($post_id, 'post_author', $value);
    }
    return $value;
}
// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=pf_creador', 'acf_set_author', 10, 3);

// Modify ACF Form Label for Post Title Field
function wd_post_title_acf_name($field)
{
    $field['label'] = 'Título';
    return $field;
}
add_filter('acf/load_field/name=_post_title', 'wd_post_title_acf_name');

// Enviar correo al guardar item
add_action('acf/save_post', 'my_save_post');

function my_save_post($post_id)
{

    // bail early if not a form post
    if (get_post_type($post_id) !== 'new-portafolio') {

        return;
    }

    // bail early if editing in admin
    if (is_admin()) {

        return;
    }


    // vars
    $post = get_post($post_id);


    // get custom fields (field group exists for content_form)
    $name = get_field('pf_creador', $post_id);
    $email = get_field('pf_correo', $post_id);
    $notas = get_field('pf_notas', $post_id);

    // email data
    $adminMail = get_field('correo_admin', 'option');
    if ($adminMail) {
        $to = $adminMail; //cargar correo de página de opciones
    } else {
        $to = 'sis_ecen@uned.ac.cr'; // Enviar al correo por defecto las notificaciones.
    }
    $headers = 'De: ' . $name . ' <' . $email . '>' . "\r\n";
    $subject = $post->post_title;
    $body = $name . ' ha creado un ítem de portafolio en el sitio.\nUn usuario administrador tiene que aprobarlo y publicarlo para que sea visible.\n';
    $body .= $notas;


    // send email
    wp_mail($to, $subject, $body, $headers);
}


/* 
   Debug preview with custom fields 
*/

add_filter('_wp_post_revision_fields', 'add_field_debug_preview');
function add_field_debug_preview($fields)
{
    $fields["debug_preview"] = "debug_preview";
    return $fields;
}

add_action('edit_form_after_title', 'add_input_debug_preview');
function add_input_debug_preview()
{
    echo '<input type="hidden" name="debug_preview" value="debug_preview">';
}
