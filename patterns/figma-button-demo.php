<?php
/**
 * Title: Giovanni Arrow Button Demo
 * Slug: giovanni/figma-button-demo
 * Categories: giovanni-content
 * Description: Demonstration of the new Arrow Button with smooth hover animation
 * Keywords: button, arrow, animation, demo
 * Block Types: core/group
 * Inserter: true
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--8)","bottom":"var(--wp--preset--spacing--8)","left":"var(--wp--preset--spacing--4)","right":"var(--wp--preset--spacing--4)"}}},"layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--4);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--4)">

<!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Arrow Button Demo</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--preset--color--gray-600)"}}} -->
<p class="has-text-align-center has-text-color" style="color:var(--wp--preset--color--gray-600)">Experience the pixel-perfect Arrow Button with smooth hover animation</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--6);margin-bottom:var(--wp--preset--spacing--6)">
<!-- wp:button {"className":"is-style-arrow-light"} -->
<div class="wp-block-button is-style-arrow-light"><a class="wp-block-button__link wp-element-button" href="#">Get Started</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)"}}}} -->
<hr class="wp-block-separator has-alpha-channel-opacity" style="margin-top:var(--wp--preset--spacing--6);margin-bottom:var(--wp--preset--spacing--6)"/>
<!-- /wp:separator -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center">Button Style Comparison</h3>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--4)"}}} -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-arrow-light"} -->
<div class="wp-block-button is-style-arrow-light"><a class="wp-block-button__link wp-element-button" href="#">Arrow Light</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-arrow-dark"} -->
<div class="wp-block-button is-style-arrow-dark"><a class="wp-block-button__link wp-element-button" href="#">Arrow Dark</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Ghost Style</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-dark"} -->
<div class="wp-block-button is-style-dark"><a class="wp-block-button__link wp-element-button" href="#">Dark Style</a></div>
<!-- /wp:button -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Default</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--preset--color--gray-500)"},"spacing":{"margin":{"top":"var(--wp--preset--spacing--4)"}}},"fontSize":"sm"} -->
<p class="has-text-align-center has-text-color has-sm-font-size" style="color:var(--wp--preset--color--gray-500);margin-top:var(--wp--preset--spacing--4)">Hover over the buttons to see the different animation effects</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->