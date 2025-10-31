<?php
/**
 * Title: Giovanni Advanced Showcase
 * Slug: giovanni/advanced-showcase
 * Categories: giovanni-content
 * Description: Demonstrates modern CSS techniques including clamp(), color-mix(), and advanced animations
 * Keywords: advanced, modern, css, clamp, color-mix, responsive, fluid
 * Block Types: core/group
 * Inserter: true
 * Version: 1.7
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--12)","bottom":"var(--wp--preset--spacing--12)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--12);padding-bottom:var(--wp--preset--spacing--12)">

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontWeight":"700","lineHeight":"1.1"}},"textColor":"foreground","fontSize":"4xl"} -->
<h2 class="wp-block-heading has-text-align-center has-foreground-color has-text-color" style="font-size:clamp(2rem, 5vw, 4rem);font-weight:700;line-height:1.1">Advanced CSS Showcase</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--8)"}}},"textColor":"secondary","fontSize":"lg"} -->
<p class="has-text-align-center has-secondary-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--8);font-size:clamp(1rem, 2.5vw, 1.25rem)">Fluid typography, dynamic colors, and smooth animations</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--6)"}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group">

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"}},"border":{"radius":"var(--giovanni-card-radius)"}},"className":"is-style-card","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group is-style-card" style="border-radius:var(--giovanni-card-radius);padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">

<!-- wp:group {"layout":{"type":"constrained","contentSize":"500px"}} -->
<div class="wp-block-group">
            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}},"textColor":"foreground","fontSize":"2xl"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="font-size:clamp(1.5rem, 3vw, 2rem);font-weight:600">Fluid Typography</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6"}},"textColor":"foreground","fontSize":"md"} -->
            <p class="has-foreground-color has-text-color" style="font-size:clamp(1rem, 2vw, 1.125rem);line-height:1.6">Text that scales smoothly from mobile to desktop using clamp() for responsive perfection without breakpoints.</p>
            <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"var(--giovanni-button-radius)"}},"className":"is-style-arrow-light"} -->
<div class="wp-block-button is-style-arrow-light"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:var(--giovanni-button-radius)">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"}},"border":{"radius":"var(--giovanni-card-radius)"}},"className":"is-style-portfolio-card","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group is-style-portfolio-card" style="border-radius:var(--giovanni-card-radius);padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">

<!-- wp:group {"layout":{"type":"constrained","contentSize":"500px"}} -->
<div class="wp-block-group">
            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}},"textColor":"foreground","fontSize":"2xl"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="font-size:clamp(1.5rem, 3vw, 2rem);font-weight:600">Dynamic Colors</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6"}},"textColor":"foreground","fontSize":"md"} -->
            <p class="has-foreground-color has-text-color" style="font-size:clamp(1rem, 2vw, 1.125rem);line-height:1.6">Colors that adapt to any theme variation using color-mix() for intelligent hover effects and backgrounds.</p>
            <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"var(--giovanni-button-radius)"}},"className":"is-style-arrow-dark"} -->
<div class="wp-block-button is-style-arrow-dark"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:var(--giovanni-button-radius)">Explore</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"}},"border":{"radius":"var(--giovanni-card-radius)"}},"className":"is-style-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-card" style="border-radius:var(--giovanni-card-radius);padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">

        <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontWeight":"600"}},"textColor":"foreground","fontSize":"2xl"} -->
        <h3 class="wp-block-heading has-text-align-center has-foreground-color has-text-color" style="font-size:clamp(1.5rem, 3vw, 2rem);font-weight:600">Smooth Animations</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.6"}},"textColor":"foreground","fontSize":"md"} -->
        <p class="has-text-align-center has-foreground-color has-text-color" style="font-size:clamp(1rem, 2vw, 1.125rem);line-height:1.6">Performance-optimized animations with GPU acceleration and respect for user motion preferences.</p>
        <!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"var(--giovanni-button-radius)"}},"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:var(--giovanni-button-radius)">See in Action</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--8)","bottom":"var(--wp--preset--spacing--8)"}}}} -->
<hr class="wp-block-separator has-alpha-channel-opacity" style="margin-top:var(--wp--preset--spacing--8);margin-bottom:var(--wp--preset--spacing--8)"/>
<!-- /wp:separator -->

        <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontWeight":"600"}},"textColor":"foreground","fontSize":"xl"} -->
        <h3 class="wp-block-heading has-text-align-center has-foreground-color has-text-color" style="font-size:clamp(1.25rem, 3vw, 1.75rem);font-weight:600">Button Style Gallery</h3>
        <!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--4)"}}} -->
<div class="wp-block-buttons">
<!-- wp:button {"style":{"border":{"radius":"var(--giovanni-button-radius)"}},"className":"is-style-arrow-light"} -->
<div class="wp-block-button is-style-arrow-light"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:var(--giovanni-button-radius)">Arrow Light</a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"border":{"radius":"var(--giovanni-button-radius)"}},"className":"is-style-arrow-dark"} -->
<div class="wp-block-button is-style-arrow-dark"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:var(--giovanni-button-radius)">Arrow Dark</a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"border":{"radius":"var(--giovanni-button-radius)"}},"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:var(--giovanni-button-radius)">Ghost</a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"border":{"radius":"var(--giovanni-button-radius)"}},"className":"is-style-dark"} -->
<div class="wp-block-button is-style-dark"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:var(--giovanni-button-radius)">Dark</a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"border":{"radius":"var(--giovanni-button-radius)"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:var(--giovanni-button-radius)">Default</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->