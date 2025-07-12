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
 */
function giovanni_register_pattern_categories() {
    // Check if the function exists (WordPress 5.5+)
    if ( function_exists( 'register_block_pattern_category' ) ) {
        
        // Register Giovanni Author category
        register_block_pattern_category( 'giovanni-author', array(
            'label' => __( 'Giovanni Author', 'giovanni' )
        ) );
        
        // Register Giovanni Content category
        register_block_pattern_category( 'giovanni-content', array(
            'label' => __( 'Giovanni Content', 'giovanni' )
        ) );
        
        // Register Giovanni Header category
        register_block_pattern_category( 'giovanni-header', array(
            'label' => __( 'Giovanni Headers', 'giovanni' )
        ) );
        
        // Register Giovanni Hero category
        register_block_pattern_category( 'giovanni-hero', array(
            'label' => __( 'Giovanni Heroes', 'giovanni' )
        ) );
        
        // Register Giovanni Personal category
        register_block_pattern_category( 'giovanni-personal', array(
            'label' => __( 'Giovanni Personal', 'giovanni' )
        ) );
        
        // Register Giovanni Posts category
        register_block_pattern_category( 'giovanni-posts', array(
            'label' => __( 'Giovanni Posts', 'giovanni' )
        ) );
        
        // Register Giovanni Cards category (for the card patterns we migrated)
        register_block_pattern_category( 'giovanni-cards', array(
            'label' => __( 'Giovanni Cards', 'giovanni' )
        ) );
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
        // Note: Button styles are now loaded automatically from /assets/styles/core-button.css
        
        // Note: Image styles are now loaded automatically from /assets/styles/core-image.css
        
        // Note: Navigation styles are now loaded automatically from /assets/styles/core-navigation.css
        
        // Note: Quote styles are now loaded automatically from /assets/styles/core-quote.css
        
        // Note: Group styles are now loaded automatically from /assets/styles/core-group.css
        
        // Note: Site Title styles are now loaded automatically from /assets/styles/core-site-title.css
        // Note: Post Terms styles are now loaded automatically from /assets/styles/core-post-terms.css
        // Note: Table styles are now loaded automatically from /assets/styles/core-table.css
    } catch (Exception $e) {
        error_log('Giovanni: Error registering block styles: ' . $e->getMessage());
    }
}
add_action( 'init', 'giovanni_register_block_styles' );