<?php
/**
 * Asset enqueuing functions
 *
 * @package Giovanni_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Enqueue theme styles and scripts.
 */
function giovanni_theme_enqueue_scripts() {
    // Enqueue theme styles with version for cache busting
    $theme_version = wp_get_theme()->get('Version');
    if (!$theme_version) {
        $theme_version = '1.0.0';
    }
    
    wp_enqueue_style(
        'giovanni-style',
        get_stylesheet_uri(),
        array(),
        $theme_version
    );
}
add_action( 'wp_enqueue_scripts', 'giovanni_theme_enqueue_scripts' );

/**
 * Add custom link styles to prevent layout shifts
 */
function giovanni_add_custom_link_styles() {
    $custom_css = '
        /* Clean links - no font weight changes or movement */
        .entry-content p a, 
        .entry-content li a, 
        .entry-content blockquote a,
        .wp-block-post-title a {
            text-decoration: underline;
            text-decoration-thickness: 1px;
            text-underline-offset: 2px;
            font-weight: inherit;
            transition: text-decoration-thickness 0.15s ease;
        }

        /* Subtle hover effect - no movement */
        .entry-content p a:hover,
        .entry-content p a:focus,
        .entry-content li a:hover,
        .entry-content li a:focus,
        .entry-content blockquote a:hover,
        .entry-content blockquote a:focus,
        .wp-block-post-title a:hover,
        .wp-block-post-title a:focus {
            text-decoration-thickness: 2px;
        }
    ';
    wp_add_inline_style( 'giovanni-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'giovanni_add_custom_link_styles' );

/**
 * Programmatically enqueue custom block styles
 */
function giovanni_enqueue_custom_block_styles() {
    $files = glob( get_template_directory() . '/assets/styles/*.css' );
    
    if ( empty( $files ) ) {
        return;
    }
    
    foreach ( $files as $file ) {
        $filename = basename( $file, '.css' );
        $block_name = str_replace( 'core-', 'core/', $filename );
        
        // Only enqueue if the block exists
        if ( function_exists( 'wp_enqueue_block_style' ) && class_exists( 'WP_Block_Type_Registry' ) ) {
            $registry = WP_Block_Type_Registry::get_instance();
            if ( $registry->is_registered( $block_name ) ) {
                wp_enqueue_block_style(
                    $block_name,
                    array(
                        'handle' => "giovanni-block-{$filename}",
                        'src'    => get_theme_file_uri( "assets/styles/{$filename}.css" ),
                        'path'   => get_theme_file_path( "assets/styles/{$filename}.css" ),
                    )
                );
            }
        }
    }
}
add_action( 'init', 'giovanni_enqueue_custom_block_styles' );