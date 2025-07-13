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
 * Add custom link styles and mobile layout fixes
 */
function giovanni_add_custom_link_styles() {
    $custom_css = '

        /* System-aware dark mode using CSS custom properties */
        @media (prefers-color-scheme: dark) {
            :root {
                --wp--preset--color--background: #1e2021;
                --wp--preset--color--foreground: #FBF1C7;
                --wp--preset--color--gray: #4C4641;
                --wp--preset--color--light-gray: #333230;
                --wp--preset--color--gray-50: #2F2F2F;
                --wp--preset--color--gray-100: #333230;
                --wp--preset--color--gray-200: #3D3A37;
                --wp--preset--color--gray-300: #4C4641;
                --wp--preset--color--gray-400: #5A534D;
                --wp--preset--color--gray-500: #6B6258;
                --wp--preset--color--gray-600: #7C7164;
                --wp--preset--color--gray-700: #8D8070;
                --wp--preset--color--gray-800: #A09686;
                --wp--preset--color--gray-900: #FBF1C7;
                --wp--preset--color--giovanni-blue: #ff335f;
                --wp--preset--color--primary: #ff335f;
                --wp--preset--color--secondary: #7C7164;
                --wp--preset--color--muted: #4C4641;
                --wp--preset--color--subtle: #333230;
                --wp--preset--color--emphasis: #FBF1C7;
                --wp--preset--color--primary-light: #ff5a7a;
                --wp--preset--color--primary-dark: #2d1319;
            }
        }

        /* Touch Device Optimizations */
        @media (hover: none) and (pointer: coarse) {
            /* Better touch targets for buttons */
            .wp-block-button .wp-block-button__link {
                min-height: 44px;
                padding: var(--wp--preset--spacing--4, 1rem) var(--wp--preset--spacing--6, 1.5rem);
            }
            
            /* Larger touch targets for navigation */
            .wp-block-navigation a {
                min-height: 44px;
                padding: var(--wp--preset--spacing--3, 0.75rem) var(--wp--preset--spacing--4, 1rem);
                display: flex;
                align-items: center;
            }
            
            /* Remove hover effects that don't work on touch */
            .wp-block-group.is-style-card:hover {
                transform: none;
                box-shadow: var(--wp--custom--shadows--md, 0 4px 12px rgba(0,0,0,0.15));
            }
            
            /* Make post titles more tappable */
            .wp-block-post-title a {
                min-height: 44px;
                display: flex;
                align-items: center;
                padding: var(--wp--preset--spacing--2, 0.5rem) 0;
            }
            
            /* Larger tap targets for post terms/tags */
            .wp-block-post-terms a {
                min-height: 36px;
                padding: var(--wp--preset--spacing--2, 0.5rem) var(--wp--preset--spacing--3, 0.75rem);
                display: inline-flex;
                align-items: center;
            }
            
            /* Remove transform effects that can feel laggy on mobile */
            .wp-block-button:hover,
            .wp-block-post-terms:hover,
            .wp-site-title:hover {
                transform: none;
            }
            
            /* Focus styles work better than hover on touch */
            .wp-block-button .wp-block-button__link:focus,
            .wp-block-navigation a:focus,
            .wp-block-post-title a:focus {
                outline: 3px solid var(--wp--preset--color--primary, #ff335f);
                outline-offset: 2px;
            }
        }

        /* Mobile layout fixes - add proper padding and wider content */
        @media (max-width: 768px) {
            .wp-site-blocks {
                padding-left: var(--wp--preset--spacing--3, 0.75rem);
                padding-right: var(--wp--preset--spacing--3, 0.75rem);
            }
            
            /* Make content wider on mobile by overriding contentSize */
            .is-layout-constrained > :not(.alignfull):not(.alignwide) {
                max-width: min(calc(100vw - 1.5rem), 100%);
                margin-left: auto !important;
                margin-right: auto !important;
            }
            
            /* Reduce padding for constrained content to maximize width */
            .wp-block-group.is-layout-constrained,
            .is-layout-constrained > * {
                padding-left: 0;
                padding-right: 0;
            }
            
            /* Minimal padding for specific content blocks */
            .wp-block-post-content,
            .wp-block-query,
            .wp-block-navigation {
                padding-left: var(--wp--preset--spacing--2, 0.5rem);
                padding-right: var(--wp--preset--spacing--2, 0.5rem);
            }
            
            /* Blog listing mobile improvements */
            .wp-block-query .wp-block-post {
                padding: var(--wp--preset--spacing--4, 1rem) 0;
                border-bottom: 1px solid var(--wp--preset--color--gray-200, #e5e5e5);
                margin-bottom: 0;
            }
            
            .wp-block-query .wp-block-post:last-child {
                border-bottom: none;
            }
            
            /* Month headers more compact on mobile */
            .wp-block-query h2,
            .wp-block-heading {
                font-size: var(--wp--preset--font-size--lg, 1.25rem) !important;
                margin: var(--wp--preset--spacing--6, 1.5rem) 0 var(--wp--preset--spacing--4, 1rem) 0 !important;
            }
            
            /* Post titles larger and better spacing */
            .wp-block-post-title {
                font-size: var(--wp--preset--font-size--md, 1.125rem) !important;
                line-height: 1.4 !important;
                margin-bottom: var(--wp--preset--spacing--2, 0.5rem) !important;
            }
            
            /* Post dates smaller and consistent */
            .wp-block-post-date {
                font-size: var(--wp--preset--font-size--sm, 0.875rem) !important;
                color: var(--wp--preset--color--gray-500, #737373) !important;
            }
            
            /* Improve touch targets */
            .wp-block-post-title a {
                display: block;
                padding: var(--wp--preset--spacing--2, 0.5rem) 0;
                min-height: 44px;
                line-height: 1.4;
            }
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