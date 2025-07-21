# CLAUDE.md - Giovanni Theme Development

This file provides Claude Code with specific context for the Giovanni WordPress theme, including design system, features, and development workflow.

## CRITICAL: Master Development Standards

**ALWAYS reference the top-level WordPress CLAUDE.md first** (`projects/wordpress/CLAUDE.md`) for:
- Universal WordPress development standards
- Pixel-perfect development workflow
- Block style registration requirements
- Code quality and security standards
- Performance optimization guidelines

This Giovanni-specific file provides theme context and features. The master CLAUDE.md provides the development approach and coding standards that MUST be followed for all WordPress theme work.

## Theme Overview

**Giovanni** is a modern Full Site Editing (FSE) WordPress theme designed for personal blogs, portfolios, and creative professionals. It features elegant design, comprehensive block patterns, professional typography, system-aware dark mode, and touch optimization.

- **Version**: 1.7.2
- **Author**: Matt DeSiena
- **PHP Requirement**: 8.0+
- **WordPress Requirement**: 6.0+
- **License**: GPL v2 or later

## Design System & Theme Configuration

### Core Design Philosophy
- **Modern & Minimal**: Clean, professional aesthetic with focus on readability
- **Typography-First**: Inter font family with comprehensive fluid typography system
- **System-Aware**: Respects user preferences for dark mode and reduced motion
- **Touch-Optimized**: Designed for mobile-first experience with proper touch targets

### Layout System (theme.json)
```json
"layout": {
    "contentSize": "650px",    // Reading width for optimal readability
    "wideSize": "1200px"       // Maximum container width
}
```

### Custom Design Tokens
The theme includes comprehensive custom properties in theme.json:

**Content Widths**:
- `narrow`: 580px (tight reading width)
- `content`: 650px (optimal reading width)
- `wide`: 740px (wider content)
- `reading`: 680px (article reading width)
- `container`: 1200px (max site width)

**Typography Scale** (Fluid):
- `xs`: clamp(0.625rem, 1.5vw, 0.75rem)
- `sm`: clamp(0.75rem, 2vw, 0.875rem)
- `md`: clamp(1rem, 2.5vw, 1.125rem) (body text)
- `lg`: clamp(1.125rem, 3vw, 1.25rem)
- `xl`: clamp(1.25rem, 3.5vw, 1.5rem)
- `2xl`: clamp(1.375rem, 4vw, 1.75rem)
- `3xl`: clamp(1.5rem, 4.5vw, 2rem)
- `4xl`: clamp(1.875rem, 5vw, 2.5rem)
- `5xl`: clamp(2.25rem, 6vw, 3.5rem)
- `6xl`: clamp(2.75rem, 7vw, 4.5rem)
- `7xl`: clamp(3.5rem, 8vw, 6rem)
- `8xl`: clamp(4.5rem, 10vw, 8rem)

### Semantic Font Size System
**CRITICAL**: The theme uses a complete semantic font size system with 12 tokens that work consistently across all theme variations.

**Why Semantic Font Sizes**:
- **Consistent typography** across all theme variations
- **Better maintainability** - single source of truth for font sizes
- **Responsive by default** - all use fluid typography with clamp()
- **Theme-aware** - sizes adapt to different style variations
- **Better accessibility** - semantic naming makes purpose clear

**Available Semantic Tokens**:
- `xs` (0.625rem-0.75rem) - Extra small text, metadata
- `sm` (0.75rem-0.875rem) - Small text, captions
- `md` (1rem-1.125rem) - Body text, paragraphs
- `lg` (1.125rem-1.25rem) - Large text, post titles in lists
- `xl` (1.25rem-1.5rem) - Extra large text, headings
- `2xl` (1.375rem-1.75rem) - Section headings
- `3xl` (1.5rem-2rem) - Main post titles
- `4xl` (1.875rem-2.5rem) - Page titles
- `5xl` (2.25rem-3.5rem) - Hero headings
- `6xl` (2.75rem-4.5rem) - Large display text
- `7xl` (3.5rem-6rem) - Extra large display
- `8xl` (4.5rem-8rem) - Maximum size (404 error)

**Usage in Patterns**:
```html
<!-- ✅ CORRECT - Uses semantic font size tokens -->
<h2 class="wp-block-heading" fontSize="3xl">Main Title</h2>
<p class="wp-block-paragraph" fontSize="md">Body text content</p>

<!-- ❌ WRONG - Hardcoded font sizes -->
<h2 class="wp-block-heading" style="font-size: 2rem">Main Title</h2>
<p class="wp-block-paragraph" style="font-size: 1.125rem">Body text</p>
```

