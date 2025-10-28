<?php
/**
 * Title: Giovanni Three-Column Animated Cards
 * Slug: giovanni/three-column-animated-cards
 * Categories: giovanni-cards
 * Keywords: grid, cards, animated, hover, three column, showcase, interactive
 * Description: A three-column grid pattern with animated cards for showcasing content with hover effects and pulsing radar orbs.
 * Block Types: core/group
 * Inserter: true
 * Version: 2.0
 *
 * @package Giovanni
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--24)","bottom":"var(--wp--preset--spacing--32)"}}},"layout":{"type":"constrained"},"tagName":"section","className":"featured-section"} -->
<section class="wp-block-group alignwide featured-section">
	<!-- Section heading -->
	<!-- wp:heading {"align":"wide","level":2,"textColor":"foreground","className":"section-title","fontSize":"6xl"} -->
	<h2 class="wp-block-heading alignwide section-title has-foreground-color has-text-color has-6xl-font-size">Our Featured Content</h2>
	<!-- /wp:heading -->

	<!-- Cards grid with semantic article tags -->
	<!-- wp:group {"align":"wide","layout":{"type":"default"},"className":"showcase-grid showcase-grid-3col"} -->
	<div class="wp-block-group alignwide showcase-grid showcase-grid-3col">
		<!-- Card 1: Podcast Episode -->
		<!-- wp:group {"tagName":"article","className":"showcase-card","backgroundColor":"container","layout":{"type":"flex","orientation":"vertical"}} -->
		<article class="wp-block-group showcase-card has-container-background-color has-background">
			<!-- Decorative pulse orb (hidden from screen readers) -->
			<!-- wp:html -->
			<div class="pulse-orb" aria-hidden="true"></div>
			<!-- /wp:html -->

			<!-- Card heading (h3 for proper hierarchy) -->
			<!-- wp:heading {"level":3,"textColor":"foreground","className":"card-title","fontSize":"lg"} -->
			<h3 class="wp-block-heading card-title has-foreground-color has-text-color has-lg-font-size">Podcast Episode 1</h3>
			<!-- /wp:heading -->

			<!-- Card description -->
			<!-- wp:paragraph {"textColor":"foreground","fontSize":"sm"} -->
			<p class="wp-block-paragraph has-foreground-color has-text-color has-sm-font-size">A detailed discussion on modern web development trends and challenges.</p>
			<!-- /wp:paragraph -->

			<!-- Content type badge -->
			<!-- wp:group {"className":"content-badge"} -->
			<div class="wp-block-group content-badge">
				<!-- wp:paragraph {"fontSize":"xs","textColor":"background"} -->
				<p class="wp-block-paragraph has-xs-font-size has-background-color has-text-color">Podcast</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</article>
		<!-- /wp:group -->

		<!-- Card 2: Interview -->
		<!-- wp:group {"tagName":"article","className":"showcase-card","backgroundColor":"container","layout":{"type":"flex","orientation":"vertical"}} -->
		<article class="wp-block-group showcase-card has-container-background-color has-background">
			<!-- Decorative pulse orb (hidden from screen readers) -->
			<!-- wp:html -->
			<div class="pulse-orb" aria-hidden="true"></div>
			<!-- /wp:html -->

			<!-- Card heading (h3 for proper hierarchy) -->
			<!-- wp:heading {"level":3,"textColor":"foreground","className":"card-title","fontSize":"lg"} -->
			<h3 class="wp-block-heading card-title has-foreground-color has-text-color has-lg-font-size">Interview with a Pro</h3>
			<!-- /wp:heading -->

			<!-- Card description -->
			<!-- wp:paragraph {"textColor":"foreground","fontSize":"sm"} -->
			<p class="wp-block-paragraph has-foreground-color has-text-color has-sm-font-size">An insightful interview covering product design, user experience, and market strategies.</p>
			<!-- /wp:paragraph -->

			<!-- Content type badge -->
			<!-- wp:group {"className":"content-badge"} -->
			<div class="wp-block-group content-badge">
				<!-- wp:paragraph {"fontSize":"xs","textColor":"background"} -->
				<p class="wp-block-paragraph has-xs-font-size has-background-color has-text-color">Interview</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</article>
		<!-- /wp:group -->

		<!-- Card 3: Webinar -->
		<!-- wp:group {"tagName":"article","className":"showcase-card","backgroundColor":"container","layout":{"type":"flex","orientation":"vertical"}} -->
		<article class="wp-block-group showcase-card has-container-background-color has-background">
			<!-- Decorative pulse orb (hidden from screen readers) -->
			<!-- wp:html -->
			<div class="pulse-orb" aria-hidden="true"></div>
			<!-- /wp:html -->

			<!-- Card heading (h3 for proper hierarchy) -->
			<!-- wp:heading {"level":3,"textColor":"foreground","className":"card-title","fontSize":"lg"} -->
			<h3 class="wp-block-heading card-title has-foreground-color has-text-color has-lg-font-size">Webinar: Design Systems</h3>
			<!-- /wp:heading -->

			<!-- Card description -->
			<!-- wp:paragraph {"textColor":"foreground","fontSize":"sm"} -->
			<p class="wp-block-paragraph has-foreground-color has-text-color has-sm-font-size">An in-depth webinar exploring the principles of effective design systems.</p>
			<!-- /wp:paragraph -->

			<!-- Content type badge -->
			<!-- wp:group {"className":"content-badge"} -->
			<div class="wp-block-group content-badge">
				<!-- wp:paragraph {"fontSize":"xs","textColor":"background"} -->
				<p class="wp-block-paragraph has-xs-font-size has-background-color has-text-color">Webinar</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</article>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
