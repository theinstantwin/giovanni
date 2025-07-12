<?php
/**
 * Template helper functions
 *
 * @package Giovanni_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Calculate and return reading time for content.
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
 * Get cached reading time for performance.
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
 * Get theme name for dynamic referencing.
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