<?php
/**
 * Title: Giovanni Margin Note
 * Slug: giovanni/margin-note
 * Categories: giovanni-personal
 * Description: True marginalia-style annotation positioned like handwritten margin notes
 * Keywords: marginalia, annotation, sidebar, personal, commentary, aside
 * Block Types: core/group
 * Inserter: true
 */
?>

<!-- wp:group {"className":"margin-note-pattern","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group margin-note-pattern">
    <!-- wp:group {"className":"margin-note-container","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group margin-note-container">
        
        <!-- wp:group {"style":{"layout":{"selfStretch":"fill"}},"className":"margin-note-main-content","layout":{"type":"constrained","contentSize":"680px"}} -->
        <div class="wp-block-group margin-note-main-content">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"1.125rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"margin-note-reference"} -->
            <p class="margin-note-reference" style="margin-top:0;margin-bottom:0;font-size:1.125rem;line-height:1.6">This is the main text that you want to annotate. The margin note will appear alongside this content, creating a true marginalia experience.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        
        <!-- wp:group {"style":{"dimensions":{"minHeight":"","width":"280px"}},"className":"margin-note-sidebar","layout":{"type":"constrained"}} -->
        <div class="wp-block-group margin-note-sidebar">
            
            <!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem","margin":{"bottom":"0.75rem"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
            <div class="wp-block-group" style="gap:0.5rem;margin-bottom:0.75rem">
                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--primary)"}}},"typography":{"fontSize":"0.75rem","fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"primary","className":"margin-note-label"} -->
                <p class="margin-note-label has-primary-color has-text-color has-link-color" style="font-size:0.75rem;font-weight:600;letter-spacing:0.05em;text-transform:uppercase">✏️ Note</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
            
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.5","fontStyle":"italic"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"margin-note-text"} -->
            <p class="margin-note-text" style="margin-top:0;margin-bottom:0;font-size:0.875rem;font-style:italic;line-height:1.5">Your personal annotation, thought, or reaction goes here. This feels like a handwritten note in the margin of a book.</p>
            <!-- /wp:paragraph -->
            
            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--gray-500)"}}},"typography":{"fontSize":"0.75rem","fontWeight":"500"},"spacing":{"margin":{"top":"0.5rem","bottom":"0"}}},"textColor":"gray-500","className":"margin-note-author"} -->
            <p class="margin-note-author has-gray-500-color has-text-color has-link-color" style="margin-top:0.5rem;margin-bottom:0;font-size:0.75rem;font-weight:500">— Author</p>
            <!-- /wp:paragraph -->
            
        </div>
        <!-- /wp:group -->
        
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->