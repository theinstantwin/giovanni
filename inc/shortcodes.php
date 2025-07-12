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