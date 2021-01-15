<?php

/* 
 * Child theme to Twentyseventeen theme.
 * Example of how to access the parent and the child style.css
 *   loading parent stylesheet first
 */

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
  
    $parenthandle = 'parent-style'; // This is stylesheet handle for the Twenty Seventeen theme.
    $theme = wp_get_theme();
    
    wp_enqueue_style( $parenthandle, 
      get_template_directory_uri() . '/style.css', // C:\Bitnami\wordpress\apps\wordpress\htdocs\wp-content\themes\twentyseventeen
      array(),  // if the parent theme code has a dependency, copy it to here
      $theme->parent()->get('Version')
    );
    
    wp_enqueue_style( 'child-style', 
      get_stylesheet_directory_uri() . '/style.css', // C:\Bitnami\wordpress\apps\wordpress\htdocs\wp-content\themes\twentyseventeen-child
      array( $parenthandle ), // this forces wp to load the parent stylesheet before the child.
      $theme->get('Version') // this only works if you have Version in the style header and it matches the number on the parent style.css
    );
}
