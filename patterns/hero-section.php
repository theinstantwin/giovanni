<?php
/**
 * Title: Giovanni Hero Main
 * Slug: giovanni/hero-section
 * Categories: giovanni-hero
 * Description: A clean hero section for personal introduction
 * Block Types: core/group
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--8)","bottom":"var(--wp--preset--spacing--8)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--8)">
    <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--6)"}},"layout":{"type":"constrained","contentSize":"680px"}} -->
    <div class="wp-block-group">
        <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontWeight":"700","lineHeight":"1.1"}},"fontSize":"5xl"} -->
        <h1 class="wp-block-heading has-text-align-center has-5-xl-font-size" style="font-weight:700;line-height:1.1">Hi, I'm [Your Name]</h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"textAlign":"center","fontSize":"xl","textColor":"gray"} -->
        <p class="has-text-align-center has-gray-color has-text-color has-xl-font-size">I build thoughtful solutions through code and creativity</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"textAlign":"center","fontSize":"lg","textColor":"gray"} -->
        <p class="has-text-align-center has-gray-color has-text-color has-lg-font-size">Welcome to my corner of the internet where I share thoughts on development, design, and life.</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"},"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--4)","margin":{"top":"var(--wp--preset--spacing--6)"}}}} -->
        <div class="wp-block-buttons" style="gap:var(--wp--preset--spacing--4);margin-top:var(--wp--preset--spacing--6)">
            <!-- wp:button {"backgroundColor":"primary","textColor":"background","style":{"border":{"radius":"6px"}},"fontSize":"md"} -->
            <div class="wp-block-button has-md-font-size"><a class="wp-block-button__link has-background-color has-primary-background-color has-text-color has-background wp-element-button" href="#">Get in touch</a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-arrow-light"} -->
            <div class="wp-block-button is-style-arrow-light"><a class="wp-block-button__link wp-element-button" href="#">What I'm up to</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->