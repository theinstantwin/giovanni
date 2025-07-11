<?php
/**
 * Title: Giovanni Text Title Lists
 * Slug: giovanni-theme/text-title-lists
 * Categories: giovanni-posts
 * Description: Centered text-based post list with categories and titles
 * Keywords: posts, list, query, title, category, text, centered
 * Block Types: core/columns
 * Inserter: true
 */
?>

<!-- wp:columns {"metadata":{"categories":["giovanni-posts"],"patternName":"giovanni-theme/text-title-lists","name":"Giovanni Text Title Lists"},"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"20%"} -->
<div class="wp-block-column" style="flex-basis:20%"></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:query {"queryId":26,"query":{"perPage":"12","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide","className":"is-style-default"} -->
<div class="wp-block-query alignwide is-style-default"><!-- wp:post-template {"layout":{"type":"default","columnCount":2}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--3)","padding":{"top":"0","right":"0px","bottom":"var(--wp--preset--spacing--12)","left":"0"}},"border":{"bottom":{"color":"var(--wp--preset--color--gray-200)","width":"1px"}}},"textColor":"gray-500","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group has-gray-500-color has-text-color" style="border-bottom-color:var(--wp--preset--color--gray-200);border-bottom-width:1px;padding-top:0;padding-right:0px;padding-bottom:var(--wp--preset--spacing--12);padding-left:0"><!-- wp:post-terms {"term":"category","textAlign":"center","separator":"  ","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}},"fontSize":"sm"} /-->

<!-- wp:post-title {"textAlign":"center","isLink":true,"style":{"typography":{"lineHeight":"1.4"},"elements":{"link":{"color":{"text":"var(--wp--preset--color--foreground)"}}}},"fontSize":"xl"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:spacer {"height":"35px"} -->
<div style="height:35px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"20%"} -->
<div class="wp-block-column" style="flex-basis:20%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->