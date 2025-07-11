<?php
/**
 * Giovanni Theme functions and definitions
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
        
        // Register Polaroid image style (original with animation)
        register_block_style( 'core/image', array(
            'name' => 'polaroid',
            'label' => __( 'Polaroid', 'giovanni' ),
            'inline_style' => '.wp-block-image.is-style-polaroid{background:var(--wp--preset--color--background)!important;padding:12px 12px 40px!important;box-shadow:0 2px 8px rgba(0,0,0,.15)!important;transform:rotate(-1deg)!important;transition:transform .3s ease!important;margin:2rem auto!important;display:inline-block!important}.wp-block-image.is-style-polaroid:hover{transform:rotate(0deg) scale(1.02)!important;box-shadow:0 4px 16px rgba(0,0,0,.2)!important}.wp-block-image.is-style-polaroid img{margin:0!important;border-radius:0!important}.wp-block-image.is-style-polaroid figcaption{margin-top:12px!important;text-align:center!important;font-family:"Courier New",monospace!important;font-size:14px!important;color:var(--wp--preset--color--gray-500)!important}',
        ) );
        
        // Register Polaroid Tape style (with tape effect and animation)
        register_block_style( 'core/image', array(
            'name' => 'polaroid-tape',
            'label' => __( 'Polaroid with Tape', 'giovanni' ),
            'inline_style' => '.wp-block-image.is-style-polaroid-tape{background:var(--wp--preset--color--background)!important;padding:12px 12px 40px!important;box-shadow:0 2px 8px rgba(0,0,0,.15)!important;transform:rotate(-1deg)!important;transition:transform .3s ease!important;margin:2rem auto!important;display:inline-block!important;position:relative!important}.wp-block-image.is-style-polaroid-tape:before{content:""!important;position:absolute!important;top:-.5em!important;right:1.2em!important;width:2.5em!important;height:1.2em!important;background:rgba(255,255,255,.8)!important;border:1px solid rgba(0,0,0,.1)!important;transform:rotate(15deg)!important;box-shadow:0 .1em .3em rgba(0,0,0,.1)!important;border-radius:.1em!important}.wp-block-image.is-style-polaroid-tape:after{content:""!important;position:absolute!important;bottom:-.4em!important;left:1em!important;width:2.2em!important;height:1.1em!important;background:rgba(255,255,255,.7)!important;border:1px solid rgba(0,0,0,.1)!important;transform:rotate(-12deg)!important;box-shadow:0 .1em .3em rgba(0,0,0,.1)!important;border-radius:.1em!important}.wp-block-image.is-style-polaroid-tape:hover{transform:rotate(0deg) scale(1.02)!important;box-shadow:0 4px 16px rgba(0,0,0,.2)!important}.wp-block-image.is-style-polaroid-tape img{margin:0!important;border-radius:0!important}.wp-block-image.is-style-polaroid-tape figcaption{margin-top:12px!important;text-align:center!important;font-family:"Courier New",monospace!important;font-size:14px!important;color:var(--wp--preset--color--gray-500)!important}',
        ) );
        
        // Register Polaroid Static style (no animation)
        register_block_style( 'core/image', array(
            'name' => 'polaroid-static',
            'label' => __( 'Polaroid Static', 'giovanni' ),
            'inline_style' => '.wp-block-image.is-style-polaroid-static{background:var(--wp--preset--color--background)!important;padding:12px 12px 40px!important;box-shadow:0 2px 8px rgba(0,0,0,.15)!important;transform:rotate(-1deg)!important;margin:2rem auto!important;display:inline-block!important}.wp-block-image.is-style-polaroid-static img{margin:0!important;border-radius:0!important}.wp-block-image.is-style-polaroid-static figcaption{margin-top:12px!important;text-align:center!important;font-family:"Courier New",monospace!important;font-size:14px!important;color:var(--wp--preset--color--gray-500)!important}',
        ) );
        
        // Register Rounded image style
        register_block_style( 'core/image', array(
            'name' => 'rounded',
            'label' => __( 'Rounded', 'giovanni' ),
            'inline_style' => '.wp-block-image.is-style-rounded img{border-radius:12px!important;transition:transform .3s ease!important}.wp-block-image.is-style-rounded:hover img{transform:scale(1.02)!important}',
        ) );
        
        // Register Underline navigation style
        register_block_style( 'core/navigation', array(
            'name' => 'underline',
            'label' => __( 'Underline Active', 'giovanni' ),
            'inline_style' => '.wp-block-navigation.is-style-underline .wp-block-navigation-item a{position:relative!important;transition:color .2s ease!important;text-decoration:none!important}.wp-block-navigation.is-style-underline .wp-block-navigation-item a:after{content:""!important;position:absolute!important;bottom:-4px!important;left:0!important;width:0!important;height:2px!important;background-color:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;transition:width .3s ease!important}.wp-block-navigation.is-style-underline .wp-block-navigation-item a:hover:after,.wp-block-navigation.is-style-underline .wp-block-navigation-item a:focus:after,.wp-block-navigation.is-style-underline .current-menu-item a:after{width:100%!important}.wp-block-navigation.is-style-underline .wp-block-navigation-item a:hover{color:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important}',
        ) );
        
        // Register Button navigation style
        register_block_style( 'core/navigation', array(
            'name' => 'button',
            'label' => __( 'Button Style', 'giovanni' ),
            'inline_style' => '.wp-block-navigation.is-style-button .wp-block-navigation-item a{padding:8px 16px!important;border-radius:6px!important;background:transparent!important;border:1px solid transparent!important;transition:all .2s ease!important;text-decoration:none!important;font-weight:500!important}.wp-block-navigation.is-style-button .wp-block-navigation-item a:hover{background:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;border-color:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;color:var(--wp--preset--color--background)!important;transform:translateY(-1px)!important}.wp-block-navigation.is-style-button .current-menu-item a{background:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;color:var(--wp--preset--color--background)!important;border-color:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important}.wp-block-navigation.is-style-button .current-menu-item a:hover{background:var(--wp--preset--color--foreground)!important;border-color:var(--wp--preset--color--foreground)!important;color:var(--wp--preset--color--background)!important}',
        ) );
        
        // Register Pill navigation style
        register_block_style( 'core/navigation', array(
            'name' => 'pill',
            'label' => __( 'Pill Navigation', 'giovanni' ),
            'inline_style' => '.wp-block-navigation.is-style-pill .wp-block-navigation-item a{padding:6px 14px!important;border-radius:20px!important;background:transparent!important;transition:all .2s ease!important;text-decoration:none!important;font-size:14px!important;font-weight:500!important}.wp-block-navigation.is-style-pill .wp-block-navigation-item a:hover{background:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;color:var(--wp--preset--color--background)!important}.wp-block-navigation.is-style-pill .current-menu-item a{background:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;color:var(--wp--preset--color--background)!important}.wp-block-navigation.is-style-pill .current-menu-item a:hover{background:var(--wp--preset--color--foreground)!important;color:var(--wp--preset--color--background)!important}',
        ) );
        
        // Register Minimal Dots navigation style
        register_block_style( 'core/navigation', array(
            'name' => 'minimal-dots',
            'label' => __( 'Minimal Dots', 'giovanni' ),
            'inline_style' => '.wp-block-navigation.is-style-minimal-dots .wp-block-navigation-item a{position:relative!important;text-decoration:none!important;transition:color .2s ease!important;padding-bottom:8px!important}.wp-block-navigation.is-style-minimal-dots .wp-block-navigation-item a:after{content:""!important;position:absolute!important;bottom:0!important;left:50%!important;transform:translateX(-50%)!important;width:4px!important;height:4px!important;border-radius:50%!important;background:transparent!important;transition:background-color .2s ease!important}.wp-block-navigation.is-style-minimal-dots .wp-block-navigation-item a:hover{color:var(--wp--preset--color--foreground)!important}.wp-block-navigation.is-style-minimal-dots .wp-block-navigation-item a:hover:after{background:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important}.wp-block-navigation.is-style-minimal-dots .current-menu-item a:after{background:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important}',
        ) );
        
        // Register Book Quote style
        register_block_style( 'core/quote', array(
            'name' => 'book-quote',
            'label' => __( 'Book Quote', 'giovanni' ),
            'inline_style' => '.wp-block-quote.is-style-book-quote{border-left:4px solid var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;background:var(--wp--preset--color--gray-50)!important;padding:24px 32px!important;margin:32px 0!important;border-radius:8px!important;position:relative!important}.wp-block-quote.is-style-book-quote:before{content:"📚"!important;position:absolute!important;top:12px!important;right:12px!important;font-size:24px!important;opacity:.6!important;line-height:1!important}.wp-block-quote.is-style-book-quote p{font-style:italic!important;font-size:18px!important;line-height:1.6!important;margin-bottom:16px!important;color:var(--wp--preset--color--foreground)!important;padding:4px 3px!important}.wp-block-quote.is-style-book-quote cite{font-weight:600!important;font-style:normal!important;color:var(--wp--preset--color--gray-600)!important;font-size:14px!important;opacity:0.8!important}.wp-block-quote.is-style-book-quote cite:before{content:"— "!important}',
        ) );
        
        // Register Personal reflection boxes
        register_block_style( 'core/quote', array(
            'name' => 'personal-reflection',
            'label' => __( 'Personal Reflection', 'giovanni' ),
            'inline_style' => '.wp-block-quote.is-style-personal-reflection{border:none!important;background:var(--wp--preset--color--gray-50)!important;border-left:4px solid var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;border-radius:0 8px 8px 0!important;padding:20px 24px!important;margin:24px 0!important;box-shadow:0 1px 3px rgba(0,0,0,.1)!important;position:relative!important}.wp-block-quote.is-style-personal-reflection:before{content:"💭"!important;position:absolute!important;top:6px!important;right:8px!important;font-size:22px!important;opacity:.6!important;line-height:1!important}.wp-block-quote.is-style-personal-reflection p{font-style:normal!important;font-size:15px!important;line-height:1.7!important;margin:0!important;color:var(--wp--preset--color--foreground)!important;padding:4px 3px!important}.wp-block-quote.is-style-personal-reflection cite{display:none!important}',
        ) );
        
        // Register Card group style (basic card)
        register_block_style( 'core/group', array(
            'name' => 'card',
            'label' => __( 'Card', 'giovanni' ),
            'inline_style' => '.wp-block-group.is-style-card{background:var(--wp--preset--color--background)!important;border-radius:12px!important;padding:24px!important;margin:24px 0!important;box-shadow:0 1px 3px rgba(0,0,0,.1)!important;transition:all .3s ease!important;border:1px solid var(--wp--preset--color--gray-200)!important}.wp-block-group.is-style-card:hover{transform:translateY(-4px)!important;box-shadow:0 8px 24px rgba(0,0,0,.15)!important;border-color:var(--wp--preset--color--gray-300)!important;background:var(--wp--preset--color--gray-50)!important}.wp-block-group.is-style-card>*{margin-bottom:16px!important}.wp-block-group.is-style-card>*:last-child{margin-bottom:0!important}',
        ) );
        
        // Register Portfolio Card group style
        register_block_style( 'core/group', array(
            'name' => 'portfolio-card',
            'label' => __( 'Portfolio Card', 'giovanni' ),
            'inline_style' => '.wp-block-group.is-style-portfolio-card{background:var(--wp--preset--color--background)!important;border-radius:12px!important;padding:0!important;margin:24px 0!important;box-shadow:0 1px 3px rgba(0,0,0,.1)!important;transition:all .3s ease!important;border:1px solid var(--wp--preset--color--gray-200)!important;overflow:hidden!important}.wp-block-group.is-style-portfolio-card:hover{transform:translateY(-4px)!important;box-shadow:0 8px 24px rgba(0,0,0,.15)!important;border-color:var(--wp--preset--color--gray-300)!important;background:var(--wp--preset--color--gray-50)!important}.wp-block-group.is-style-portfolio-card .wp-block-image{margin:0 0 16px 0!important}.wp-block-group.is-style-portfolio-card .wp-block-image img{border-radius:0!important;margin:0!important}.wp-block-group.is-style-portfolio-card .wp-block-heading{margin:0 0 8px 0!important;padding:0 24px!important;font-size:20px!important;font-weight:600!important;line-height:1.3!important}.wp-block-group.is-style-portfolio-card .wp-block-paragraph{margin:0 0 16px 0!important;padding:0 24px!important;color:var(--wp--preset--color--gray-500)!important;font-size:15px!important;line-height:1.5!important}.wp-block-group.is-style-portfolio-card .wp-block-buttons{margin:0!important;padding:0 24px 24px!important}',
        ) );
        
        // Register Service Card group style  
        register_block_style( 'core/group', array(
            'name' => 'service-card',
            'label' => __( 'Service Card', 'giovanni' ),
            'inline_style' => '.wp-block-group.is-style-service-card{background:var(--wp--preset--color--background)!important;border-radius:12px!important;padding:32px 24px!important;margin:24px 0!important;box-shadow:0 1px 3px rgba(0,0,0,.1)!important;transition:all .3s ease!important;border:1px solid var(--wp--preset--color--gray-200)!important;text-align:center!important}.wp-block-group.is-style-service-card:hover{transform:translateY(-4px)!important;box-shadow:0 8px 24px rgba(0,0,0,.15)!important;border-color:var(--wp--preset--color--gray-300)!important;background:var(--wp--preset--color--gray-50)!important}.wp-block-group.is-style-service-card .wp-block-image{margin:0 auto 20px!important;width:64px!important;height:64px!important}.wp-block-group.is-style-service-card .wp-block-image img{border-radius:8px!important;width:64px!important;height:64px!important;object-fit:cover!important}.wp-block-group.is-style-service-card .wp-block-heading{margin:0 0 12px 0!important;font-size:18px!important;font-weight:600!important;line-height:1.3!important;color:var(--wp--preset--color--foreground)!important}.wp-block-group.is-style-service-card .wp-block-paragraph{margin:0 0 20px 0!important;color:var(--wp--preset--color--gray-600)!important;font-size:14px!important;line-height:1.5!important}.wp-block-group.is-style-service-card .wp-block-buttons{margin:0!important}',
        ) );
        
        // Register Company Card group style (Audience Republic inspired)
        register_block_style( 'core/group', array(
            'name' => 'company-card',
            'label' => __( 'Company Card', 'giovanni' ),
            'inline_style' => '.wp-block-group.is-style-company-card{background:var(--wp--preset--color--background)!important;border-radius:12px!important;padding:24px!important;margin:24px 0!important;box-shadow:0 1px 3px rgba(0,0,0,.1)!important;transition:all .3s ease!important;border:1px solid var(--wp--preset--color--gray-200)!important;text-align:center!important;min-height:280px!important;display:flex!important;flex-direction:column!important;justify-content:space-between!important}.wp-block-group.is-style-company-card:hover{transform:translateY(-4px)!important;box-shadow:0 8px 24px rgba(0,0,0,.15)!important;border-color:var(--wp--preset--color--gray-300)!important;background:var(--wp--preset--color--gray-50)!important}.wp-block-group.is-style-company-card .wp-block-image{margin:0 auto 16px!important;width:80px!important;height:80px!important}.wp-block-group.is-style-company-card .wp-block-image img{border-radius:12px!important;width:80px!important;height:80px!important;object-fit:cover!important;border:1px solid var(--wp--preset--color--gray-200)!important}.wp-block-group.is-style-company-card .wp-block-heading{margin:0 0 8px 0!important;font-size:18px!important;font-weight:600!important;line-height:1.3!important;color:var(--wp--preset--color--foreground)!important}.wp-block-group.is-style-company-card .wp-block-paragraph{margin:0 0 16px 0!important;color:var(--wp--preset--color--gray-600)!important;font-size:14px!important;line-height:1.4!important;flex:1!important}.wp-block-group.is-style-company-card .wp-block-buttons{margin:0!important}.wp-block-group.is-style-company-card .wp-block-button .wp-block-button__link{font-size:14px!important;padding:8px 16px!important}',
        ) );
        
        // Register Blog Roll Card group style (minimal hover like Audience Republic)
        register_block_style( 'core/group', array(
            'name' => 'blog-roll-card',
            'label' => __( 'Blog Roll Card', 'giovanni' ),
            'inline_style' => '.wp-block-group.is-style-blog-roll-card{background:var(--wp--preset--color--background)!important;border-radius:12px!important;padding:24px!important;margin:24px 0!important;transition:all .3s ease!important;border:1px solid var(--wp--preset--color--gray-200)!important;text-align:center!important;min-height:280px!important;display:flex!important;flex-direction:column!important;justify-content:space-between!important}.wp-block-group.is-style-blog-roll-card:hover{transform:translateY(-4px)!important;background:var(--wp--preset--color--gray-50)!important}.wp-block-group.is-style-blog-roll-card .wp-block-image{margin:0 auto 16px!important;width:80px!important;height:80px!important}.wp-block-group.is-style-blog-roll-card .wp-block-image img{border-radius:12px!important;width:80px!important;height:80px!important;object-fit:cover!important;border:1px solid var(--wp--preset--color--gray-200)!important}.wp-block-group.is-style-blog-roll-card .wp-block-heading{margin:0 0 8px 0!important;font-size:18px!important;font-weight:600!important;line-height:1.3!important;color:var(--wp--preset--color--foreground)!important}.wp-block-group.is-style-blog-roll-card .wp-block-paragraph{margin:0 0 16px 0!important;color:var(--wp--preset--color--gray-600)!important;font-size:14px!important;line-height:1.4!important;flex:1!important}.wp-block-group.is-style-blog-roll-card .wp-block-buttons{margin:0!important}.wp-block-group.is-style-blog-roll-card .wp-block-button .wp-block-button__link{font-size:14px!important;padding:8px 16px!important}',
        ) );
        
        // Register Longform Reading style
        register_block_style( 'core/group', array(
            'name' => 'longform-reading',
            'label' => __( 'Longform Reading', 'giovanni' ),
            'inline_style' => '.wp-block-group.is-style-longform-reading{max-width:650px!important;margin:0 auto!important;padding:48px 32px!important;background:var(--wp--preset--color--background)!important;border-radius:0!important;box-shadow:none!important;border:none!important}.wp-block-group.is-style-longform-reading .wp-block-paragraph{font-size:18px!important;line-height:1.8!important;color:var(--wp--preset--color--reading-text)!important;margin-bottom:1.75rem!important;font-weight:400!important;text-align:left!important}.wp-block-group.is-style-longform-reading .wp-block-heading{font-size:28px!important;line-height:1.3!important;color:var(--wp--preset--color--foreground)!important;margin-bottom:1.5rem!important;margin-top:2.5rem!important;font-weight:600!important}.wp-block-group.is-style-longform-reading h2{font-size:24px!important;margin-top:2rem!important;margin-bottom:1.25rem!important}.wp-block-group.is-style-longform-reading h3{font-size:20px!important;margin-top:1.75rem!important;margin-bottom:1rem!important}.wp-block-group.is-style-longform-reading .wp-block-quote{font-size:20px!important;line-height:1.6!important;margin:2.5rem 0!important;padding-left:2rem!important;border-left:3px solid var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3))!important;background:none!important;font-style:italic!important;color:var(--wp--preset--color--gray-700)!important}.wp-block-group.is-style-longform-reading .wp-block-list{margin-bottom:1.75rem!important;padding-left:1.5rem!important}.wp-block-group.is-style-longform-reading .wp-block-list li{margin-bottom:0.5rem!important;line-height:1.7!important;font-size:18px!important;color:var(--wp--preset--color--reading-text)!important}@media (max-width:768px){.wp-block-group.is-style-longform-reading{padding:32px 24px!important}.wp-block-group.is-style-longform-reading .wp-block-paragraph{font-size:17px!important}}',
        ) );
        
        // Register Logo Style site-title
        register_block_style( 'core/site-title', array(
            'name' => 'logo-style',
            'label' => __( 'Logo Style', 'giovanni' ),
            'inline_style' => '.wp-block-site-title.is-style-logo-style{background:var(--wp--preset--color--gray-50)!important;padding:12px 20px!important;border-radius:8px!important;border:1px solid var(--wp--preset--color--gray-200)!important;display:inline-block!important;transition:all 0.2s ease!important}.wp-block-site-title.is-style-logo-style:hover{background:var(--wp--preset--color--gray-100)!important;border-color:var(--wp--preset--color--gray-300)!important;transform:translateY(-1px)!important}.wp-block-site-title.is-style-logo-style a{font-weight:600!important;color:var(--wp--preset--color--foreground)!important;text-decoration:none!important;letter-spacing:-0.025em!important}.wp-block-site-title.is-style-logo-style a:hover{color:var(--wp--preset--color--giovanni-blue)!important}',
        ) );
        
        // Register Brand Name site-title
        register_block_style( 'core/site-title', array(
            'name' => 'brand-name',
            'label' => __( 'Brand Name', 'giovanni' ),
            'inline_style' => '.wp-block-site-title.is-style-brand-name a{font-weight:700!important;font-size:1.5em!important;color:var(--wp--preset--color--giovanni-blue)!important;text-decoration:none!important;letter-spacing:-0.05em!important;line-height:1.1!important;text-transform:uppercase!important;transition:all 0.2s ease!important}.wp-block-site-title.is-style-brand-name a:hover{color:var(--wp--preset--color--gray-800)!important;transform:scale(1.05)!important}.wp-block-site-title.is-style-brand-name{display:inline-block!important}',
        ) );
        
        
        // Register Pill Badge category style
        register_block_style( 'core/post-terms', array(
            'name' => 'pill-badge',
            'label' => __( 'Pill Badge', 'giovanni' ),
            'inline_style' => '.wp-block-post-terms.is-style-pill-badge a{display:inline-block!important;padding:4px 8px!important;margin:0 4px 4px 0!important;border-radius:12px!important;background:var(--wp--preset--color--gray-100)!important;color:var(--wp--preset--color--gray-700)!important;font-size:12px!important;font-weight:500!important;text-transform:uppercase!important;text-decoration:none!important;letter-spacing:0.5px!important;transition:all 0.15s ease!important;border:1px solid transparent!important}.wp-block-post-terms.is-style-pill-badge a:hover{background:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;color:var(--wp--preset--color--background)!important;transform:translateY(-1px)!important;box-shadow:0 2px 4px rgba(0,0,0,0.1)!important}@media (prefers-color-scheme:dark){.wp-block-post-terms.is-style-pill-badge a{background:var(--wp--preset--color--gray-800)!important;color:var(--wp--preset--color--gray-300)!important}.wp-block-post-terms.is-style-pill-badge a:hover{background:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;color:var(--wp--preset--color--background)!important}}',
        ) );
        
        // Register Accent Tag category style
        register_block_style( 'core/post-terms', array(
            'name' => 'accent-tag',
            'label' => __( 'Accent Tag', 'giovanni' ),
            'inline_style' => '.wp-block-post-terms.is-style-accent-tag a{display:inline-block!important;padding:6px 12px!important;margin:0 6px 6px 0!important;border-radius:4px!important;background:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;color:var(--wp--preset--color--background)!important;font-size:13px!important;font-weight:600!important;text-decoration:none!important;transition:all 0.15s ease!important;border:1px solid transparent!important}.wp-block-post-terms.is-style-accent-tag a:hover{background:transparent!important;color:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;border-color:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;transform:translateY(-1px)!important;box-shadow:0 2px 6px rgba(0,112,243,0.15)!important}.wp-block-post-terms.is-style-accent-tag{line-height:1!important}@media (max-width:768px){.wp-block-post-terms.is-style-accent-tag a{font-size:12px!important;padding:5px 10px!important;margin:0 4px 4px 0!important}}',
        ) );
        
        // Register Ghost Outline category style
        register_block_style( 'core/post-terms', array(
            'name' => 'ghost-outline',
            'label' => __( 'Ghost Outline', 'giovanni' ),
            'inline_style' => '.wp-block-post-terms.is-style-ghost-outline a{display:inline-block!important;padding:6px 12px!important;margin:0 6px 6px 0!important;border-radius:6px!important;background:transparent!important;color:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;font-size:13px!important;font-weight:500!important;text-decoration:none!important;transition:all 0.15s ease!important;border:1px solid var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important}.wp-block-post-terms.is-style-ghost-outline a:hover{background:var(--wp--preset--color--giovanni-blue,var(--wp--preset--color--radical-red,#0070f3))!important;color:var(--wp--preset--color--background)!important;transform:translateY(-1px)!important;box-shadow:0 2px 6px rgba(0,112,243,0.2)!important}.wp-block-post-terms.is-style-ghost-outline{line-height:1!important}@media (max-width:768px){.wp-block-post-terms.is-style-ghost-outline a{font-size:12px!important;padding:5px 10px!important;margin:0 4px 4px 0!important}}@media (prefers-color-scheme:dark){.wp-block-post-terms.is-style-ghost-outline a:hover{box-shadow:0 2px 6px rgba(255,51,95,0.3)!important}}',
        ) );
        
        // Register Striped table style
        register_block_style( 'core/table', array(
            'name' => 'striped',
            'label' => __( 'Striped', 'giovanni' ),
            'inline_style' => '.wp-block-table.is-style-striped table{border-collapse:collapse!important}.wp-block-table.is-style-striped tbody tr:nth-child(even){background:var(--wp--preset--color--gray-50)!important}.wp-block-table.is-style-striped tbody tr:hover{background:var(--wp--preset--color--gray-100)!important}.wp-block-table.is-style-striped th{background:var(--wp--preset--color--gray-100)!important;border-bottom:2px solid var(--wp--preset--color--gray-300)!important}.wp-block-table.is-style-striped td{border-bottom:1px solid var(--wp--preset--color--gray-200)!important}',
        ) );
        
        // Register Minimal table style
        register_block_style( 'core/table', array(
            'name' => 'minimal',
            'label' => __( 'Minimal', 'giovanni' ),
            'inline_style' => '.wp-block-table.is-style-minimal{border:none!important;background:none!important}.wp-block-table.is-style-minimal table{border:none!important;background:none!important}.wp-block-table.is-style-minimal th{background:none!important;border:none!important;border-bottom:2px solid var(--wp--preset--color--gray-300)!important;font-weight:600!important;color:var(--wp--preset--color--gray-700)!important}.wp-block-table.is-style-minimal td{border:none!important;border-bottom:1px solid var(--wp--preset--color--gray-200)!important}.wp-block-table.is-style-minimal tbody tr:hover{background:var(--wp--preset--color--gray-50)!important}.wp-block-table.is-style-minimal tbody tr:last-child td{border-bottom:none!important}',
        ) );
        
        // Register Bordered table style (light blue accent)
        register_block_style( 'core/table', array(
            'name' => 'bordered',
            'label' => __( 'Bordered', 'giovanni' ),
            'inline_style' => '.wp-block-table.is-style-bordered{border:1px solid rgba(0,112,243,0.3)!important;border-radius:8px!important}.wp-block-table.is-style-bordered table{border:none!important;border-radius:8px!important}.wp-block-table.is-style-bordered th{background:rgba(0,112,243,0.08)!important;color:var(--wp--preset--color--giovanni-blue)!important;font-weight:600!important;border-bottom:1px solid rgba(0,112,243,0.3)!important}.wp-block-table.is-style-bordered td{border-bottom:1px solid rgba(0,112,243,0.3)!important}.wp-block-table.is-style-bordered tbody tr:hover{background:var(--wp--preset--color--gray-50)!important}',
        ) );
    } catch (Exception $e) {
        // Log error but don't break site
        error_log('Giovanni Theme: Block style registration failed - ' . $e->getMessage());
    }
}
add_action( 'init', 'giovanni_register_block_styles' );

/**
 * Register block patterns for card layouts.
 */
