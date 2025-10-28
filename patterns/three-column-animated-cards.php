<?php
/**
 * Title: Giovanni Three-Column Animated Cards
 * Slug: giovanni/three-column-animated-cards
 * Categories: giovanni-cards
 * Keywords: grid, cards, animated, hover, three column, showcase, interactive
 * Description: A three-column grid pattern with animated cards for showcasing content with hover effects and pulsing radar orbs.
 * Block Types: core/group
 * Inserter: true
 * Version: 1.7
 *
 * @package Giovanni
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--24)","bottom":"var(--wp--preset--spacing--32)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--24);padding-bottom:var(--wp--preset--spacing--32)">
	<!-- wp:heading {"align":"wide","level":2,"style":{"typography":{"letterSpacing":"0px","lineHeight":"0.8"},"elements":{"link":{"color":{"text":"var(--wp--preset--color--primary)"}}}},"textColor":"foreground","className":"highlight","fontSize":"6xl"} -->
	<h2 class="wp-block-heading alignwide highlight has-foreground-color has-link-color has-primary-color has-text-color has-6xl-font-size" style="letter-spacing:0px;line-height:.8">Our Featured Content</h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","columnCount":3},"className":"hover-cards"} -->
	<div class="wp-block-group alignwide hover-cards">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--8)","right":"var(--wp--preset--spacing--8)","bottom":"var(--wp--preset--spacing--8)","left":"var(--wp--preset--spacing--8)"}},"border":{"radius":"var(--giovanni-card-radius)"},"position":{"type":"relative"}},"backgroundColor":"container","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"className":"show-orb-on-hover is-linked","metadata":{"link":"#"},"fontSize":"md"} -->
		<div class="wp-block-group show-orb-on-hover is-linked has-container-background-color has-background has-md-font-size" style="border-radius:var(--giovanni-card-radius);padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--8)">
			<a class="wp-block-group__link" href="#" target="_self" rel="follow" aria-hidden="true" tabindex="-1"></a>
			<!-- wp:html /-->
			<div class="pulse-orb"></div>
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group is-content-justification-space-between is-nowrap is-layout-flex">
				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"foreground"} -->
				<p class="has-foreground-color has-text-color" style="font-style:normal;font-weight:600">Podcast Episode 1</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"foreground","fontSize":"sm"} -->
			<p class="has-foreground-color has-text-color has-sm-font-size">A detailed discussion on modern web development trends and challenges.</p>
			<!-- /wp:paragraph -->
			<!-- wp:group {"style":{"border":{"radius":"var(--wp--custom--border-radius--full)"},"spacing":{"padding":{"top":"3px","right":"15px","bottom":"3px","left":"15px"}},"typography":{"fontStyle":"normal","fontWeight":"500","letterSpacing":"1px","textTransform":"uppercase"}},"backgroundColor":"primary","className":"giovanni-no-shrink"} -->
			<div class="wp-block-group giovanni-no-shrink has-primary-background-color has-background has-sm-font-size" style="border-radius:var(--wp--custom--border-radius--full);padding-top:3px;padding-right:15px;padding-bottom:3px;padding-left:15px;font-style:normal;font-weight:500;letter-spacing:1px;text-transform:uppercase">
				<!-- wp:paragraph {"fontSize":"xs","textColor":"background"} -->
				<p class="has-xs-font-size has-background-color has-text-color">Podcast</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--8)","right":"var(--wp--preset--spacing--8)","bottom":"var(--wp--preset--spacing--8)","left":"var(--wp--preset--spacing--8)"}},"border":{"radius":"var(--giovanni-card-radius)"},"position":{"type":"relative"}},"backgroundColor":"container","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"className":"show-orb-on-hover is-linked","metadata":{"link":"#"},"fontSize":"md"} -->
		<div class="wp-block-group show-orb-on-hover is-linked has-container-background-color has-background has-md-font-size" style="border-radius:var(--giovanni-card-radius);padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--8)">
			<a class="wp-block-group__link" href="#" target="_self" rel="follow" aria-hidden="true" tabindex="-1"></a>
			<!-- wp:html /-->
			<div class="pulse-orb"></div>
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group is-content-justification-space-between is-nowrap is-layout-flex">
				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"foreground"} -->
				<p class="has-foreground-color has-text-color" style="font-style:normal;font-weight:600">Interview with a Pro</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"foreground","fontSize":"sm"} -->
			<p class="has-foreground-color has-text-color has-sm-font-size">An insightful interview covering product design, user experience, and market strategies.</p>
			<!-- /wp:paragraph -->
			<!-- wp:group {"style":{"border":{"radius":"var(--wp--custom--border-radius--full)"},"spacing":{"padding":{"top":"3px","right":"15px","bottom":"3px","left":"15px"}},"typography":{"fontStyle":"normal","fontWeight":"500","letterSpacing":"1px","textTransform":"uppercase"}},"backgroundColor":"primary","className":"giovanni-no-shrink"} -->
			<div class="wp-block-group giovanni-no-shrink has-primary-background-color has-background has-sm-font-size" style="border-radius:var(--wp--custom--border-radius--full);padding-top:3px;padding-right:15px;padding-bottom:3px;padding-left:15px;font-style:normal;font-weight:500;letter-spacing:1px;text-transform:uppercase">
				<!-- wp:paragraph {"fontSize":"xs","textColor":"background"} -->
				<p class="has-xs-font-size has-background-color has-text-color">Interview</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--8)","right":"var(--wp--preset--spacing--8)","bottom":"var(--wp--preset--spacing--8)","left":"var(--wp--preset--spacing--8)"}},"border":{"radius":"var(--giovanni-card-radius)"},"position":{"type":"relative"}},"backgroundColor":"container","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"className":"show-orb-on-hover is-linked","metadata":{"link":"#"},"fontSize":"md"} -->
		<div class="wp-block-group show-orb-on-hover is-linked has-container-background-color has-background has-md-font-size" style="border-radius:var(--giovanni-card-radius);padding-top:var(--wp--preset--spacing--8);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--8)">
			<a class="wp-block-group__link" href="#" target="_self" rel="follow" aria-hidden="true" tabindex="-1"></a>
			<!-- wp:html /-->
			<div class="pulse-orb"></div>
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group is-content-justification-space-between is-nowrap is-layout-flex">
				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"foreground"} -->
				<p class="has-foreground-color has-text-color" style="font-style:normal;font-weight:600">Webinar: Design Systems</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"foreground","fontSize":"sm"} -->
			<p class="has-foreground-color has-text-color has-sm-font-size">An in-depth webinar exploring the principles of effective design systems.</p>
			<!-- /wp:paragraph -->
			<!-- wp:group {"style":{"border":{"radius":"var(--wp--custom--border-radius--full)"},"spacing":{"padding":{"top":"3px","right":"15px","bottom":"3px","left":"15px"}},"typography":{"fontStyle":"normal","fontWeight":"500","letterSpacing":"1px","textTransform":"uppercase"}},"backgroundColor":"primary","className":"giovanni-no-shrink"} -->
			<div class="wp-block-group giovanni-no-shrink has-primary-background-color has-background has-sm-font-size" style="border-radius:var(--wp--custom--border-radius--full);padding-top:3px;padding-right:15px;padding-bottom:3px;padding-left:15px;font-style:normal;font-weight:500;letter-spacing:1px;text-transform:uppercase">
				<!-- wp:paragraph {"fontSize":"xs","textColor":"background"} -->
				<p class="has-xs-font-size has-background-color has-text-color">Webinar</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->