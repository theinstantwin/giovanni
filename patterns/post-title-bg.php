<?php
/**
 * Title: Giovanni Post Title with Background
 * Slug: giovanni-theme/post-title-bg
 * Categories: giovanni-posts
 * Description: Post title area with dark background and featured image
 * Keywords: post, title, background, featured, image, header
 * Block Types: core/group
 * Inserter: true
 */
?>

<!-- wp:group {"metadata":{"categories":["giovanni-posts"],"patternName":"giovanni-theme/post-title-bg","name":"Giovanni Post Title with Background"},"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--14)","bottom":"0px"},"blockGap":"var(--wp--preset--spacing--5)"}},"backgroundColor":"foreground","textColor":"background","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--14);padding-bottom:0px"><!-- wp:post-terms {"term":"category","textAlign":"center","style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--primary)"}}}},"fontSize":"sm"} /-->

<!-- wp:post-title {"textAlign":"center","level":1,"fontSize":"5xl"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--2)"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:post-author {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"sm"} /-->

<!-- wp:paragraph {"textColor":"gray","fontSize":"sm"} -->
<p class="has-gray-color has-text-color has-sm-font-size">/</p>
<!-- /wp:paragraph -->

<!-- wp:post-date {"style":{"color":{"text":"var(--wp--preset--color--gray)"}},"fontSize":"sm"} /--></div>
<!-- /wp:group -->

<!-- wp:post-featured-image {"height":"450px","align":"wide","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--16)"}}}} /--></div>
<!-- /wp:group -->