function giovanni_register_card_patterns() {
    if ( function_exists( 'register_block_pattern' ) ) {
        
        // Single Company Card Pattern
        register_block_pattern( 'giovanni/company-card-single', array(
            'title'       => __( 'Company Card', 'giovanni' ),
            'description' => __( 'A single company card with logo, name, description, and link.', 'giovanni' ),
            'categories'  => array( 'giovanni-cards' ),
            'content'     => '<!-- wp:group {"className":"is-style-company-card"} -->
<div class="wp-block-group is-style-company-card"><!-- wp:image {"width":"80px","height":"80px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'80\' height=\'80\' rx=\'12\' fill=\'%23f5f5f5\'/%3E%3Cpath d=\'M40 25c8.284 0 15 6.716 15 15s-6.716 15-15 15-15-6.716-15-15 6.716-15 15-15z\' fill=\'%23e5e5e5\'/%3E%3C/svg%3E" alt="" style="width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Company Name</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Brief description of what this company does and why they\'re valuable to your audience.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Visit Website</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
        ) );

        // Company Cards Grid Pattern
        register_block_pattern( 'giovanni/company-cards-grid', array(
            'title'       => __( 'Company Cards Grid', 'giovanni' ),
            'description' => __( 'A grid of three company cards showcasing different services or tools.', 'giovanni' ),
            'categories'  => array( 'giovanni-cards' ),
            'content'     => '<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-company-card"} -->
<div class="wp-block-group is-style-company-card"><!-- wp:image {"width":"80px","height":"80px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'80\' height=\'80\' rx=\'12\' fill=\'%23f5f5f5\'/%3E%3Cpath d=\'M40 25c8.284 0 15 6.716 15 15s-6.716 15-15 15-15-6.716-15-15 6.716-15 15-15z\' fill=\'%23e5e5e5\'/%3E%3C/svg%3E" alt="" style="width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Design Tools</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Professional design tools and resources for creating beautiful user interfaces and experiences.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Explore Tools</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-company-card"} -->
<div class="wp-block-group is-style-company-card"><!-- wp:image {"width":"80px","height":"80px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'80\' height=\'80\' rx=\'12\' fill=\'%230070f3\'/%3E%3Cpath d=\'M40 25c8.284 0 15 6.716 15 15s-6.716 15-15 15-15-6.716-15-15 6.716-15 15-15z\' fill=\'%23ffffff\'/%3E%3C/svg%3E" alt="" style="width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Development</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Modern development frameworks and tools for building fast, scalable web applications.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">View Projects</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-company-card"} -->
<div class="wp-block-group is-style-company-card"><!-- wp:image {"width":"80px","height":"80px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'80\' height=\'80\' rx=\'12\' fill=\'%23171717\'/%3E%3Cpath d=\'M40 25c8.284 0 15 6.716 15 15s-6.716 15-15 15-15-6.716-15-15 6.716-15 15-15z\' fill=\'%23ffffff\'/%3E%3C/svg%3E" alt="" style="width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Analytics</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Comprehensive analytics and insights to understand your audience and optimize performance.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
        ) );

        // Portfolio Card Pattern
        register_block_pattern( 'giovanni/portfolio-card-single', array(
            'title'       => __( 'Portfolio Card', 'giovanni' ),
            'description' => __( 'A portfolio project card with image, title, description, and call-to-action.', 'giovanni' ),
            'categories'  => array( 'giovanni-cards' ),
            'content'     => '<!-- wp:group {"className":"is-style-portfolio-card"} -->
<div class="wp-block-group is-style-portfolio-card"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="data:image/svg+xml,%3Csvg width=\'400\' height=\'200\' viewBox=\'0 0 400 200\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'400\' height=\'200\' fill=\'%23f5f5f5\'/%3E%3Cpath d=\'M200 75c13.807 0 25 11.193 25 25s-11.193 25-25 25-25-11.193-25-25 11.193-25 25-25z\' fill=\'%23e5e5e5\'/%3E%3C/svg%3E" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Project Title</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A brief description of this project, the technologies used, and the problem it solves. Include key features and outcomes.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-dark"} -->
<div class="wp-block-button is-style-dark"><a class="wp-block-button__link wp-element-button" href="#">View Project</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Source Code</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
        ) );

        // Service Cards Grid Pattern
        register_block_pattern( 'giovanni/service-cards-grid', array(
            'title'       => __( 'Service Cards Grid', 'giovanni' ),
            'description' => __( 'A grid of service cards highlighting different offerings or capabilities.', 'giovanni' ),
            'categories'  => array( 'giovanni-cards' ),
            'content'     => '<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-service-card"} -->
<div class="wp-block-group is-style-service-card"><!-- wp:image {"width":"64px","height":"64px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml,%3Csvg width=\'64\' height=\'64\' viewBox=\'0 0 64 64\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'64\' height=\'64\' rx=\'8\' fill=\'%23f0f9ff\'/%3E%3Cpath d=\'M32 20c6.627 0 12 5.373 12 12s-5.373 12-12 12-12-5.373-12-12 5.373-12 12-12z\' fill=\'%230070f3\'/%3E%3C/svg%3E" alt="" style="width:64px;height:64px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Web Design</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Beautiful, responsive designs that convert visitors into customers.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-service-card"} -->
<div class="wp-block-group is-style-service-card"><!-- wp:image {"width":"64px","height":"64px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml,%3Csvg width=\'64\' height=\'64\' viewBox=\'0 0 64 64\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'64\' height=\'64\' rx=\'8\' fill=\'%23f0fdf4\'/%3E%3Cpath d=\'M32 20c6.627 0 12 5.373 12 12s-5.373 12-12 12-12-5.373-12-12 5.373-12 12-12z\' fill=\'%2316a34a\'/%3E%3C/svg%3E" alt="" style="width:64px;height:64px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Development</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Fast, scalable applications built with modern technologies.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-service-card"} -->
<div class="wp-block-group is-style-service-card"><!-- wp:image {"width":"64px","height":"64px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml,%3Csvg width=\'64\' height=\'64\' viewBox=\'0 0 64 64\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'64\' height=\'64\' rx=\'8\' fill=\'%23fef7ff\'/%3E%3Cpath d=\'M32 20c6.627 0 12 5.373 12 12s-5.373 12-12 12-12-5.373-12-12 5.373-12 12-12z\' fill=\'%23a855f7\'/%3E%3C/svg%3E" alt="" style="width:64px;height:64px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Consulting</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Strategic guidance to grow your business and optimize operations.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
        ) );

        // Basic Card Pattern
        register_block_pattern( 'giovanni/basic-card-single', array(
            'title'       => __( 'Basic Card', 'giovanni' ),
            'description' => __( 'A simple card layout for general content and announcements.', 'giovanni' ),
            'categories'  => array( 'giovanni-cards' ),
            'content'     => '<!-- wp:group {"className":"is-style-card"} -->
<div class="wp-block-group is-style-card"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Card Title</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is a basic card layout perfect for announcements, featured content, or general information. Customize the content to match your needs.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Take Action</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
        ) );

        // Blog Roll Cards Grid Pattern
        register_block_pattern( 'giovanni/blog-roll-cards-grid', array(
            'title'       => __( 'Blog Roll Cards Grid', 'giovanni' ),
            'description' => __( 'A minimal grid of blog roll cards with simple lift hover effect.', 'giovanni' ),
            'categories'  => array( 'giovanni-cards' ),
            'content'     => '<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-blog-roll-card"} -->
<div class="wp-block-group is-style-blog-roll-card"><!-- wp:image {"width":"80px","height":"80px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'80\' height=\'80\' rx=\'12\' fill=\'%23f5f5f5\'/%3E%3Cpath d=\'M40 25c8.284 0 15 6.716 15 15s-6.716 15-15 15-15-6.716-15-15 6.716-15 15-15z\' fill=\'%23e5e5e5\'/%3E%3C/svg%3E" alt="" style="width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Blog Title One</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A thoughtful exploration of modern web development practices and user experience design principles.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Read More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-blog-roll-card"} -->
<div class="wp-block-group is-style-blog-roll-card"><!-- wp:image {"width":"80px","height":"80px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'80\' height=\'80\' rx=\'12\' fill=\'%23f0f9ff\'/%3E%3Cpath d=\'M40 25c8.284 0 15 6.716 15 15s-6.716 15-15 15-15-6.716-15-15 6.716-15 15-15z\' fill=\'%230070f3\'/%3E%3C/svg%3E" alt="" style="width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Blog Title Two</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Insights into building scalable applications with modern frameworks and clean architecture patterns.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Read More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-blog-roll-card"} -->
<div class="wp-block-group is-style-blog-roll-card"><!-- wp:image {"width":"80px","height":"80px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect width=\'80\' height=\'80\' rx=\'12\' fill=\'%23f0fdf4\'/%3E%3Cpath d=\'M40 25c8.284 0 15 6.716 15 15s-6.716 15-15 15-15-6.716-15-15 6.716-15 15-15z\' fill=\'%2316a34a\'/%3E%3C/svg%3E" alt="" style="width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Blog Title Three</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Reflections on design systems, component libraries, and maintaining consistency across digital products.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Read More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
        ) );
    }
}
add_action( 'init', 'giovanni_register_card_patterns' );


/**
 * Register block styles for form elements.
 */
function giovanni_register_form_block_styles() {
    if ( function_exists( 'register_block_style' ) ) {
        // Register Form Container group style
        register_block_style( 'core/group', array(
            'name' => 'form-container',
            'label' => __( 'Form Container', 'giovanni' ),
            'inline_style' => '
                .wp-block-group.is-style-form-container {
                    background: var(--wp--preset--color--background) !important;
                    border: 1px solid var(--wp--preset--color--gray-200) !important;
                    border-radius: 12px !important;
                    padding: 32px !important;
                    margin: 32px 0 !important;
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important;
                    transition: all 0.3s ease !important;
                }
                
                .wp-block-group.is-style-form-container:hover {
                    border-color: var(--wp--preset--color--gray-300) !important;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
                }
            ',
        ) );
    }
}
add_action( 'init', 'giovanni_register_form_block_styles' );


/**
 * Add precise CSS for pixel-perfect Giovanni recreation.
 */
function giovanni_custom_css() {
    ?>
    <style>
        /* Reset and base styles for pixel-perfect match */
        * {
            box-sizing: border-box;
        }
        
        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
        
        /* Header adjustments for exact Giovanni spacing */
        .wp-block-group.alignfull:has(.wp-block-site-title) {
            padding: 16px !important;
        }
        
        /* Navigation spacing to match Giovanni exactly */
        .wp-block-navigation .wp-block-navigation-item {
            margin-right: 32px;
        }
        
        .wp-block-navigation .wp-block-navigation-item:last-child {
            margin-right: 0;
        }
        
        /* Post title spacing adjustments */
        .wp-block-post-title {
            margin-bottom: 24px !important;
        }
        
        /* Content area precise spacing */
        .wp-block-post-content > * {
            margin-bottom: 24px;
        }
        
        .wp-block-post-content > *:last-child {
            margin-bottom: 0;
        }
        
        /* Code block pixel-perfect styling */
        .wp-block-code {
            font-family: ui-monospace, SFMono-Regular, "SF Mono", Consolas, "Liberation Mono", Menlo, monospace;
            font-size: 14px;
            background-color: var(--wp--preset--color--gray-100);
            color: var(--wp--preset--color--gray-900);
            border-radius: 6px;
            padding: 2px 6px;
            display: inline-block;
        }
        
        .wp-block-preformatted {
            font-family: ui-monospace, SFMono-Regular, "SF Mono", Consolas, "Liberation Mono", Menlo, monospace;
            font-size: 14px;
            line-height: 1.4;
            background-color: var(--wp--preset--color--gray-50);
            color: var(--wp--preset--color--gray-900);
            border: 1px solid var(--wp--preset--color--gray-200);
            border-radius: 8px;
            padding: 16px;
            overflow-x: auto;
            margin: 24px 0;
        }
        
        /* Responsive adjustments to match Giovanni mobile */
        @media (max-width: 768px) {
            /* Mobile header spacing */
            .wp-block-group.alignfull:has(.wp-block-site-title) {
                padding: 12px 16px !important;
            }
            
            /* Hide navigation on mobile, show hamburger */
            .wp-block-navigation:not(.is-mobile-menu) {
                display: none;
            }
            
            /* Mobile content spacing */
            main.wp-block-group {
                padding-top: 48px !important;
                padding-left: 16px !important;
                padding-right: 16px !important;
                padding-bottom: 64px !important;
            }
            
            /* Mobile title sizing */
            .wp-block-post-title {
                font-size: 36px !important;
                line-height: 1.1 !important;
                margin-bottom: 16px !important;
            }
            
            /* Mobile content spacing */
            .wp-block-post-content {
                font-size: 16px !important;
            }
            
            /* Mobile code blocks */
            .wp-block-preformatted {
                padding: 12px;
                margin: 16px 0;
            }
        }
        
        @media (max-width: 640px) {
            /* Extra small mobile adjustments */
            main.wp-block-group {
                padding-top: 32px !important;
            }
            
            .wp-block-post-title {
                font-size: 30px !important;
            }
        }
        
        /* Navigation responsive behavior to match Giovanni */
        @media (min-width: 769px) {
            .wp-block-navigation .wp-block-navigation__responsive-container-open {
                display: none;
            }
        }
        
        /* Enhanced body content link styling with animated border effect */
        
        /* Body text links ONLY - Restrict to actual post content, NOT query loops or page content */
        .single .wp-block-post-content p a, 
        .single .wp-block-post-content li a, 
        .single .wp-block-post-content blockquote a,
        .single .wp-block-post-content .wp-block-quote a,
        .page .wp-block-post-content p a,
        .page .wp-block-post-content li a,
        .page .wp-block-post-content blockquote a,
        .page .wp-block-post-content .wp-block-quote a {
            color: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
            text-decoration: underline !important;
            text-decoration-color: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
            text-underline-offset: 2px !important;
            text-decoration-thickness: 0.5px !important;
            font-weight: 400 !important;
            line-height: 1.4;
            transition: all 0.15s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        /* Body text links hover/focus effect - ONLY for single posts and pages */
        .single .wp-block-post-content p a:hover,
        .single .wp-block-post-content p a:focus,
        .single .wp-block-post-content li a:hover,
        .single .wp-block-post-content li a:focus,
        .single .wp-block-post-content blockquote a:hover,
        .single .wp-block-post-content blockquote a:focus,
        .single .wp-block-post-content .wp-block-quote a:hover,
        .single .wp-block-post-content .wp-block-quote a:focus,
        .page .wp-block-post-content p a:hover,
        .page .wp-block-post-content p a:focus,
        .page .wp-block-post-content li a:hover,
        .page .wp-block-post-content li a:focus,
        .page .wp-block-post-content blockquote a:hover,
        .page .wp-block-post-content blockquote a:focus,
        .page .wp-block-post-content .wp-block-quote a:hover,
        .page .wp-block-post-content .wp-block-quote a:focus {
            /* Smart contrast: darken for light backgrounds, brighten for dark backgrounds */
            color: color-mix(in srgb, var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) 75%, var(--wp--preset--color--foreground, black)) !important;
            text-decoration-color: color-mix(in srgb, var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) 75%, var(--wp--preset--color--foreground, black)) !important;
            text-decoration-thickness: 3px !important;
            text-underline-offset: 3px !important;
            font-weight: 600 !important;
        }
        
        /* Fallback for browsers without color-mix support */
        @supports not (color: color-mix(in srgb, red, blue)) {
            .single .wp-block-post-content p a:hover,
            .single .wp-block-post-content p a:focus,
            .single .wp-block-post-content li a:hover,
            .single .wp-block-post-content li a:focus,
            .single .wp-block-post-content blockquote a:hover,
            .single .wp-block-post-content blockquote a:focus,
            .single .wp-block-post-content .wp-block-quote a:hover,
            .single .wp-block-post-content .wp-block-quote a:focus,
            .page .wp-block-post-content p a:hover,
            .page .wp-block-post-content p a:focus,
            .page .wp-block-post-content li a:hover,
            .page .wp-block-post-content li a:focus,
            .page .wp-block-post-content blockquote a:hover,
            .page .wp-block-post-content blockquote a:focus,
            .page .wp-block-post-content .wp-block-quote a:hover,
            .page .wp-block-post-content .wp-block-quote a:focus {
                /* Use the accent color directly as fallback */
                color: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
                text-decoration-color: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
            }
        }
        
        
        /* Explicitly EXCLUDE link effects from certain areas and provide proper hover colors */
        .wp-block-query a,
        .wp-block-post-template a,
        .wp-block-latest-posts a,
        .wp-site-blocks > .wp-block-group a,
        .wp-block-post-title a {
            text-decoration-thickness: auto !important;
            font-weight: inherit !important;
            transition: color 0.2s ease !important;
        }
        
        /* Navigation and Site Title - Smart contrast for all themes */
        .wp-block-navigation a,
        .wp-block-site-title a,
        header a,
        footer a {
            text-decoration-thickness: auto !important;
            font-weight: inherit !important;
            transition: color 0.2s ease !important;
        }
        
        .wp-block-site-title a:hover,
        header a:hover,
        footer a:hover {
            /* Smart contrast: Use accent color for hover, adapting to theme */
            color: color-mix(in srgb, var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)), var(--wp--preset--color--foreground) 20%) !important;
        }
        

        /* Heading links - leave background magic alone, but REMOVE our body link effects */
        .wp-block-post-title a,
        .wp-block-post-content h1 a,
        .wp-block-post-content h2 a,
        .wp-block-post-content h3 a,
        .wp-block-post-content h4 a,
        .wp-block-post-content h5 a,
        .wp-block-post-content h6 a {
            text-decoration: none;
            border-bottom: none;
            padding-bottom: 0;
            line-height: normal;
        }
        
        /* Default link fallback */
        .wp-block-post-content a {
            color: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3));
            text-decoration: none;
        }
        
        .wp-block-post-content a:hover {
            text-decoration: underline;
            text-decoration-color: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3));
            text-underline-offset: 2px;
            text-decoration-thickness: 2px;
        }
        
        /* Clean default navigation - let theme.json handle colors */
        .wp-block-navigation a {
            transition: all 0.2s ease;
            text-decoration: none;
            position: relative;
        }
        
        /* Simple hover effect for default navigation */
        .wp-block-navigation a:hover {
            font-weight: 600;
        }
        
        /* Remove bold hover for custom navigation styles - they have their own hover effects */
        .wp-block-navigation.is-style-underline a:hover,
        .wp-block-navigation.is-style-button a:hover,
        .wp-block-navigation.is-style-pill a:hover,
        .wp-block-navigation.is-style-minimal-dots a:hover {
            font-weight: inherit;
        }
        
        .wp-block-navigation a:focus {
            outline: 2px solid var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3));
            outline-offset: 2px;
            border-radius: 4px;
        }
        
        /* Active page indicator for default navigation */
        .wp-block-navigation .current-menu-item > a {
            color: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
            font-weight: 600;
        }
        
        /* Site title styling */
        .wp-block-site-title a {
            font-weight: 600;
            text-decoration: none;
        }
        
        /* Post meta styling for exact match */
        .wp-block-post-author,
        .wp-block-post-date {
            color: var(--wp--preset--color--gray-500);
            font-size: 14px;
        }
        
        /* Paragraph spacing in content */
        .wp-block-post-content p {
            margin-bottom: 24px;
            line-height: 1.5;
        }
        
        /* Heading spacing in content */
        .wp-block-post-content h2 {
            margin-top: 32px;
            margin-bottom: 12px;
            font-size: 30px;
            font-weight: 600;
            line-height: 1.2;
            letter-spacing: -0.025em;
        }
        
        .wp-block-post-content h3 {
            margin-top: 24px;
            margin-bottom: 8px;
            font-size: 20px;
            font-weight: 600;
            line-height: 1.3;
        }
        
        /* List styling */
        .wp-block-post-content ul,
        .wp-block-post-content ol {
            margin-bottom: 24px;
            padding-left: 24px;
        }
        
        .wp-block-post-content li {
            margin-bottom: 8px;
        }
        
        /* Footer adjustments */
        .wp-block-group:has(+ *):last-child {
            margin-top: 96px;
        }
        
        /* Blog index page styling */
        .blog-post-item {
            transition: background-color 0.15s ease, transform 0.15s ease;
            cursor: pointer;
            margin-bottom: 2px !important;
            padding: 6px 12px !important;
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
        }
        
        /* Override global blockGap for posts by date pattern */
        .wp-block-query .wp-block-post-template {
            gap: 0.25rem !important;
        }
        
        .wp-block-query .wp-block-post-template .blog-post-item {
            margin-bottom: 0.25rem !important;
        }
        
        /* Ensure query blocks with blog-post-item have tight spacing */
        .wp-block-query:has(.blog-post-item) {
            gap: 0.25rem !important;
        }
        
        .wp-block-query:has(.blog-post-item) .wp-block-post-template {
            gap: 0.25rem !important;
        }
        
        .blog-post-item:hover {
            background-color: var(--wp--preset--color--gray-50, var(--wp--preset--color--light-gray));
            transform: translateY(-1px);
        }
        
        .blog-post-item:hover .wp-block-post-title a {
            color: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3));
        }
        
        /* Tighter spacing for post titles in index */
        .blog-post-item {
            align-items: baseline !important;
        }
        
        .blog-post-item .wp-block-post-title {
            flex: 1;
            margin-right: 16px;
            text-align: left !important;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
        
        .blog-post-item .wp-block-post-title a {
            color: var(--wp--preset--color--foreground) !important;
            text-decoration: none !important;
            font-weight: 500 !important;
            line-height: 1.3 !important;
        }
        
        .blog-post-item .wp-block-post-date {
            flex-shrink: 0;
            white-space: nowrap;
            color: var(--wp--preset--color--gray-500) !important;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            line-height: 1.3 !important;
        }
        
        /* Month grouping for blog posts */
        .blog-posts-by-month {
            margin-bottom: 48px;
        }
        
        .month-header {
            font-size: 20px;
            font-weight: 600;
            color: var(--wp--preset--color--foreground);
            margin-bottom: 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--wp--preset--color--gray-200);
        }
        
        /* Ensure proper flex layout for shortcode-generated posts */
        .blog-posts-by-month .blog-post-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        /* Better content alignment across site */
        .wp-block-group.alignfull .wp-block-group {
            align-items: center;
        }
        
        /* Consistent spacing for flex layouts */
        .wp-block-group[style*="flex"] {
            gap: 16px;
        }
        
        /* Mobile adjustments for blog index */
        @media (max-width: 768px) {
            .blog-post-item {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 2px;
                padding: 4px 8px !important;
                margin-bottom: 1px !important;
            }
            
            .blog-post-item .wp-block-post-title {
                margin-right: 0;
            }
            
            .blog-post-item .wp-block-post-date {
                font-size: 12px;
            }
        }
        
        /* Dark mode support (system preference) */
        @media (prefers-color-scheme: dark) {
            .wp-block-code {
                background-color: var(--wp--preset--color--gray-100);
                color: var(--wp--preset--color--foreground);
            }
            
            .wp-block-preformatted {
                background-color: var(--wp--preset--color--gray-50);
                color: var(--wp--preset--color--foreground);
                border-color: var(--wp--preset--color--gray-200);
            }
            
            .blog-post-item:hover {
                background-color: var(--wp--preset--color--gray-100, #21262d);
            }
            
            .blog-post-item .wp-block-post-title a {
                color: var(--wp--preset--color--foreground) !important;
            }
            
            .blog-post-item .wp-block-post-date {
                color: var(--wp--preset--color--gray-500) !important;
            }
            
            .month-header {
                color: var(--wp--preset--color--foreground);
                border-bottom-color: var(--wp--preset--color--gray-200);
            }
        }
        
        /* Button Variations - Enhanced hover states */
        .wp-block-button.is-style-outline .wp-block-button__link {
            background-color: transparent !important;
            border: 1px solid var(--wp--preset--color--gray-300) !important;
            color: var(--wp--preset--color--gray-600) !important;
            border-radius: 6px !important;
            font-weight: 500;
            transition: all 0.15s ease;
            text-decoration: none;
        }
        
        .wp-block-button.is-style-outline .wp-block-button__link:hover,
        .wp-block-button.is-style-outline .wp-block-button__link:focus {
            background-color: var(--wp--preset--color--gray-900) !important;
            border-color: var(--wp--preset--color--gray-900) !important;
            color: var(--wp--preset--color--background) !important;
            border-radius: 6px !important;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        
        /* Default button enhanced hover state */
        .wp-block-button:not([class*="is-style-"]) .wp-block-button__link:hover,
        .wp-block-button:not([class*="is-style-"]) .wp-block-button__link:focus {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        /* Ensure button variations maintain consistent spacing */
        .wp-block-button.is-style-outline .wp-block-button__link {
            padding: 0.75rem 2rem !important;
        }
        
        /* Enhanced Quote Styling */
        .wp-block-quote {
            border-left: 4px solid var(--wp--preset--color--giovanni-blue);
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            font-size: var(--wp--preset--font-size--lg);
            line-height: 1.6;
            color: var(--wp--preset--color--gray-700);
        }
        
        .wp-block-quote p {
            margin-bottom: 1rem;
        }
        
        .wp-block-quote p:last-of-type {
            margin-bottom: 0;
        }
        
        .wp-block-quote cite {
            display: block;
            margin-top: 1rem;
            font-style: normal;
            font-size: var(--wp--preset--font-size--sm);
            color: var(--wp--preset--color--gray-500);
            font-weight: 500;
        }
        
        .wp-block-quote cite:before {
            content: "— ";
        }
        
        /* Pull Quote Enhanced Styling */
        .wp-block-pullquote {
            background-color: var(--wp--preset--color--gray-50);
            border: none;
            border-radius: 8px;
            padding: 2rem;
            margin: 3rem 0;
            text-align: center;
        }
        
        .wp-block-pullquote blockquote {
            margin: 0;
            border: none;
            padding: 0;
            font-size: var(--wp--preset--font-size--xl);
            font-style: italic;
            line-height: 1.4;
            font-weight: 500;
            color: var(--wp--preset--color--gray-800);
        }
        
        .wp-block-pullquote blockquote p {
            margin-bottom: 0;
        }
        
        .wp-block-pullquote cite {
            display: block;
            margin-top: 1rem;
            font-style: normal;
            font-size: var(--wp--preset--font-size--md);
            color: var(--wp--preset--color--gray-600);
            font-weight: 500;
        }
        
        /* Card Grid Column Equalization */
        .wp-block-columns .wp-block-column .wp-block-group.is-style-company-card,
        .wp-block-columns .wp-block-column .wp-block-group.is-style-service-card,
        .wp-block-columns .wp-block-column .wp-block-group.is-style-portfolio-card,
        .wp-block-columns .wp-block-column .wp-block-group.is-style-card {
            height: 100% !important;
        }
        
        /* Ensure columns have equal height */
        .wp-block-columns {
            align-items: stretch !important;
        }
        
        .wp-block-columns .wp-block-column {
            display: flex !important;
            flex-direction: column !important;
        }
        
        /* Force card groups to fill column height */
        .wp-block-column > .wp-block-group.is-style-company-card,
        .wp-block-column > .wp-block-group.is-style-service-card,
        .wp-block-column > .wp-block-group.is-style-portfolio-card,
        .wp-block-column > .wp-block-group.is-style-card {
            flex: 1 !important;
            display: flex !important;
            flex-direction: column !important;
        }
        
        /* Ensure card content distributes properly within flex container */
        .wp-block-group.is-style-company-card,
        .wp-block-group.is-style-service-card {
            justify-content: space-between !important;
        }
        
        /* Allow text content to grow and push buttons to bottom */
        .wp-block-group.is-style-company-card .wp-block-paragraph,
        .wp-block-group.is-style-service-card .wp-block-paragraph {
            flex: 1 !important;
            display: flex !important;
            align-items: center !important;
        }

        /* Enhanced Image and Caption Styling */
        .wp-block-image {
            margin: 2rem 0;
        }
        
        .wp-block-image img {
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.15s ease;
        }
        
        .wp-block-image:hover img {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .wp-block-image figcaption {
            margin-top: 0.75rem;
            text-align: center;
            font-size: var(--wp--preset--font-size--sm);
            color: var(--wp--preset--color--gray-500);
            font-style: italic;
            line-height: 1.4;
        }
        
        /* Gallery styling */
        .wp-block-gallery {
            margin: 2rem 0;
        }
        
        .wp-block-gallery .wp-block-image {
            margin: 0;
        }
        
        .wp-block-gallery .wp-block-image img {
            border-radius: 6px;
        }
        
        .wp-block-gallery figcaption {
            margin-top: 1rem;
            text-align: center;
            font-size: var(--wp--preset--font-size--sm);
            color: var(--wp--preset--color--gray-500);
            font-style: italic;
            line-height: 1.4;
        }
        
        /* Media text block image styling */
        .wp-block-media-text .wp-block-media-text__media img {
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        /* Cover block image optimization */
        .wp-block-cover {
            border-radius: 8px;
            overflow: hidden;
        }
        
        /* Responsive image improvements */
        @media (max-width: 768px) {
            .wp-block-image {
                margin: 1.5rem 0;
            }
            
            .wp-block-image figcaption {
                font-size: var(--wp--preset--font-size--xs);
                margin-top: 0.5rem;
            }
            
            .wp-block-gallery {
                margin: 1.5rem 0;
            }
        }
        
        /* Currently Status Box - Living Document Aesthetic */
        .currently-box {
            position: relative;
            transition: all 0.3s ease;
            overflow: visible;
        }
        
        .currently-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 112, 243, 0.02);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
            z-index: 0;
        }
        
        .currently-box:hover::before {
            opacity: 1;
        }
        
        .currently-box > * {
            position: relative;
            z-index: 1;
        }
        
        /* Overlapping "Currently" label */
        .currently-label {
            position: absolute !important;
            top: -12px !important;
            left: 24px !important;
            background: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
            color: var(--wp--preset--color--background) !important;
            padding: 4px 12px !important;
            margin: 0 !important;
            border-radius: 4px !important;
            z-index: 2 !important;
        }
        
        .currently-box .wp-block-columns {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
        
        .currently-box .wp-block-column {
            /* Removed hover animation - keeping it clean */
        }
        
        /* Vertical separators between columns */
        .currently-reading,
        .currently-working {
            border-right: 1px solid var(--wp--preset--color--gray-200);
            padding-right: var(--wp--preset--spacing--5) !important;
        }
        
        /* Responsive adjustments for Currently box */
        @media (max-width: 768px) {
            .currently-box {
                margin: 1.5rem 1rem !important;
                padding: 1.5rem !important;
            }
            
            .currently-box .wp-block-columns {
                flex-direction: column !important;
            }
            
            .currently-box .wp-block-column {
                margin-bottom: var(--wp--preset--spacing--4);
                border-right: none !important;
                padding-right: 0 !important;
                padding: 1rem !important;
            }
            
            .currently-box .wp-block-column:last-child {
                margin-bottom: 0;
            }
            
            /* Adjust label position on mobile */
            .currently-label {
                left: 1.5rem !important;
                top: -10px !important;
                font-size: var(--wp--preset--font-size--xs) !important;
            }
            
            /* Key takeaway label mobile adjustments */
            .key-takeaway-pattern .key-takeaway-label {
                left: 1.5rem !important;
                top: -10px !important;
                font-size: var(--wp--preset--font-size--xs) !important;
            }
        }
        
        /* Dark theme adjustments for Currently box */
        @media (prefers-color-scheme: dark) {
            .currently-box::before {
                background: rgba(255, 51, 95, 0.03);
            }
            
            .currently-reading,
            .currently-working {
                border-right-color: var(--wp--preset--color--gray-600);
            }
        }
        
        /* Margin Note Pattern - True Marginalia */
        .margin-note-pattern {
            max-width: 1200px !important;
            margin: 2rem auto !important;
            position: relative !important;
        }
        
        .margin-note-container {
            display: flex !important;
            align-items: flex-start !important;
            gap: 2rem !important;
            position: relative !important;
        }
        
        .margin-note-main-content {
            flex: 1 !important;
            max-width: 680px !important;
            position: relative !important;
        }
        
        .margin-note-reference {
            position: relative !important;
        }
        
        .margin-note-reference::before {
            content: "" !important;
            position: absolute !important;
            right: -1rem !important;
            top: 0.25rem !important;
            width: 8px !important;
            height: 8px !important;
            background: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
            border-radius: 50% !important;
            opacity: 0.6 !important;
        }
        
        .margin-note-sidebar {
            width: 280px !important;
            flex-shrink: 0 !important;
            background: rgba(245, 245, 245, 0.5) !important;
            border-left: 2px solid var(--wp--preset--color--gray-200) !important;
            position: relative !important;
            font-family: "Inter", serif !important;
            padding: 1rem 1.5rem !important;
        }
        
        .margin-note-sidebar::before {
            content: "" !important;
            position: absolute !important;
            left: -6px !important;
            top: 1.25rem !important;
            width: 10px !important;
            height: 2px !important;
            background: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
        }
        
        .margin-note-label {
            color: var(--wp--preset--color--giovanni-blue) !important;
            font-size: 0.75rem !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            margin: 0 !important;
            opacity: 0.8 !important;
        }
        
        .margin-note-text {
            font-size: 0.875rem !important;
            line-height: 1.5 !important;
            font-style: italic !important;
            color: var(--wp--preset--color--gray-700) !important;
            margin: 0 !important;
            position: relative !important;
        }
        
        .margin-note-author {
            color: var(--wp--preset--color--gray-500) !important;
            font-size: 0.75rem !important;
            font-weight: 500 !important;
            margin: 0.5rem 0 0 0 !important;
            text-align: right !important;
        }
        
        /* Recommendation Pattern */
        .recommendation-pattern .recommendation-card {
            border: 1px solid var(--wp--preset--color--light-gray) !important;
            border-radius: 8px !important;
            padding: 1.5rem !important;
            margin: 2rem 0 !important;
            background-color: var(--wp--preset--color--background) !important;
            transition: all 0.2s ease !important;
        }
        
        .recommendation-pattern .recommendation-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
            transform: translateY(-2px) !important;
        }
        
        .recommendation-pattern .recommendation-label {
            color: var(--wp--preset--color--giovanni-blue) !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            margin: 0 !important;
        }
        
        .recommendation-pattern .recommendation-title {
            font-size: 1.25rem !important;
            font-weight: 600 !important;
            line-height: 1.3 !important;
            margin: 1rem 0 0.5rem 0 !important;
        }
        
        .recommendation-pattern .recommendation-meta {
            color: var(--wp--preset--color--gray-600) !important;
            font-size: 0.875rem !important;
            margin: 0 0 1rem 0 !important;
        }
        
        .recommendation-pattern .recommendation-description {
            font-size: 1rem !important;
            line-height: 1.6 !important;
            margin: 0 0 1rem 0 !important;
        }
        
        .recommendation-pattern .recommendation-rating {
            color: var(--wp--preset--color--gray-600) !important;
            font-size: 0.875rem !important;
            font-weight: 500 !important;
            margin: 0 !important;
        }
        
        .recommendation-pattern .recommendation-stars {
            color: var(--wp--preset--color--giovanni-blue) !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            margin: 0 !important;
        }
        
        /* Key Takeaway Pattern - Updated to match Currently Status design */
        .key-takeaway-pattern .key-takeaway-content {
            border: 1px solid var(--wp--preset--color--gray-200) !important;
            border-radius: 8px !important;
            padding: var(--wp--preset--spacing--8) var(--wp--preset--spacing--6) var(--wp--preset--spacing--6) var(--wp--preset--spacing--6) !important;
            margin: var(--wp--preset--spacing--8) 0 !important;
            background-color: var(--wp--preset--color--gray-50) !important;
            position: relative !important;
        }
        
        .key-takeaway-pattern .key-takeaway-label {
            position: absolute !important;
            top: -12px !important;
            left: 24px !important;
            background: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
            color: var(--wp--preset--color--background) !important;
            padding: 4px 12px !important;
            margin: 0 !important;
            border-radius: 4px !important;
            z-index: 2 !important;
            font-size: var(--wp--preset--font-size--sm) !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.025em !important;
        }
        
        .key-takeaway-pattern .key-takeaway-text {
            color: var(--wp--preset--color--foreground) !important;
            font-size: var(--wp--preset--font-size--base) !important;
            font-weight: 500 !important;
            line-height: 1.4 !important;
            margin: 0 !important;
        }
        
        .key-takeaway-pattern .key-takeaway-content .wp-block-columns {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
        
        /* Behind the Scenes Pattern */
        .behind-the-scenes-pattern .behind-the-scenes-content {
            border: 1px dashed var(--wp--preset--color--gray-400) !important;
            border-radius: 8px !important;
            padding: 0 !important;
            margin: 2rem 0 !important;
            background-color: var(--wp--preset--color--gray-25, var(--wp--preset--color--gray-50)) !important;
            overflow: hidden !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:first-child {
            padding: 1.5rem !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:last-child {
            background: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
            margin: 1rem 0 0 0 !important;
            padding: 1rem 1.5rem !important;
            border-top: 1px solid var(--wp--preset--color--gray-300) !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-label {
            color: var(--wp--preset--color--gray-700) !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            margin: 0 !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-title {
            font-size: 1.125rem !important;
            font-weight: 600 !important;
            line-height: 1.3 !important;
            margin: 1rem 0 0.5rem 0 !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-description {
            font-size: 1rem !important;
            line-height: 1.6 !important;
            margin: 0 0 1rem 0 !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-meta {
            color: var(--wp--preset--color--background, var(--wp--preset--color--gray-50)) !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            margin: 0 !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-tools {
            color: var(--wp--preset--color--background, var(--wp--preset--color--gray-50)) !important;
            font-size: 0.875rem !important;
            font-weight: 500 !important;
            margin: 0 !important;
        }
        
        /* Internal content spacing for all patterns */
        .recommendation-pattern .recommendation-card > *:not(.wp-block-group),
        .key-takeaway-pattern .key-takeaway-content > *:not(.wp-block-group),
        .margin-note-pattern .margin-note-main-content > *:not(.wp-block-group),
        .margin-note-pattern .margin-note-sidebar > *:not(.wp-block-group) {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        .currently-box > *:not(.wp-block-group),
        .currently-box .wp-block-columns .wp-block-column > *:not(.wp-block-group) {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        /* Special handling for Behind the Scenes nested groups */
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group > *:not(.wp-block-group) {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        /* Specific element spacing fixes for nested labels, titles, and ratings */
        .recommendation-pattern .recommendation-label,
        .key-takeaway-pattern .key-takeaway-label,
        .margin-note-pattern .margin-note-label {
            margin-left: 0.75rem !important;
        }
        
        .recommendation-pattern .recommendation-title,
        .key-takeaway-pattern .key-takeaway-text {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        .recommendation-pattern .recommendation-rating,
        .recommendation-pattern .recommendation-stars {
            margin-left: 0.75rem !important;
        }
        
        /* Flex group containers that contain nested elements - exclude Behind the Scenes */
        .recommendation-pattern .wp-block-group,
        .key-takeaway-pattern .wp-block-group,
        .margin-note-pattern .wp-block-group {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        /* Behind the Scenes has special structure - don't add extra padding to blue section */
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:first-child .wp-block-group {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        /* Behind the Scenes blue section should extend to edges - reset any padding */
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:last-child {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:last-child .wp-block-group {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        
        /* Mobile responsiveness - work WITH existing container system */
        @media (max-width: 1024px) {
            .margin-note-container {
                display: block !important;
                position: relative !important;
            }
            
            .margin-note-main-content {
                max-width: 100% !important;
            }
            
            .margin-note-sidebar {
                float: right !important;
                width: 180px !important;
                margin: 0 0 1rem 1rem !important;
                background: var(--wp--preset--color--gray-50) !important;
                border: 1px solid var(--wp--preset--color--gray-200) !important;
                border-radius: 6px !important;
                padding: 0.75rem !important;
                position: relative !important;
                clear: none !important;
                shape-outside: margin-box !important;
            }
            
            .margin-note-sidebar::before {
                display: none !important;
            }
            
            .margin-note-reference::before {
                display: none !important;
            }
        }
        
        @media (max-width: 768px) {
            /* Use negative margins to break out slightly and reduce internal padding */
            .margin-note-pattern {
                margin: 1.5rem -0.5rem !important;
            }
            
            .margin-note-sidebar {
                width: 140px !important;
                padding: 0.75rem !important;
                margin: 0 0 0.75rem 0.75rem !important;
            }
            
            .currently-box {
                margin: 1.5rem -0.5rem !important;
                padding: 1.25rem !important;
            }
            
            .currently-box .wp-block-column {
                padding: 0.75rem !important;
            }
            
            .recommendation-pattern .recommendation-card,
            .key-takeaway-pattern .key-takeaway-content {
                margin: 1.5rem -0.5rem !important;
                padding: 1.25rem !important;
            }
            
            .behind-the-scenes-pattern .behind-the-scenes-content {
                margin: 1.5rem -0.5rem !important;
            }
            
            .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:first-child {
                padding: 1.25rem !important;
            }
            
            .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:last-child {
                padding: 1rem 1.25rem !important;
            }
            
            /* Increase internal content spacing on smaller screens */
            .recommendation-pattern .recommendation-card > *:not(.wp-block-group),
            .key-takeaway-pattern .key-takeaway-content > *:not(.wp-block-group),
            .margin-note-pattern .margin-note-main-content > *:not(.wp-block-group),
            .margin-note-pattern .margin-note-sidebar > *:not(.wp-block-group),
            .currently-box > *:not(.wp-block-group),
            .currently-box .wp-block-columns .wp-block-column > *:not(.wp-block-group),
            .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group > *:not(.wp-block-group) {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
            
            /* Mobile specific element spacing - exclude Behind the Scenes blue section */
            .recommendation-pattern .recommendation-label,
            .key-takeaway-pattern .key-takeaway-label,
            .margin-note-pattern .margin-note-label,
            .recommendation-pattern .recommendation-rating,
            .recommendation-pattern .recommendation-stars {
                margin-left: 1rem !important;
            }
            
            .recommendation-pattern .recommendation-title,
            .key-takeaway-pattern .key-takeaway-text {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
            
            .recommendation-pattern .wp-block-group,
            .key-takeaway-pattern .wp-block-group,
            .margin-note-pattern .wp-block-group {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
            
            /* Behind the Scenes mobile - only main content area gets extra padding */
            .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:first-child .wp-block-group {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
        }
        
        @media (max-width: 480px) {
            /* Break out more on very small screens */
            .margin-note-pattern {
                margin: 1.5rem -1rem !important;
            }
            
            .margin-note-sidebar {
                float: none !important;
                width: 100% !important;
                max-width: none !important;
                margin: 1rem 0 !important;
                padding: 1rem !important;
            }
            
            .currently-box {
                margin: 1.5rem -1rem !important;
                padding: 1.5rem !important;
            }
            
            .currently-box .wp-block-column {
                padding: 1rem !important;
            }
            
            .recommendation-pattern .recommendation-card,
            .key-takeaway-pattern .key-takeaway-content {
                margin: 1.5rem -1rem !important;
                padding: 1.5rem !important;
            }
            
            .behind-the-scenes-pattern .behind-the-scenes-content {
                margin: 1.5rem -1rem !important;
            }
            
            .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:first-child {
                padding: 1.5rem !important;
            }
            
            .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:last-child {
                padding: 1.25rem 1.5rem !important;
            }
            
            /* Even more internal content spacing on very small screens */
            .recommendation-pattern .recommendation-card > *:not(.wp-block-group),
            .key-takeaway-pattern .key-takeaway-content > *:not(.wp-block-group),
            .margin-note-pattern .margin-note-main-content > *:not(.wp-block-group),
            .margin-note-pattern .margin-note-sidebar > *:not(.wp-block-group),
            .currently-box > *:not(.wp-block-group),
            .currently-box .wp-block-columns .wp-block-column > *:not(.wp-block-group),
            .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group > *:not(.wp-block-group) {
                padding-left: 1.25rem !important;
                padding-right: 1.25rem !important;
            }
            
            /* Small mobile specific element spacing - exclude Behind the Scenes blue */
            .recommendation-pattern .recommendation-label,
            .key-takeaway-pattern .key-takeaway-label,
            .margin-note-pattern .margin-note-label,
            .recommendation-pattern .recommendation-rating,
            .recommendation-pattern .recommendation-stars {
                margin-left: 1.25rem !important;
            }
            
            .recommendation-pattern .recommendation-title,
            .key-takeaway-pattern .key-takeaway-text {
                padding-left: 1.25rem !important;
                padding-right: 1.25rem !important;
            }
            
            .recommendation-pattern .wp-block-group,
            .key-takeaway-pattern .wp-block-group,
            .margin-note-pattern .wp-block-group {
                padding-left: 1.25rem !important;
                padding-right: 1.25rem !important;
            }
            
            /* Behind the Scenes small mobile - only main content area gets extra padding */
            .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:first-child .wp-block-group {
                padding-left: 1.25rem !important;
                padding-right: 1.25rem !important;
            }
            
            .recommendation-pattern .recommendation-label,
            .key-takeaway-pattern .key-takeaway-label,
            .behind-the-scenes-pattern .behind-the-scenes-label {
                font-size: 0.8rem !important;
            }
            
            .recommendation-pattern .recommendation-title,
            .key-takeaway-pattern .key-takeaway-text,
            .behind-the-scenes-pattern .behind-the-scenes-title {
                font-size: 1.1rem !important;
            }
        }
        
        /* Header Pattern Enhancements */
        .wp-block-site-title.is-style-brand-name a {
            color: var(--wp--preset--color--foreground) !important;
            text-decoration: none !important;
        }
        
        .wp-block-site-title.is-style-brand-name a:hover {
            color: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
        }
        
        /* Header responsive behavior */
        @media (max-width: 768px) {
            /* Stack centered header on mobile */
            .wp-block-group:has(.wp-block-site-title[class*="center"]) .wp-block-group {
                flex-direction: column !important;
                gap: var(--wp--preset--spacing--4) !important;
            }
            
            /* Adjust split header on mobile */
            .wp-block-group:has(.wp-block-site-title:not([class*="center"])) .wp-block-group {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: var(--wp--preset--spacing--4) !important;
            }
        }
        
        /* Table Styling */
        .wp-block-table {
            border-collapse: collapse;
            width: 100%;
            margin: 2rem 0;
            overflow-x: auto;
            border-radius: 8px;
            border: 1px solid var(--wp--preset--color--gray-200);
        }
        
        .wp-block-table table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            background: var(--wp--preset--color--background);
        }
        
        .wp-block-table th,
        .wp-block-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid var(--wp--preset--color--gray-200);
            font-size: var(--wp--preset--font-size--sm);
            line-height: 1.5;
        }
        
        .wp-block-table th {
            background: var(--wp--preset--color--gray-50);
            font-weight: 600;
            color: var(--wp--preset--color--gray-700);
            border-bottom: 2px solid var(--wp--preset--color--gray-300);
        }
        
        .wp-block-table td {
            color: var(--wp--preset--color--foreground);
        }
        
        .wp-block-table tr:hover {
            background: var(--wp--preset--color--gray-50);
        }
        
        .wp-block-table thead tr:hover {
            background: var(--wp--preset--color--gray-50);
        }
        
        /* Table caption styling */
        .wp-block-table figcaption {
            color: var(--wp--preset--color--gray-600);
            font-size: var(--wp--preset--font-size--sm);
            text-align: center;
            padding: 8px 0;
            font-style: italic;
        }
        
        /* Responsive table behavior */
        @media (max-width: 768px) {
            .wp-block-table {
                font-size: var(--wp--preset--font-size--sm);
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            .wp-block-table th,
            .wp-block-table td {
                padding: 8px 12px;
                font-size: 0.875rem;
            }
            
            .wp-block-table table {
                min-width: 500px;
            }
        }
    </style>
    <?php
}
add_action( 'wp_head', 'giovanni_custom_css' );

/**
 * Add pattern CSS to block editor for WYSIWYG editing experience.
 */
function giovanni_editor_pattern_styles() {
    // Create a dynamic CSS file for the editor with our pattern styles
    $pattern_css = '
        /* Margin Note Pattern - Editor Version */
        .margin-note-pattern {
            max-width: 100% !important;
            margin: 2rem 0 !important;
            position: relative !important;
        }
        
        .margin-note-container {
            display: flex !important;
            align-items: flex-start !important;
            gap: 2rem !important;
            position: relative !important;
        }
        
        .margin-note-main-content {
            flex: 1 !important;
            position: relative !important;
        }
        
        .margin-note-reference::before {
            content: "" !important;
            position: absolute !important;
            right: -1rem !important;
            top: 0.25rem !important;
            width: 8px !important;
            height: 8px !important;
            background: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
            border-radius: 50% !important;
            opacity: 0.6 !important;
        }
        
        .margin-note-sidebar {
            width: 280px !important;
            flex-shrink: 0 !important;
            background: rgba(245, 245, 245, 0.5) !important;
            border-left: 2px solid var(--wp--preset--color--gray-200) !important;
            position: relative !important;
            padding: 1rem 1.5rem !important;
        }
        
        .margin-note-sidebar::before {
            content: "" !important;
            position: absolute !important;
            left: -6px !important;
            top: 1.25rem !important;
            width: 10px !important;
            height: 2px !important;
            background: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
        }
        
        .margin-note-label {
            color: var(--wp--preset--color--giovanni-blue) !important;
            font-size: 0.75rem !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            margin: 0 !important;
            opacity: 0.8 !important;
        }
        
        .margin-note-text {
            font-size: 0.875rem !important;
            line-height: 1.5 !important;
            font-style: italic !important;
            color: var(--wp--preset--color--gray-700) !important;
            margin: 0 !important;
        }
        
        .margin-note-author {
            color: var(--wp--preset--color--gray-500) !important;
            font-size: 0.75rem !important;
            font-weight: 500 !important;
            margin: 0.5rem 0 0 0 !important;
            text-align: right !important;
        }
        
        /* Recommendation Pattern - Editor Version */
        .recommendation-pattern .recommendation-card {
            border: 1px solid var(--wp--preset--color--light-gray) !important;
            border-radius: 8px !important;
            padding: 1.5rem !important;
            margin: 2rem 0 !important;
            background-color: var(--wp--preset--color--background) !important;
            transition: all 0.2s ease !important;
        }
        
        .recommendation-pattern .recommendation-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
            transform: translateY(-2px) !important;
        }
        
        .recommendation-pattern .recommendation-label {
            color: var(--wp--preset--color--giovanni-blue) !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            margin: 0 !important;
        }
        
        /* Key Takeaway Pattern - Editor Version */
        .key-takeaway-pattern .key-takeaway-content {
            border: 2px solid var(--wp--preset--color--giovanni-blue) !important;
            border-radius: 8px !important;
            padding: 1.5rem !important;
            margin: 2rem 0 !important;
            background-color: var(--wp--preset--color--giovanni-blue-light, rgba(0, 112, 243, 0.05)) !important;
        }
        
        .key-takeaway-pattern .key-takeaway-label {
            color: var(--wp--preset--color--giovanni-blue) !important;
            font-size: 0.875rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            margin: 0 !important;
        }
        
        /* Behind the Scenes Pattern - Editor Version */
        .behind-the-scenes-pattern .behind-the-scenes-content {
            border: 1px dashed var(--wp--preset--color--gray-400) !important;
            border-radius: 8px !important;
            padding: 0 !important;
            margin: 2rem 0 !important;
            background-color: var(--wp--preset--color--gray-25, rgba(0, 0, 0, 0.02)) !important;
            overflow: hidden !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:first-child {
            padding: 1.5rem !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:last-child {
            background: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
            margin: 1rem 0 0 0 !important;
            padding: 1rem 1.5rem !important;
            border-top: 1px solid var(--wp--preset--color--gray-300) !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-label {
            color: var(--wp--preset--color--gray-700) !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            margin: 0 !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-meta {
            color: var(--wp--preset--color--background) !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            margin: 0 !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-tools {
            color: var(--wp--preset--color--background) !important;
            font-size: 0.875rem !important;
            font-weight: 500 !important;
            margin: 0 !important;
        }
        
        /* Currently Status Pattern - Editor Version */
        .currently-box {
            position: relative !important;
            background: var(--wp--preset--color--background) !important;
            border: 1px solid var(--wp--preset--color--gray-200) !important;
            border-radius: 12px !important;
            padding: var(--wp--preset--spacing--6) !important;
            margin: var(--wp--preset--spacing--8) 0 !important;
            overflow: hidden !important;
        }
        
        .currently-box::before {
            content: "" !important;
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            background: rgba(255, 51, 95, 0.02) !important;
            pointer-events: none !important;
            z-index: 0 !important;
        }
        
        .currently-label {
            position: absolute !important;
            top: -12px !important;
            left: 24px !important;
            background: var(--wp--preset--color--giovanni-blue, var(--wp--preset--color--radical-red, #0070f3)) !important;
            color: var(--wp--preset--color--background) !important;
            padding: 4px 12px !important;
            border-radius: 12px !important;
            font-size: var(--wp--preset--font-size--xs) !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            z-index: 1 !important;
        }
        
        .currently-reading,
        .currently-working {
            border-right: 1px solid var(--wp--preset--color--gray-200);
            padding-right: var(--wp--preset--spacing--5) !important;
        }
        
        /* Internal content spacing for editor patterns */
        .recommendation-pattern .recommendation-card > *:not(.wp-block-group),
        .key-takeaway-pattern .key-takeaway-content > *:not(.wp-block-group),
        .margin-note-pattern .margin-note-main-content > *:not(.wp-block-group),
        .margin-note-pattern .margin-note-sidebar > *:not(.wp-block-group) {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        .currently-box > *:not(.wp-block-group),
        .currently-box .wp-block-columns .wp-block-column > *:not(.wp-block-group) {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group > *:not(.wp-block-group) {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        /* Specific element spacing fixes for editor - nested labels, titles, and ratings */
        .recommendation-pattern .recommendation-label,
        .key-takeaway-pattern .key-takeaway-label,
        .margin-note-pattern .margin-note-label {
            margin-left: 0.75rem !important;
        }
        
        .recommendation-pattern .recommendation-title,
        .key-takeaway-pattern .key-takeaway-text {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        .recommendation-pattern .recommendation-rating,
        .recommendation-pattern .recommendation-stars {
            margin-left: 0.75rem !important;
        }
        
        /* Flex group containers that contain nested elements - editor - exclude Behind the Scenes */
        .recommendation-pattern .wp-block-group,
        .key-takeaway-pattern .wp-block-group,
        .margin-note-pattern .wp-block-group {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        /* Behind the Scenes editor structure - special handling */
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:first-child .wp-block-group {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }
        
        /* Behind the Scenes blue section should extend to edges in editor - reset padding */
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:last-child {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        
        .behind-the-scenes-pattern .behind-the-scenes-content > .wp-block-group:last-child .wp-block-group {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    ';
    
    // Add the CSS inline to the editor
    wp_add_inline_style( 'wp-edit-blocks', $pattern_css );
}
add_action( 'enqueue_block_editor_assets', 'giovanni_editor_pattern_styles' );

/**
 * Calculate reading time for posts.
 */
function giovanni_reading_time( $content = '' ) {
    if ( empty( $content ) ) {
        $content = get_post_field( 'post_content', get_the_ID() );
    }
    
    $word_count = str_word_count( wp_strip_all_tags( $content ) );
    $reading_time = ceil( $word_count / 200 ); // 200 words per minute
    
    return $reading_time . ' min read';
}

/**
 * Modify excerpt length for blog posts.
 */
function giovanni_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'giovanni_excerpt_length' );

/**
 * Modify excerpt more text.
 */
function giovanni_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'giovanni_excerpt_more' );

/**
 * Get posts grouped by month for the index page.
 */
function giovanni_get_posts_by_month() {
    $posts = get_posts(array(
        'numberposts' => 100,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    
    $posts_by_month = array();
    
    foreach ($posts as $post) {
        $month_year = date('F Y', strtotime($post->post_date));
        if (!isset($posts_by_month[$month_year])) {
            $posts_by_month[$month_year] = array();
        }
        $posts_by_month[$month_year][] = $post;
    }
    
    return $posts_by_month;
}

/**
 * Shortcode to display posts grouped by month.
 */
function giovanni_posts_by_month_shortcode() {
    $posts_by_month = giovanni_get_posts_by_month();
    
    if (empty($posts_by_month)) {
        return '<p class="has-gray-500-color has-text-color">No posts found.</p>';
    }
    
    $output = '';
    
    foreach ($posts_by_month as $month_year => $posts) {
        $output .= '<div class="blog-posts-by-month">';
        $output .= '<h2 class="month-header">' . esc_html($month_year) . '</h2>';
        
        foreach ($posts as $post) {
            $post_date = date('M j', strtotime($post->post_date));
            $post_url = get_permalink($post->ID);
            $post_title = get_the_title($post->ID);
            
            $output .= '<div class="blog-post-item" style="border-radius:6px;margin-bottom:8px;padding:8px 12px;">';
            $output .= '<a href="' . esc_url($post_url) . '" style="text-decoration:none;color:var(--wp--preset--color--foreground);font-size:18px;font-weight:500;line-height:1.4;flex:1;margin-right:16px;">' . esc_html($post_title) . '</a>';
            $output .= '<span style="color:var(--wp--preset--color--gray-500);font-size:14px;flex-shrink:0;white-space:nowrap;">' . esc_html($post_date) . '</span>';
            $output .= '</div>';
        }
        
        $output .= '</div>';
    }
    
    return $output;
}
add_shortcode('posts_by_month', 'giovanni_posts_by_month_shortcode');

/**
 * Performance Optimizations
 */

/**
 * Remove unnecessary WordPress features for better performance.
 */
function giovanni_performance_optimizations() {
    // Remove WordPress version from head
    remove_action('wp_head', 'wp_generator');
    
    // Remove RSD link
    remove_action('wp_head', 'rsd_link');
    
    // Remove wlwmanifest.xml
    remove_action('wp_head', 'wlwmanifest_link');
    
    // Remove shortlink
    remove_action('wp_head', 'wp_shortlink_wp_head');
    
    // Remove adjacent posts links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    
    // Remove feed links
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    
    // Remove REST API link
    remove_action('wp_head', 'rest_output_link_wp_head');
    
    // Remove oEmbed discovery links
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
}
add_action('init', 'giovanni_performance_optimizations');

/**
 * Optimize jQuery loading.
 */
function giovanni_optimize_jquery() {
    if (!is_admin()) {
        // Don't load jQuery unless needed
        wp_deregister_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'giovanni_optimize_jquery');

/**
 * Add preload hints for critical resources.
 */
function giovanni_preload_resources() {
    // Preload Inter font from Google Fonts
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
    echo '<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"></noscript>';
}
add_action('wp_head', 'giovanni_preload_resources', 1);

/**
 * Add critical CSS inline for above-the-fold content.
 */
function giovanni_critical_css() {
    ?>
    <style>
        /* Critical CSS for above-the-fold content */
        body {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.5;
            margin: 0;
            background-color: var(--wp--preset--color--background);
            color: var(--wp--preset--color--foreground);
        }
        
        .wp-block-group.alignfull {
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Critical header styles */
        header .wp-block-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
        }
        
        .wp-block-site-title {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
        }
        
        .wp-block-navigation {
            display: flex;
            gap: 32px;
            font-size: 14px;
        }
        
        .wp-block-navigation a {
            color: var(--wp--preset--color--gray-600);
            text-decoration: none;
        }
        
        /* Critical main content styles */
        main {
            max-width: 680px;
            margin: 0 auto;
            padding: 64px 16px;
        }
        
        .wp-block-post-title {
            font-size: 48px;
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -0.025em;
            margin-bottom: 24px;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .wp-block-navigation:not(.is-mobile-menu) {
                display: none;
            }
            
            main {
                padding: 48px 16px;
            }
            
            .wp-block-post-title {
                font-size: 36px;
            }
        }
    </style>
    <?php
}
add_action('wp_head', 'giovanni_critical_css', 2);

/**
 * Optimize images by adding loading="lazy" and srcset support.
 */
function giovanni_optimize_images($content) {
    if (is_admin() || is_feed()) {
        return $content;
    }
    
    // Add loading="lazy" to images
    $content = str_replace('<img ', '<img loading="lazy" ', $content);
    
    return $content;
}
add_filter('the_content', 'giovanni_optimize_images');

/**
 * Add security headers for performance and security.
 */
function giovanni_security_headers() {
    // Only add headers on frontend
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
add_action('send_headers', 'giovanni_security_headers');

/**
 * Optimize database queries by caching reading time calculations.
 */
function giovanni_cached_reading_time($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    // Check for cached reading time
    $reading_time = get_post_meta($post_id, '_reading_time', true);
    
    if (empty($reading_time)) {
        // Calculate and cache reading time
        $content = get_post_field('post_content', $post_id);
        $word_count = str_word_count(wp_strip_all_tags($content));
        $reading_time = ceil($word_count / 200) . ' min read';
        
        // Cache the result
        update_post_meta($post_id, '_reading_time', $reading_time);
    }
    
    return $reading_time;
}

/**
 * Clear reading time cache when post is updated.
 */
function giovanni_clear_reading_time_cache($post_id) {
    delete_post_meta($post_id, '_reading_time');
}
add_action('save_post', 'giovanni_clear_reading_time_cache');

/**
 * Disable WordPress emojis for performance.
 */
function giovanni_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'giovanni_disable_emojis');

/**
 * Optimize RSS feeds.
 */
function giovanni_optimize_feeds() {
    // Remove RSS feed link from head if not needed
    if (!is_home() && !is_front_page()) {
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
    }
}
add_action('wp_head', 'giovanni_optimize_feeds', 1);

/**
 * Add comprehensive form styling with Giovanni Blue prominence and structured design.
 */
function giovanni_form_styles() {
    ?>
    <style>
        /* Form Container Styling */
        .wp-block-group.is-style-form-container,
        .wp-block-group.form-container {
            background: var(--wp--preset--color--background);
            border: 1px solid var(--wp--preset--color--gray-200);
            border-radius: 12px;
            padding: 32px;
            margin: 32px 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .wp-block-group.is-style-form-container:hover,
        .wp-block-group.form-container:hover {
            border-color: var(--wp--preset--color--gray-300);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        /* Form Element Base Styling - Structured Design */
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="url"],
        input[type="password"],
        input[type="search"],
        input[type="number"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            font-family: var(--wp--preset--font-family--inter);
            font-size: var(--wp--preset--font-size--md);
            line-height: 1.5;
            padding: 12px 16px;
            border: 2px solid var(--wp--preset--color--gray-200);
            border-radius: 8px;
            background-color: var(--wp--preset--color--background);
            color: var(--wp--preset--color--foreground);
            transition: all 0.2s ease;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            appearance: none;
            outline: none;
        }
        
        /* Dynamic Accent Color Focus States */
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="url"]:focus,
        input[type="password"]:focus,
        input[type="search"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        textarea:focus,
        select:focus {
            border-color: var(--wp--preset--color--giovanni-blue);
            background-color: var(--wp--preset--color--gray-50);
            box-shadow: 0 0 0 3px color-mix(in srgb, var(--wp--preset--color--giovanni-blue) 10%, transparent), 0 2px 4px rgba(0, 0, 0, 0.1);
            transform: translateY(-1px);
        }
        
        /* Hover States */
        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="tel"]:hover,
        input[type="url"]:hover,
        input[type="password"]:hover,
        input[type="search"]:hover,
        input[type="number"]:hover,
        input[type="date"]:hover,
        textarea:hover,
        select:hover {
            border-color: var(--wp--preset--color--gray-300);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        /* Textarea Specific Styling */
        textarea {
            min-height: 120px;
            resize: vertical;
            line-height: 1.6;
        }
        
        /* Select Dropdown Styling */
        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'%3E%3Cpath stroke='%23666666' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 40px;
            cursor: pointer;
        }
        
        select:focus {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'%3E%3Cpath stroke='%230070f3' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        }
        
        /* Form Labels - Clear Hierarchy */
        label,
        .wp-block-group label,
        .form-field label {
            display: block;
            font-weight: 600;
            font-size: var(--wp--preset--font-size--sm);
            color: var(--wp--preset--color--gray-700);
            margin-bottom: 6px;
            line-height: 1.4;
        }
        
        /* Required Field Indicator */
        label.required:after,
        label[required]:after {
            content: " *";
            color: var(--wp--preset--color--giovanni-blue);
            font-weight: 600;
        }
        
        /* Form Field Grouping - Flexbox approach for consistent spacing */
        .form-field,
        .wp-block-group .form-field {
            display: flex;
            flex-direction: column;
            margin-bottom: 24px;
            position: relative;
            padding-bottom: 24px; /* Space for absolutely positioned messages */
        }
        
        .form-field:last-child,
        .wp-block-group .form-field:last-child {
            margin-bottom: 0;
        }
        
        /* Input/textarea should grow to fill available space */
        .form-field input,
        .form-field textarea,
        .form-field select {
            flex: 1;
        }
        
        /* Search Block Specific Fixes */
        .wp-block-search {
            position: relative;
        }
        
        .wp-block-search .wp-block-search__input {
            outline: none !important;
        }
        
        .wp-block-search .wp-block-search__input:focus {
            outline: none !important;
            border-color: var(--wp--preset--color--giovanni-blue) !important;
            box-shadow: 0 0 0 3px rgba(0, 112, 243, 0.1) !important;
        }
        
        /* Reset for checkbox/radio fields */
        .checkbox-field,
        .radio-field,
        .form-field.checkbox-field,
        .form-field.radio-field {
            flex-direction: row;
            align-items: center;
            padding-bottom: 0;
        }
        
        .checkbox-field input,
        .radio-field input {
            flex: none;
            width: 18px;
            height: 18px;
        }
        
        /* Inline Validation States */
        
        /* Error State */
        .form-field.error input,
        .form-field.error textarea,
        .form-field.error select,
        input.error,
        textarea.error,
        select.error {
            border-color: var(--wp--preset--color--giovanni-blue) !important;
            background-color: var(--wp--preset--color--gray-50) !important;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1) !important;
        }
        
        .form-field.error label,
        .error-message {
            color: var(--wp--preset--color--giovanni-blue);
        }
        
        .error-message {
            font-size: var(--wp--preset--font-size--sm);
            display: flex;
            align-items: center;
            gap: 6px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin-top: 0;
            line-height: 1.4;
        }
        
        .error-message:before {
            content: "⚠";
            font-size: 14px;
        }
        
        /* Success State */
        .form-field.success input,
        .form-field.success textarea,
        .form-field.success select,
        input.success,
        textarea.success,
        select.success {
            border-color: var(--wp--preset--color--giovanni-blue) !important;
            background-color: var(--wp--preset--color--gray-50) !important;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1) !important;
        }
        
        .success-message {
            color: var(--wp--preset--color--giovanni-blue);
            font-size: var(--wp--preset--font-size--sm);
            display: flex;
            align-items: center;
            gap: 6px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin-top: 0;
            line-height: 1.4;
        }
        
        .success-message:before {
            content: "✓";
            font-size: 14px;
        }
        
        /* Help Text */
        .help-text,
        .form-field .help-text {
            font-size: var(--wp--preset--font-size--sm);
            color: var(--wp--preset--color--gray-500);
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin-top: 0;
            line-height: 1.4;
        }
        
        /* Form Submit Buttons - Dynamic Accent Color Styling */
        .form-submit input[type="submit"],
        .wp-block-button.form-submit .wp-block-button__link,
        input[type="submit"].form-submit,
        button.form-submit {
            background-color: var(--wp--preset--color--giovanni-blue) !important;
            color: var(--wp--preset--color--background) !important;
            border: 2px solid var(--wp--preset--color--giovanni-blue) !important;
            border-radius: 8px;
            padding: 14px 32px;
            font-family: var(--wp--preset--font-family--inter);
            font-size: var(--wp--preset--font-size--md);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 48px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        .form-submit input[type="submit"]:hover,
        .wp-block-button.form-submit .wp-block-button__link:hover,
        input[type="submit"].form-submit:hover,
        button.form-submit:hover {
            background-color: color-mix(in srgb, var(--wp--preset--color--giovanni-blue) 80%, black) !important;
            border-color: color-mix(in srgb, var(--wp--preset--color--giovanni-blue) 80%, black) !important;
            transform: translateY(-2px);
            /* Fallback shadow */
            box-shadow: 0 4px 12px rgba(0, 112, 243, 0.3);
            /* Modern shadow */
            box-shadow: 0 4px 12px color-mix(in srgb, var(--wp--preset--color--giovanni-blue) 30%, transparent);
        }
        
        .form-submit input[type="submit"]:focus,
        .wp-block-button.form-submit .wp-block-button__link:focus,
        input[type="submit"].form-submit:focus,
        button.form-submit:focus {
            outline: none;
            /* Fallback shadow */
            box-shadow: 0 0 0 3px rgba(0, 112, 243, 0.2), 0 4px 12px rgba(0, 112, 243, 0.3);
            /* Modern shadow */
            box-shadow: 0 0 0 3px color-mix(in srgb, var(--wp--preset--color--giovanni-blue) 20%, transparent), 0 4px 12px color-mix(in srgb, var(--wp--preset--color--giovanni-blue) 30%, transparent);
        }
        
        /* Secondary Button Styling */
        .form-submit.secondary input[type="submit"],
        .wp-block-button.form-submit.secondary .wp-block-button__link,
        input[type="submit"].form-submit.secondary,
        button.form-submit.secondary {
            background-color: transparent !important;
            color: var(--wp--preset--color--giovanni-blue) !important;
            border-color: var(--wp--preset--color--giovanni-blue) !important;
        }
        
        .form-submit.secondary input[type="submit"]:hover,
        .wp-block-button.form-submit.secondary .wp-block-button__link:hover,
        input[type="submit"].form-submit.secondary:hover,
        button.form-submit.secondary:hover {
            background-color: var(--wp--preset--color--giovanni-blue) !important;
            color: var(--wp--preset--color--background) !important;
        }
        
        /* Form Layout Variations */
        
        /* Inline Form Layout */
        .form-layout-inline {
            display: flex;
            gap: 16px;
            align-items: flex-end;
            flex-wrap: wrap;
        }
        
        .form-layout-inline .form-field {
            flex: 1;
            margin-bottom: 0;
            min-width: 200px;
            padding-bottom: 0; /* No space needed for inline layouts */
        }
        
        .form-layout-inline .form-submit {
            flex-shrink: 0;
        }
        
        /* Special handling for inline form error messages */
        .form-layout-inline .form-field .error-message,
        .form-layout-inline .form-field .success-message,
        .form-layout-inline .form-field .help-text {
            position: static; /* Override absolute positioning for inline forms */
            margin-top: 6px;
        }
        
        /* Two Column Form Layout */
        .form-layout-two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }
        
        .form-layout-two-column .form-field.full-width {
            grid-column: 1 / -1;
        }
        
        /* Form Group Styling */
        .form-group {
            border: 1px solid var(--wp--preset--color--gray-200);
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 24px;
            background-color: var(--wp--preset--color--gray-50);
        }
        
        .form-group legend,
        .form-group .form-group-title {
            font-weight: 600;
            font-size: var(--wp--preset--font-size--lg);
            color: var(--wp--preset--color--gray-800);
            margin-bottom: 16px;
            display: block;
        }
        
        /* Checkbox and Radio Styling */
        input[type="checkbox"],
        input[type="radio"] {
            width: 18px;
            height: 18px;
            margin-right: 8px;
            accent-color: var(--wp--preset--color--giovanni-blue);
            cursor: pointer;
        }
        
        .checkbox-field,
        .radio-field {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        
        .checkbox-field label,
        .radio-field label {
            font-weight: 500;
            margin-bottom: 0;
            cursor: pointer;
            line-height: 1.4;
        }
        
        /* Contact Form 7 Integration */
        .wpcf7-form-control-wrap {
            position: relative;
        }
        
        .wpcf7-not-valid {
            border-color: var(--wp--preset--color--giovanni-blue) !important;
            background-color: var(--wp--preset--color--gray-50) !important;
        }
        
        .wpcf7-validation-errors {
            background-color: #fef2f2;
            border: 1px solid #dc2626;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            color: var(--wp--preset--color--giovanni-blue);
            font-size: var(--wp--preset--font-size--sm);
        }
        
        .wpcf7-mail-sent-ok {
            background-color: #f0fdf4;
            border: 1px solid #16a34a;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            color: var(--wp--preset--color--giovanni-blue);
            font-size: var(--wp--preset--font-size--sm);
        }
        
        /* Gravity Forms Integration */
        .gform_wrapper input[type="text"],
        .gform_wrapper input[type="email"],
        .gform_wrapper input[type="tel"],
        .gform_wrapper input[type="url"],
        .gform_wrapper textarea,
        .gform_wrapper select {
            border: 2px solid var(--wp--preset--color--gray-200) !important;
            border-radius: 8px !important;
            padding: 12px 16px !important;
            font-family: var(--wp--preset--font-family--inter) !important;
        }
        
        .gform_wrapper input:focus,
        .gform_wrapper textarea:focus,
        .gform_wrapper select:focus {
            border-color: var(--wp--preset--color--giovanni-blue) !important;
            box-shadow: 0 0 0 3px rgba(0, 112, 243, 0.1) !important;
        }
        
        /* Responsive Form Design */
        @media (max-width: 768px) {
            .wp-block-group.is-style-form-container,
            .wp-block-group.form-container {
                padding: 24px 20px;
                margin: 24px 0;
            }
            
            input[type="text"],
            input[type="email"],
            input[type="tel"],
            input[type="url"],
            input[type="password"],
            input[type="search"],
            input[type="number"],
            input[type="date"],
            textarea,
            select {
                padding: 14px 16px;
                font-size: 16px; /* Prevent zoom on iOS */
            }
            
            .form-layout-inline {
                flex-direction: column;
                gap: 24px;
                align-items: center; /* Center all items on mobile */
            }
            
            .form-layout-inline .form-field {
                min-width: 100%;
                width: 100%;
            }
            
            .form-layout-inline .form-submit {
                display: flex;
                justify-content: center;
                width: 100%;
            }
            
            /* Keep inline form buttons at natural width */
            .form-layout-inline .form-submit input[type="submit"],
            .form-layout-inline .wp-block-button.form-submit .wp-block-button__link,
            .form-layout-inline input[type="submit"].form-submit,
            .form-layout-inline button.form-submit {
                width: auto !important;
                min-width: 120px; /* Ensure minimum readable width */
            }
            
            .form-layout-two-column {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .form-submit input[type="submit"],
            .wp-block-button.form-submit .wp-block-button__link,
            input[type="submit"].form-submit,
            button.form-submit {
                padding: 16px 24px;
                font-size: var(--wp--preset--font-size--md);
            }
            
            /* Only make buttons full width in regular (non-inline) forms */
            .form-fields .form-submit input[type="submit"],
            .form-fields .wp-block-button.form-submit .wp-block-button__link,
            .form-fields input[type="submit"].form-submit,
            .form-fields button.form-submit,
            .form-layout-two-column .form-submit input[type="submit"],
            .form-layout-two-column .wp-block-button.form-submit .wp-block-button__link,
            .form-layout-two-column input[type="submit"].form-submit,
            .form-layout-two-column button.form-submit {
                width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            .wp-block-group.is-style-form-container,
            .wp-block-group.form-container {
                padding: 20px 16px;
            }
            
            .form-field {
                margin-bottom: 20px;
            }
        }
        
        /* Loading State for Forms */
        .form-loading {
            opacity: 0.6;
            pointer-events: none;
        }
        
        .form-loading .form-submit:after {
            content: "";
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid var(--wp--preset--color--background);
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
            margin-left: 8px;
        }
        
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
        
        /* Form Accessibility Enhancements */
        input:invalid,
        textarea:invalid,
        select:invalid {
            box-shadow: none; /* Remove browser default invalid styling */
        }
        
        /* High contrast mode support */
        @media (prefers-contrast: high) {
            input[type="text"],
            input[type="email"],
            input[type="tel"],
            input[type="url"],
            input[type="password"],
            input[type="search"],
            input[type="number"],
            input[type="date"],
            textarea,
            select {
                border-width: 3px;
            }
            
            input:focus,
            textarea:focus,
            select:focus {
                border-width: 3px;
                outline: 2px solid var(--wp--preset--color--giovanni-blue);
                outline-offset: 2px;
            }
        }
        
        /* Reduced motion preferences */
        @media (prefers-reduced-motion: reduce) {
            input[type="text"],
            input[type="email"],
            input[type="tel"],
            input[type="url"],
            input[type="password"],
            input[type="search"],
            input[type="number"],
            input[type="date"],
            textarea,
            select,
            .form-submit input[type="submit"],
            .wp-block-button.form-submit .wp-block-button__link,
            input[type="submit"].form-submit,
            button.form-submit {
                transition: none;
            }
            
            input:focus,
            textarea:focus,
            select:focus {
                transform: none;
            }
            
            .form-submit input[type="submit"]:hover,
            .wp-block-button.form-submit .wp-block-button__link:hover,
            input[type="submit"].form-submit:hover,
            button.form-submit:hover {
                transform: none;
            }
        }
        
        /* Popular Posts Pattern Hover Effects */
        .hover-lift {
            transition: all 0.2s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            border-color: var(--wp--preset--color--gray-300);
        }
        
        /* Disable hover effects for reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .hover-lift {
                transition: none;
            }
            
            .hover-lift:hover {
                transform: none;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }
        }
    </style>
    <?php
}
add_action('wp_head', 'giovanni_form_styles', 15);

/**
 * Add mobile spacing improvements
 */
function giovanni_mobile_spacing() {
    ?>
    <style>
        /* Mobile Spacing Improvements */
        @media (max-width: 768px) {
            /* Increase side padding on mobile for all main content areas */
            .wp-block-group.alignfull {
                padding-left: max(var(--wp--preset--spacing--6), 24px) !important;
                padding-right: max(var(--wp--preset--spacing--6), 24px) !important;
            }
            
            /* Specific mobile spacing for common layouts */
            .wp-block-group[style*="contentSize"] {
                padding-left: max(var(--wp--preset--spacing--6), 24px) !important;
                padding-right: max(var(--wp--preset--spacing--6), 24px) !important;
            }
            
            /* Header mobile spacing */
            .wp-block-group.alignfull header,
            .wp-block-group.alignfull [class*="header"] {
                padding-left: max(var(--wp--preset--spacing--6), 24px) !important;
                padding-right: max(var(--wp--preset--spacing--6), 24px) !important;
            }
            
            /* Footer mobile spacing */
            .wp-block-group.alignfull footer,
            .wp-block-group.alignfull [class*="footer"] {
                padding-left: max(var(--wp--preset--spacing--6), 24px) !important;
                padding-right: max(var(--wp--preset--spacing--6), 24px) !important;
            }
            
            /* Main content area mobile spacing */
            main.wp-block-group.alignfull {
                padding-left: max(var(--wp--preset--spacing--6), 24px) !important;
                padding-right: max(var(--wp--preset--spacing--6), 24px) !important;
            }
            
            /* Post content mobile spacing */
            .wp-block-post-content {
                padding-left: max(var(--wp--preset--spacing--4), 16px) !important;
                padding-right: max(var(--wp--preset--spacing--4), 16px) !important;
            }
            
            /* Navigation mobile spacing */
            .wp-block-navigation {
                padding-left: max(var(--wp--preset--spacing--4), 16px) !important;
                padding-right: max(var(--wp--preset--spacing--4), 16px) !important;
            }
            
            /* Wide and full-width blocks on mobile */
            .wp-block-group.alignwide,
            .wp-block-group.alignfull {
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
            
            /* Ensure nested groups don't double-pad */
            .wp-block-group.alignfull .wp-block-group:not(.alignfull):not(.alignwide) {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
            
            /* Card components mobile spacing */
            .wp-block-group.is-style-card,
            .wp-block-group.is-style-portfolio-card,
            .wp-block-group.is-style-service-card,
            .wp-block-group.is-style-company-card {
                margin-left: max(var(--wp--preset--spacing--4), 16px) !important;
                margin-right: max(var(--wp--preset--spacing--4), 16px) !important;
            }
            
            /* Longform reading mobile spacing */
            .wp-block-group.is-style-longform-reading {
                padding-left: max(var(--wp--preset--spacing--6), 24px) !important;
                padding-right: max(var(--wp--preset--spacing--6), 24px) !important;
            }
        }
        
        @media (max-width: 480px) {
            /* Extra small mobile - even more padding */
            .wp-block-group.alignfull {
                padding-left: max(var(--wp--preset--spacing--5), 20px) !important;
                padding-right: max(var(--wp--preset--spacing--5), 20px) !important;
            }
            
            main.wp-block-group.alignfull {
                padding-left: max(var(--wp--preset--spacing--5), 20px) !important;
                padding-right: max(var(--wp--preset--spacing--5), 20px) !important;
            }
            
            .wp-block-group.is-style-longform-reading {
                padding-left: max(var(--wp--preset--spacing--5), 20px) !important;
                padding-right: max(var(--wp--preset--spacing--5), 20px) !important;
            }
        }
    </style>
    <?php
}
add_action('wp_head', 'giovanni_mobile_spacing', 16);

/**
 * Add header pattern styles for enhanced minimalist header designs.
 */
function giovanni_header_pattern_styles() {
    ?>
    <style>
        /* Header Pattern Enhancements */
        
        /* Centered Logo Header Pattern */
        .wp-block-group .wp-block-site-title.is-style-brand-name {
            text-align: center;
            margin-bottom: var(--wp--preset--spacing--5);
        }
        
        .wp-block-group .wp-block-site-title.is-style-brand-name a {
            color: var(--wp--preset--color--foreground) !important;
            text-decoration: none !important;
            font-weight: 700 !important;
            letter-spacing: -0.025em !important;
            transition: color 0.15s ease !important;
        }
        
        .wp-block-group .wp-block-site-title.is-style-brand-name a:hover {
            color: var(--wp--preset--color--giovanni-blue) !important;
        }
        
        /* Navigation spacing in header patterns */
        .wp-block-navigation .wp-block-navigation__responsive-container .wp-block-navigation__responsive-container-content .wp-block-navigation__container {
            gap: var(--wp--preset--spacing--8);
        }
        
        
        /* Header border styling */
        .wp-block-group.alignfull[style*="border-bottom"] {
            border-bottom: 1px solid var(--wp--preset--color--gray-200) !important;
        }
        
        /* Mobile header pattern adjustments */
        @media (max-width: 768px) {
            /* Centered logo header mobile */
            .wp-block-group .wp-block-site-title.is-style-brand-name {
                margin-bottom: var(--wp--preset--spacing--4);
                font-size: var(--wp--preset--font-size--xl) !important;
            }
            
            /* Navigation mobile spacing */
            .wp-block-navigation .wp-block-navigation__responsive-container .wp-block-navigation__responsive-container-content .wp-block-navigation__container {
                gap: var(--wp--preset--spacing--6);
            }
            
            
            /* Split header mobile - stack elements */
            .wp-block-group[style*="justify-content:space-between"] {
                flex-direction: column !important;
                gap: var(--wp--preset--spacing--4) !important;
                align-items: center !important;
            }
            
            .wp-block-group[style*="justify-content:space-between"] .wp-block-group {
                justify-content: center !important;
            }
        }
        
        @media (max-width: 640px) {
            /* Extra small mobile adjustments */
            .wp-block-group .wp-block-site-title.is-style-brand-name {
                font-size: var(--wp--preset--font-size--lg) !important;
            }
            
        }
        
        /* Dark mode support for header patterns */
        @media (prefers-color-scheme: dark) {
            .wp-block-group.alignfull[style*="border-bottom"] {
                border-bottom-color: var(--wp--preset--color--gray-700) !important;
            }
            
        }
    </style>
    <?php
}
add_action('wp_head', 'giovanni_header_pattern_styles', 17);

// ========================================
// Advanced Custom Fields (ACF) Integration
// ========================================

/**
 * Get theme name for ACF integration
 * Centralized function to handle theme name changes
 */
function giovanni_get_theme_name() {
    static $theme_name = null;
    
    if ($theme_name === null) {
        $theme = wp_get_theme();
        $theme_name = $theme->get('Name') ?: 'FSE Theme';
    }
    
    return $theme_name;
}

/**
 * Get theme prefix for ACF functions
 * Future-proofs function naming if theme is renamed
 */
function giovanni_get_theme_prefix() {
    static $prefix = null;
    
    if ($prefix === null) {
        // Use current prefix for backward compatibility
        // Can be updated when theme is renamed
        $prefix = 'giovanni';
    }
    
    return $prefix;
}

/**
 * Safe ACF field retrieval function
 * Prevents fatal errors when ACF plugin is deactivated
 * 
 * @param string $selector Field name or key
 * @param mixed $post_id Post ID, user ID, term ID, or options page ID
 * @param bool $format_value Whether to format the value
 * @return mixed Field value or null if ACF not available
 */
function giovanni_get_field($selector, $post_id = false, $format_value = true) {
    // Check if ACF is active
    if (!function_exists('get_field')) {
        error_log(giovanni_get_theme_name() . ': ACF get_field() function not available');
        return null;
    }
    
    // Validate selector
    if (empty($selector) || !is_string($selector)) {
        error_log(giovanni_get_theme_name() . ': Invalid field selector provided');
        return null;
    }
    
    try {
        return get_field($selector, $post_id, $format_value);
    } catch (Exception $e) {
        error_log(giovanni_get_theme_name() . ': Error retrieving ACF field "' . $selector . '": ' . $e->getMessage());
        return null;
    }
}

/**
 * Safe ACF field object retrieval function
 * Returns field object with metadata
 * 
 * @param string $selector Field name or key
 * @param mixed $post_id Post ID, user ID, term ID, or options page ID
 * @return array|null Field object or null if not available
 */
function giovanni_get_field_object($selector, $post_id = false) {
    // Check if ACF is active
    if (!function_exists('get_field_object')) {
        error_log(giovanni_get_theme_name() . ': ACF get_field_object() function not available');
        return null;
    }
    
    // Validate selector
    if (empty($selector) || !is_string($selector)) {
        error_log(giovanni_get_theme_name() . ': Invalid field selector provided');
        return null;
    }
    
    try {
        return get_field_object($selector, $post_id);
    } catch (Exception $e) {
        error_log(giovanni_get_theme_name() . ': Error retrieving ACF field object "' . $selector . '": ' . $e->getMessage());
        return null;
    }
}

/**
 * Check if ACF plugin is active and field exists
 * 
 * @param string $selector Field name or key
 * @param mixed $post_id Post ID to check
 * @return bool True if field exists and has value
 */
function giovanni_has_field($selector, $post_id = false) {
    // Check if ACF is active
    if (!function_exists('get_field')) {
        return false;
    }
    
    // Get field value
    $value = giovanni_get_field($selector, $post_id);
    
    // Check if value exists and is not empty
    if ($value === null || $value === false) {
        return false;
    }
    
    // Handle array/object values
    if (is_array($value) || is_object($value)) {
        return !empty($value);
    }
    
    // Handle string values
    if (is_string($value)) {
        return trim($value) !== '';
    }
    
    return true;
}

/**
 * Display a text field with optional wrapper and sanitization
 * 
 * @param string $field_name ACF field name
 * @param string $wrapper_class Optional CSS class for wrapper
 * @param mixed $post_id Post ID to get field from
 * @param string $wrapper_tag HTML tag for wrapper (default: div)
 * @return string HTML output or empty string
 */
function giovanni_display_text_field($field_name, $wrapper_class = '', $post_id = false, $wrapper_tag = 'div') {
    if (!giovanni_has_field($field_name, $post_id)) {
        return '';
    }
    
    $value = giovanni_get_field($field_name, $post_id);
    if (empty($value)) {
        return '';
    }
    
    // Sanitize the value
    $sanitized_value = wp_kses_post($value);
    
    // Build wrapper class
    $class_attr = '';
    if (!empty($wrapper_class)) {
        $class_attr = ' class="' . esc_attr($wrapper_class) . '"';
    }
    
    // Build output
    $output = '<' . esc_attr($wrapper_tag) . $class_attr . '>';
    $output .= $sanitized_value;
    $output .= '</' . esc_attr($wrapper_tag) . '>';
    
    return $output;
}

/**
 * Display an image field with optional sizing and wrapper
 * 
 * @param string $field_name ACF field name
 * @param string $size WordPress image size
 * @param string $wrapper_class Optional CSS class for wrapper
 * @param mixed $post_id Post ID to get field from
 * @param array $image_attrs Additional image attributes
 * @return string HTML output or empty string
 */
function giovanni_display_image_field($field_name, $size = 'large', $wrapper_class = '', $post_id = false, $image_attrs = array()) {
    if (!giovanni_has_field($field_name, $post_id)) {
        return '';
    }
    
    $image = giovanni_get_field($field_name, $post_id);
    if (empty($image)) {
        return '';
    }
    
    // Handle both ID and array formats
    if (is_numeric($image)) {
        $image_id = $image;
        $image_url = wp_get_attachment_image_url($image_id, $size);
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    } elseif (is_array($image)) {
        $image_id = $image['ID'] ?? null;
        $image_url = $image['sizes'][$size] ?? $image['url'] ?? null;
        $image_alt = $image['alt'] ?? '';
    } else {
        return '';
    }
    
    if (empty($image_url)) {
        return '';
    }
    
    // Build image attributes
    $default_attrs = array(
        'src' => esc_url($image_url),
        'alt' => esc_attr($image_alt),
        'loading' => 'lazy'
    );
    
    $attrs = array_merge($default_attrs, $image_attrs);
    $attr_string = '';
    foreach ($attrs as $key => $value) {
        $attr_string .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
    }
    
    // Build wrapper
    $wrapper_open = '';
    $wrapper_close = '';
    if (!empty($wrapper_class)) {
        $wrapper_open = '<div class="' . esc_attr($wrapper_class) . '">';
        $wrapper_close = '</div>';
    }
    
    return $wrapper_open . '<img' . $attr_string . '>' . $wrapper_close;
}

/**
 * Display a repeater field with custom template callback
 * 
 * @param string $field_name ACF repeater field name
 * @param callable $template_callback Function to render each row
 * @param string $wrapper_class Optional CSS class for wrapper
 * @param mixed $post_id Post ID to get field from
 * @return string HTML output or empty string
 */
function giovanni_display_repeater($field_name, $template_callback, $wrapper_class = '', $post_id = false) {
    if (!giovanni_has_field($field_name, $post_id)) {
        return '';
    }
    
    if (!is_callable($template_callback)) {
        error_log(giovanni_get_theme_name() . ': Invalid template callback provided for repeater field');
        return '';
    }
    
    $rows = giovanni_get_field($field_name, $post_id);
    if (empty($rows) || !is_array($rows)) {
        return '';
    }
    
    $output = '';
    
    // Build wrapper
    if (!empty($wrapper_class)) {
        $output .= '<div class="' . esc_attr($wrapper_class) . '">';
    }
    
    // Loop through rows
    foreach ($rows as $index => $row) {
        if (is_array($row)) {
            $row_output = call_user_func($template_callback, $row, $index);
            if (!empty($row_output)) {
                $output .= $row_output;
            }
        }
    }
    
    // Close wrapper
    if (!empty($wrapper_class)) {
        $output .= '</div>';
    }
    
    return $output;
}

/**
 * Display a URL field as a link with optional text and attributes
 * 
 * @param string $field_name ACF URL field name
 * @param string $link_text Optional link text (uses URL if empty)
 * @param array $link_attrs Additional link attributes
 * @param string $wrapper_class Optional CSS class for wrapper
 * @param mixed $post_id Post ID to get field from
 * @return string HTML output or empty string
 */
function giovanni_display_url_field($field_name, $link_text = '', $link_attrs = array(), $wrapper_class = '', $post_id = false) {
    if (!giovanni_has_field($field_name, $post_id)) {
        return '';
    }
    
    $url = giovanni_get_field($field_name, $post_id);
    if (empty($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
        return '';
    }
    
    // Use URL as text if no link text provided
    if (empty($link_text)) {
        $link_text = $url;
    }
    
    // Build link attributes
    $default_attrs = array(
        'href' => esc_url($url),
        'rel' => 'noopener noreferrer'
    );
    
    $attrs = array_merge($default_attrs, $link_attrs);
    $attr_string = '';
    foreach ($attrs as $key => $value) {
        $attr_string .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
    }
    
    // Build output
    $output = '<a' . $attr_string . '>' . esc_html($link_text) . '</a>';
    
    // Add wrapper if specified
    if (!empty($wrapper_class)) {
        $output = '<div class="' . esc_attr($wrapper_class) . '">' . $output . '</div>';
    }
    
    return $output;
}

/**
 * Check if a specific field group exists for a post
 * 
 * @param string $group_key Field group key or name
 * @param mixed $post_id Post ID to check
 * @return bool True if field group exists
 */
function giovanni_has_field_group($group_key, $post_id = false) {
    // Check if ACF is active
    if (!function_exists('acf_get_field_groups')) {
        return false;
    }
    
    // Get all field groups for this post
    $field_groups = giovanni_get_post_field_groups($post_id);
    
    if (empty($field_groups)) {
        return false;
    }
    
    // Check if group exists by key or name
    foreach ($field_groups as $group) {
        if ($group['key'] === $group_key || $group['title'] === $group_key) {
            return true;
        }
    }
    
    return false;
}

/**
 * Get all field groups assigned to a specific post
 * 
 * @param mixed $post_id Post ID to check
 * @return array Array of field groups or empty array
 */
function giovanni_get_post_field_groups($post_id = false) {
    // Check if ACF is active
    if (!function_exists('acf_get_field_groups')) {
        return array();
    }
    
    try {
        // Get current post ID if not provided
        if ($post_id === false) {
            $post_id = get_the_ID();
        }
        
        if (!$post_id) {
            return array();
        }
        
        // Get field groups for this post
        $args = array(
            'post_id' => $post_id,
        );
        
        return acf_get_field_groups($args);
        
    } catch (Exception $e) {
        error_log(giovanni_get_theme_name() . ': Error retrieving field groups: ' . $e->getMessage());
        return array();
    }
}

/**
 * Get all fields from a specific field group
 * 
 * @param string $group_key Field group key
 * @return array Array of fields or empty array
 */
function giovanni_get_field_group_fields($group_key) {
    // Check if ACF is active
    if (!function_exists('acf_get_fields')) {
        return array();
    }
    
    try {
        return acf_get_fields($group_key);
    } catch (Exception $e) {
        error_log(giovanni_get_theme_name() . ': Error retrieving fields for group "' . $group_key . '": ' . $e->getMessage());
        return array();
    }
}

/**
 * Render all fields from a specific field group
 * 
 * @param string $group_key Field group key or name
 * @param string $wrapper_class Optional CSS class for wrapper
 * @param mixed $post_id Post ID to get fields from
 * @return string HTML output or empty string
 */
function giovanni_render_field_group($group_key, $wrapper_class = 'acf-field-group', $post_id = false) {
    if (!giovanni_has_field_group($group_key, $post_id)) {
        return '';
    }
    
    $fields = giovanni_get_field_group_fields($group_key);
    if (empty($fields)) {
        return '';
    }
    
    $output = '';
    
    // Build wrapper
    if (!empty($wrapper_class)) {
        $output .= '<div class="' . esc_attr($wrapper_class) . '">';
    }
    
    // Loop through fields
    foreach ($fields as $field) {
        $field_output = giovanni_render_single_field($field, $post_id);
        if (!empty($field_output)) {
            $output .= $field_output;
        }
    }
    
    // Close wrapper
    if (!empty($wrapper_class)) {
        $output .= '</div>';
    }
    
    return $output;
}

/**
 * Render a single ACF field with automatic type detection
 * 
 * @param array $field Field object from ACF
 * @param mixed $post_id Post ID to get field value from
 * @return string HTML output or empty string
 */
function giovanni_render_single_field($field, $post_id = false) {
    if (empty($field) || !is_array($field)) {
        return '';
    }
    
    $field_name = $field['name'] ?? '';
    $field_type = $field['type'] ?? '';
    $field_label = $field['label'] ?? '';
    
    if (empty($field_name)) {
        return '';
    }
    
    // Check if field has value
    if (!giovanni_has_field($field_name, $post_id)) {
        return '';
    }
    
    $output = '';
    $field_class = 'acf-field acf-field-' . esc_attr($field_type) . ' acf-field-' . esc_attr($field_name);
    
    // Add field label if present
    if (!empty($field_label)) {
        $output .= '<div class="' . $field_class . '">';
        $output .= '<div class="acf-label"><label>' . esc_html($field_label) . '</label></div>';
        $output .= '<div class="acf-input">';
    }
    
    // Render field based on type
    switch ($field_type) {
        case 'text':
        case 'textarea':
        case 'email':
        case 'number':
            $output .= giovanni_display_text_field($field_name, '', $post_id);
            break;
            
        case 'image':
            $output .= giovanni_display_image_field($field_name, 'large', '', $post_id);
            break;
            
        case 'url':
            $output .= giovanni_display_url_field($field_name, '', array(), '', $post_id);
            break;
            
        case 'wysiwyg':
            $value = giovanni_get_field($field_name, $post_id);
            if (!empty($value)) {
                $output .= '<div class="acf-wysiwyg">' . wp_kses_post($value) . '</div>';
            }
            break;
            
        case 'select':
        case 'radio':
        case 'checkbox':
            $value = giovanni_get_field($field_name, $post_id);
            if (!empty($value)) {
                if (is_array($value)) {
                    $output .= '<ul class="acf-list">';
                    foreach ($value as $item) {
                        $output .= '<li>' . esc_html($item) . '</li>';
                    }
                    $output .= '</ul>';
                } else {
                    $output .= '<span class="acf-value">' . esc_html($value) . '</span>';
                }
            }
            break;
            
        case 'true_false':
            $value = giovanni_get_field($field_name, $post_id);
            if ($value) {
                $output .= '<span class="acf-true-false acf-true">Yes</span>';
            } else {
                $output .= '<span class="acf-true-false acf-false">No</span>';
            }
            break;
            
        default:
            // For unknown field types, try to display as text
            $output .= giovanni_display_text_field($field_name, '', $post_id);
            break;
    }
    
    // Close field wrapper
    if (!empty($field_label)) {
        $output .= '</div>';
        $output .= '</div>';
    }
    
    return $output;
}

/**
 * Check if ACF plugin is active and available
 * 
 * @return bool True if ACF is active
 */
function giovanni_is_acf_active() {
    return function_exists('get_field') && function_exists('acf_get_field_groups');
}

/**
 * Automatically enqueue block styles from assets/styles directory
 * Following LLM_THEME_DEVELOPMENT_GUIDE.md best practices
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
        if ( wp_block_type_registry()->is_registered( $block_name ) ) {
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
add_action( 'init', 'giovanni_enqueue_custom_block_styles' );

?>