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
 * 
 * @hook giovanni_before_enqueue_assets Action before enqueueing theme assets
 * @hook giovanni_after_enqueue_assets Action after enqueueing theme assets
 * @hook giovanni_theme_version Filters the theme version for cache busting
 * @hook giovanni_style_dependencies Filters the style dependencies array
 * 
 * @example
 * // Add custom dependency
 * add_filter('giovanni_style_dependencies', function($deps) {
 *     $deps[] = 'custom-parent-style';
 *     return $deps;
 * });
 * 
 * // Add custom scripts after theme assets
 * add_action('giovanni_after_enqueue_assets', function() {
 *     wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom.js');
 * });
 */
function giovanni_theme_enqueue_scripts() {
    /**
     * Action hook before enqueueing theme assets
     */
    do_action( 'giovanni_before_enqueue_assets' );
    
    // Enqueue theme styles with version for cache busting
    $theme_version = wp_get_theme()->get('Version');
    if (!$theme_version) {
        $theme_version = '1.0.0';
    }
    
    /**
     * Filter the theme version for cache busting
     *
     * @param string $version The theme version
     */
    $theme_version = apply_filters( 'giovanni_theme_version', $theme_version );
    
    /**
     * Filter the style dependencies array
     *
     * @param array $dependencies The style dependencies
     */
    $dependencies = apply_filters( 'giovanni_style_dependencies', array() );
    
    wp_enqueue_style(
        'giovanni-style',
        get_stylesheet_uri(),
        $dependencies,
        $theme_version
    );
    
    /**
     * Action hook after enqueueing theme assets
     */
    do_action( 'giovanni_after_enqueue_assets' );
}
add_action( 'wp_enqueue_scripts', 'giovanni_theme_enqueue_scripts' );

/**
 * Enqueue responsive and mobile optimization styles
 */
function giovanni_enqueue_responsive_styles() {
    wp_enqueue_style(
        'giovanni-responsive-mobile',
        get_theme_file_uri( 'assets/styles/responsive-mobile.css' ),
        array( 'giovanni-style' ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'giovanni_enqueue_responsive_styles' );

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
        
        // Handle non-block CSS files separately
        if ( $filename === 'shortcodes' ) {
            wp_enqueue_style(
                'giovanni-shortcodes',
                get_theme_file_uri( "assets/styles/{$filename}.css" ),
                array( 'giovanni-style' ),
                wp_get_theme()->get('Version')
            );
            continue;
        }
        
        if ( $filename === 'core-links' ) {
            wp_enqueue_style(
                'giovanni-links',
                get_theme_file_uri( "assets/styles/{$filename}.css" ),
                array( 'giovanni-style' ),
                wp_get_theme()->get('Version')
            );
            continue;
        }
        
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
add_action( 'init', 'giovanni_enqueue_custom_block_styles', 100 );