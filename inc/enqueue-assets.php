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
 * Enqueue shortcodes styles (non-block specific)
 */
function giovanni_enqueue_shortcodes_styles() {
    wp_enqueue_style(
        'giovanni-shortcodes',
        get_theme_file_uri( 'assets/styles/shortcodes.css' ),
        array( 'giovanni-style' ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'giovanni_enqueue_shortcodes_styles' );

/**
 * Enqueue post-terms styles for frontend
 * WordPress 6.8+ auto-loading might not work for all block styles
 */
function giovanni_enqueue_post_terms_styles() {
    wp_enqueue_style(
        'giovanni-post-terms',
        get_theme_file_uri( 'assets/styles/core-post-terms.css' ),
        array( 'giovanni-style' ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'giovanni_enqueue_post_terms_styles' );

/**
 * Enqueue button styles for frontend
 * WordPress 6.8+ auto-loading might not work for all block styles
 */
function giovanni_enqueue_button_styles() {
    $button_styles = array(
        'core-button',
        'core-button-arrow',
        'core-button-ghost',
        'core-button-dark'
    );
    
    foreach ( $button_styles as $style ) {
        $file_path = get_template_directory() . "/assets/styles/{$style}.css";
        if ( file_exists( $file_path ) ) {
            wp_enqueue_style(
                'giovanni-' . $style,
                get_theme_file_uri( "assets/styles/{$style}.css" ),
                array( 'giovanni-style' ),
                wp_get_theme()->get('Version')
            );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'giovanni_enqueue_button_styles' );

/**
 * Enqueue block styles for the editor (backend)
 * WordPress 6.8+ automatically loads block styles from assets/styles/ directory
 */
function giovanni_enqueue_block_editor_styles() {
    // Only enqueue editor-specific styles if they exist
    $editor_styles = array(
        'core-button-arrow',
        'core-button-ghost', 
        'core-button-dark',
        'core-navigation',
        'core-group',
        'core-post-terms',
        'core-site-title',
        'core-image',
        'core-table',
        'core-quote',
        'core-separator'
    );
    
    foreach ( $editor_styles as $style ) {
        $file_path = get_template_directory() . "/assets/styles/{$style}.css";
        if ( file_exists( $file_path ) ) {
            wp_enqueue_style(
                'giovanni-editor-' . $style,
                get_theme_file_uri( "assets/styles/{$style}.css" ),
                array(),
                wp_get_theme()->get('Version')
            );
        }
    }
}
add_action( 'enqueue_block_editor_assets', 'giovanni_enqueue_block_editor_styles' );