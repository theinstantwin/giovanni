<?php
/**
 * Advanced Custom Fields (ACF) helper functions
 *
 * @package Giovanni_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
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
 * Check if ACF plugin is active
 * 
 * @return bool True if ACF is active
 */
function giovanni_is_acf_active() {
    return function_exists('get_field');
}

// NOTE: Additional ACF helper functions would continue here, including:
// - giovanni_display_text_field()
// - giovanni_display_image_field()
// - giovanni_display_repeater()
// - giovanni_display_url_field()
// - giovanni_has_field_group()
// - giovanni_get_post_field_groups()
// - giovanni_get_field_group_fields()
// - giovanni_render_field_group()
// - giovanni_render_single_field()
//
// These functions follow the same patterns as above with proper
// error handling, validation, and graceful degradation.