<?php
/**
 * Title: Giovanni Posts by Date
 * Slug: giovanni/posts-by-date
 * Categories: giovanni-posts
 * Description: Chronological list of posts similar to shortcode output
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--16)","bottom":"var(--wp--preset--spacing--16)"},"blockGap":"var(--wp--preset--spacing--12)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontWeight":"600","lineHeight":"1.2","letterSpacing":"-0.015em"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--12)"}}},"fontSize":"2xl"} -->
    <h2 class="wp-block-heading has-text-align-center has-2-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--12);font-weight:600;letter-spacing:-0.015em;line-height:1.2">All Posts</h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":1,"query":{"perPage":100,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--1)"}}} -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--4)","padding":{"top":"var(--wp--preset--spacing--4)","right":"var(--wp--preset--spacing--4)","bottom":"var(--wp--preset--spacing--4)","left":"var(--wp--preset--spacing--4)"}},"border":{"radius":"8px"}},"className":"blog-post-item","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
        <div class="wp-block-group blog-post-item" style="border-radius:8px;padding-top:var(--wp--preset--spacing--4);padding-right:var(--wp--preset--spacing--4);padding-bottom:var(--wp--preset--spacing--4);padding-left:var(--wp--preset--spacing--4)">
            <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontWeight":"500","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"0","top":"0"}}},"fontSize":"lg","className":"post-title"} /-->
            
            <!-- wp:post-date {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"lineHeight":"1.3"}},"textColor":"gray","fontSize":"sm","className":"post-date"} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph {"textAlign":"center","textColor":"secondary"} -->
        <p class="has-text-align-center has-secondary-color has-text-color">No posts found.</p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->