**Migration Complete**:
All hardcoded font sizes have been converted to semantic tokens in:
- `templates/404.html` - 404 error number uses `fontSize="8xl"`
- `patterns/quick-note.php` - All text uses appropriate semantic tokens
- `patterns/query-newsletter.php` - Newsletter metadata uses `fontSize="xs"`
- `patterns/recommendation.php` - Recommendation cards use semantic hierarchy
- `patterns/advanced-showcase.php` - Removed clamp() functions for semantic tokens

**Font Size Hierarchy**:
- **Metadata/Fine Print**: `xs`, `sm`
- **Body Text**: `md` (default)
- **Post Titles in Lists**: `lg`, `xl`
- **Section Headings**: `2xl`, `3xl`
- **Page Titles**: `4xl`, `5xl`
- **Display/Hero**: `6xl`, `7xl`, `8xl`

**Spacing Scale** (Fluid):
- Scale from 0-40 using clamp() for responsive spacing
- Base unit: 0.125rem (2px) scaling up to 10rem (160px)

**Color System**:
- **Primary**: `#0070f3` (Giovanni Blue)
- **Foreground**: `#000000` (main text)
- **Background**: `#fafafa` (page background)
- **Semantic Grays**: `light-gray`, `gray`, `container` (7 total semantic tokens)
- **Semantic Colors**: Success, Warning, Error, Info
- **Accent Colors**: Purple, Cyan for variety

### Typography System
- **Primary Font**: Inter (with system fallback)
- **Secondary Font**: System Sans Serif
- **Monospace Font**: ui-monospace stack
- **Font Weights**: 300 (light) to 900 (black)
- **Line Heights**: Custom scale from 1.0 (none) to 2.0 (loose)

## Theme Features & Capabilities

### Block Patterns (22 Custom Patterns)
The theme includes comprehensive block patterns organized by category:

**Hero Patterns**:
- `hero-section.php`: Main hero with CTA
- `hero-about.php`: About page hero
- `hero-portfolio.php`: Portfolio hero

**Content Patterns**:
- `key-takeaway.php`: Highlighted content blocks
- `quick-note.php`: Casual note format
- `recommendation.php`: Product/service recommendations
- `text-title-lists.php`: Structured list content

**Blog Patterns**:
- `blog-post-meta.php`: Post metadata display
- `blog-roll-cards-grid.php`: Blog listing grid
- `featured-posts-grid.php`: Featured content grid
- `posts-by-date.php`: Chronological post listing

**Card Patterns**:
- `basic-card-single.php`: General purpose card
- `portfolio-card-single.php`: Portfolio project card
- `company-card-single.php`: Company/brand card
- `three-column-animated-cards.php`: Interactive card grid

**Personal Patterns**:
- `author-bio.php`: Author information
- `currently-status.php`: Current status display
- `behind-the-scenes.php`: Personal insights

**Interactive Patterns**:
- `advanced-showcase.php`: Feature showcase
- `query-newsletter.php`: Newsletter signup
- `popular-posts.php`: Popular content display

### Block Style Variations
The theme provides custom styles for core WordPress blocks:

**Button Styles**:
- `ghost`: Transparent with underline hover effect
- `dark`: Dark background variant with subtle hover animation
- `arrow-light`: Light button with animated arrow icon (slides in on hover)
- `arrow-dark`: Dark button with animated arrow icon (slides in on hover)

**Navigation Styles**:
- `underline`: Hover underline effect
- `button`: Button-style navigation
- `pill`: Rounded pill navigation

**Quote Styles**:
- `book-quote`: Book/citation style
- `personal-reflection`: Personal thought format

**Image Styles**:
- `polaroid-static`: Polaroid photo effect
- `rounded`: Rounded corner images

**Group Styles**:
- `card`: Basic card container
- `portfolio-card`: Portfolio project card
- `company-card`: Company/brand card
- `blog-roll-card`: Blog listing card
- `form-container`: Form styling container

**Table Styles**:
- `striped`: Alternating row colors
- `minimal`: Clean minimal table
- `bordered`: Full border table

**Post Terms Styles**:
- `pill-badge`: Rounded pill badges
- `accent-tag`: Accent colored tags
- `ghost-outline`: Outline-only tags

