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

/**
 * Technical SEO Enhancements
 */

/**
 * Add canonical URLs for better SEO.
 */
function giovanni_add_canonical_url() {
    if (is_singular()) {
        echo '<link rel="canonical" href="' . esc_url(get_permalink()) . '">' . "\n";
    } elseif (is_home() || is_front_page()) {
        echo '<link rel="canonical" href="' . esc_url(home_url('/')) . '">' . "\n";
    } elseif (is_category()) {
        echo '<link rel="canonical" href="' . esc_url(get_category_link(get_queried_object_id())) . '">' . "\n";
    } elseif (is_tag()) {
        echo '<link rel="canonical" href="' . esc_url(get_tag_link(get_queried_object_id())) . '">' . "\n";
    } elseif (is_author()) {
        echo '<link rel="canonical" href="' . esc_url(get_author_posts_url(get_queried_object_id())) . '">' . "\n";
    }
}
add_action('wp_head', 'giovanni_add_canonical_url', 5);

/**
 * Add robots meta tag for better crawling control.
 */
function giovanni_add_robots_meta() {
    if (is_404() || is_search()) {
        echo '<meta name="robots" content="noindex, nofollow">' . "\n";
    } elseif (is_paged()) {
        echo '<meta name="robots" content="index, follow, noarchive">' . "\n";
    } else {
        echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">' . "\n";
    }
}
add_action('wp_head', 'giovanni_add_robots_meta', 1);

/**
 * Add page speed optimization hooks.
 */
function giovanni_page_speed_optimizations() {
    // Add resource hints for better loading
    echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//fonts.gstatic.com">' . "\n";
    
    // Add viewport meta tag for mobile optimization
    if (!current_theme_supports('responsive-embeds')) {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n";
    }
}
add_action('wp_head', 'giovanni_page_speed_optimizations', 0);

/**
 * Track 404 errors for SEO monitoring.
 */
function giovanni_track_404_errors() {
    if (is_404()) {
        $request_uri = sanitize_text_field($_SERVER['REQUEST_URI'] ?? '');
        $user_agent = sanitize_text_field($_SERVER['HTTP_USER_AGENT'] ?? '');
        $referer = sanitize_text_field($_SERVER['HTTP_REFERER'] ?? '');
        
        // Log 404 error with context
        error_log(sprintf(
            '[Giovanni 404] URI: %s | Referer: %s | User-Agent: %s',
            $request_uri,
            $referer,
            $user_agent
        ));
        
        // Optional: Store in database for dashboard viewing
        $error_data = array(
            'uri' => $request_uri,
            'referer' => $referer,
            'user_agent' => $user_agent,
            'timestamp' => current_time('mysql')
        );
        
        // Store recent 404s in option (keep last 50)
        $recent_404s = get_option('giovanni_404_log', array());
        array_unshift($recent_404s, $error_data);
        $recent_404s = array_slice($recent_404s, 0, 50);
        update_option('giovanni_404_log', $recent_404s);
    }
}
add_action('wp', 'giovanni_track_404_errors');

/**
 * Add structured data for better search results.
 */
