<?php
/**
 * Title: Giovanni Author Bio
 * Slug: giovanni/author-bio
 * Categories: giovanni-author
 * Description: Personal author bio section for single posts and pages
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--12)","bottom":"var(--wp--preset--spacing--12)","left":"var(--wp--preset--spacing--8)","right":"var(--wp--preset--spacing--8)"},"blockGap":"var(--wp--preset--spacing--6)"},"border":{"radius":"12px","color":"var(--wp--preset--color--gray-200)","width":"1px"}},"backgroundColor":"gray-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-gray-50-background-color has-background" style="border-color:var(--wp--preset--color--gray-200);border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--12);padding-right:var(--wp--preset--spacing--8);padding-bottom:var(--wp--preset--spacing--12);padding-left:var(--wp--preset--spacing--8)">
    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var(--wp--preset--spacing--6)"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center">
        <!-- wp:column {"verticalAlignment":"center","width":"80px"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:80px">
            <!-- wp:image {"width":"80px","height":"80px","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"50%"}}} -->
            <figure class="wp-block-image size-thumbnail is-resized" style="border-radius:50%"><img src="" alt="Author Profile" style="object-fit:cover;width:80px;height:80px"/></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--2)"}}},"fontSize":"xl"} -->
            <h3 class="wp-block-heading has-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--2);font-weight:600;line-height:1.3">[Your Name]</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--4)"}}},"textColor":"gray-600","fontSize":"md"} -->
            <p class="has-gray-600-color has-text-color has-md-font-size" style="margin-bottom:var(--wp--preset--spacing--4)">Father, developer, and maker building thoughtful solutions through code and creativity. Passionate about privacy-first tools and authentic human connections.</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--4)"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"gray-500","fontSize":"sm"} -->
                <p class="has-gray-500-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0"><a href="/contact">Get in touch</a></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"gray-500","fontSize":"sm"} -->
                <p class="has-gray-500-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0">•</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"gray-500","fontSize":"sm"} -->
                <p class="has-gray-500-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0"><a href="/now">What I'm up to</a></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"gray-500","fontSize":"sm"} -->
                <p class="has-gray-500-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0">•</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"gray-500","fontSize":"sm"} -->
                <p class="has-gray-500-color has-text-color has-sm-font-size" style="margin-top:0;margin-bottom:0"><a href="#" target="_blank" rel="noopener">Twitter</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->