**Site Title Styles**:
- `logo-style`: Logo-focused styling
- `brand-name`: Brand name emphasis

### Theme Style Variations (3 Variations)
The theme includes complete style variations for different aesthetics:

1. **Default Giovanni**: Clean, modern light design with blue primary (#0070f3)
2. **Dark Theme**: Dark mode optimized with cream text and red primary (#ff335f)
3. **Linen Theme**: Warm, textured cream background with red primary (#ff335f)

## File Structure & Organization

### Core Theme Files
```
giovanni/
├── theme.json                 # Main theme configuration
├── style.css                  # Theme metadata and minimal CSS
├── functions.php              # Theme setup and feature loading
├── parts/                     # Template parts
│   ├── header.html           # Site header
│   └── footer.html           # Site footer
├── templates/                 # Page templates
│   ├── index.html            # Main blog index
│   ├── single.html           # Single post
│   ├── page.html             # Static pages
│   ├── archive.html          # Archive pages
│   ├── search.html           # Search results
│   └── 404.html              # Error page
├── patterns/                  # Block patterns (22 patterns)
├── styles/                    # Theme variations (3 styles)
├── inc/                       # Modular functionality
└── assets/styles/             # Block-specific CSS
```

### Modular Inc Directory
```
inc/
├── theme-setup.php           # Core theme features
├── enqueue-assets.php        # CSS/JS loading
├── block-helpers.php         # Block styles and patterns
├── performance.php           # Performance optimizations
├── shortcodes.php            # Custom shortcodes
├── template-helpers.php      # Template utilities
└── acf-helpers.php           # ACF integration
```

### Asset Organization
```
assets/styles/
├── core-button.css           # Button block styles
├── core-navigation.css       # Navigation block styles
├── core-quote.css            # Quote block styles
├── core-image.css            # Image block styles
├── core-group.css            # Group block styles
├── core-table.css            # Table block styles
├── core-post-terms.css       # Post terms styles
├── core-site-title.css       # Site title styles
├── core-links.css            # Link styles
├── core-separator.css        # Separator styles
├── responsive-mobile.css     # Mobile + Dark Theme CSS (CRITICAL FILE)
├── shortcodes.css            # Custom shortcode styles
├── components/               # Component-specific styles
│   └── responsive-mobile.css # Mobile + Dark Theme CSS
└── blocks/                   # Block-specific styles
    ├── core-button-arrow.css # Arrow button styles
    ├── core-button-dark.css  # Dark button styles
    ├── core-button-ghost.css # Ghost button styles
    ├── core-links.css        # Link styles
    ├── core-post-terms.css   # Post terms styles
    ├── core-group.css        # Group block styles
    ├── core-quote.css        # Quote block styles
    ├── core-separator.css    # Separator styles
    ├── core-image.css        # Image block styles
    ├── core-site-title.css   # Site title styles
    └── core-table.css        # Table block styles
```

### Mobile & Dark Theme System (responsive-mobile.css)

**CRITICAL**: The `responsive-mobile.css` file contains BOTH mobile responsiveness AND system-aware dark mode:

**Dark Mode Features**:
- System-aware dark mode using `@media (prefers-color-scheme: dark)`
- Complete color palette override for dark theme
- Giovanni Blue changes to red accent (#ff335f) in dark mode
- Maintains design consistency across light/dark modes

**Mobile Responsiveness**:
- Touch device optimizations with proper 44px touch targets
- Mobile layout fixes for constrained content
- Responsive typography scaling
- Touch-focused interaction states (focus over hover)

**Key Mobile Optimizations**:
- Better touch targets for buttons, navigation, and links
- Constrained content width optimization for mobile
- Blog listing mobile improvements
- Compact month headers and post title adjustments

## Development Workflow

### When Working on Giovanni Theme

1. **Reference Master WordPress CLAUDE.md FIRST** (`projects/wordpress/CLAUDE.md`) for coding standards
2. **Then Reference This Giovanni CLAUDE.md** for theme-specific context and features
3. **Use Existing Patterns** before creating new ones
4. **Follow Established Naming** conventions for consistency
5. **Test All Style Variations** when making changes
6. **Update Pattern Categories** if adding new pattern types
7. **Test Mobile & Dark Mode** using responsive-mobile.css context

### Key Development Principles

**Block Style Development**:
- Style names MUST match CSS class names exactly
- Use CSS custom properties (never hardcoded colors)
- Test with all 3 theme variations
- Ensure accessibility compliance

**Arrow Button Implementation**:
- Arrow buttons use CSS pseudo-elements (`::after`) with Unicode arrow (→)
- Animation: starts at `translateX(-4px)` opacity 0, slides to `translateX(0px)` opacity 1
- Proper spacing: `padding-right: 2.5rem` with arrow positioned at `right: 1rem`
- Includes hover AND focus states for accessibility
- Both light and dark variants with appropriate color transitions
- Mobile responsive: smaller `min-width` and `padding-right` on tablets/phones to prevent overflow

**Pattern Development**:
- Use branded category prefixes (`giovanni-[category]`)
- Follow established pattern naming convention
- Include proper metadata and descriptions
- Test responsive behavior

**CRITICAL - Semantic Font Size Usage**:
- **Always use semantic font size tokens** (`fontSize="xl"`, `fontSize="sm"`)
- **Never use hardcoded font sizes** (`"fontSize":"1.5rem"` ❌, `style="font-size: 2rem"` ❌)
- **Never use clamp() functions in patterns** (`fontSize="clamp(1rem, 2vw, 1.5rem)"` ❌)
- **Use appropriate semantic hierarchy**:
  - Metadata/Fine Print: `xs`, `sm`
  - Body Text: `md` (default)
  - Post Titles in Lists: `lg`, `xl`
  - Section Headings: `2xl`, `3xl`
  - Page Titles: `4xl`, `5xl`
  - Display/Hero: `6xl`, `7xl`, `8xl`
- **Test with all style variations** - font sizes should remain consistent across themes

**CRITICAL - Pattern Color Usage**:
- **Always use semantic color tokens** (`"backgroundColor":"primary"`, `"textColor":"primary"`)
- **Never use theme-specific color slugs** (`"backgroundColor":"giovanni-blue"` ❌)
- **Never use hardcoded hex colors** (`"backgroundColor":"#0070f3"` ❌)
- **Test with all style variations** - colors should change appropriately
- **Use these semantic tokens in patterns**:
  - `"primary"` - Main accent color (adapts to style variations)
  - `"secondary"` - Secondary accent color
  - `"foreground"` - Main text color
  - `"background"` - Main background color
  - `"container"` - Container/card background
  - `"gray-[50-900]"` - Neutral grays

**CRITICAL - Final Semantic Color System**:
- **✅ COMPLETE**: All numbered gray tokens (gray-50 through gray-900) have been removed from the theme system
- **✅ CONSISTENT**: All 9 theme variations now use identical semantic token names that match their visual appearance
- **✅ BULLETPROOF**: No more confusion where numbered grays invert between light and dark themes

**Current Semantic Color Tokens (7 Total)**:
  - `background` - Page background color
  - `container` - Card/container background (slightly elevated from background)
  - `foreground` - Main text color
  - `light-gray` - Subtle backgrounds, light borders
  - `gray` - Stronger borders, dividers, secondary text
  - `primary` - Main accent color
  - `white` - Pure white (when needed)

**Semantic Token Color Mapping by Theme Variation**:

| Theme | background | white | container | foreground | gray | light-gray | primary |
|-------|------------|-------|-----------|------------|------|------------|---------|
| **Default (theme.json)** | `#fafafa` | `#ffffff` | `#ffffff` | `#000000` | `#666666` | `#e5e5e5` | `#0070f3` |
| **Dark Theme** | `#1e2021` | `#ffffff` | `#2a2a2a` | `#FBF1C7` | `#4C4641` | `#333230` | `#ff335f` |
| **Linen Theme** | `#faf3ea` | `#ffffff` | `#fdf9f3` | `#383a3c` | `#6c757d` | `#f5eadd` | `#ff335f` |

*Note: Theme variations marked as "inherited" use the default theme.json colors. This demonstrates how the semantic token system provides consistent naming while allowing theme-specific color customization.*

**Why This System Works**:
- Eliminates confusion where `gray-900` was actually light cream in dark themes
- Prevents white-on-white and contrast issues across all theme variations
- Makes code self-documenting and maintainable
- Ensures developers can trust color names to match their appearance
- Provides consistent visual hierarchy: `background` < `container` < `light-gray` < `gray` < `foreground`

**Migration Complete**:
```css
/* ❌ REMOVED - Numbered grays that inverted in dark themes */
.element { background: var(--wp--preset--color--gray-900); }
.element { background: var(--wp--preset--color--gray-50); }

/* ✅ CURRENT - Semantic tokens that work across all themes */
.element { background: var(--wp--preset--color--foreground); }
.element { background: var(--wp--preset--color--light-gray); }
```

**Pattern Color Examples**:
```html
<!-- ✅ CORRECT - Uses semantic tokens that respect style variations -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background-color has-text-color has-background" href="#">Button</a></div>

<!-- ❌ WRONG - Uses theme-specific colors that break style variations -->
<div class="wp-block-button"><a class="wp-block-button__link has-giovanni-blue-background-color has-background-color has-text-color has-background" href="#">Button</a></div>
```

**Why This Matters**:
- Ensures patterns work with all 3 theme style variations
- Prevents color bleeding between style variations
- Maintains design system consistency
- Allows users to properly customize colors

**Color System Usage**:
- Always use `var(--wp--preset--color--name)` format
- Never use hardcoded hex colors in CSS
- Ensure proper contrast ratios
- Support both light and dark variants

### CSS Architecture

**Custom Properties Pattern**:
```css
/* ✅ CORRECT - Uses theme color system */
.wp-block-button.is-style-ghost .wp-block-button__link:hover {
    background: var(--wp--preset--color--gray-50);
    color: var(--wp--preset--color--foreground);
}

/* ❌ WRONG - Hardcoded colors break theme variations */
.wp-block-button.is-style-ghost .wp-block-button__link:hover {
    background: #f8f8f8;
    color: #000000;
}
```

**Responsive Design Pattern**:
```css
/* Mobile-first approach with fluid sizing */
.wp-block-group.is-style-card {
    padding: clamp(1rem, 4vw, 2rem);
    border-radius: var(--wp--custom--border-radius--lg);
}
```

## Custom Functionality

### Shortcodes Available
- `[giovanni_posts_by_month]`: Monthly grouped post listing
- Additional shortcodes documented in `inc/shortcodes.php`

### ACF Integration

The Giovanni theme includes comprehensive ACF integration with future-proof design for theme renaming.

**Features**:
- **Safe Field Retrieval**: Functions that won't break when ACF is deactivated
- **Field Type Support**: Text, image, URL, repeater, WYSIWYG, select, and more
- **Automatic Rendering**: Field groups and individual fields with type detection
- **Error Handling**: Comprehensive logging and graceful degradation
- **Security**: Input validation and output sanitization

**Available Functions**:

**Core Functions:**
- `giovanni_get_field($field_name, $post_id)` - Safe field retrieval
- `giovanni_has_field($field_name, $post_id)` - Check if field exists
- `giovanni_is_acf_active()` - Check if ACF plugin is available

**Display Functions:**
- `giovanni_display_text_field($field_name, $wrapper_class, $post_id, $wrapper_tag)`
- `giovanni_display_image_field($field_name, $size, $wrapper_class, $post_id, $image_attrs)`
- `giovanni_display_url_field($field_name, $link_text, $link_attrs, $wrapper_class, $post_id)`
- `giovanni_display_repeater($field_name, $template_callback, $wrapper_class, $post_id)`

**Field Group Functions:**
- `giovanni_render_field_group($group_key, $wrapper_class, $post_id)` - Render entire field group
- `giovanni_has_field_group($group_key, $post_id)` - Check if field group exists

**Usage Examples:**

**Basic Field Display:**
```php
// Display a text field with wrapper
echo giovanni_display_text_field('hero_title', 'hero-title-class');

// Display an image field
echo giovanni_display_image_field('featured_image', 'large', 'image-wrapper');

// Display a URL as a link
echo giovanni_display_url_field('website_url', 'Visit Website', ['target' => '_blank']);
```

**Repeater Field Example:**
```php
// Custom callback for repeater rows
$gallery_callback = function($row, $index) {
    return '<div class="gallery-item">' . 
           giovanni_display_image_field('image', 'medium', '', $row) .
           giovanni_display_text_field('caption', 'caption', $row) .
           '</div>';
};

// Display repeater
echo giovanni_display_repeater('gallery', $gallery_callback, 'gallery-grid');
```

**Field Group Rendering:**
```php
// Render entire field group automatically
echo giovanni_render_field_group('group_hero_fields', 'hero-section');
```

**Future-Proof Theme Renaming:**

The ACF integration is designed to handle theme name changes seamlessly:

**When Renaming Theme:**
1. Update theme name in `style.css` header comment
2. Error logs will automatically use new theme name
3. All ACF functions continue working without changes

**Function Prefix Management:**
- Functions currently use `giovanni_` prefix
- Update `giovanni_get_theme_prefix()` function if changing prefixes
- Consider adding function aliases for backward compatibility

**No Impact Areas:**
- ACF field names/keys (set by users in ACF interface)
- Field retrieval logic (uses ACF's native functions)
- CSS classes (auto-generated from field names)

### Performance Features
- Optimized asset loading
- Efficient query patterns
- Cache-friendly implementation
- Documented in `inc/performance.php`

## Testing & Quality Assurance

### Required Testing Checklist
When making changes to Giovanni:

- [ ] Test all 3 theme style variations (Default, Dark, Linen)
- [ ] **Test pattern colors with different style variations** (ensure no color bleeding)
- [ ] **Verify semantic color token naming** (color names match actual appearance)
- [ ] **Test semantic font size tokens** (ensure consistent typography across all themes)
- [ ] **Verify no hardcoded font sizes** (all use semantic tokens: xs, sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl, 8xl)
- [ ] Verify responsive behavior (mobile to desktop)
- [ ] **Test system-aware dark mode** (responsive-mobile.css)
- [ ] **Test touch device optimizations** (44px touch targets)
- [ ] Check accessibility compliance
- [ ] Test with/without ACF plugin
- [ ] Validate HTML and CSS
- [ ] Test block pattern insertion
- [ ] Verify block style variations work
- [ ] Check color contrast in both light and dark modes
- [ ] Test touch interactions and focus states on mobile
- [ ] Verify Giovanni Blue → Red transition in dark/linen themes

### Common Issues & Solutions

**Block Styles Not Appearing**:
- Check style registration names match CSS classes exactly
- Verify CSS files are properly enqueued
- Clear block style cache in `block-helpers.php`

**Pattern Categories Missing**:
- Ensure pattern categories are registered on `init` hook
- Check category names match pattern declarations
- Verify `register_block_pattern_category` function exists

**Pattern Colors Not Respecting Style Variations**:
- Check pattern files for hardcoded color references (`giovanni-blue`, `#0070f3`)
- Replace with semantic tokens (`primary`, `secondary`, etc.)
- Test with Linen theme to verify red colors appear instead of blue
- Clear WordPress cache and refresh Site Editor

**Style Variations Breaking**:
- Replace hardcoded colors with CSS custom properties
- Test all color combinations
- Check dark mode compatibility

**Semantic Color Token Naming**:
- Ensure color names in patterns match their actual visual appearance in all theme variations
- Test with all 9 style variations to verify consistency
- Clear WordPress cache and refresh Site Editor

**Arrow Button Animation Issues**:
- Check arrow positioning in `core-button.css` (should have proper padding-right spacing)
- Verify arrow animation uses smooth translateX transitions
- Ensure hover states include proper color, transform, and box-shadow properties
- Test arrow visibility across all 3 theme variations
- Clear browser cache to see CSS changes

**Mobile Padding and Layout Issues**:
- All templates use `spacing-6` (1.125rem-1.5rem) for mobile padding, not `spacing-4` (0.75rem-1rem)
- Check template files: `page.html`, `single.html`, `index.html`, `search.html`, `404.html`, `home.html`, `header.html`
- Arrow buttons have mobile-specific responsive styles in `responsive-mobile.css`
- Test on actual mobile devices, not just desktop browser resize
- Ensure content isn't touching screen edges on small screens

**Misleading Color Token Names**:
- Check for numbered gray systems that invert in dark themes (gray-900 being light)
- Replace confusing numbered grays with semantic tokens (foreground, background, light-gray)
- Verify color names match their actual appearance across all theme variations
- Update CSS to use semantic tokens instead of numbered systems
- Test thoroughly to ensure no white-on-white or contrast issues

**Hardcoded Font Sizes**:
- Replace hardcoded `fontSize` values with semantic tokens (`fontSize="lg"` not `"fontSize":"1.125rem"`)
- Remove clamp() functions from patterns (`fontSize="2xl"` not `"fontSize":"clamp(1.375rem, 4vw, 1.75rem)"`)
- Fix style attribute font sizes (`fontSize="md"` not `style="font-size: 1rem"`)
- Ensure consistent typography hierarchy across all theme variations
- Test font scaling with all 9 style variations to verify consistency

## Quick Reference

### Essential Commands
```bash
# Find all pattern files
find patterns/ -name "*.php" | sort

# Search for specific block styles
grep -r "is-style-" assets/styles/

# Find hardcoded color references in patterns
find patterns/ -name "*.php" -exec grep -l "giovanni-blue\|#0070f3" {} \;

# Find hardcoded font sizes in patterns
find patterns/ -name "*.php" -exec grep -l "fontSize.*[0-9].*rem\|fontSize.*clamp" {} \;

# Replace hardcoded colors with semantic tokens (example)
find patterns/ -name "*.php" -exec sed -i '' 's/"backgroundColor":"giovanni-blue"/"backgroundColor":"primary"/g' {} \;

# Check theme.json syntax
wp theme validate giovanni

# List all registered patterns
wp pattern list
```

### Key Files to Check When Troubleshooting
1. `theme.json` - Core configuration
2. `inc/block-helpers.php` - Block styles and patterns
3. `inc/enqueue-assets.php` - Asset loading
4. `assets/styles/` - Block-specific CSS
5. `functions.php` - Theme initialization

## Centralized Shadow System Architecture

**CRITICAL: Giovanni uses a centralized shadow system to prevent nested group block shadow overlap (the "grey container" issue).**

### ✅ CENTRALIZED SHADOW SYSTEM:

```css
/* All group blocks that need shadows - unified approach */
.wp-block-group[class*="is-style-"],
.wp-block-group.has-container-background-color,
.wp-block-group.has-background {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    transition: var(--giovanni-transition-base);
}

/* Hover effects for all shadowed group blocks */
.wp-block-group[class*="is-style-"]:hover,
.wp-block-group.has-container-background-color:hover,
.wp-block-group.has-background:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    transform: translateY(-2px);
}

/* NESTED GROUP OVERRIDE - Remove shadows from nested group blocks */
.wp-block-group .wp-block-group {
    box-shadow: none !important;
}

.wp-block-group .wp-block-group:hover {
    box-shadow: none !important;
    transform: none !important;
}
```

### ✅ SPECIAL CASES REQUIRING `!important`:

**1. Animated Cards Exception** - `hover-cards` pattern needs shadows and animations:
```css
/* EXCEPTION: Allow hover-cards to have shadows and animations */
.hover-cards > .wp-block-group {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05) !important;
}

.hover-cards > .wp-block-group:nth-child(odd):hover {
    transform: scale(1.03) rotate(1.5deg) !important;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08) !important;
}

.hover-cards > .wp-block-group:nth-child(even):hover {
    transform: scale(1.03) rotate(-1.5deg) !important;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08) !important;
}
```

**2. Pill Button Styling** - Override WordPress default sizing and colors:
```css
.giovanni-no-shrink {
    font-size: 0.65rem !important;
    padding: 2px 10px !important;
}

.giovanni-no-shrink p {
    color: var(--wp--preset--color--container, #ffffff) !important;
}
```

**3. Background Color Contrast** - Ensure proper card elevation:
```css
.hover-cards {
    background: var(--wp--preset--color--background, #fafafa) !important;
}
```

### ✅ SHADOW SYSTEM BENEFITS:

- **Prevents grey overlay**: Nested group blocks automatically lose shadows
- **Consistent shadow values**: All shadows use unified opacity values (0.05, 0.06, 0.08)
- **Smart exceptions**: `hover-cards` pattern gets special treatment for animations
- **Theme-aware**: Uses CSS custom properties for theme variation compatibility
- **Performance optimized**: Fewer CSS rules to evaluate, better rendering performance
- **Maintainable**: Only one place to modify shadow behavior

### ✅ MAINTENANCE GUIDELINES:

- **Before removing group styles**: Audit all patterns for usage first
- **Shadow modifications**: Only edit the centralized system, not individual styles
- **New patterns**: Will automatically inherit proper shadow behavior
- **`!important` usage**: Only use for special cases documented above
- **Testing**: Always test with nested group blocks to ensure no grey overlay
- **Pattern validation**: Test with nested group blocks to ensure no grey overlay

### 🔧 TROUBLESHOOTING: Random Grey Colors

**Problem**: Content appears darker/greyer than expected, especially in nested containers or cards. The issue seems random and cache clearing doesn't fix it.

**Root Cause**: Shadow overlap from nested group blocks creating compounding darkness.

**Diagnostic Steps**:
1. **Inspect Element** - Look for multiple `box-shadow` declarations
2. **Check HTML Structure** - Look for nested `.wp-block-group` elements
3. **Verify CSS Specificity** - Ensure centralized system rules aren't being overridden

**Common Scenarios**:
- **Pattern with nested groups**: Content inside cards appearing grey
- **Plugin conflicts**: Other plugins adding shadows to group blocks
- **Theme variation issues**: Custom variations not respecting shadow system
- **WordPress editor**: Block editor showing grey overlay in preview

**Quick Fixes**:
```css
/* Emergency fix: Force remove shadows from specific problematic containers */
.problematic-container .wp-block-group {
    box-shadow: none !important;
}

/* Or target specific pattern */
.pattern-name .wp-block-group .wp-block-group {
    box-shadow: none !important;
}
```

**Permanent Solution**:
1. **Identify the pattern** causing the issue
2. **Check for nested group blocks** in the pattern HTML
3. **Verify centralized system** is being applied correctly
4. **Add specific override** if needed (document as special case)
5. **Test with nested group blocks** to verify fix

**Prevention**:
- Always use the centralized shadow system
- Test all new patterns with nested group blocks
- Never add individual shadow declarations to group styles
- Use semantic color tokens to ensure proper contrast

## Development History & Architecture Notes

**Giovanni v1.7.2** represents a fully refactored, modern FSE theme that has been through comprehensive restructuring:

### **Recent Fixes & Improvements**
- ✅ **Complete Numbered Gray System Removal**: Successfully eliminated all numbered gray tokens (gray-50 through gray-900) from theme system, replacing with semantic tokens that remain consistent across all 3 theme variations
- ✅ **Arrow Button Animation Fix**: Resolved wonky arrow button behavior with improved positioning, smoother animations, and proper hover/focus states
- ✅ **Mobile Padding Layout Fix**: Updated all templates to use `spacing-6` instead of `spacing-4` for proper mobile padding, preventing content from being too close to screen edges
- ✅ **Mobile Arrow Button Optimization**: Added responsive styles for arrow buttons on small screens to prevent overflow and improve usability
- ✅ **Semantic Color Token Migration**: Eliminated misleading numbered gray systems, implemented consistent semantic token naming
- ✅ **Mobile Navigation Optimization**: Fixed touch targets and background contrast issues across all theme variations
- ✅ **Semantic Font Size System Implementation**: Converted all hardcoded font sizes to semantic tokens (xs, sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl, 8xl) across all templates and patterns for consistent typography hierarchy
- ✅ **Post Title Typography Fix**: Increased font sizes in post lists and patterns from `fontSize="lg"` to `fontSize="xl"` for better readability
- ✅ **Grey Background Issue Fix**: Resolved grey background appearance on hover for certain blocks by updating CSS in `core-group.css` to maintain a white background for blog roll cards
- ✅ **Asset Organization Cleanup**: Removed development artifacts and test files, organized CSS into proper components/ and blocks/ structure

### **Completed Refactoring (Historical Context)**
- ✅ **Modular Architecture**: Migrated from monolithic `functions.php` to organized `/inc` structure
- ✅ **File-Based Patterns**: Converted all manual pattern registrations to modern `.php` pattern files  
- ✅ **Block Style Externalization**: Moved all block styles to dedicated CSS files in `/assets/styles/`
- ✅ **Performance Optimization**: Implemented efficient asset loading and query patterns
- ✅ **WordPress Standards Compliance**: Full adherence to WordPress coding standards and best practices

### **Current State**
Giovanni is a production-ready theme with clean, maintainable code architecture that serves as a model for future Medici Collection themes.

This documentation provides comprehensive context for working with the Giovanni theme efficiently and maintaining its quality standards.

### Grey Background Issue Fix
The grey background issue was identified as a problem where certain blocks displayed a grey background on hover, which was not consistent with the intended design. This was traced back to a `box-shadow` and background color applied on hover in the CSS.

#### Solution
To resolve this, the CSS in `core-group.css` was updated to remove the grey background and ensure a white background is maintained for blog roll cards. This involved adjusting the `box-shadow` properties and ensuring that the hover state did not introduce any unintended background colors.

#### Implementation Details
- **File Affected**: `assets/styles/core-group.css`
- **Changes Made**: Removed the grey background and adjusted `box-shadow` properties to maintain a consistent white background on hover.
- **Testing**: The changes were tested across all theme variations to ensure consistency and adherence to the design system.

This fix ensures that the visual appearance of the blocks aligns with the theme's modern and minimal design philosophy, providing a clean and professional aesthetic.