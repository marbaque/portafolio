<?php

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
            'field_groups' => array('group_5ef1515c035ad'), // Create post field group ID(s)
            'form' => true,
            'instruction_placement' => 'field',
            //'return' => home_url(), // Redirect to new post url
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



// Modify ACF Form Label for Post Title Field
function wd_post_title_acf_name($field)
{
    $field['label'] = 'Título';
    return $field;
}
add_filter('acf/load_field/name=_post_title', 'wd_post_title_acf_name');

// Modify ACF Form Label for Post Content Field
function wd_post_content_acf_name($field)
{
    $field['label'] = 'Contenido';
    return $field;
}
add_filter('acf/load_field/name=_post_content', 'wd_post_content_acf_name');


/* 
    Enviar correo a estudiante y a profesor 
    cuando se guarda el post 
*/

add_action('acf/save_post', 'my_save_post');
function my_save_post($post_id)
{

    // bail early if not a contact_form post
    // if (get_post_type($post_id) !== 'contact_form') {

    //     return;
    // }


    // bail early if editing in admin
    if (is_admin()) {

        return;
    }


    // vars
    $post = get_post($post_id);


    // get custom fields (field group exists for content_form)
    $name = get_field('pf_nombre', $post_id);
    $email = get_field('pf_correo', $post_id);


    // email data
    $to = 'sis_ecen@uned.ac.cr';
    $headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
    $subject = $post->post_title;
    $body = $post->post_content;


    // send email
    wp_mail($to, $subject, $body, $headers);
}

// Validar formulario con la contraseña
add_filter('acf/validate_value/name=pf_pass', 'my_acf_validate_value', 9, 4);
function my_acf_validate_value( $valid, $value, $field, $input ){
    $keyPP = 'PLANTA02X';
    
    if( !$valid ) {
		return $valid;
	}
	if ( ($_POST['pf_pass']) !== $keyPP ) {
		$valid = 'Contraseña inválida';
	}
	return $valid;
}