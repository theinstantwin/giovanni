<?php
/**
 * Theme setup and configuration
 *
 * @package Giovanni_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Add theme support for various features.
 */
function giovanni_theme_setup() {
    // Add support for block styles
    add_theme_support( 'wp-block-styles' );
    
    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );
    
    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    
    // Add support for experimental features
    add_theme_support( 'appearance-tools' );
}
add_action( 'after_setup_theme', 'giovanni_theme_setup' );