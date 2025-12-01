<?php
/**
 * Gutenberg/Block Editor Disabling
 *
 * Contains filters and actions to ensure the Classic Editor is used.
 *
 * @package Portfolio
 */

// Disable Gutenberg (Block Editor) for all post types
function disable_gutenberg_editor() {
    // This filter tells WordPress to use the Classic Editor instead of Gutenberg
    return false;
}
add_filter('use_block_editor_for_post_type', 'disable_gutenberg_editor', 10, 2);

// Optionally, hide the "Try Gutenberg" dashboard widget for users
function remove_gutenberg_dashboard_widget() {
    remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' );
}
add_action('wp_dashboard_setup', 'remove_gutenberg_dashboard_widget');




// Removes the "Customize" link from the Appearance menu
remove_submenu_page( 'themes.php', 'customize.php' ); 
// Removes the "Customize" link from the Admin Bar
// Redirects direct access to wp-admin/customize.php
