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
            'post_status' => 'draft',
            'post_title'    => true,
            'post_content'    => true,
            // PUT IN YOUR OWN FIELD GROUP ID(s)
            'field_groups' => array('group_5ef1515c035ad'), // Create post field group ID(s)
            'form' => true,
            'instruction_placement' => 'field',
            //'return' => home_url(), // Redirect to new post url
            //'html_before_fields' => '',
            //'html_after_fields' => '',
            'uploader' => 'basic',
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

add_action('acf/save_post', 'portafolios_nuevo_item_send_email');

function portafolios_nuevo_item_send_email( $post_id ) {

	if( get_post_type($post_id) !== 'post' && get_post_status($post_id) == 'draft' ) {
		return;
	}

	if( is_admin() ) {
		return;
	}

	$post_title = get_the_title( $post_id );
	$post_url 	= get_permalink( $post_id );
	$subject 	= "Un ítem ha sido creado en su sitio";
	$message 	= "Revise el ítem antes de publicarlo:\n\n";
	$message   .= $post_title . ": " . $post_url;

	$administrators 	= get_users(array(
		'role'	=> 'administrator'
	));

	foreach ($administrators as &$administrator) {
		wp_mail( $administrator->data->user_email, $subject, $message );
	}

}