<?php
function yourtheme_enqueue_styles() {

    // 1. Load the primary style.css file (Theme Info, Global Defaults)
    // The 'get_stylesheet_uri()' function automatically finds your theme's main style.css
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );

    // 2. Load ATOMS (Foundational components), dependent on the main style.css
    wp_enqueue_style( 'atoms-css', 
        get_template_directory_uri() . '/css/atoms.css', 
        array('main-style'), // DEPENDS on 'main-style'
        '1.0' 
    );

    // 3. Load MOLECULES (Simple grouped components), dependent on atoms.css
    wp_enqueue_style( 'molecules-css', 
        get_template_directory_uri() . '/css/molecules.css', 
        array('atoms-css'), // DEPENDS on 'atoms-css'
        '1.0' 
    );

    // 4. Load ORGANISMS (Complex sections), dependent on molecules.css
    wp_enqueue_style( 'organisms-css', 
        get_template_directory_uri() . '/css/organisms.css', 
        array('molecules-css'), // DEPENDS on 'molecules-css'
        '1.0' 
    );
}

add_action( 'wp_enqueue_scripts', 'yourtheme_enqueue_styles' );
?>