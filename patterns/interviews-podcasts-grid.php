<?php
/**
 * Title: Giovanni Interviews & Podcasts Grid
 * Slug: giovanni-theme/interviews-podcasts-grid
 * Categories: giovanni-content
 * Description: A responsive grid layout for displaying interviews, podcasts, and media appearances with category labels and descriptions
 * Keywords: interviews, podcasts, media, grid, cards, portfolio
 * Block Types: core/group
 * Inserter: true
 */
?>

<!-- wp:group {"className":"hover-cards","layout":{"type":"constrained"},"metadata":{"name":"Interviews & Podcasts Section"}} -->
<div class="wp-block-group hover-cards">
    <!-- wp:heading {"textAlign":"left","style":{"typography":{"fontSize":"clamp(2.25rem, 6vw, 4rem)","fontWeight":"800","lineHeight":"1.1"}},"className":"alignwide"} -->
    <h2 class="wp-block-heading has-text-align-left alignwide" style="font-size:clamp(2.25rem, 6vw, 4rem);font-weight:800;line-height:1.1">Interviews, Podcasts, Etc.</h2>
    <!-- /wp:heading -->

    <!-- wp:group {"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"23rem"}} -->
    <div class="wp-block-group" style="display:grid;grid-template-columns:repeat(auto-fill, minmax(min(23rem, 100%), 1fr));gap:var(--wp--preset--spacing--6)">

        <!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"}}},"backgroundColor":"background","className":"is-style-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
        <div class="wp-block-group is-style-card has-background-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem","letterSpacing":"1px","textTransform":"uppercase","fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"giovanni-blue"} -->
            <p class="has-giovanni-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--2);font-size:0.85rem;font-weight:500;letter-spacing:1px;text-transform:uppercase">Podcast</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontSize":"var(--wp--preset--font-size--lg)"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--3)"}}},"textColor":"foreground"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--3);font-size:var(--wp--preset--font-size--lg);font-weight:600">Design Systems Podcast</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--sm)","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-bottom:0;font-size:var(--wp--preset--font-size--sm);line-height:1.5">Discussion about building scalable design systems and the future of component-based development.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"}}},"backgroundColor":"background","className":"is-style-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
        <div class="wp-block-group is-style-card has-background-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem","letterSpacing":"1px","textTransform":"uppercase","fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"giovanni-blue"} -->
            <p class="has-giovanni-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--2);font-size:0.85rem;font-weight:500;letter-spacing:1px;text-transform:uppercase">Interview</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontSize":"var(--wp--preset--font-size--lg)"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--3)"}}},"textColor":"foreground"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--3);font-size:var(--wp--preset--font-size--lg);font-weight:600">Tech Leadership Interview</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--sm)","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-bottom:0;font-size:var(--wp--preset--font-size--sm);line-height:1.5">Exploring the intersection of technology and creative leadership in modern product development.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"}}},"backgroundColor":"background","className":"is-style-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
        <div class="wp-block-group is-style-card has-background-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem","letterSpacing":"1px","textTransform":"uppercase","fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"giovanni-blue"} -->
            <p class="has-giovanni-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--2);font-size:0.85rem;font-weight:500;letter-spacing:1px;text-transform:uppercase">Podcast</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontSize":"var(--wp--preset--font-size--lg)"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--3)"}}},"textColor":"foreground"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--3);font-size:var(--wp--preset--font-size--lg);font-weight:600">The Future of Work</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--sm)","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-bottom:0;font-size:var(--wp--preset--font-size--sm);line-height:1.5">A deep dive into remote work culture, distributed teams, and the evolution of workplace dynamics.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"}}},"backgroundColor":"background","className":"is-style-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
        <div class="wp-block-group is-style-card has-background-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem","letterSpacing":"1px","textTransform":"uppercase","fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"giovanni-blue"} -->
            <p class="has-giovanni-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--2);font-size:0.85rem;font-weight:500;letter-spacing:1px;text-transform:uppercase">Interview</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontSize":"var(--wp--preset--font-size--lg)"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--3)"}}},"textColor":"foreground"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--3);font-size:var(--wp--preset--font-size--lg);font-weight:600">Creative Process Deep Dive</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--sm)","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-bottom:0;font-size:var(--wp--preset--font-size--sm);line-height:1.5">Behind the scenes look at creative workflows, ideation processes, and turning concepts into reality.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"}}},"backgroundColor":"background","className":"is-style-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
        <div class="wp-block-group is-style-card has-background-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem","letterSpacing":"1px","textTransform":"uppercase","fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"giovanni-blue"} -->
            <p class="has-giovanni-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--2);font-size:0.85rem;font-weight:500;letter-spacing:1px;text-transform:uppercase">Podcast</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontSize":"var(--wp--preset--font-size--lg)"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--3)"}}},"textColor":"foreground"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--3);font-size:var(--wp--preset--font-size--lg);font-weight:600">Startup Founder Stories</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--sm)","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-bottom:0;font-size:var(--wp--preset--font-size--sm);line-height:1.5">Conversations with entrepreneurs about building companies, overcoming challenges, and scaling businesses.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--6)","bottom":"var(--wp--preset--spacing--6)","left":"var(--wp--preset--spacing--6)","right":"var(--wp--preset--spacing--6)"}}},"backgroundColor":"background","className":"is-style-card","layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"space-between"}} -->
        <div class="wp-block-group is-style-card has-background-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--6);padding-right:var(--wp--preset--spacing--6);padding-bottom:var(--wp--preset--spacing--6);padding-left:var(--wp--preset--spacing--6)">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem","letterSpacing":"1px","textTransform":"uppercase","fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"giovanni-blue"} -->
            <p class="has-giovanni-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--2);font-size:0.85rem;font-weight:500;letter-spacing:1px;text-transform:uppercase">Interview</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontSize":"var(--wp--preset--font-size--lg)"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--3)"}}},"textColor":"foreground"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--3);font-size:var(--wp--preset--font-size--lg);font-weight:600">Industry Trends Analysis</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--sm)","lineHeight":"1.5"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-bottom:0;font-size:var(--wp--preset--font-size--sm);line-height:1.5">Analyzing emerging trends in technology, design, and their impact on business and society.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->