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
        <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--4)","padding":{"top":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)"}},"border":{"radius":"8px","width":"1px"}},"backgroundColor":"container","borderColor":"subtle","layout":{"type":"constrained"}} -->
        <div class="wp-block-group has-border-color has-subtle-border-color has-container-background-color has-background" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">
            <!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"6px"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}}} /-->

            <!-- wp:post-terms {"term":"category","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"gray","fontSize":"sm"} /-->

            <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--3)"}}},"fontSize":"xl"} /-->

            <!-- wp:post-excerpt {"excerptLength":15,"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"gray","fontSize":"sm"} /-->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--2)"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:post-date {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"gray","fontSize":"sm"} /-->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"gray","fontSize":"sm"} -->
                <p class="has-gray-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0">•</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"gray","fontSize":"sm"} -->
                <p class="has-gray-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0">2 min read</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph {"textAlign":"center","textColor":"gray"} -->
        <p class="has-text-align-center has-gray-color has-text-color">No posts found to feature.</p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--12)"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--12)">
        <!-- wp:buttons -->
        <div class="wp-block-buttons">
            <!-- wp:button {"style":{"border":{"radius":"var(--giovanni-button-radius)"}},"className":"is-style-ghost"} -->
            <div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="/" style="border-radius:var(--giovanni-button-radius)">View all posts →</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->