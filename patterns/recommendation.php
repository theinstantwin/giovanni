<?php
/**
 * Title: Giovanni Recommendation
 * Slug: giovanni/recommendation
 * Categories: giovanni-personal
 * Description: Trusted endorsement card for tools, books, or people with warm styling
 * Keywords: recommendation, endorsement, review, trusted, tools, books
 * Block Types: core/group
 * Inserter: true
 */
?>

<!-- wp:group {"className":"recommendation-pattern","layout":{"type":"constrained"}} -->
<div class="wp-block-group recommendation-pattern">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"},"margin":{"top":"2rem","bottom":"2rem"},"blockGap":"1.5rem"},"border":{"radius":"8px","color":"var(--wp--preset--color--light-gray)","width":"1px"}},"backgroundColor":"container","className":"recommendation-card","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group recommendation-card has-container-background-color has-background has-border-color has-light-gray-border-color" style="border-color:var(--wp--preset--color--light-gray);border-width:1px;border-radius:8px;margin-top:2rem;margin-bottom:2rem;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem;gap:1.5rem">
        
        <!-- wp:group {"style":{"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group">
        
        <!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
        <div class="wp-block-group" style="gap:0.75rem">
            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--primary)"}}},"typography":{"fontSize":"0.875rem","fontWeight":"600"}},"textColor":"primary","className":"recommendation-label"} -->
            <p class="recommendation-label has-primary-color has-text-color has-link-color" style="font-size:0.875rem;font-weight:600">✨ Recommended</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        
        <!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem","margin":{"top":"1rem","bottom":"1rem"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="margin-top:1rem;margin-bottom:1rem;gap:0.25rem">
            <!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"recommendation-title"} -->
            <h4 class="wp-block-heading recommendation-title" style="margin-top:0;margin-bottom:0;font-size:1.25rem;font-weight:600;line-height:1.3">Book/Tool/Person Name</h4>
            <!-- /wp:heading -->
            
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var(--wp--preset--color--gray-600)"}}},"textColor":"gray-600"},"className":"recommendation-meta"} -->
            <p class="recommendation-meta has-gray-600-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;font-size:0.875rem;line-height:1.5">Category or Type</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        
        <!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"1rem"}}},"className":"recommendation-description"} -->
        <p class="recommendation-description" style="margin-top:0;margin-bottom:1rem;font-size:1rem;line-height:1.6">Why I recommend this. What makes it valuable, how it's helped me, or why I think others would benefit from it. Keep it personal and authentic.</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
        <div class="wp-block-group" style="gap:0.5rem">
            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--gray-600)"}}},"typography":{"fontSize":"0.875rem","fontWeight":"500"}},"textColor":"gray-600","className":"recommendation-rating"} -->
            <p class="recommendation-rating has-gray-600-color has-text-color has-link-color" style="font-size:0.875rem;font-weight:500">My Rating:</p>
            <!-- /wp:paragraph -->
            
            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--primary)"}}},"typography":{"fontSize":"0.875rem","fontWeight":"600"}},"textColor":"primary","className":"recommendation-stars"} -->
            <p class="recommendation-stars has-primary-color has-text-color has-link-color" style="font-size:0.875rem;font-weight:600">★★★★★</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        
        </div>
        <!-- /wp:group -->
        
        <!-- wp:image {"style":{"layout":{"selfStretch":"fit","flexSize":"120px"},"border":{"radius":"4px"}},"className":"recommendation-image"} -->
        <figure class="wp-block-image recommendation-image has-custom-border" style="border-radius:4px"><img alt="Book cover, tool screenshot, or person photo" style="border-radius:4px" /></figure>
        <!-- /wp:image -->
        
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->