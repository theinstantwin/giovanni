# Giovanni WordPress Theme

A modern, elegant Full Site Editing (FSE) WordPress theme designed for personal blogs, portfolios, and creative professionals. Built entirely with Gutenberg blocks and the WordPress Site Editor with comprehensive block patterns and professional typography.

**Now includes built-in block validation tools!**

## About the Name

Giovanni is named after my nephew, making it the perfect start to my WordPress theme journey. This theme launches my "Medici Collection" - a series of WordPress themes named after members of the influential Medici family of Renaissance Florence. Just as the Medici family fostered creativity, innovation, and artistic excellence, each theme in this collection aims to empower creators and elevate their digital presence.

Giovanni represents the foundation of this collection: elegant, sophisticated, and built for those who appreciate both beauty and functionality in their digital craftsmanship.

## Features

### 🎨 Design & User Experience
- **Full Site Editing (FSE)**: Complete theme built with WordPress Site Editor
- **Gutenberg Native**: All layouts use native WordPress blocks
- **Clean Design**: Minimalist layout with elegant typography
- **Professional Typography**: Inter font family with fluid scaling
- **Dark Mode Support**: Multiple theme variations (Default, Dark, Linen)
- **Responsive Design**: Mobile-first approach with flexible layouts
- **Accessibility Ready**: WCAG compliant with proper color contrast

### 📝 Content & Patterns
- **Comprehensive Block Patterns**: 18 custom patterns for common layouts
- **Hero Section Variations**: Multiple hero layouts for different page types
- **Personal Content Patterns**: Currently Status, Behind the Scenes, Key Takeaways
- **Header Options**: Centered logo and split layout header patterns
- **Author Bio**: Personal connection patterns for building relationships
- **Content Recommendations**: Elegant recommendation cards with ratings

### 🎯 Blog & Portfolio Features
- **Longform Reading**: Optimized typography and spacing for extended reading
- **Advanced Query Patterns**: Enhanced post layouts with newsletter integration
- **Featured Content**: Grid and chronological content display options
- **Popular Posts**: Highlight your best content with engaging patterns
- **Reading Time**: Automatic reading time calculation
- **Social Integration**: Professional social links with hover animations

### 🎨 Block Styles & Customization
- **Button Variations**: Ghost, Dark, Arrow Light, and Arrow Dark styles
- **Image Styles**: Polaroid effects, rounded corners, and static variants
- **Navigation Styles**: Underline, Button, Pill, and Minimal Dots variations
- **Table Styles**: Striped, Minimal, and Bordered (with Giovanni Blue accent)
- **Quote Styles**: Multiple quote block variations for different content types

### 🚀 Performance & Technical
- **Performance Optimized**: Minimal CSS, fast loading, optimized images
- **SEO Friendly**: Clean markup and semantic HTML structure
- **Cross-Browser Compatible**: Tested across modern browsers
- **Widget Areas**: FSE approach with template parts instead of traditional widgets
- **Custom Colors**: Giovanni Blue accent color with theme-aware variations

## Installation

### Method 1: Direct Download (Recommended)
1. **Download**: Click the green "Code" button above and select "Download ZIP"
2. **Install**: In WordPress Admin, go to Appearance > Themes > Add New > Upload Theme
3. **Upload**: Select the downloaded ZIP file and click "Install Now"
4. **Activate**: Click "Activate" to enable the Giovanni theme
5. **Customize**: Use the WordPress Site Editor to customize layouts and patterns

### Method 2: Git Clone (For Developers)
```bash
# Clone to your WordPress themes directory
git clone https://github.com/theinstantwin/giovanni.git
cd giovanni
```

### Method 3: WordPress.org (Coming Soon)
Giovanni will be submitted to the WordPress.org theme directory for one-click installation.

## Block Patterns

Giovanni includes 18 comprehensive block patterns organized into categories:

### Giovanni Author
- **Author Bio**: Personal author bio section for building connections

### Giovanni Content
- **Behind the Scenes**: Process transparency with accent highlights
- **Key Takeaway**: Signal amplification for important points
- **Quick Note**: Conversational marginalia for personal commentary

### Giovanni Header
- **Header Centered Logo**: Minimalist header with centered branding
- **Header Split Layout**: Logo left, navigation right layout

### Giovanni Hero
- **Hero Section**: Main hero pattern for home pages
- **Hero About**: Personal introduction for about pages
- **Hero Portfolio**: Professional showcase for portfolio pages

### Giovanni Personal
- **Currently Status**: Living dashboard showing current activities
- **Recommendation**: Trusted endorsement cards with ratings

### Giovanni Posts
- **Featured Posts Grid**: Showcase your best content
- **Popular Posts**: Highlight trending content
- **Posts by Date**: Chronological content display

## Theme Variations

Giovanni includes three carefully crafted theme variations:

- **Default**: Clean, modern design with Giovanni Blue accents
- **Dark**: Elegant dark mode with warm contrast
- **Linen**: Warm, approachable design with soft tones

## Typography

Giovanni uses the Inter font family with a carefully crafted typographic scale:

