<?php
/**
 * Performance and security optimizations
 *
 * @package Giovanni_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

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
 * Add security headers for better protection.
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