<?php
/**
 * Title: Giovanni Key Takeaway
 * Slug: giovanni/key-takeaway
 * Categories: giovanni-content
 * Description: Signal amplification box for highlighting main points and key insights
 * Keywords: takeaway, key, important, highlight, main point, insight
 * Block Types: core/group
 * Inserter: true
 */
?>

<!-- wp:group {"className":"key-takeaway-pattern","layout":{"type":"constrained"}} -->
<div class="wp-block-group key-takeaway-pattern">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--8)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"},"margin":{"top":"var(--wp--preset--spacing--8)","bottom":"var(--wp--preset--spacing--8)"}},"border":{"radius":"8px","color":"var(--wp--preset--color--gray-200)","width":"1px"}},"backgroundColor":"gray-50","className":"key-takeaway-content is-style-form-container","layout":{"type":"constrained"}} -->
    <div class="wp-block-group key-takeaway-content has-gray-50-background-color has-background has-border-color has-gray-200-border-color" style="border-color:var(--wp--preset--color--gray-200);border-width:1px;border-radius:8px;margin-top:var(--wp--preset--spacing--8);margin-bottom:var(--wp--preset--spacing--8);padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">
        
        <!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"600","letterSpacing":"0.025em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"background","backgroundColor":"giovanni-blue","fontSize":"sm","className":"key-takeaway-label"} -->
        <h4 class="wp-block-heading key-takeaway-label has-background-color has-giovanni-blue-background-color has-text-color has-background has-sm-font-size" style="margin-bottom:var(--wp--preset--spacing--4);font-weight:600;letter-spacing:0.025em;text-transform:uppercase">🔑 Key Takeaway</h4>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.4","fontWeight":"500"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"foreground","fontSize":"md","className":"key-takeaway-text"} -->
        <p class="key-takeaway-text has-foreground-color has-text-color has-md-font-size" style="margin-top:0;margin-bottom:0;line-height:1.4;font-weight:500">This is the main point you want readers to remember. Keep it concise and impactful - the essential insight or action item from your content.</p>
        <!-- /wp:paragraph -->
        
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->