- **Base Font Size**: 16px (1rem) for optimal readability
- **Line Height**: 1.75 for comfortable reading
- **Font Scale**: From 0.875rem (small) to 8rem (display)
- **Content Width**: 650px for optimal reading line length

## Color Palette

The theme includes a comprehensive color system, now managed via separate style variation files for enhanced flexibility:

- **Giovanni Blue**: Primary accent color (#0070f3)
- **Gray Scale**: 10 levels from Gray 50 to Gray 900
- **Semantic Colors**: Background, Foreground, and Reading Text
- **Theme Variations**: Each variation now has its own dedicated color palette, accessible via the Site Editor's Styles panel.

## Browser Support

Giovanni is tested and optimized for:

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## WordPress Requirements

- **WordPress**: 6.0 or higher
- **PHP**: 8.0 or higher
- **MySQL**: 5.6 or higher
- **Recommended**: WordPress 6.8+ for optimal FSE experience

## Contributing

We welcome contributions! Please:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## License

Giovanni is licensed under the GPL v2 or later.

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

## Support

For support, please:

1. Search [existing issues](https://github.com/theinstantwin/giovanni/issues)
2. Create a new issue if you need help or found a bug
3. Check the WordPress.org support forums (once theme is approved)

## Changelog

### Version 2.1.4
- Fix author-bio pattern: invalid column width attribute
- Replace "width":"80px" with proper layout style object
- WordPress columns expect percentages in width, not pixel values
- Use style.layout.flexSize instead: {"selfStretch":"fixed","flexSize":"80px"}
- Inline flex-basis:80px remains for actual rendering
- This was causing "Block contains unexpected or invalid content" error


### Version 2.1.3
- Refactor behind-the-scenes pattern: eliminate calc() for full-bleed effect
- Replace complex negative margin calc() with cleaner padding approach
- Parent container: remove left/right/bottom padding (only top padding remains)
- Content blocks: add individual left/right padding as needed
- Tools container: naturally spans full width without negative margins
- Simpler, more maintainable, WordPress-native approach
- No inline calc() = better compatibility and fewer edge cases


### Version 2.1.2
- Fix behind-the-scenes pattern: tools container calc() syntax
- Replace borderColor "subtle" with "light-gray" (semantic token)
- Fix negative margin calc() syntax: calc(0px - var(...)) u2192 calc(var(...) * -1)
- WordPress expects proper CSS calc() syntax for block validation
- Tools container now correctly "bleeds" to edges with negative margins
- Pattern now inserts without block recovery prompt


### Version 2.1.1
- Remove advanced-showcase.php pattern (deprecated)
- Pattern count reduced from 23 to 22 patterns
- No associated CSS files or dependencies to clean up
- Simplifies pattern library and reduces maintenance overhead


### Version 2.1.0
- Fix author-bio pattern: multiple block recovery issues resolved
- Replace borderColor "subtle" with "light-gray" (semantic token)
- Remove invalid image JSON attributes: "width":"80px" and "height":"80px"
- Replace "secondary" color token with "gray" for consistency (5 occurrences)
- Image sizing now handled by inline styles only, not JSON attributes
- All color tokens now use direct semantic tokens from theme.json palette


### Version 2.0.9
- Fix hero-about pattern: replace invalid color tokens with semantic tokens
- Replace "muted-text" with "gray" (3 occurrences - invalid token not in theme.json)
- Replace separator "subtle" background with "light-gray" (invalid background color)
- "subtle" exists only as border color alias, not as background color token
- Pattern now inserts without "unexpected or invalid content" error


### Version 2.0.8
- Fix currently-status pattern block recovery issue
- Add missing border-radius to inline styles on container div
- JSON specified radius but inline styles were missing it
- This mismatch between JSON and HTML triggered block recovery
- Pattern now inserts cleanly without recovery prompt


### Version 2.0.7
- Fix recommendation pattern block recovery issue
- Remove invalid JSON attributes from image block (width, height, aspectRatio)
- WordPress expects numeric values without units in JSON, not strings like "120px"
- Keep sizing in inline styles where WordPress handles them properly
- Pattern now inserts without "Attempt Block Recovery" prompt


### Version 2.0.6
- Fix margin note author color contrast
- Remove opacity: 0.8 from .margin-note-author for better readability
- Improves contrast ratio from ~4.5:1 to ~6.3:1 (meets AAA standard)
- Color still uses semantic gray token for theme variation support


### Version 2.0.5
- Fix margin note pattern: replace all hardcoded spacing with semantic tokens
- Replace 0.5rem with var(--wp--preset--spacing--2)
- Replace 0.75rem with var(--wp--preset--spacing--3)
- Ensures consistent spacing across all theme variations
- Border-radius already using correct semantic tokens


### Version 2.0.4
- Fix recommendation pattern image block configuration
- Add proper width, height, and aspect ratio (3:4) to image
- Add object-fit: cover for consistent image display
- Ensure border-radius applies correctly to image element


### Version 2.0.3
- Audit and fix all giovanni-personal patterns for semantic token usage
- Fix currently-status pattern: replace subtle border with light-gray, reduce margins
- Fix quick-note pattern: replace secondary text color with gray
- Fix pattern-margin-note.css: replace secondary color with gray
- Add pattern CSS files to block editor enqueue for proper editor preview
- Ensure all personal patterns use consistent semantic color tokens


### Version 2.0.2
- Fix recommendation pattern: replaced non-semantic color tokens with semantic tokens
- Update border color from subtle to light-gray for better theme variation support
- Replace secondary text color with gray for consistent color behavior
- Reduce vertical margins from spacing-8 to spacing-5 for better visual balance


### Version 2.0.1
- Fixed Margin Note (quick-note) pattern author attribution color in dark mode
- Changed author text from gray to secondary token for better dark mode visibility
- Added dedicated CSS file for Margin Note pattern (pattern-margin-note.css)
- Enhanced margin note sidebar styling with proper background and border
- Added mobile responsive behavior (stacks vertically below 1024px)
- Improved dark mode support for margin note styling
- Better visual hierarchy with primary color accent border


### Version 2.0.0
- Fixed column spacing and color consistency in Currently Status pattern
- Added dedicated CSS file for Currently Status pattern (pattern-currently-status.css)
- Fixed "Thinking About" heading color inconsistency (now uses primary color like other headings)
- Removed deprecated --wp--style--block-gap inline style
- Added proper mobile responsive behavior for status columns
- Enhanced dark mode support for status dashboard border
- Pattern now properly stacks columns on mobile devices


### Version 1.9.9
- Fixed subtle-border token errors across ALL patterns (15 pattern files affected)
- Changed borderColor from "subtle-border" to "subtle" (correct token name)
- Fixed CSS class names: has-subtle-border-color (correct), has-subtle-background-color (correct)
- Patterns now properly use existing color tokens from theme.json
- Fixes author-bio, behind-the-scenes, currently-status, featured-posts, hero-about, hero-portfolio, key-takeaway, popular-posts, query-newsletter, recommendation, and more


### Version 1.9.8
- Fixed single post meta visibility in dark mode (categories, tags, dates, reading time)
- Fixed image and media caption colors in dark mode
- Added caption element styling to theme.json using secondary token
- Caption colors now adapt properly across all theme variations
- Comprehensive fix for .has-gray-color elements in single post templates


### Version 1.9.7
- Fixed Posts by Date date visibility for BOTH system dark mode AND Dark Theme variation
- Changed date colors from gray to secondary token (adapts to theme)
- Changed arrow icon colors to use secondary token
- Cleaner solution that works universally across all theme variations


### Version 1.9.6
- Fixed date visibility in Posts by Date pattern for dark mode
- Enhanced arrow icon contrast in blog post items
- Improved month header border visibility in dark mode


### Version 1.9.5
- Fixed post meta visibility in dark mode (date, categories, tags now use foreground color)
- Enhanced author bio pattern text visibility in dark mode
- Improved post navigation link contrast in dark mode
- Updated Dark Theme style variation: secondary/muted colors now use foreground for better contrast
- All secondary text now uses the cream/yellow foreground color for better readability
- Fixes apply to both system-aware dark mode and Dark Theme style variation


### Version 1.9.4
- Fixed dark mode accessibility issues in header and navigation
- Improved border contrast using gray token instead of light-gray in dark mode
- Enhanced site title and navigation link visibility in dark mode
- Fixed mobile menu button visibility with proper border colors
- Better hover states for navigation elements in dark mode

### Version 1.9.3
- Fixed color tokens in personal pattern group (recommendation, currently-status, quick-note)
- Fixed borderColor: subtle-border → subtle in recommendation and currently-status patterns
- Removed hardcoded font sizes in quick-note pattern, using semantic tokens instead
- Fixed quick-note color token: muted-text → gray


### Version 1.9.2
- Fixed button styles in hero-section and hero-about patterns (arrow-dark and arrow-light)
- Fixed color tokens in featured-posts-grid and popular-posts patterns (muted-text → gray, subtle-border → subtle)
- Fixed button style in featured-posts-grid (replaced invalid is-style-outline with is-style-ghost)
- Fixed background color classes (has-white-background-color → has-container-background-color)

### Version 1.9.1
- Fixed behind-the-scenes pattern full-bleed behavior (contentSize 640px → 650px)
- Fixed hero-portfolio button styles (replaced invalid is-style-outline with proper arrow-light and ghost styles)
- Fixed block validator bug with files missing trailing newline

### Version 1.7.5
- Refactored theme styles into dedicated JSON files in the 'styles' directory for better organization and Full Site Editing (FSE) compatibility (Default, Linen, and Dark variations).
- Updated theme version to 1.7.5.

### Version 1.0.0
- Initial release of Giovanni theme
- 18 comprehensive block patterns
- 4 theme variations
- Complete FSE implementation
- Professional typography system
- Responsive design optimization
- WordPress.org compliance

---

**Giovanni Theme** - Elegant WordPress design for creative professionals.
