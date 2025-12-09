<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Portfolio
 */


get_template_part('template-parts/organisms/header');

/**
 * Template Name: Flexible Content Page
 * * This template loads content via the ACF Flexible Content field.
 */

?>

    <main>
<?php 
    // Check if the Flexible Content field ('page_layout') has any rows
    if ( have_rows('page_layout') ) :

        // Loop through all the layouts
        while ( have_rows('page_layout') ) : the_row();

            // Check if the current layout is the 'hero_section'
            if ( get_row_layout() == 'hero_section' ) :
                
                get_template_part('template-parts/organisms/hero-section');

            endif; 
            if ( get_row_layout() == 'about' ) :
                
            get_template_part('template-parts/organisms/about');

            endif; 

        endwhile; 

    endif; 
    
    ?>
    </main>

<?php

get_footer(); // End of the standard WordPress template
?>