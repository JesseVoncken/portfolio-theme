<?php
/**
 * Molecule: Social Links Group (Repeater Edition)
 * Loops through the 'socials' ACF Repeater field and uses the row title as the platform identifier.
 */

// We assume the Repeater field is attached to the current page/post.
if ( have_rows('socials') ) : 
?>

<div class="molecule-social-links-group scroll-reveal">

    <?php 
    while ( have_rows('socials') ) : the_row();
        
        // 1. Get the row layout name (which ACF uses for the row title, e.g., 'instagram')
        // We use get_row_layout() as a reliable way to get the row type/label.
        $platform = get_row_layout();
        
        // 2. Get the URL field (we assume the field inside *all* rows is named 'platform_url')
        $url = get_sub_field('platform_url'); 
        
        // Safety check
        if ( ! empty($url) ) :

            // Prepare the data for the Atom
            $icon_args = [
                'url'      => $url,
                // Pass the platform name extracted from the row label/type
                'platform' => $platform, 
            ];

            // Call the Social Icon Atom template part
            get_template_part('template-parts/atoms/social-link', null, $icon_args);

        endif;
        
    endwhile;
    ?>
</div>

<?php 
endif;
?>