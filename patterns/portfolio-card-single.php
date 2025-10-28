<?php
/**
 * Title: Portfolio Card
 * Slug: giovanni/portfolio-card-single
 * Categories: giovanni-cards
 * Description: A portfolio project card with image, title, description, and call-to-action.
 * Keywords: portfolio, project, card, showcase
 * Block Types: core/group
 * Inserter: true
 */
?>
<!-- wp:group {"className":"is-style-portfolio-card"} -->
<div class="wp-block-group is-style-portfolio-card"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="data:image/svg+xml,%3Csvg width='400' height='200' viewBox='0 0 400 200' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='400' height='200' fill='%23f5f5f5'/%3E%3Cpath d='M200 75c13.807 0 25 11.193 25 25s-11.193 25-25 25-25-11.193-25-25 11.193-25 25-25z' fill='%23e5e5e5'/%3E%3C/svg%3E" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Project Title</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>A brief description of this project, the technologies used, and the problem it solves. Include key features and outcomes.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-arrow-dark"} -->
<div class="wp-block-button is-style-arrow-dark"><a class="wp-block-button__link wp-element-button" href="#">View Project</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Source Code</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
