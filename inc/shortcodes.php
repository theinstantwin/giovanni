<?php
/**
 * Custom shortcodes
 *
 * @package Giovanni_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Shortcode to display posts grouped by month.
 * 
 * @hook giovanni_posts_by_month_shortcode_before Action before shortcode output
 * @hook giovanni_posts_by_month_shortcode_after Action after shortcode output
 * @hook giovanni_posts_by_month_shortcode_empty_message Filters the empty posts message
 * @hook giovanni_posts_by_month_shortcode_output Filters the final shortcode output
 * @hook giovanni_posts_by_month_shortcode_item_date_format Filters the date format for individual posts (default: 'M j')
 * 
 * @example
 * // Customize empty message
 * add_filter('giovanni_posts_by_month_shortcode_empty_message', function($message) {
 *     return '<p>Sorry, no blog posts yet!</p>';
 * });
 * 
 * // Add custom action before shortcode
 * add_action('giovanni_posts_by_month_shortcode_before', function() {
 *     echo '<div class="posts-archive-intro">Recent Posts:</div>';
 * });
 */
function giovanni_posts_by_month_shortcode() {
    /**
     * Action hook before posts by month shortcode output
     */
    do_action( 'giovanni_posts_by_month_shortcode_before' );
    
    $posts_by_month = giovanni_get_posts_by_month();
    
    if (empty($posts_by_month)) {
        /**
         * Filter the empty posts message
         *
         * @param string $message The default empty message
         */
        $empty_message = apply_filters( 'giovanni_posts_by_month_shortcode_empty_message', '<p class="has-gray-500-color has-text-color">No posts found.</p>' );
        
        /**
         * Action hook after posts by month shortcode output
         */
        do_action( 'giovanni_posts_by_month_shortcode_after' );
        
        return $empty_message;
    }
    
    $output = '';
    
    /**
     * Filter the date format for individual posts in shortcode
     *
     * @param string $format The date format (default: 'M j')
     */
    $post_date_format = apply_filters( 'giovanni_posts_by_month_shortcode_item_date_format', 'M j' );
    
    foreach ($posts_by_month as $month_year => $posts) {
        $output .= '<div class="blog-posts-by-month">';
        $output .= '<h2 class="month-header">' . esc_html($month_year) . '</h2>';
        
        foreach ($posts as $post) {
            $post_date = date( $post_date_format, strtotime( $post->post_date ) );
            $post_url = get_permalink($post->ID);
            $post_title = get_the_title($post->ID);
            
            $output .= '<div class="blog-post-item" style="border-radius:6px;margin-bottom:8px;padding:8px 12px;">';
            $output .= '<a href="' . esc_url($post_url) . '" style="text-decoration:none;color:var(--wp--preset--color--foreground);font-size:18px;font-weight:500;line-height:1.4;flex:1;margin-right:16px;">' . esc_html($post_title) . '</a>';
            $output .= '<span style="color:var(--wp--preset--color--gray-500);font-size:14px;flex-shrink:0;white-space:nowrap;">' . esc_html($post_date) . '</span>';
            $output .= '</div>';
        }
        
        $output .= '</div>';
    }
    
    /**
     * Action hook after posts by month shortcode output
     */
    do_action( 'giovanni_posts_by_month_shortcode_after' );
    
    /**
     * Filter the final shortcode output
     *
     * @param string $output The complete shortcode HTML output
     * @param array $posts_by_month The grouped posts data
     */
    return apply_filters( 'giovanni_posts_by_month_shortcode_output', $output, $posts_by_month );
}
add_shortcode('posts_by_month', 'giovanni_posts_by_month_shortcode');