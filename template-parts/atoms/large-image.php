<?php
// template-parts/atoms/animated-element.php

/**
 * Animated Element Atom
 * Displays a floating, rotating decorative element with an ACF background image.
 * * @param array $image_array The ACF Image Array for the background.
 */

// If the $args variable is not set or the image array is missing, exit.
if ( ! isset( $args['image_array'] ) || ! is_array( $args['image_array'] ) ) {
    return;
}

$image_url = esc_url( $args['image_array']['url'] );
$image_alt = esc_attr( $args['image_array']['alt'] );

// If there's no URL, we have nothing to display.
if ( empty( $image_url ) ) {
    return;
}

?>
<div 
    class="large-image scroll-reveal" 
    style="background-image: url('<?php echo $image_url; ?>');"
    role="img" 
    aria-label="<?php echo $image_alt ? $image_alt : 'Decorative background element'; ?>"
></div>