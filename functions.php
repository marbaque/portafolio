<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
    $parenthandle = 'pemscores';
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') 
    );
}

// Cargar estilos y scripts adicionales
add_action( 'wp_enqueue_scripts', 'portafolios_stylesheet' );

function portafolios_stylesheet() {
    wp_enqueue_script( 'masonry', get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js', '1.0', true );

}


// Remove the action that adds custom styles to gutenberg
add_action( 'init', 'remove_my_action');
function remove_my_action() {
     remove_action( 'enqueue_block_editor_assets', 'be_gutenberg_scripts' );
}


remove_filter( 'excerpt_length', 'pemscores_excerpt_length' ); 

add_filter('excerpt_length', 'new_excerpt_length', 99);

function new_excerpt_length($length) {
  return 30;
}



/**
 * Funciones para modificar Posts por defecto.
 */
require get_stylesheet_directory() . '/inc/custom.php';

/**
 * Funciones para formulario de nuevo item.
 */
require get_stylesheet_directory() . '/inc/form.php';

/**
 * Template tags.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';