<?php
/**
 * Title: Giovanni Advanced Showcase
 * Slug: giovanni/advanced-showcase
 * Categories: giovanni-content
 * Description: Demonstrates modern CSS techniques with fluid typography, dynamic colors, and smooth animations
 * Keywords: advanced, modern, css, responsive, fluid, animations, showcase
 * Block Types: core/group
 * Inserter: true
 * Version: 2.0
 */
?>

<!-- Main section: Advanced CSS showcase -->
<!-- wp:group {"tagName":"section","className":"advanced-showcase-section","layout":{"type":"constrained"}} -->
<section class="wp-block-group advanced-showcase-section">
	<!-- Section heading -->
	<!-- wp:heading {"level":2,"textAlign":"center","textColor":"foreground","fontSize":"4xl","className":"showcase-title"} -->
	<h2 class="wp-block-heading has-text-align-center has-foreground-color has-text-color has-4xl-font-size showcase-title">Advanced CSS Showcase</h2>
	<!-- /wp:heading -->

	<!-- Section subtitle -->
	<!-- wp:paragraph {"align":"center","textColor":"secondary","fontSize":"lg","className":"showcase-subtitle"} -->
	<p class="wp-block-paragraph has-text-align-center has-secondary-color has-text-color has-lg-font-size showcase-subtitle">Fluid typography, dynamic colors, and smooth animations</p>
	<!-- /wp:paragraph -->

	<!-- Feature cards grid -->
	<!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"},"className":"showcase-features"} -->
	<div class="wp-block-group showcase-features">

		<!-- Feature Card 1: Fluid Typography -->
		<!-- wp:group {"tagName":"article","className":"feature-card feature-card--typography","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<article class="wp-block-group feature-card feature-card--typography">
			<!-- Card content area -->
			<!-- wp:group {"layout":{"type":"constrained","contentSize":"500px"},"className":"feature-content"} -->
			<div class="wp-block-group feature-content">
				<!-- wp:heading {"level":3,"textColor":"foreground","fontSize":"2xl","className":"feature-title"} -->
				<h3 class="wp-block-heading has-foreground-color has-text-color has-2xl-font-size feature-title">Fluid Typography</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"foreground","fontSize":"md"} -->
				<p class="wp-block-paragraph has-foreground-color has-text-color has-md-font-size">Text that scales smoothly from mobile to desktop using responsive typography for perfect readability without breakpoints.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- Card CTA button -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-arrow-light"} -->
				<div class="wp-block-button is-style-arrow-light"><a class="wp-block-button__link wp-element-button" href="#">Learn More</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</article>
		<!-- /wp:group -->

		<!-- Feature Card 2: Dynamic Colors -->
		<!-- wp:group {"tagName":"article","className":"feature-card feature-card--colors","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<article class="wp-block-group feature-card feature-card--colors">
			<!-- Card content area -->
			<!-- wp:group {"layout":{"type":"constrained","contentSize":"500px"},"className":"feature-content"} -->
			<div class="wp-block-group feature-content">
				<!-- wp:heading {"level":3,"textColor":"foreground","fontSize":"2xl","className":"feature-title"} -->
				<h3 class="wp-block-heading has-foreground-color has-text-color has-2xl-font-size feature-title">Dynamic Colors</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"textColor":"foreground","fontSize":"md"} -->
				<p class="wp-block-paragraph has-foreground-color has-text-color has-md-font-size">Colors that adapt to any theme variation for intelligent hover effects and backgrounds that work everywhere.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- Card CTA button -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-arrow-dark"} -->
				<div class="wp-block-button is-style-arrow-dark"><a class="wp-block-button__link wp-element-button" href="#">Explore</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</article>
		<!-- /wp:group -->

		<!-- Feature Card 3: Smooth Animations -->
		<!-- wp:group {"tagName":"article","className":"feature-card feature-card--animations","layout":{"type":"constrained"}} -->
		<article class="wp-block-group feature-card feature-card--animations">
			<!-- Card content area (centered) -->
			<!-- wp:group {"layout":{"type":"constrained"},"className":"feature-content"} -->
			<div class="wp-block-group feature-content">
				<!-- wp:heading {"level":3,"textAlign":"center","textColor":"foreground","fontSize":"2xl","className":"feature-title"} -->
				<h3 class="wp-block-heading has-text-align-center has-foreground-color has-text-color has-2xl-font-size feature-title">Smooth Animations</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"foreground","fontSize":"md"} -->
				<p class="wp-block-paragraph has-text-align-center has-foreground-color has-text-color has-md-font-size">Performance-optimized animations with GPU acceleration and respect for user motion preferences.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- Card CTA button (centered) -->
			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-ghost"} -->
				<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">See in Action</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</article>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- Divider -->
	<!-- wp:separator {"className":"showcase-divider"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity showcase-divider"/>
	<!-- /wp:separator -->

	<!-- Button style gallery section -->
	<!-- wp:heading {"level":3,"textAlign":"center","textColor":"foreground","fontSize":"xl","className":"gallery-title"} -->
	<h3 class="wp-block-heading has-text-align-center has-foreground-color has-text-color has-xl-font-size gallery-title">Button Style Gallery</h3>
	<!-- /wp:heading -->

	<!-- Button styles showcase -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"className":"button-gallery"} -->
	<div class="wp-block-buttons button-gallery">
		<!-- Arrow Light variant -->
		<!-- wp:button {"className":"is-style-arrow-light"} -->
		<div class="wp-block-button is-style-arrow-light"><a class="wp-block-button__link wp-element-button" href="#">Arrow Light</a></div>
		<!-- /wp:button -->

		<!-- Arrow Dark variant -->
		<!-- wp:button {"className":"is-style-arrow-dark"} -->
		<div class="wp-block-button is-style-arrow-dark"><a class="wp-block-button__link wp-element-button" href="#">Arrow Dark</a></div>
		<!-- /wp:button -->

		<!-- Ghost variant -->
		<!-- wp:button {"className":"is-style-ghost"} -->
		<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#">Ghost</a></div>
		<!-- /wp:button -->

		<!-- Dark variant -->
		<!-- wp:button {"className":"is-style-dark"} -->
		<div class="wp-block-button is-style-dark"><a class="wp-block-button__link wp-element-button" href="#">Dark</a></div>
		<!-- /wp:button -->

		<!-- Default variant -->
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Default</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</section>
<!-- /wp:group -->
