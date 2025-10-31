<?php
/**
 * Title: Company Card
 * Slug: giovanni/company-card-single
 * Categories: giovanni-cards
 * Description: A single company card with logo, name, description, and link.
 * Keywords: company, card, logo, business
 * Block Types: core/group
 * Inserter: true
 */
?>
<!-- wp:group {"className":"is-style-company-card"} -->
<div class="wp-block-group is-style-company-card"><!-- wp:image {"width":"80px","height":"80px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect width='80' height='80' rx='12' fill='%23f5f5f5'/%3E%3Cpath d='M40 25c8.284 0 15 6.716 15 15s-6.716 15-15 15-15-6.716-15-15 6.716-15 15-15z' fill='%23e5e5e5'/%3E%3C/svg%3E" alt="" style="width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Company Name</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Brief description of what this company does and why they're valuable to your audience.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Visit Website</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->