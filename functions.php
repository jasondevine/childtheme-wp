<?php
/**
 * Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since	1.0.0
 * @package zt
 */

// If the parent theme loads its style using a function starting with get_stylesheet, such as get_stylesheet_directory() and get_stylesheet_directory_uri(), the child theme needs to load both parent and child stylesheets. Be sure to use the same handle name as the parent does for the parent styles.
add_action('wp_enqueue_scripts', 'zt_child_theme_enqueue_styles');
function zt_child_theme_enqueue_styles()
{
    $parenthandle = 'twentytwenty-style'; // This is 'twentytwenty-style' for the Twenty Twenty theme. Check the handle used in your parent theme and replace
    $theme = wp_get_theme();
    wp_enqueue_style(
        $parenthandle,
        get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

// If the parent theme loads its style using a function starting with get_template, such as get_template_directory() and get_template_directory_uri(), the child theme needs to load just the child styles, using the parent’s handle in the dependency parameter.

//  add_action( 'wp_enqueue_scripts', 'zt_child_theme_enqueue_styles' );
//  function zt_child_theme_enqueue_styles() {
// 	 $parenthandle = 'twentytwenty-style'; // This is 'twentytwenty-style' for the Twenty Twenty theme. Check the handle used in your parent theme and replace
//      wp_enqueue_style( 'child-style', get_stylesheet_uri(),
//          array( $parenthandle ),
//          wp_get_theme()->get('Version') // this only works if you have Version in the style header
//      );
// }
