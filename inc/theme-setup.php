<?php
/**
 * Theme Setup and Core Configuration
 *
 * Contains functions hooked to 'after_setup_theme'.
 *
 * @package Portfolio
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function portfolio_setup() {
    load_theme_textdomain( 'portfolio', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'portfolio' ),
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
}
add_action( 'after_setup_theme', 'portfolio_setup' );

/**
 * Set the content width in pixels.
 */
function portfolio_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'portfolio_content_width', 0 );