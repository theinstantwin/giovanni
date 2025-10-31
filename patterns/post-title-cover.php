<?php
/**
 * Title: Giovanni Post Title with Cover Image
 * Slug: giovanni-theme/post-title-cover
 * Categories: giovanni-posts
 * Description: Post title area with featured image cover and overlay
 * Keywords: post, title, cover, featured, image, overlay, hero
 * Block Types: core/group
 * Inserter: true
 */
?>

<!-- wp:group {"metadata":{"categories":["giovanni-posts"],"patternName":"giovanni-theme/post-title-cover","name":"Giovanni Post Title with Cover Image"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"elements":{"link":{"color":{"text":"var(--wp--preset--color--background)"}}}},"backgroundColor":"foreground","textColor":"background","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":220,"minHeightUnit":"px","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"10rem","bottom":"10rem","right":"var(--wp--preset--spacing--20)","left":"var(--wp--preset--spacing--20)"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-cover alignfull is-light" style="margin-top:0;margin-bottom:0;padding-top:10rem;padding-right:var(--wp--preset--spacing--20);padding-bottom:10rem;padding-left:var(--wp--preset--spacing--20);min-height:220px"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","textAlign":"center","style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--primary)"}}}},"fontSize":"sm"} /-->

<!-- wp:post-title {"textAlign":"center","level":1,"textColor":"background","fontSize":"5xl"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--2)"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:post-author {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var(--wp--preset--color--background)"}}}},"textColor":"background","fontSize":"sm"} /-->

<!-- wp:paragraph {"textColor":"muted-text","fontSize":"sm"} -->
<p class="has-muted-text-color has-text-color has-sm-font-size">/</p>
<!-- /wp:paragraph -->

<!-- wp:post-date {"style":{"color":{"text":"var(--wp--preset--color--subtle)"}},"fontSize":"sm"} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->