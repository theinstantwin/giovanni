<?php
/**
 * Title: Giovanni Recommendation
 * Slug: giovanni/recommendation
 * Categories: giovanni-personal
 * Description: Trusted endorsement card for tools, books, or people with warm styling
 * Keywords: recommendation, endorsement, review, trusted, tools, books
 * Block Types: core/group
 * Inserter: true
 * Version: 1.7
 */
?>

<!-- wp:group {"className":"recommendation-pattern","layout":{"type":"constrained"}} -->
<div class="wp-block-group recommendation-pattern">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"},"margin":{"top":"var(--wp--preset--spacing--5)","bottom":"var(--wp--preset--spacing--5)"},"blockGap":"var(--wp--preset--spacing--6)"},"border":{"radius":"var(--giovanni-card-radius)","width":"1px"}},"backgroundColor":"container","borderColor":"light-gray","className":"recommendation-card","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group recommendation-card has-border-color has-light-gray-border-color has-container-background-color has-background" style="border-width:1px;border-radius:var(--giovanni-card-radius);margin-top:var(--wp--preset--spacing--5);margin-bottom:var(--wp--preset--spacing--5);padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">
        
        <!-- wp:group {"style":{"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group">
        
        <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--3)"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
        <div class="wp-block-group">
            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--primary)"}}},"typography":{"fontWeight":"600"}},"textColor":"primary","className":"recommendation-label","fontSize":"sm"} -->
            <p class="recommendation-label has-primary-color has-text-color has-link-color has-sm-font-size" style="font-weight:600">✨ Recommended</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        
        <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--1)","margin":{"top":"var(--wp--preset--spacing--4)","bottom":"var(--wp--preset--spacing--4)"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--4);margin-bottom:var(--wp--preset--spacing--4)">
            <!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"foreground","className":"recommendation-title","fontSize":"xl"} -->
            <h4 class="wp-block-heading recommendation-title has-foreground-color has-text-color has-xl-font-size" style="margin-top:0;margin-bottom:0;font-weight:600;line-height:1.3">Book/Tool/Person Name</h4>
            <!-- /wp:heading -->
            
            <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var(--wp--preset--color--gray)"}}},"textColor":"gray"},"className":"recommendation-meta","fontSize":"sm"} -->
            <p class="recommendation-meta has-gray-color has-text-color has-link-color has-sm-font-size" style="margin-top:0;margin-bottom:0;line-height:1.5">Category or Type</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        
        <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"foreground","className":"recommendation-description","fontSize":"md"} -->
        <p class="recommendation-description has-foreground-color has-text-color has-md-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--4);line-height:1.6">Why I recommend this. What makes it valuable, how it's helped me, or why I think others would benefit from it. Keep it personal and authentic.</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--2)"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
        <div class="wp-block-group">
            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--gray)"}}},"typography":{"fontWeight":"500"}},"textColor":"gray","className":"recommendation-rating","fontSize":"sm"} -->
            <p class="recommendation-rating has-gray-color has-text-color has-link-color has-sm-font-size" style="font-weight:500">My Rating:</p>
            <!-- /wp:paragraph -->
            
            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--primary)"}}},"typography":{"fontWeight":"600"}},"textColor":"primary","className":"recommendation-stars","fontSize":"sm"} -->
            <p class="recommendation-stars has-primary-color has-text-color has-link-color has-sm-font-size" style="font-weight:600">★★★★★</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        
        </div>
        <!-- /wp:group -->
        
        <!-- wp:image {"width":"120px","height":"auto","aspectRatio":"3/4","style":{"layout":{"selfStretch":"fit","flexSize":"120px"},"border":{"radius":"var(--wp--custom--border-radius--sm)"}},"className":"recommendation-image"} -->
        <figure class="wp-block-image recommendation-image is-resized has-custom-border" style="border-radius:var(--wp--custom--border-radius--sm)"><img src="" alt="Book cover, tool screenshot, or person photo" style="aspect-ratio:3/4;object-fit:cover;width:120px;height:auto;border-radius:var(--wp--custom--border-radius--sm)"/></figure>
        <!-- /wp:image -->
        
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->