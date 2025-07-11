<?php
/**
 * Title: Giovanni Header Centered
 * Slug: giovanni/header-centered-logo
 * Description: Minimalist header with centered logo/brand name and navigation below
 * Categories: giovanni-header
 * Keywords: header, logo, navigation, social, centered, minimalist
 * Block Types: core/template-part/header
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--4)","right":"var(--wp--preset--spacing--4)"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"color":"var(--wp--preset--color--gray-200)","width":"1px"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull" style="border-bottom-color:var(--wp--preset--color--gray-200);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--4);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--4)">
    <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","orientation":"vertical"}} -->
    <div class="wp-block-group">
        <!-- wp:site-title {"level":0,"textAlign":"center","isLink":true,"className":"is-style-brand-name","fontSize":"2xl","style":{"typography":{"fontWeight":"700","letterSpacing":"-0.025em"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--5)"}}}} /-->
        
        <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
        <div class="wp-block-group">
            <!-- wp:navigation {"overlayMenu":"mobile","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"center","orientation":"horizontal"},"fontSize":"sm","style":{"spacing":{"blockGap":"var(--wp--preset--spacing--8)"}}} -->
            <!-- wp:navigation-link {"label":"Blog","url":"/","kind":"custom","isTopLevelLink":true} /-->
            <!-- wp:navigation-link {"label":"Notes","url":"/notes","kind":"custom","isTopLevelLink":true} /-->
            <!-- wp:navigation-link {"label":"Now","url":"/now","kind":"custom","isTopLevelLink":true} /-->
            <!-- wp:navigation-link {"label":"Contact","url":"/contact","kind":"custom","isTopLevelLink":true} /-->
            <!-- /wp:navigation -->
            
            <!-- wp:spacer {"height":"0px","style":{"layout":{"flexSize":"16px","selfStretch":"fixed"}}} -->
            <div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->
            
            <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#000000","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var(--wp--preset--spacing--3)"}}}} -->
            <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
                <!-- wp:social-link {"url":"https://twitter.com/yourusername","service":"twitter"} /-->
                <!-- wp:social-link {"url":"https://github.com/yourusername","service":"github"} /-->
                <!-- wp:social-link {"url":"https://linkedin.com/in/yourusername","service":"linkedin"} /-->
                <!-- wp:social-link {"url":"mailto:your@email.com","service":"mail"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->