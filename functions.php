<?php
/**
 * Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Portfolio
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

/**
 * Load theme functions from /inc/ directory.
 * This function must be in functions.php to run first.
 */

// Core setup function must stay here or be required first.
require get_template_directory() . '/inc/theme-setup.php';

// Load other logical components.
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/gutenberg-disable.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/colors.php';

// You can keep custom, short functions here if you prefer, but often they belong in a dedicated file.
// load_inter_font() and add_background_bubbles() are okay to keep here temporarily, 
// but enqueueing scripts should ideally be in /inc/enqueue.php.

function load_theme_font() {
    wp_enqueue_style( 'inter-font', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap', false );

    wp_enqueue_style( 'google-fonts-syne', 'https://fonts.googleapis.com/css2?family=Syne:wght@400..800&display=swap', array(), null );

    wp_enqueue_style( 
        'Unbounded-font', 
        'https://fonts.googleapis.com/css2?family=Unbounded:wght@700;900&display=swap', 
        array(), 
        null 
    );
}
add_action( 'wp_enqueue_scripts', 'load_theme_font' );

function add_background_bubbles() {
    // Define your bubbles here. 
    // t = top%, l = left%, s = size (scale factor), d = delay (animation delay)
    $bubbles = [
        ['t' => '10%',  'l' => '5%',   's' => 1.0, 'd' => '0s'],   // Top Left
        ['t' => '20%',  'l' => '80%',  's' => 1.5, 'd' => '2s'],   // Top Right (Large)
        ['t' => '60%',  'l' => '15%',  's' => 0.8, 'd' => '1s'],   // Middle Left
        ['t' => '85%',  'l' => '70%',  's' => 1.2, 'd' => '4s'],   // Bottom Right
        ['t' => '40%',  'l' => '50%',  's' => 0.6, 'd' => '3s'],   // Center (Small)
    ];

    ?>
    <div class="bubble_container">
        <?php foreach ( $bubbles as $bubble ) : ?>
            <div class="green-circles" 
                 style="
                    --top: <?php echo $bubble['t']; ?>; 
                    --left: <?php echo $bubble['l']; ?>; 
                    --scale: <?php echo $bubble['s']; ?>;
                    --delay: <?php echo $bubble['d']; ?>;
                 ">
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}
add_action('wp_body_open', 'add_background_bubbles');

/**
 * Enqueue scripts and styles for the frontend.
 */
// function my_scroll_reveal_scripts() {
//     // 1. Register the script
//     // Note: The script file path is assumed to be inside a 'js' folder 
//     // in your theme's root directory: 'yourtheme/js/load.js'
//     wp_enqueue_script( 
//         'scroll-reveal-script',                       // Unique handle/name for the script
//         get_template_directory_uri() . '/js/load.js', // Full URL path to the script file
//         array('jquery'),                              // Dependencies: This script requires jQuery to be loaded first (if you use jQuery)
//         '1.0',                                        // Version number (good for cache busting)
//         true                                          // Load in the footer (improves page speed)
//     );
// }

// // 2. Hook into the 'wp_enqueue_scripts' action
// add_action( 'wp_enqueue_scripts', 'my_scroll_reveal_scripts' );


function add_cards_icon_picker_tab( array $tabs ): array {
    $tabs['cards'] = 'Cards';
    return $tabs;
}
add_filter( 'acf/fields/icon_picker/tabs', 'add_cards_icon_picker_tab' );

function add_embedded_svg_icons( array $icons ): array {
    // Define the base URL path to your custom icons folder
    $base_icon_url = get_template_directory_uri() . '/icons/';

    return array(
        array(
            // CORRECTED: Use the full base URL to locate the SVG file
            'url'   => $base_icon_url . 'brackets.svg', 
            'key'   => 'brackets', 
            'label' => 'brackets', 
        ),
        array(
            'url'   => $base_icon_url . 'layout.svg', 
            'key'   => 'layout',
            'label' => 'layout',
        ),
    );
}

add_filter( 'acf/fields/icon_picker/cards/icons', 'add_embedded_svg_icons' );