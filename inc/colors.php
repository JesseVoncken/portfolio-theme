<?php
/**
 * 1. Register the Color Controls in the Customizer
 */
function customize_register( $wp_customize ) {

    // A. Add a new Section for your colors
    $wp_customize->add_section( 'colors_section', array(
        'title'       => __( 'Theme Colors', 'mytheme' ),
        'priority'    => 30,
        'description' => 'Set the global colors for atoms, molecules, and organisms.',
    ) );

    // --- PRIMARY COLOR ---

    // B. Add the Setting (Database entry)
    $wp_customize->add_setting( 'primary_color', array(
        'default'           => '#000000', // Default hex code
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );

    // C. Add the Control (The UI Color Picker)
    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'primary_color_control', // Unique ID
        array(
            'label'    => __( 'Primary Brand Color', 'mytheme' ),
            'section'  => 'colors_section',
            'settings' => 'primary_color',
        )
    ) );

    // --- SECONDARY COLOR ---

    $wp_customize->add_setting( 'secondary_color', array(
        'default'           => '#cccccc',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_color_control',
        array(
            'label'    => __( 'Secondary Brand Color', 'mytheme' ),
            'section'  => 'colors_section',
            'settings' => 'secondary_color',
        )
    ) );

        $wp_customize->add_setting( 'heading_color', array(
        'default'           => '#cccccc',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'heading_color_control',
        array(
            'label'    => __( 'Heading Color', 'mytheme' ),
            'section'  => 'colors_section',
            'settings' => 'heading_color',
        )
    ) );

            $wp_customize->add_setting( 'paragraph_color', array(
        'default'           => '#585858ff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize,
        'paragraph_color_control',
        array(
            'label'    => __( 'Paragraph Color', 'mytheme' ),
            'section'  => 'colors_section',
            'settings' => 'paragraph_color',
        )
    ) );
}
add_action( 'customize_register', 'customize_register' );


/**
 * 2. Output the Settings as CSS Variables
 * This bridges the gap between PHP and your Atomic CSS files.
 */
function output_css_variables() {
    // Get the colors from the database, or use defaults if not set
    $primary   = get_theme_mod( 'primary_color', '#000000' );
    $secondary = get_theme_mod( 'secondary_color', '#cccccc' );
    $heading = get_theme_mod( 'heading_color', '#000000' );
    $paragraph = get_theme_mod( 'paragraph_color', '#585858ff' );
    ?>
    <style type="text/css">
        :root {
            --atomic-primary: <?php echo esc_attr( $primary ); ?>;
            --atomic-secondary: <?php echo esc_attr( $secondary ); ?>;
            --atomic-heading: <?php echo esc_attr( $heading ); ?>;
            --atomic-paragraph: <?php echo esc_attr( $paragraph ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'output_css_variables' );