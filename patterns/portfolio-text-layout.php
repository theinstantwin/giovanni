<?php
/**
 * Title: Giovanni Portfolio Text Layout
 * Slug: giovanni-theme/portfolio-text-layout
 * Categories: giovanni-content
 * Description: A text-heavy portfolio layout with mixed typography, categories, and detailed descriptions for showcasing work and achievements
 * Keywords: portfolio, text, typography, work, showcase, projects
 * Block Types: core/group
 * Inserter: true
 */
?>

<!-- wp:group {"layout":{"type":"constrained","contentSize":"740px"},"metadata":{"name":"Portfolio Text Section"}} -->
<div class="wp-block-group">
    <!-- wp:heading {"textAlign":"left","style":{"typography":{"fontSize":"clamp(2.25rem, 6vw, 4rem)","fontWeight":"800","lineHeight":"1.1"}},"className":"alignwide"} -->
    <h2 class="wp-block-heading has-text-align-left alignwide" style="font-size:clamp(2.25rem, 6vw, 4rem);font-weight:800;line-height:1.1">Selected Work</h2>
    <!-- /wp:heading -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--8)"}}},"layout":{"type":"constrained","contentSize":"680px"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--8)">

        <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--8)"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--8)">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem","letterSpacing":"1px","textTransform":"uppercase","fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"giovanni-blue"} -->
            <p class="has-giovanni-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--2);font-size:0.85rem;font-weight:500;letter-spacing:1px;text-transform:uppercase">Design System</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontSize":"var(--wp--preset--font-size--xl)","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"foreground"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--4);font-size:var(--wp--preset--font-size--xl);font-weight:600;line-height:1.3">Enterprise Component Library</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--md)","lineHeight":"1.75"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--5)"}}},"textColor":"foreground"} -->
            <p class="has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--5);font-size:var(--wp--preset--font-size--md);line-height:1.75">Led the development of a comprehensive design system serving 50+ product teams across multiple business units. The system reduced design-to-development handoff time by 60% while ensuring consistent user experiences across all digital touchpoints.</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--sm)","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-bottom:0;font-size:var(--wp--preset--font-size--sm);line-height:1.6">Built with React, TypeScript, and Storybook. Includes 120+ components, comprehensive documentation, and automated testing suites. Adopted by engineering teams in North America and Europe.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--8)"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--8)">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem","letterSpacing":"1px","textTransform":"uppercase","fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"giovanni-blue"} -->
            <p class="has-giovanni-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--2);font-size:0.85rem;font-weight:500;letter-spacing:1px;text-transform:uppercase">Product Strategy</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontSize":"var(--wp--preset--font-size--xl)","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"foreground"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--4);font-size:var(--wp--preset--font-size--xl);font-weight:600;line-height:1.3">Zero-to-One Product Launch</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--md)","lineHeight":"1.75"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--5)"}}},"textColor":"foreground"} -->
            <p class="has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--5);font-size:var(--wp--preset--font-size--md);line-height:1.75">Conceptualized and launched a B2B SaaS platform that reached $2M ARR within 18 months. Managed the full product lifecycle from market research and user interviews to go-to-market strategy execution.</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--sm)","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-bottom:0;font-size:var(--wp--preset--font-size--sm);line-height:1.6">Collaborated with engineering, design, and sales teams. Utilized data-driven decision making, A/B testing, and customer feedback loops to iterate and optimize product-market fit.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--8)"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--8)">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem","letterSpacing":"1px","textTransform":"uppercase","fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"giovanni-blue"} -->
            <p class="has-giovanni-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--2);font-size:0.85rem;font-weight:500;letter-spacing:1px;text-transform:uppercase">Brand Identity</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontSize":"var(--wp--preset--font-size--xl)","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"foreground"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--4);font-size:var(--wp--preset--font-size--xl);font-weight:600;line-height:1.3">Complete Brand Transformation</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--md)","lineHeight":"1.75"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--5)"}}},"textColor":"foreground"} -->
            <p class="has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--5);font-size:var(--wp--preset--font-size--md);line-height:1.75">Orchestrated a complete rebrand for a Fortune 500 company, encompassing visual identity, messaging strategy, and digital experience transformation. The initiative resulted in a 40% increase in brand recognition and significantly improved customer perception metrics.</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--sm)","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-bottom:0;font-size:var(--wp--preset--font-size--sm);line-height:1.6">Led cross-functional teams including creative directors, copywriters, and marketing specialists. Managed stakeholder expectations across multiple business units while maintaining brand consistency.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--8)"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--8)">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem","letterSpacing":"1px","textTransform":"uppercase","fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"giovanni-blue"} -->
            <p class="has-giovanni-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--2);font-size:0.85rem;font-weight:500;letter-spacing:1px;text-transform:uppercase">User Experience</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontSize":"var(--wp--preset--font-size--xl)","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"foreground"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--4);font-size:var(--wp--preset--font-size--xl);font-weight:600;line-height:1.3">Mobile App Redesign</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--md)","lineHeight":"1.75"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--5)"}}},"textColor":"foreground"} -->
            <p class="has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--5);font-size:var(--wp--preset--font-size--md);line-height:1.75">Redesigned a consumer mobile application used by 2M+ active users. Through extensive user research, prototype testing, and iterative design, achieved a 35% improvement in user engagement and 28% reduction in support tickets.</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--sm)","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-bottom:0;font-size:var(--wp--preset--font-size--sm);line-height:1.6">Conducted user interviews with 50+ participants, created high-fidelity prototypes, and collaborated closely with product and engineering teams throughout the development process.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"0"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-group" style="margin-bottom:0">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem","letterSpacing":"1px","textTransform":"uppercase","fontWeight":"500"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"textColor":"giovanni-blue"} -->
            <p class="has-giovanni-blue-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--2);font-size:0.85rem;font-weight:500;letter-spacing:1px;text-transform:uppercase">Digital Strategy</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","fontSize":"var(--wp--preset--font-size--xl)","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"foreground"} -->
            <h3 class="wp-block-heading has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--4);font-size:var(--wp--preset--font-size--xl);font-weight:600;line-height:1.3">Omnichannel Experience Platform</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--md)","lineHeight":"1.75"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--5)"}}},"textColor":"foreground"} -->
            <p class="has-foreground-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--5);font-size:var(--wp--preset--font-size--md);line-height:1.75">Architected and implemented an omnichannel customer experience platform that unified touchpoints across web, mobile, in-store, and customer service. The solution improved customer satisfaction scores by 45% and increased cross-channel engagement.</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--sm)","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"0"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-bottom:0;font-size:var(--wp--preset--font-size--sm);line-height:1.6">Integrated customer data platforms, personalization engines, and analytics systems. Worked with enterprise technology partners to ensure scalability and reliability across all customer touchpoints.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->