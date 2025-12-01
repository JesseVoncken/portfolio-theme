<?php
/**
 * Block Template: Feature Cards
 * This code should go inside your flexible content layout file.
 */

// 1. Enter the Group Field "right_side"
$h1_text = get_sub_field('main_title');
$image = get_sub_field('image');

$heading_args = [
    'h1_text'  => $h1_text, 
];
?>

<div class="about-section">

    <?php get_template_part('template-parts/atoms/heading-xl', null, $heading_args); ?>

<div class="about-container s">
<div class="flex-about">
    <?php 
        get_template_part( 
            'template-parts/atoms/large-image', 
            null, 
            array( 'image_array' => $image ) // Pass the data here
        );
    ?>
</div>
<div class="flex-about">
<?php
if ( have_rows('right_side') ) : 
    while ( have_rows('right_side') ) : the_row();
    
        // Optional: You can output the paragraph title/text here if needed
        $group_title = get_sub_field('paragraph_title');
        $group_text  = get_sub_field('paragraph');
        ?>
        <div class="about-text-block">
            <h2 class="scroll-reveal"><?php echo esc_html( $group_title ); ?></h2>
            <?php get_template_part('template-parts/atoms/paragraph', null, array('paragraph_text' => $group_text)); ?> 
        </div>  

        <?php
        // 2. Loop through the "features" block (assuming it acts as a Repeater)
        if( have_rows('features') ):
            
            echo '<div class="feature-cards-wrapper">';
            
            while ( have_rows('features') ) : the_row();
                
                // 3. Extract Data for this specific card
                // Since 'feature_text' is a Group field, we get it as an array
                $text_group = get_sub_field('feature_text');
                
                $card_data = array(
                    // Use null coalescing operator (??) to prevent errors if empty
                    'title'       => $text_group['feature_title'] ?? '',
                    'description' => $text_group['feature_description'] ?? '',
                    'icon'        => get_sub_field('feature_icon') // Pass the icon value directly
                );

                // 4. Call the Feature Card Molecule with data
                get_template_part('template-parts/molecules/feature-card', null, $card_data);
                
            endwhile;
            
            echo '</div>';
            
        endif;

    endwhile;
endif;
?>
</div>
</div>
</div>