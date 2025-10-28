<?php
/**
 * Title: Giovanni Newsletter Posts
 * Slug: giovanni-theme/query-newsletter
 * Categories: giovanni-posts
 * Description: Email-inspired compact layout with structured metadata and clear hierarchy
 * Keywords: newsletter, posts, query, email, layout, metadata
 * Block Types: core/group
 * Inserter: true
 * Version: 1.7
 */
?>

<!-- wp:group {"metadata":{"categories":["giovanni-posts"],"patternName":"giovanni-theme/query-newsletter","name":"Giovanni Newsletter Posts"},"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--16)","bottom":"var(--wp--preset--spacing--16)"},"blockGap":"var(--wp--preset--spacing--12)"}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--16);padding-bottom:var(--wp--preset--spacing--16)">
    <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--4)","padding":{"bottom":"var(--wp--preset--spacing--8)"}},"border":{"bottom":{"color":"var(--wp--preset--color--light-gray)","width":"2px"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--light-gray);border-bottom-width:2px;padding-bottom:var(--wp--preset--spacing--8)">
        <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontWeight":"700","lineHeight":"1.1","letterSpacing":"-0.025em"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--3)"}}},"textColor":"foreground","fontSize":"3xl"} -->
        <h2 class="wp-block-heading has-text-align-center has-foreground-color has-text-color has-3-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--3);font-weight:700;letter-spacing:-0.025em;line-height:1.1">Latest Updates</h2>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"secondary","fontSize":"md"} -->
        <p class="has-text-align-center has-secondary-color has-text-color has-md-font-size" style="margin-bottom:var(--wp--preset--spacing--2)">Fresh insights and stories delivered regularly</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"queryId":1,"query":{"perPage":8,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--6)"}}} -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--5)","padding":{"top":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)"}},"border":{"radius":"var(--giovanni-card-radius)","width":"1px"}},"backgroundColor":"container","borderColor":"light-gray","layout":{"type":"constrained"}} -->
        <div class="wp-block-group has-container-background-color has-light-gray-border-color has-background has-border-color" style="border-width:1px;border-radius:var(--giovanni-card-radius);padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">
            <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--3)","margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
            <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--4)">
                <!-- wp:post-date {"style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em","textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"primary","fontSize":"xs"} /-->
                
                <!-- wp:post-terms {"term":"category","style":{"typography":{"fontWeight":"500","letterSpacing":"0.03em","textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"secondary","fontSize":"xs"} /-->
            </div>
            <!-- /wp:group -->
            
            <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"foreground","fontSize":"xl"} /-->
            
            <!-- wp:post-excerpt {"excerptLength":30,"showMoreOnNewLine":false,"style":{"typography":{"lineHeight":"1.5"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--5)"}}},"textColor":"foreground","fontSize":"sm"} /-->
            
            <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--4)","padding":{"top":"var(--wp--preset--spacing--4)"}},"border":{"top":{"color":"var(--wp--preset--color--light-gray)","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
            <div class="wp-block-group" style="border-top-color:var(--wp--preset--color--light-gray);border-top-width:1px;padding-top:var(--wp--preset--spacing--4)">
                <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--2)"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"secondary","fontSize":"xs"} -->
                    <p class="has-secondary-color has-text-color has-xs-font-size" style="margin-top:0;margin-bottom:0;font-weight:500">📖</p>
                    <!-- /wp:paragraph -->
                    
                    <!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"secondary","fontSize":"xs"} -->
                    <p class="has-secondary-color has-text-color has-xs-font-size" style="margin-top:0;margin-bottom:0;font-weight:500">5 min read</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
                
                <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","letterSpacing":"0.02em","textTransform":"uppercase"}},"textColor":"primary","fontSize":"xs"} -->
                <p class="has-primary-color has-text-color has-xs-font-size" style="font-weight:600;letter-spacing:0.02em;text-transform:uppercase">→ Read More</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--12)"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
        <!-- wp:query-pagination-previous {"style":{"typography":{"fontWeight":"500"}}} /-->
        <!-- wp:query-pagination-numbers {"style":{"typography":{"fontWeight":"500"}}} /-->
        <!-- wp:query-pagination-next {"style":{"typography":{"fontWeight":"500"}}} /-->
        <!-- /wp:query-pagination -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph {"textAlign":"center","style":{"typography":{"fontWeight":"500"}},"textColor":"secondary"} -->
        <p class="has-text-align-center has-secondary-color has-text-color" style="font-weight:500">No updates available at this time.</p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
    
    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--12)","bottom":"var(--wp--preset--spacing--8)"},"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)"}},"border":{"top":{"color":"var(--wp--preset--color--light-gray)","width":"1px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-group" style="border-top-color:var(--wp--preset--color--light-gray);border-top-width:1px;margin-top:var(--wp--preset--spacing--12);margin-bottom:var(--wp--preset--spacing--8);padding-top:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6)">
        <!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"textColor":"secondary","fontSize":"sm"} -->
        <p class="has-secondary-color has-text-color has-sm-font-size" style="font-weight:500">✨ That's all for now — check back soon for more updates</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->