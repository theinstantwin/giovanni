<?php
/**
 * Title: Giovanni Featured Posts
 * Slug: giovanni/featured-posts-grid
 * Categories: giovanni-posts
 * Description: Grid layout showcasing featured or recent posts
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--16)","bottom":"var(--wp--preset--spacing--16)"},"blockGap":"var(--wp--preset--spacing--12)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontWeight":"600","lineHeight":"1.2","letterSpacing":"-0.015em"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--12)"}}},"fontSize":"2xl"} -->
    <h2 class="wp-block-heading has-text-align-center has-2-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--12);font-weight:600;letter-spacing:-0.015em;line-height:1.2">Featured Posts</h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":1,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--8)"}},"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--4)","padding":{"top":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)"}},"border":{"radius":"8px","color":"var(--wp--preset--color--gray-200)","width":"1px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
        <div class="wp-block-group has-white-background-color has-background" style="border-color:var(--wp--preset--color--gray-200);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">
            <!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"6px"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}}} /-->
            
            <!-- wp:post-terms {"term":"category","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"gray-500","fontSize":"sm"} /-->
            
            <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--3)"}}},"fontSize":"lg"} /-->
            
            <!-- wp:post-excerpt {"excerptLength":15,"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"gray-600","fontSize":"sm"} /-->
            
            <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--2)"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:post-date {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"gray-500","fontSize":"sm"} /-->
                
                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"gray-500","fontSize":"sm"} -->
                <p class="has-gray-500-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0">•</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"gray-500","fontSize":"sm"} -->
                <p class="has-gray-500-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0">2 min read</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph {"textAlign":"center","textColor":"gray-500"} -->
        <p class="has-text-align-center has-gray-500-color has-text-color">No posts found to feature.</p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--12)"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--12)">
        <!-- wp:buttons -->
        <div class="wp-block-buttons">
            <!-- wp:button {"textColor":"gray-600","style":{"color":{"background":"transparent"},"typography":{"fontWeight":"500"},"spacing":{"padding":{"left":"var(--wp--preset--spacing--8)","right":"var(--wp--preset--spacing--8)","top":"var(--wp--preset--spacing--3)","bottom":"var(--wp--preset--spacing--3)"}},"border":{"radius":"6px","color":"var(--wp--preset--color--gray-300)","width":"1px"}},"fontSize":"md","className":"is-style-outline"} -->
            <div class="wp-block-button has-md-font-size is-style-outline"><a class="wp-block-button__link has-gray-600-color has-text-color wp-element-button" href="/" style="border-color:var(--wp--preset--color--gray-300);border-width:1px;border-radius:6px;background:transparent;font-weight:500;padding-top:var(--wp--preset--spacing--3);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--3);padding-left:var(--wp--preset--spacing--8)">View all posts →</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->