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
 * 
 * @param string $content Optional content to calculate reading time for
 * @return string Formatted reading time string
 * 
 * @hook giovanni_reading_time_wpm Filters the words per minute calculation (default: 200)
 * @hook giovanni_reading_time_output Filters the final reading time output
 * 
 * @example
 * // Change reading speed to 250 words per minute
 * add_filter('giovanni_reading_time_wpm', function($wpm) { return 250; });
 * 
 * // Customize reading time format
 * add_filter('giovanni_reading_time_output', function($output, $minutes) {
 *     return $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' to read';
 * }, 10, 2);
 */
function giovanni_reading_time( $content = '' ) {
    if ( empty( $content ) ) {
        $content = get_post_field( 'post_content', get_the_ID() );
    }
    
    $word_count = str_word_count( wp_strip_all_tags( $content ) );
    $wpm = apply_filters( 'giovanni_reading_time_wpm', 200 );
    $reading_time = ceil( $word_count / $wpm );
    
    $output = $reading_time . ' min read';
    
    /**
     * Filter the reading time output
     *
     * @param string $output The formatted reading time string
     * @param int $reading_time The calculated reading time in minutes
     * @param int $word_count The total word count
     * @param string $content The content being analyzed
     */
    return apply_filters( 'giovanni_reading_time_output', $output, $reading_time, $word_count, $content );
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
 * 
 * @hook giovanni_excerpt_length Filters the default excerpt length (default: 30)
 * 
 * @example
 * // Change excerpt length to 50 words
 * add_filter('giovanni_excerpt_length', function($length) { return 50; });
 */
function giovanni_excerpt_length( $length ) {
    return apply_filters( 'giovanni_excerpt_length', 30 );
}
add_filter( 'excerpt_length', 'giovanni_excerpt_length' );

/**
 * Modify excerpt more text.
 * 
 * @hook giovanni_excerpt_more_text Filters the excerpt more text (default: '...')
 * 
 * @example
 * // Change excerpt more text
 * add_filter('giovanni_excerpt_more_text', function($more) { return ' [Read more]'; });
 */
function giovanni_excerpt_more( $more ) {
    return apply_filters( 'giovanni_excerpt_more_text', '...' );
}
add_filter( 'excerpt_more', 'giovanni_excerpt_more' );

/**
 * Get posts grouped by month for the index page.
 * 
 * @hook giovanni_posts_by_month_query_args Filters the query arguments for posts by month
 * @hook giovanni_posts_by_month_date_format Filters the date format for month grouping (default: 'F Y')
 * @hook giovanni_posts_by_month_results Filters the final grouped posts array
 * 
 * @example
 * // Limit to 50 posts
 * add_filter('giovanni_posts_by_month_query_args', function($args) {
 *     $args['numberposts'] = 50;
 *     return $args;
 * });
 * 
 * // Change date format to show year-month
 * add_filter('giovanni_posts_by_month_date_format', function($format) { return 'Y-m'; });
 */
function giovanni_get_posts_by_month() {
    $default_args = array(
        'numberposts' => 100,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    /**
     * Filter the query arguments for posts by month
     *
     * @param array $args The default query arguments
     */
    $args = apply_filters( 'giovanni_posts_by_month_query_args', $default_args );
    
    $posts = get_posts( $args );
    $posts_by_month = array();
    
    /**
     * Filter the date format for month grouping
     *
     * @param string $format The date format (default: 'F Y')
     */
    $date_format = apply_filters( 'giovanni_posts_by_month_date_format', 'F Y' );
    
    foreach ($posts as $post) {
        $month_year = date( $date_format, strtotime( $post->post_date ) );
        if (!isset($posts_by_month[$month_year])) {
            $posts_by_month[$month_year] = array();
        }
        $posts_by_month[$month_year][] = $post;
    }
    
    /**
     * Filter the final grouped posts array
     *
     * @param array $posts_by_month The grouped posts array
     * @param array $posts The original posts array
     * @param array $args The query arguments used
     */
    return apply_filters( 'giovanni_posts_by_month_results', $posts_by_month, $posts, $args );
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