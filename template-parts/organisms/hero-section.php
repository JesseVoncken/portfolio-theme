<?php
/**
 * Organism: Hero Section (Minimal Button Test)
 * This file is called from the Flexible Content loop (page.php).
 */

// 1. Retrieve the ACF data *directly* from the ACF Flexible Content loop context.
// When inside a Flexible Content loop (the_row() is active), use get_sub_field().
$button_text = get_sub_field('button_text');
$button_url  = get_sub_field('button_url');

$h1_text = get_sub_field('heading_text');

$paragraph_text = get_sub_field('paragraph_text');

$hero_image = get_sub_field('hero_image');

// 2. Prepare the data array for the Button Atom (template-parts/1_atoms/button.php)
$button_args = [
    'text'  => $button_text, 
    'url'   => $button_url,   
    'style' => 'hero-cta'     // Defines the CSS class for this specific button style
];

$heading_args = [
    'h1_text'  => $h1_text, 
];

$paragraph_args = [
    'paragraph_text'  => $paragraph_text, 
];

?>

    <div class="hero-section">
    <div class="hero-left">
    <?php
    get_template_part('template-parts/atoms/heading-xl', null, $heading_args); 
    get_template_part('template-parts/atoms/paragraph', null, $paragraph_args); 
    // 3. Render the Button Atom, passing the required $args
    // IMPORTANT: The path should *not* include the .php extension.
    get_template_part('template-parts/atoms/button', null, $button_args); 
    get_template_part('template-parts/molecules/social-links-group');

    ?>
    </div>
    <div class="hero-right">
    <?php 
        get_template_part( 
            'template-parts/atoms/hero-image', 
            null, 
            array( 'image_array' => $hero_image ) // Pass the data here
        );
    ?>
    </div>
    </div>