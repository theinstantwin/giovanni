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

        /* Clean post navigation hover effects */
        .wp-block-post-navigation-link a {
            text-decoration: none;
            transition: color 0.15s ease, transform 0.15s ease;
        }

        .wp-block-post-navigation-link a:hover,
        .wp-block-post-navigation-link a:focus {
            color: var(--wp--preset--color--giovanni-blue, #0070f3);
            transform: translateX(2px);
        }

        /* Previous link moves slightly left on hover */
        .wp-block-post-navigation-link[data-type="previous"] a:hover,
        .wp-block-post-navigation-link[data-type="previous"] a:focus {
            transform: translateX(-2px);
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
        
        // Handle shortcodes CSS separately
        if ( $filename === 'shortcodes' ) {
            wp_enqueue_style(
                'giovanni-shortcodes',
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