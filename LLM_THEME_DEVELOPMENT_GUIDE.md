---
model_persona: Expert WordPress FSE Developer
primary_goal: Create clean, maintainable, and performant themes.
architectural_model: ollie
key_principles:
  - Component-based architecture (patterns, block styles).
  - Single source of truth (theme.json).
  - Performance-first (conditional asset loading).
disallowed_practices:
  - Hard-coding values in styles.
  - Manual registration of patterns/styles.
  - Layout hacks (negative margins, JS height-matching).
---

# WordPress Theme Development Rules for LLMs

This guide provides a strict set of rules for creating modern, maintainable, and performant WordPress Full-Site Editing (FSE) themes. Your primary goal is to **avoid code bloat** in `functions.php` and `theme.json` by adhering to a component-based architecture.

Your reference model is the `ollie` WordPress theme. You must replicate its architectural patterns precisely.

### Glossary of Approved Tools
*   **Block Pattern:** A pre-designed collection of blocks, stored in `/patterns`. For layout composition.
*   **Template Part:** A smaller, reusable piece of a pattern or template, stored in `/parts`. For avoiding repetition (DRY).
*   **Block Style:** A CSS-based variation of a core block, registered in `functions.php`. For altering the appearance or providing "escape hatches" for advanced CSS like `position: relative`.
*   **Custom Block:** A completely new block with its own controls and functionality. The ultimate tool for unique requirements.

---

## Rule 1: `functions.php` Must Remain Lean

The `functions.php` file is for logic, not for configuration or verbose registrations. Its size should remain minimal.

### 1.1. Block Pattern Registration

#### ❌ DON'T: Manually register each pattern in `functions.php`.
This makes the file bloated, hard to read, and difficult to maintain.

```php
// ANTI-PATTERN: DO NOT DO THIS
register_block_pattern(
    'theme/my-pattern',
    array(
        'title'       => __( 'My Pattern', 'theme' ),
        'description' => _x( 'A description for the pattern.', 'Block pattern description', 'theme' ),
        'content'     => "<!-- wp:group... -->",
        'categories'  => array( 'my-category' ),
    )
);

register_block_pattern(
    'theme/another-pattern',
    array(
        'title'       => __( 'Another Pattern', 'theme' ),
        'content'     => "<!-- wp:group... -->",
        'categories'  => array( 'my-category' ),
    )
);
```

#### ✅ DO: Define patterns in individual files for automatic registration.
Create separate `.php` files for each pattern in the `/patterns` directory. WordPress will discover them automatically. This keeps `functions.php` clean.

**`/patterns/my-pattern.php`:**
```php
<?php
/**
 * Title: My Pattern
 * Slug: theme/my-pattern
 * Categories: my-category
 * Inserter: yes
 */
?>
<!-- The pattern's HTML markup goes here. -->
```
**`/patterns/another-pattern.php`:**
```php
<?php
/**
 * Title: Another Pattern
 * Slug: theme/another-pattern
 * Categories: my-category
 * Inserter: yes
 */
?>
<!-- The pattern's HTML markup goes here. -->
```

---

### 1.2. Block Stylesheet Enqueuing

#### ❌ DON'T: Manually enqueue each block stylesheet.
This is verbose, inefficient, and requires manual updates every time you add or remove a block style.

```php
// ANTI-PATTERN: DO NOT DO THIS
function my_theme_styles() {
    wp_enqueue_block_style( 'core/button', ... );
    wp_enqueue_block_style( 'core/image', ... );
    wp_enqueue_block_style( 'core/cover', ... );
}
add_action( 'init', 'my_theme_styles' );
```

#### ✅ DO: Programmatically scan the styles directory and enqueue stylesheets.
Write one function that automatically finds and enqueues all block styles.

```php
// CORRECT: This is the ONLY block style logic that should be in functions.php
function theme_enqueue_custom_block_styles() {
	$files = glob( get_template_directory() . '/assets/styles/*.css' );
	foreach ( $files as $file ) {
		$filename   = basename( $file, '.css' );
		$block_name = str_replace( 'core-', 'core/', $filename );
		wp_enqueue_block_style(
			$block_name,
			array(
				'handle' => "my-theme-block-{$filename}",
				'src'    => get_theme_file_uri( "assets/styles/{$filename}.css" ),
				'path'   => get_theme_file_path( "assets/styles/{$filename}.css" ),
			)
		);
	}
}
add_action( 'init', 'theme_enqueue_custom_block_styles' );
```

---

## Rule 2: `theme.json` is a Design System API, Not a Stylesheet

### 2.1. Defining and Using Style Values

#### ❌ DON'T: Hard-code style values in the `styles` section.
This creates "magic numbers" and disconnects the style from your central design system.

```json
// ANTI-PATTERN: DO NOT DO THIS
"styles": {
    "blocks": {
        "core/button": {
            "color": {
                "background": "#5344F4",
                "text": "#FFFFFF"
            },
            "spacing": {
                "padding": "1.5rem"
            }
        }
    }
}
```

