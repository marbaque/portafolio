<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5ef1515c035ad',
	'title' => 'Info del ítem',
	'fields' => array(
		array(
			'key' => 'field_5ef152305cb6d',
			'label' => 'Imagen de portada',
			'name' => 'pf_portada',
			'type' => 'image',
			'instructions' => 'Comparta una imagen descriptiva de su proyecto. Puede compartir la imagen arrastrando su ícono sobre la ventana que se despliega al hacer clic en "Seleccionar imagen". Los archivos grandes JPG, PNG (de ancho superior a 1000px) funcionan mejor.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => 'upload',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'medium',
			'library' => 'uploadedTo',
			'min_width' => 566,
			'min_height' => '',
			'min_size' => '',
			'max_width' => 3000,
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5ef1646467d30',
			'label' => 'Categorías',
			'name' => 'pf_cateorias',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'category',
			'field_type' => 'multi_select',
			'allow_null' => 1,
			'add_term' => 1,
			'save_terms' => 1,
			'load_terms' => 1,
			'return_format' => 'id',
			'multiple' => 0,
		),
		array(
			'key' => 'field_5ef1696b16bed',
			'label' => 'Etiquetas',
			'name' => 'pf_etiquetas',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'post_tag',
			'field_type' => 'multi_select',
			'allow_null' => 1,
			'add_term' => 1,
			'save_terms' => 1,
			'load_terms' => 1,
			'return_format' => 'id',
			'multiple' => 0,
		),
		array(
			'key' => 'field_5ef23d61c7f0a',
			'label' => 'Ubicación',
			'name' => 'pf_ubicacion',
			'type' => 'google_map',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '100',
				'class' => '',
				'id' => '',
			),
			'center_lat' => '',
			'center_lng' => '',
			'zoom' => '',
			'height' => '',
		),
		array(
			'key' => 'field_5ef23e00696ab',
			'label' => 'Archivo PDF',
			'name' => 'pf_pdf',
			'type' => 'file',
			'instructions' => 'De forma opcional puede puede adjuntar un archivo PDF con su proyecto.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => 'upload',
				'id' => '',
			),
			'return_format' => 'id',
			'library' => 'uploadedTo',
			'min_size' => '',
			'max_size' => 10,
			'mime_types' => 'pdf',
		),
		array(
			'key' => 'field_5ef285ab27601',
			'label' => 'Notas adicionales',
			'name' => 'pf_notas',
			'type' => 'textarea',
			'instructions' => 'Aquí puede añadir cualquier nota o pregunta dirigida al admistrador del sitio; esta sección no será parte de la publicación.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '100',
				'class' => 'pf_notas',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 5,
			'new_lines' => '',
		),
		array(
			'key' => 'field_5ef2841264b13',
			'label' => 'Información personal',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '100',
				'class' => 'pf_intro',
				'id' => '',
			),
			'message' => 'Añada sus datos personales de autoría y contacto.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5ef169d927b2d',
			'label' => 'Creador(a)',
			'name' => 'pf_creador',
			'type' => 'text',
			'instructions' => 'Por favor indique cómo quisiera que se acredite su proyecto.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Anónima',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => 50,
		),
		array(
			'key' => 'field_5ef15183f466b',
			'label' => 'Correo electrónico',
			'name' => 'pf_correo',
			'type' => 'email',
			'instructions' => 'Incluiya un correo electrónico de estudiante de la UNED.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => 'pf_email',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'user_form',
				'operator' => '==',
				'value' => 'add',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
		1 => 'categories',
		2 => 'tags',
	),
	'active' => true,
	'description' => '',
));

endif;