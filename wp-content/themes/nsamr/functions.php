<?php

/*-- ENQUEUE STYLES */
function nsamr_enqueue_styles() {

	// Enqueue parent styles	
    $parent_style = 'assan';
    wp_enqueue_style( $parent_style, get_template_directory_uri() .'/style.css' );
    
	// Enqueue child styles	
    wp_enqueue_style( 'nsamr',
        get_stylesheet_directory_uri() .'/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    //wp_enqueue_style( 'variables', get_template_directory_uri() . '/css/variables.css' );

   }

/*-- CALL THE ENQUEUE FUNCTIONS */
add_action( 'wp_enqueue_scripts', 'nsamr_enqueue_styles' );

?>
