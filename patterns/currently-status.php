<?php
/**
 * Title: Giovanni Status Dashboard
 * Slug: giovanni/currently-status
 * Categories: giovanni-personal
 * Description: Living status dashboard showing what you're currently reading, working on, and thinking about
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--8)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"},"margin":{"top":"var(--wp--preset--spacing--5)","bottom":"var(--wp--preset--spacing--5)"}},"border":{"radius":"var(--giovanni-card-radius)","width":"1px"}},"backgroundColor":"container","borderColor":"light-gray","className":"currently-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group currently-box has-border-color has-light-gray-border-color has-container-background-color has-background" style="border-width:1px;border-radius:var(--giovanni-card-radius);margin-top:var(--wp--preset--spacing--5);margin-bottom:var(--wp--preset--spacing--5);padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">

<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"600","letterSpacing":"0.025em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"primary","fontSize":"sm","className":"currently-label"} -->
<h4 class="wp-block-heading currently-label has-primary-color has-text-color has-sm-font-size" style="margin-bottom:var(--wp--preset--spacing--4);font-weight:600;letter-spacing:0.025em;text-transform:uppercase">Currently</h4>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var(--wp--preset--spacing--4)","left":"var(--wp--preset--spacing--6)"}}}} -->
<div class="wp-block-columns">

<!-- wp:column {"className":"currently-column currently-reading"} -->
<div class="wp-block-column currently-column currently-reading">
<!-- wp:heading {"level":5,"style":{"typography":{"fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"primary","fontSize":"sm"} -->
<h5 class="wp-block-heading has-primary-color has-text-color has-sm-font-size" style="margin-bottom:var(--wp--preset--spacing--2);font-weight:500">Reading</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.4"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"foreground","fontSize":"sm"} -->
<p class="has-foreground-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0;line-height:1.4">Four Thousand Weeks by Oliver Burkeman</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"currently-column currently-working"} -->
<div class="wp-block-column currently-column currently-working">
<!-- wp:heading {"level":5,"style":{"typography":{"fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"primary","fontSize":"sm"} -->
<h5 class="wp-block-heading has-primary-color has-text-color has-sm-font-size" style="margin-bottom:var(--wp--preset--spacing--2);font-weight:500">Working On</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.4"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"foreground","fontSize":"sm"} -->
<p class="has-foreground-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0;line-height:1.4">Giovanni WordPress theme v1.7</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"currently-column currently-thinking"} -->
<div class="wp-block-column currently-column currently-thinking">
<!-- wp:heading {"level":5,"style":{"typography":{"fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"primary","fontSize":"sm"} -->
<h5 class="wp-block-heading has-primary-color has-text-color has-sm-font-size" style="margin-bottom:var(--wp--preset--spacing--2);font-weight:500">Thinking About</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.4"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"foreground","fontSize":"sm"} -->
<p class="has-foreground-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0;line-height:1.4">AI-augmented knowledge systems</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->