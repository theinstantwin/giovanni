<?php
/**
 * Block patterns, categories, and styles
 *
 * @package Giovanni_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register custom pattern categories.
 * 
 * @hook giovanni_pattern_categories Filters the pattern categories array before registration
 * @hook giovanni_before_register_pattern_categories Action before registering pattern categories
 * @hook giovanni_after_register_pattern_categories Action after registering pattern categories
 * 
 * @example
 * // Add custom pattern category
 * add_filter('giovanni_pattern_categories', function($categories) {
 *     $categories['giovanni-custom'] = array('label' => __('Giovanni Custom', 'giovanni'));
 *     return $categories;
 * });
 */
function giovanni_register_pattern_categories() {
    // Check if the function exists (WordPress 5.5+)
    if ( function_exists( 'register_block_pattern_category' ) ) {
        
        /**
         * Action hook before registering pattern categories
         */
        do_action( 'giovanni_before_register_pattern_categories' );
        
        $default_categories = array(
            'giovanni-author' => array(
                'label' => __( 'Giovanni Author', 'giovanni' )
            ),
            'giovanni-content' => array(
                'label' => __( 'Giovanni Content', 'giovanni' )
            ),
            'giovanni-header' => array(
                'label' => __( 'Giovanni Headers', 'giovanni' )
            ),
            'giovanni-hero' => array(
                'label' => __( 'Giovanni Heroes', 'giovanni' )
            ),
            'giovanni-personal' => array(
                'label' => __( 'Giovanni Personal', 'giovanni' )
            ),
            'giovanni-posts' => array(
                'label' => __( 'Giovanni Posts', 'giovanni' )
            ),
            'giovanni-cards' => array(
                'label' => __( 'Giovanni Cards', 'giovanni' )
            ),
        );
        
        /**
         * Filter the pattern categories array before registration
         *
         * @param array $categories The default pattern categories
         */
        $categories = apply_filters( 'giovanni_pattern_categories', $default_categories );
        
        foreach ( $categories as $category_name => $category_args ) {
            register_block_pattern_category( $category_name, $category_args );
        }
        
        /**
         * Action hook after registering pattern categories
         */
        do_action( 'giovanni_after_register_pattern_categories' );
    }
}
add_action( 'init', 'giovanni_register_pattern_categories' );

/**
 * Clear any cached block styles to prevent duplicates.
 */
function giovanni_clear_block_style_cache() {
    // Force WordPress to re-register block styles by clearing any cached styles
    if ( function_exists( 'unregister_block_style' ) ) {
        // Clear any potentially cached quote styles
        unregister_block_style( 'core/quote', 'reflection' );
        unregister_block_style( 'core/quote', 'personal-reflection' );
        unregister_block_style( 'core/quote', 'book-quote' );
        unregister_block_style( 'core/quote', 'book-quote-alt' );
    }
}

/**
 * Register custom block styles.
 */
function giovanni_register_block_styles() {
    // Ensure WordPress core is loaded
    if (!function_exists('register_block_style')) {
        return;
    }
    
    // Clear any cached styles first
    giovanni_clear_block_style_cache();
    
    // Register block styles with error handling
    try {
        // Register Button Block Styles
        register_block_style('core/button', [
            'name' => 'ghost',
            'label' => __('Ghost', 'giovanni'),
        ]);

        register_block_style('core/button', [
            'name' => 'dark',
            'label' => __('Dark', 'giovanni'),
        ]);

        register_block_style('core/button', [
            'name' => 'arrow-light',
            'label' => __('Arrow Light', 'giovanni'),
        ]);

        register_block_style('core/button', [
            'name' => 'arrow-dark',
            'label' => __('Arrow Dark', 'giovanni'),
        ]);

        // Register Navigation Block Styles
        register_block_style('core/navigation', [
            'name' => 'link-hover-grow',
            'label' => __('Link Hover Grow', 'giovanni'),
        ]);

        register_block_style('core/navigation', [
            'name' => 'link-hover-underline',
            'label' => __('Link Hover Underline', 'giovanni'),
        ]);

        // Register other block styles that were missing
        register_block_style('core/quote', [
            'name' => 'reflection',
            'label' => __('Reflection', 'giovanni'),
        ]);

        register_block_style('core/image', [
            'name' => 'duotone-highlight',
            'label' => __('Duotone Highlight', 'giovanni'),
        ]);

        register_block_style('core/group', [
            'name' => 'content-sidebar',
            'label' => __('Content Sidebar Layout', 'giovanni'),
        ]);

    } catch (Exception $e) {
        error_log('Giovanni: Error registering block styles: ' . $e->getMessage());
    }
}
add_action( 'init', 'giovanni_register_block_styles' );