function giovanni_add_structured_data() {
    if (is_singular('post')) {
        $post_id = get_the_ID();
        $author_id = get_post_field('post_author', $post_id);
        
        $structured_data = array(
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => get_the_title($post_id),
            'description' => wp_strip_all_tags(get_the_excerpt($post_id)),
            'url' => get_permalink($post_id),
            'datePublished' => get_the_date('c', $post_id),
            'dateModified' => get_the_modified_date('c', $post_id),
            'author' => array(
                '@type' => 'Person',
                'name' => get_the_author_meta('display_name', $author_id),
                'url' => get_author_posts_url($author_id)
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => get_bloginfo('name'),
                'url' => home_url('/')
            )
        );
        
        // Add featured image if available
        if (has_post_thumbnail($post_id)) {
            $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'large');
            if ($image_data) {
                $structured_data['image'] = array(
                    '@type' => 'ImageObject',
                    'url' => $image_data[0],
                    'width' => $image_data[1],
                    'height' => $image_data[2]
                );
            }
        }
        
        echo '<script type="application/ld+json">' . wp_json_encode($structured_data, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
    
    // Organization schema for homepage
    if (is_front_page()) {
        $org_data = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => get_bloginfo('name'),
            'url' => home_url('/'),
            'description' => get_bloginfo('description')
        );
        
        echo '<script type="application/ld+json">' . wp_json_encode($org_data, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}
add_action('wp_head', 'giovanni_add_structured_data', 10);

/**
 * Generate and serve XML sitemap functionality.
 */
function giovanni_init_sitemap() {
    add_action('init', 'giovanni_sitemap_rewrite_rules');
    add_action('query_vars', 'giovanni_sitemap_query_vars');
    add_action('template_redirect', 'giovanni_serve_sitemap');
}

function giovanni_sitemap_rewrite_rules() {
    add_rewrite_rule('^sitemap\.xml$', 'index.php?giovanni_sitemap=1', 'top');
    add_rewrite_rule('^sitemap-posts\.xml$', 'index.php?giovanni_sitemap=posts', 'top');
    add_rewrite_rule('^sitemap-pages\.xml$', 'index.php?giovanni_sitemap=pages', 'top');
}

function giovanni_sitemap_query_vars($vars) {
    $vars[] = 'giovanni_sitemap';
    return $vars;
}

function giovanni_serve_sitemap() {
    $sitemap_type = get_query_var('giovanni_sitemap');
    
    if ($sitemap_type) {
        header('Content-Type: application/xml; charset=utf-8');
        
        if ($sitemap_type === '1') {
            giovanni_generate_sitemap_index();
        } elseif ($sitemap_type === 'posts') {
            giovanni_generate_posts_sitemap();
        } elseif ($sitemap_type === 'pages') {
            giovanni_generate_pages_sitemap();
        }
        
        exit;
    }
}

function giovanni_generate_sitemap_index() {
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    
    // Posts sitemap
    echo '<sitemap>' . "\n";
    echo '<loc>' . esc_url(home_url('/sitemap-posts.xml')) . '</loc>' . "\n";
    echo '<lastmod>' . date('c') . '</lastmod>' . "\n";
    echo '</sitemap>' . "\n";
    
    // Pages sitemap  
    echo '<sitemap>' . "\n";
    echo '<loc>' . esc_url(home_url('/sitemap-pages.xml')) . '</loc>' . "\n";
    echo '<lastmod>' . date('c') . '</lastmod>' . "\n";
    echo '</sitemap>' . "\n";
    
    echo '</sitemapindex>' . "\n";
}

function giovanni_generate_posts_sitemap() {
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    
    $posts = get_posts(array(
        'numberposts' => -1,
        'post_status' => 'publish',
        'post_type' => array('post')
    ));
    
    foreach ($posts as $post) {
        echo '<url>' . "\n";
        echo '<loc>' . esc_url(get_permalink($post->ID)) . '</loc>' . "\n";
        echo '<lastmod>' . date('c', strtotime($post->post_modified)) . '</lastmod>' . "\n";
        echo '<changefreq>weekly</changefreq>' . "\n";
        echo '<priority>0.8</priority>' . "\n";
        echo '</url>' . "\n";
    }
    
    echo '</urlset>' . "\n";
}

function giovanni_generate_pages_sitemap() {
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    
    // Homepage
    echo '<url>' . "\n";
    echo '<loc>' . esc_url(home_url('/')) . '</loc>' . "\n";
    echo '<lastmod>' . date('c') . '</lastmod>' . "\n";
    echo '<changefreq>daily</changefreq>' . "\n";
    echo '<priority>1.0</priority>' . "\n";
    echo '</url>' . "\n";
    
    // Pages
    $pages = get_pages(array('post_status' => 'publish'));
    
    foreach ($pages as $page) {
        echo '<url>' . "\n";
        echo '<loc>' . esc_url(get_permalink($page->ID)) . '</loc>' . "\n";
        echo '<lastmod>' . date('c', strtotime($page->post_modified)) . '</lastmod>' . "\n";
        echo '<changefreq>monthly</changefreq>' . "\n";
        echo '<priority>0.6</priority>' . "\n";
        echo '</url>' . "\n";
    }
    
    echo '</urlset>' . "\n";
}

// Initialize sitemap functionality
giovanni_init_sitemap();

/**
 * Custom robots.txt content.
 */
function giovanni_custom_robots_txt($output) {
    $custom_rules = "
# Giovanni Theme - Custom Rules
User-agent: *
Allow: /wp-content/uploads/
Disallow: /wp-admin/
Disallow: /wp-includes/
Disallow: /wp-content/plugins/
Disallow: /wp-content/themes/
Disallow: /trackback/
Disallow: /comments/
Disallow: /?s=
Disallow: /search/

# XML Sitemap
Sitemap: " . home_url('/sitemap.xml') . "
";
    
    return $output . $custom_rules;
}
add_filter('robots_txt', 'giovanni_custom_robots_txt');

/**
 * Add performance monitoring hooks for SEO.
 */
function giovanni_performance_monitoring() {
    // Track page load time for performance SEO
    if (defined('WP_DEBUG') && WP_DEBUG) {
        $load_time = timer_stop(0, 3);
        echo "\n<!-- Page generated in {$load_time} seconds -->\n";
    }
}
add_action('wp_footer', 'giovanni_performance_monitoring');