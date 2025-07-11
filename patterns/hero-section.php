<?php
/**
 * Title: Giovanni Hero Main
 * Slug: giovanni/hero-section
 * Categories: giovanni-hero
 * Description: A clean hero section for personal introduction
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--20)","bottom":"var(--wp--preset--spacing--20)"},"blockGap":"var(--wp--preset--spacing--8)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
    <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontWeight":"700","lineHeight":"1.1","letterSpacing":"-0.025em"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--6)"}}},"fontSize":"5xl"} -->
    <h1 class="wp-block-heading has-text-align-center has-5-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--6);font-weight:700;letter-spacing:-0.025em;line-height:1.1">Hi, I'm [Your Name]</h1>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--8)"}}},"fontSize":"xl","textColor":"gray-600"} -->
    <p class="has-text-align-center has-gray-600-color has-text-color has-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--8)">I build thoughtful solutions through code and creativity</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:paragraph {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--12)"}}},"fontSize":"lg","textColor":"gray-500"} -->
    <p class="has-text-align-center has-gray-500-color has-text-color has-lg-font-size" style="margin-bottom:var(--wp--preset--spacing--12)">Welcome to my corner of the internet where I share thoughts on development, design, and life.</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--4)"}}} -->
    <div class="wp-block-buttons">
        <!-- wp:button {"style":{"typography":{"fontWeight":"500"},"spacing":{"padding":{"left":"var(--wp--preset--spacing--8)","right":"var(--wp--preset--spacing--8)","top":"var(--wp--preset--spacing--3)","bottom":"var(--wp--preset--spacing--3)"}},"border":{"radius":"6px"}},"fontSize":"md"} -->
        <div class="wp-block-button has-md-font-size"><a class="wp-block-button__link wp-element-button" href="/contact" style="border-radius:6px;font-weight:500;padding-top:var(--wp--preset--spacing--3);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--3);padding-left:var(--wp--preset--spacing--8)">Get in touch</a></div>
        <!-- /wp:button -->
        
        <!-- wp:button {"textColor":"gray-600","style":{"color":{"background":"transparent"},"typography":{"fontWeight":"500"},"spacing":{"padding":{"left":"var(--wp--preset--spacing--8)","right":"var(--wp--preset--spacing--8)","top":"var(--wp--preset--spacing--3)","bottom":"var(--wp--preset--spacing--3)"}},"border":{"radius":"6px","color":"var(--wp--preset--color--gray-300)","width":"1px"}},"fontSize":"md","className":"is-style-outline"} -->
        <div class="wp-block-button has-md-font-size is-style-outline"><a class="wp-block-button__link has-gray-600-color has-text-color wp-element-button" href="/now" style="border-color:var(--wp--preset--color--gray-300);border-width:1px;border-radius:6px;background:transparent;font-weight:500;padding-top:var(--wp--preset--spacing--3);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--3);padding-left:var(--wp--preset--spacing--8)">What I'm up to →</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->