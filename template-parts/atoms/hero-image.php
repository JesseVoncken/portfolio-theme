<?php
// template-parts/atoms/animated-element.php

if ( ! isset( $args['image_array'] ) || ! is_array( $args['image_array'] ) ) {
    return;
}

$image_url = esc_url( $args['image_array']['url'] );
$image_alt = esc_attr( $args['image_array']['alt'] );

if ( empty( $image_url ) ) {
    return;
}
?>

<div class="scroll-reveal-wrapper scroll-reveal">
    
    <div 
        class="animated-element" 
        style="background-image: url('<?php echo $image_url; ?>');"
        role="img" 
        aria-label="<?php echo $image_alt ? $image_alt : 'Decorative background element'; ?>"
    ></div>

</div>