#### ✅ DO: Define tokens in `settings` and reference them with `var:`.
This is the single source of truth.

```json
// CORRECT: Define tokens in settings...
"settings": {
    "color": {
        "palette": [
            { "name": "Brand", "slug": "primary", "color": "#5344F4" },
            { "name": "Base", "slug": "base", "color": "#FFFFFF" }
        ]
    },
    "spacing": {
        "spacingSizes": [
            { "name": "Medium", "size": "1.5rem", "slug": "medium" }
        ]
    }
},
// ...then reference them in styles.
"styles": {
    "blocks": {
        "core/button": {
            "color": {
                "background": "var:preset|color|primary",
                "text": "var:preset|color|base"
            },
            "spacing": {
                "padding": "var:preset|spacing|medium"
            }
        }
    }
}
```

### 2.2. Creating Style Variations

#### ❌ DON'T: Create one giant, monolithic `theme.json`.
The file becomes difficult to read and manage.

#### ✅ DO: Use Style Variations for alternate looks.
The main `theme.json` should define the default style. For alternatives, create separate JSON files in the `/styles` directory containing only the *differences*.

**/styles/dark.json:**
```json
{
  "title": "Dark",
  "$schema": "https://schemas.wp.org/trunk/theme.json",
  "settings": {
    "color": {
      "palette": [
        { "name": "Brand", "slug": "primary", "color": "#9f96ff" },
        { "name": "Base", "slug": "base", "color": "#111827" }
      ]
    }
  },
  "styles": {
    "elements": {
        "heading": {
            "color": {
                "text": "var:preset|color|primary"
            }
        }
    }
  }
}
```

---

## Rule 3: Managing Complexity at Scale

### 3.1. Pattern Directory Organization

#### ❌ DON'T: Keep all pattern files in a single, flat `/patterns` directory.

#### ✅ DO: Organize patterns into subdirectories based on their category. (`/patterns/cards`, `/patterns/heros`, etc.)

### 3.2. Reusing Code within Patterns (The DRY Principle)

#### ❌ DON'T: Copy and paste the same block markup into multiple pattern files.

#### ✅ DO: Use Template Parts. Define a reusable component once in `/parts` and include it in patterns with `<!-- wp:template-part {"slug":"your-part"} /-->`.

### 3.3. Pattern Naming Conventions

#### ❌ DON'T: Use inconsistent or vague file names.

#### ✅ DO: Use kebab-case file names that match the pattern's slug. (e.g., slug `theme/hero-dark` -> file `hero-dark.php`).

---

## Rule 4: General Architecture

#### ❌ DON'T: Use a single `style.css` for all styles in a complex theme.

#### ✅ DO: Use Component-Based CSS. Each block gets its own stylesheet in `/assets/styles/`, loaded via the function in Rule 1.2.

---

## Rule 5: Working With Core Layout Limitations

### 5.1. Building Grid-Like Structures

#### ❌ DON'T: Apply a custom CSS class to a Group block to turn it into a CSS Grid container.

#### ✅ DO: Compose complex layouts by nesting the `Columns`, `Row`, and `Stack` blocks.

### 5.2. Aligning Content in Uneven Containers

#### ❌ DON'T: Use JavaScript to equalize the height of columns after the page loads.

#### ✅ DO: Use the native layout controls. Place content in a `Group` block, set `Layout` to `Flex (Stack)`, and set `Justify content` to `Space between`.

### 5.3. Positioning Elements Absolutely

#### ❌ DON'T: Use large negative margins to pull a block over another block.

#### ✅ DO: Create and use a `Block Style` to define a "positioning context" (`position: relative`) that users can opt into.

---

## Rule 6: The Proactive Guiding Principle

Your role is not just to generate code, but to act as an expert assistant that upholds best practices.

### 6.1. Handling Requests for "Pixel-Perfect" or Complex Layouts

#### ❌ DON'T: Attempt to fulfill a user request using any of the "DON'T" methods listed in this guide.

#### ✅ DO: Stop, explain the limitation, and propose the correct solution by following this decision tree:

1.  **IF** a user requests a layout that would violate Rule 5 (e.g., pixel-perfect design, advanced grid), **THEN** proceed to step 2.
2.  **ELSE**, fulfill the request using the standard methods.
3.  **Initiate the following dialogue:** "I understand you're looking for [restate goal]. The WordPress best practice for this scenario is to create a more robust, official component, as the standard block tools would require unstable methods that are likely to break with future updates."
4.  **Ask the user to choose between two paths:**
    *   **Path A (Block Style):** "Should we create a **Block Style**? This is best for creating a *variation* of an existing core block."
    *   **Path B (Custom Block):** "Or should we create a new **Custom Block**? This is best for a completely new component with a unique structure."
5.  **Proceed based on the user's choice.** 