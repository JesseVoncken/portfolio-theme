<?php
/**
 * Molecule: Feature Card
 * Usage: Called via get_template_part with $args
 */

// Retrieve values passed from the block loop
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$icon_value  = $args['icon'] ?? ''; 
?>

<div class="feature-card scroll-reveal">
    
    <?php 
    // Pass the icon value directly to the Atom.
    // This is faster because the Atom doesn't need to search for the field.
    get_template_part('template-parts/atoms/icons', null, array(
        'icon'  => $icon_value,
        'class' => 'feature-card__icon'
    )); 
    ?>
    <div class="feature-card-content">
    <?php if ( $title ) : ?>
        <h3 class="feature-card__title"><?php echo esc_html( $title ); ?></h3>
    <?php endif; ?>

    <?php if ( $description ) : ?>
        <p class="feature-card__text">
            <?php echo wp_kses_post( $description ); ?>
    </p>
    <?php endif; ?>
    </div>
</div>