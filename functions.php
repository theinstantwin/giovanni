<?php
/**
 * Giovanni Theme functions and definitions
 *
 * @package Giovanni_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define a theme constant for the /inc directory path.
define( 'GIOVANNI_INC_DIR', get_template_directory() . '/inc' );

// Load all the modular feature files.
require_once GIOVANNI_INC_DIR . '/theme-setup.php';       // Core theme features and support.
require_once GIOVANNI_INC_DIR . '/enqueue-assets.php';    // Styles and scripts.
require_once GIOVANNI_INC_DIR . '/block-helpers.php';     // Block patterns, styles, and categories.
require_once GIOVANNI_INC_DIR . '/performance.php';       // Performance optimizations.
require_once GIOVANNI_INC_DIR . '/shortcodes.php';        // Custom shortcodes.
require_once GIOVANNI_INC_DIR . '/template-helpers.php';  // Helper functions for templates.
require_once GIOVANNI_INC_DIR . '/acf-helpers.php';       // Advanced Custom Fields compatibility functions.