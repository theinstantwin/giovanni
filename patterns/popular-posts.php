<?php
/**
 * Title: Giovanni Popular Posts
 * Slug: giovanni/popular-posts
 * Categories: giovanni-posts
 * Description: Highlighted section showcasing popular or most-read posts for improved content discovery
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--16)","bottom":"var(--wp--preset--spacing--16)"},"blockGap":"var(--wp--preset--spacing--12)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontWeight":"700","lineHeight":"1.2","letterSpacing":"-0.02em"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"fontSize":"3xl"} -->
    <h2 class="wp-block-heading has-text-align-center has-3-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--4);font-weight:700;letter-spacing:-0.02em;line-height:1.2">Popular Posts</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--12)"}}},"textColor":"muted-text","fontSize":"lg"} -->
    <p class="has-text-align-center has-muted-text-color has-text-color has-lg-font-size" style="margin-bottom:var(--wp--preset--spacing--12)">The most-read posts that readers love</p>
    <!-- /wp:paragraph -->

    <!-- wp:query {"queryId":2,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--8)"}},"layout":{"type":"grid","columnCount":2}} -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--5)","padding":{"top":"var(--wp--preset--spacing--8)","right":"var(--wp--preset--spacing--8)","bottom":"var(--wp--preset--spacing--8)","left":"var(--wp--preset--spacing--8)"}},"border":{"radius":"12px","color":"var(--wp--preset--color--subtle-border)","width":"1px"},"elements":{"link":{"color":{"text":"var(--wp--preset--color--foreground)"}}},"dimensions":{"minHeight":"320px"}},"backgroundColor":"container","layout":{"type":"constrained"},"className":"hover-lift"} -->
        <div class="wp-block-group hover-lift has-white-background-color has-background has-link-color" style="border-color:var(--wp--preset--color--subtle-border);border-width:1px;border-radius:12px;min-height:320px;padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--8)">
            <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"8px"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--5)"}}}} /-->
            
            <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--3)","margin":{"bottom":"var(--wp--preset--spacing--5)"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
            <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--5)">
                <!-- wp:post-terms {"term":"category","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"primary","fontSize":"sm"} /-->
                
                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"muted-text","fontSize":"sm"} -->
                <p class="has-muted-text-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0">•</p>
                <!-- /wp:paragraph -->
                
                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"muted-text","fontSize":"sm"} -->
                <p class="has-muted-text-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0">📈 Popular</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
            
            <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"fontSize":"xl"} /-->
            
            <!-- wp:post-excerpt {"excerptLength":20,"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--5)"}}},"textColor":"muted-text","fontSize":"md"} /-->
            
            <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--3)","margin":{"top":"auto"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="margin-top:auto">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--2)"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:post-date {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"muted-text","fontSize":"sm"} /-->
                    
                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"muted-text","fontSize":"sm"} -->
                    <p class="has-muted-text-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0">•</p>
                    <!-- /wp:paragraph -->
                    
                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"muted-text","fontSize":"sm"} -->
                    <p class="has-muted-text-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0">3 min read</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
                
                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"muted-text","fontSize":"sm"} -->
                <p class="has-muted-text-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0">👁️ 1.2k views</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph {"textAlign":"center","textColor":"muted-text"} -->
        <p class="has-text-align-center has-muted-text-color has-text-color">No popular posts found yet.</p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->