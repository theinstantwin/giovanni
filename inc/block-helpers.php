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
        // Clear old incorrect style names that might be cached
        unregister_block_style( 'core/navigation', 'link-hover-grow' );
        unregister_block_style( 'core/navigation', 'link-hover-underline' );
        unregister_block_style( 'core/quote', 'reflection' );
        unregister_block_style( 'core/image', 'duotone-highlight' );
        unregister_block_style( 'core/group', 'content-sidebar' );
        
        // Clear any potentially cached styles for re-registration
        unregister_block_style( 'core/button', 'ghost' );
        unregister_block_style( 'core/button', 'dark' );
        unregister_block_style( 'core/button', 'arrow-light' );
        unregister_block_style( 'core/button', 'arrow-dark' );
        unregister_block_style( 'core/navigation', 'underline' );
        unregister_block_style( 'core/navigation', 'button' );
        unregister_block_style( 'core/navigation', 'pill' );
        unregister_block_style( 'core/quote', 'book-quote' );
        unregister_block_style( 'core/quote', 'personal-reflection' );
        unregister_block_style( 'core/image', 'polaroid-static' );
        unregister_block_style( 'core/image', 'rounded' );
        unregister_block_style( 'core/group', 'card' );
        unregister_block_style( 'core/group', 'portfolio-card' );
        unregister_block_style( 'core/group', 'service-card' );
        unregister_block_style( 'core/group', 'company-card' );
        unregister_block_style( 'core/group', 'blog-roll-card' );
        unregister_block_style( 'core/group', 'longform-reading' );
        unregister_block_style( 'core/group', 'form-container' );
        unregister_block_style( 'core/table', 'striped' );
        unregister_block_style( 'core/table', 'minimal' );
        unregister_block_style( 'core/table', 'bordered' );
        unregister_block_style( 'core/post-terms', 'pill-badge' );
        unregister_block_style( 'core/post-terms', 'accent-tag' );
        unregister_block_style( 'core/post-terms', 'ghost-outline' );
        unregister_block_style( 'core/site-title', 'logo-style' );
        unregister_block_style( 'core/site-title', 'brand-name' );
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
            'name' => 'underline',
            'label' => __('Underline', 'giovanni'),
        ]);

        register_block_style('core/navigation', [
            'name' => 'button',
            'label' => __('Button', 'giovanni'),
        ]);

        register_block_style('core/navigation', [
            'name' => 'pill',
            'label' => __('Pill', 'giovanni'),
        ]);

        // Register Quote Block Styles
        register_block_style('core/quote', [
            'name' => 'book-quote',
            'label' => __('Book Quote', 'giovanni'),
        ]);

        register_block_style('core/quote', [
            'name' => 'personal-reflection',
            'label' => __('Personal Reflection', 'giovanni'),
        ]);

        // Register Image Block Styles
        register_block_style('core/image', [
            'name' => 'polaroid-static',
            'label' => __('Polaroid Static', 'giovanni'),
        ]);

        register_block_style('core/image', [
            'name' => 'rounded',
            'label' => __('Rounded', 'giovanni'),
        ]);

        // Register Group Block Styles
        register_block_style('core/group', [
            'name' => 'card',
            'label' => __('Card', 'giovanni'),
        ]);

        register_block_style('core/group', [
            'name' => 'portfolio-card',
            'label' => __('Portfolio Card', 'giovanni'),
        ]);

        register_block_style('core/group', [
            'name' => 'service-card',
            'label' => __('Service Card', 'giovanni'),
        ]);

        register_block_style('core/group', [
            'name' => 'company-card',
            'label' => __('Company Card', 'giovanni'),
        ]);

        register_block_style('core/group', [
            'name' => 'blog-roll-card',
            'label' => __('Blog Roll Card', 'giovanni'),
        ]);

        register_block_style('core/group', [
            'name' => 'longform-reading',
            'label' => __('Longform Reading', 'giovanni'),
        ]);

        register_block_style('core/group', [
            'name' => 'form-container',
            'label' => __('Form Container', 'giovanni'),
        ]);

        // Register Table Block Styles
        register_block_style('core/table', [
            'name' => 'striped',
            'label' => __('Striped', 'giovanni'),
        ]);

        register_block_style('core/table', [
            'name' => 'minimal',
            'label' => __('Minimal', 'giovanni'),
        ]);

        register_block_style('core/table', [
            'name' => 'bordered',
            'label' => __('Bordered', 'giovanni'),
        ]);

        // Register Post Terms Block Styles
        register_block_style('core/post-terms', [
            'name' => 'pill-badge',
            'label' => __('Pill Badge', 'giovanni'),
        ]);

        register_block_style('core/post-terms', [
            'name' => 'accent-tag',
            'label' => __('Accent Tag', 'giovanni'),
        ]);

        register_block_style('core/post-terms', [
            'name' => 'ghost-outline',
            'label' => __('Ghost Outline', 'giovanni'),
        ]);

        // Register Site Title Block Styles
        register_block_style('core/site-title', [
            'name' => 'logo-style',
            'label' => __('Logo Style', 'giovanni'),
        ]);

        register_block_style('core/site-title', [
            'name' => 'brand-name',
            'label' => __('Brand Name', 'giovanni'),
        ]);

    } catch (Exception $e) {
        error_log('Giovanni: Error registering block styles: ' . $e->getMessage());
    }
}
add_action( 'init', 'giovanni_register_block_styles' );