<?php
/**
 * Atom: SVG Icon (Clean)
 */
$icon  = $args['icon'] ?? null;
$field = $args['field'] ?? null;

// If passing an ACF Field Name, automatically fetch the data
if ( ! $icon && $field ) {
    // Try Repeater first, then Page Field
    $data = function_exists('get_sub_field') ? get_sub_field($field) : null;
    if ( ! $data && function_exists('get_field') ) {
        $data = get_field($field);
    }
    // Extract 'value' if ACF returns Array
    $icon = is_array($data) ? ( $data['value'] ?? '' ) : $data;
}

// If we have an icon name, load the SVG
if ( $icon ) {
    $path = get_template_directory() . '/icons/' . $icon . '.svg';
    if ( file_exists( $path ) ) {
        echo '<div class="atom-icon ' . esc_attr($args['class'] ?? '') . '">';
        echo file_get_contents( $path );
        echo '</div>';
    }
}
?>