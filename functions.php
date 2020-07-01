<?php

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function my_theme_enqueue_styles()
{
    $parenthandle = 'pemscores';
    $theme = wp_get_theme();
    wp_enqueue_style(
        $parenthandle,
        get_template_directory_uri() . '/style.css',
        $theme->parent()->get('Version')
    );
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array($parenthandle),
        $theme->get('Version')
    );
}

// Guardar campos en el tema
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point($paths)
{

    // remove original path (optional)
    unset($paths[0]);


    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    //$paths[] = get_template_directory_uri() . '/acf-json';


    // return
    return $paths;
}


// Remove the action that adds custom styles to gutenberg
add_action('init', 'remove_my_action');
function remove_my_action()
{
    remove_action('enqueue_block_editor_assets', 'be_gutenberg_scripts');
}


remove_filter('excerpt_length', 'pemscores_excerpt_length');

add_filter('excerpt_length', 'new_excerpt_length', 99);

function new_excerpt_length($length)
{
    return 30;
}

// Desactivar gutenberg para posts
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'post') return false;
    return $current_status;
}

/**
 * Enqueue jQuery, imagesLoaded, Isotope and its settings.
 */
function isotopeinwp_scripts()
{
    if (is_home() || is_archive()) {
        
        wp_register_script('imagesloaded', get_theme_file_uri('/js/libs/imagesloaded.pkgd.min.js'), array('jquery'), '4.1.4', true);
        
        wp_register_script('isotope', get_theme_file_uri('/js/libs/isotope.pkgd.min.js'), array('imagesloaded'), '3.0.6', true);
        
        wp_enqueue_script('isotopeinwp-settings', get_theme_file_uri('/js/isotope.settings.js'), array('isotope'), '1.0', true);
    }
}

add_action('wp_enqueue_scripts', 'isotopeinwp_scripts');


/* 
    Quitar category- y tag- de las clases.
    No necesito agregar tags y categories porque
    ya están. Pero tengo que quitarle "category-"
    y "cat-" de las clases.
*/
add_filter('post_class', 'portafolios_post_class');

function portafolios_post_class($classes)
{
    $out = array();

    foreach ($classes as $class) {
        if (0 === strpos($class, 'tag-')) {
            $out[] = substr($class, 4);
        } elseif (0 === strpos($class, 'category-')) {
            $out[] = substr($class, 9);
        } else {
            $out[] = $class;
        }
    }

    return array_unique($out);
}



/*
 *   Funciones para modificar Posts por defecto.
 */
require get_stylesheet_directory() . '/inc/custom.php';

/*
 *   Funciones para formulario de nuevo item.
 */
require get_stylesheet_directory() . '/inc/form.php';


/*
 *  Template tags.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';
