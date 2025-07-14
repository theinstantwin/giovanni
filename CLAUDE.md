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
- `lg` through `display`: Progressive scale to 16rem

**Spacing Scale** (Fluid):
- Scale from 0-40 using clamp() for responsive spacing
- Base unit: 0.125rem (2px) scaling up to 10rem (160px)

**Color System**:
- **Primary**: `#0070f3` (Giovanni Blue)
- **Foreground**: `#000000` (main text)
- **Background**: `#fafafa` (page background)
- **Gray Scale**: 50-900 comprehensive neutral palette
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
- `ghost`: Transparent with underline
- `dark`: Dark background variant
- `arrow-light`: Button with arrow icon (light)
- `arrow-dark`: Button with arrow icon (dark)

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

### Theme Style Variations (9 Variations)
The theme includes complete style variations for different aesthetics:

1. **Default Giovanni**: Clean, modern design
2. **Dark Theme**: Dark mode optimized
3. **Condensed Modern**: Tighter spacing, condensed typography
4. **Display Bold**: Large, bold typography
5. **GitHub Dark**: Developer-focused dark theme
6. **Linen Theme**: Warm, textured background
7. **Minimal Mono**: Monospace typography focus
8. **Serif Editorial**: Editorial/magazine style
9. **Tech Neon**: High-tech, neon accents
10. **Warm Earth**: Earthy, organic colors

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
├── styles/                    # Theme variations (9 styles)
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
└── shortcodes.css            # Custom shortcode styles
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
- Test with all 9 theme variations
- Ensure accessibility compliance

**Pattern Development**:
- Use branded category prefixes (`giovanni-[category]`)
- Follow established pattern naming convention
- Include proper metadata and descriptions
- Test responsive behavior

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

- [ ] Test all 9 theme style variations
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
- [ ] Verify Giovanni Blue → Red transition in dark mode

### Common Issues & Solutions

**Block Styles Not Appearing**:
- Check style registration names match CSS classes exactly
- Verify CSS files are properly enqueued
- Clear block style cache in `block-helpers.php`

**Pattern Categories Missing**:
- Ensure pattern categories are registered on `init` hook
- Check category names match pattern declarations
- Verify `register_block_pattern_category` function exists

**Style Variations Breaking**:
- Replace hardcoded colors with CSS custom properties
- Test all color combinations
- Check dark mode compatibility

## Quick Reference

### Essential Commands
```bash
# Find all pattern files
find patterns/ -name "*.php" | sort

# Search for specific block styles
grep -r "is-style-" assets/styles/

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

## Development History & Architecture Notes

**Giovanni v1.7.2** represents a fully refactored, modern FSE theme that has been through comprehensive restructuring:

### **Completed Refactoring (Historical Context)**
- ✅ **Modular Architecture**: Migrated from monolithic `functions.php` to organized `/inc` structure
- ✅ **File-Based Patterns**: Converted all manual pattern registrations to modern `.php` pattern files  
- ✅ **Block Style Externalization**: Moved all block styles to dedicated CSS files in `/assets/styles/`
- ✅ **Performance Optimization**: Implemented efficient asset loading and query patterns
- ✅ **WordPress Standards Compliance**: Full adherence to WordPress coding standards and best practices

### **Current State**
Giovanni is a production-ready theme with clean, maintainable code architecture that serves as a model for future Medici Collection themes.

This documentation provides comprehensive context for working with the Giovanni theme efficiently and maintaining its quality standards.