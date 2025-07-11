### **Operational Guide: Curating & Refactoring the `giovanni` Theme**

**Objective:** To safely curate and systematically refactor the `giovanni` WordPress theme to fully comply with modern best practices as defined in the `LLM_THEME_DEVELOPMENT_GUIDE.md`.

**Your Primary Directive:** You will act as an expert developer executing a critical curation and refactoring task. Your first task is to help remove unwanted components; your second is to refactor the remaining components.

The process is divided into two phases: **Curation & Deletion** and **Refactoring Execution**.

---

### **Phase 1: Curation & Deletion (The "Great Pruning")**

Before refactoring, we will remove all unnecessary components. This reduces the scope of work and cleans the theme.

**1.1. The Curated Manifest**

This is the master list of all components and the action to be taken for each. You will use this list to guide your work. Items marked `DELETE` will be removed in this phase. Items marked `KEEP` will be refactored in Phase 2.

#### **Block Style Manifest**
| Block Name        | Style Name            | Action   |
| ----------------- | --------------------- | -------- |
| `core/button`     | `ghost`               | **KEEP** |
| `core/button`     | `dark`                | **KEEP** |
| `core/button`     | `arrow-light`         | **KEEP** |
| `core/button`     | `arrow-dark`          | **KEEP** |
| `core/image`      | `polaroid`            | **KEEP** |
| `core/image`      | `polaroid-tape`       | **DELETE** |
| `core/image`      | `polaroid-static`     | **KEEP** |
| `core/image`      | `rounded`             | **KEEP** |
| `core/navigation` | `underline`           | **KEEP** |
| `core/navigation` | `button`              | **KEEP** |
| `core/navigation` | `pill`                | **KEEP** |
| `core/navigation` | `minimal-dots`        | **DELETE** |
| `core/quote`      | `book-quote`          | **KEEP** |
| `core/quote`      | `personal-reflection` | **KEEP** |
| `core/quote`      | `book-quote-alt`      | **KEEP** |
| `core/quote`      | `reflection`          | **KEEP** |

#### **Block Pattern Manifest**
| Category                  | Pattern Slug                | Action   |
| ------------------------- | --------------------------- | -------- |
| **`giovanni-author`**     | `giovanni/author-bio-detailed`| **KEEP** |
|                           | `giovanni/author-bio-simple`  | **KEEP** |
|                           | `giovanni/author-box-with-image`| **KEEP** |
| **`giovanni-card`**       | `giovanni/card-author-bio`    | **KEEP** |
|                           | `giovanni/card-event`         | **KEEP** |
|                           | `giovanni/card-project`       | **KEEP** |
|                           | `giovanni/card-testimonial`   | **KEEP** |
| **`giovanni-content`**    | `giovanni/content-faq`        | **KEEP** |
|                           | `giovanni/content-features-list`| **KEEP** |
|                           | `giovanni/content-process-steps`| **KEEP** |
|                           | `giovanni/content-timeline`   | **KEEP** |
|                           | `giovanni/content-stacked-images`| **KEEP** |
| **`giovanni-form`**       | `giovanni/form-contact`       | **DELETE** |
|                           | `giovanni/form-newsletter`    | **DELETE** |
|                           | `giovanni/form-search`        | **DELETE** |
| **`giovanni-header`**     | `giovanni/header-centered`    | **DELETE** |
|                           | `giovanni/header-split`       | **DELETE** |
|                           | `giovanni/header-standard`    | **DELETE** |
|                           | `giovanni/header-minimalist`  | **DELETE** |
| **`giovanni-hero`**       | `giovanni/hero-image-background`| **KEEP** |
|                           | `giovanni/hero-simple`        | **KEEP** |
|                           | `giovanni/hero-split-image`   | **KEEP** |
|                           | `giovanni/hero-video`         | **KEEP** |
| **`giovanni-personal`**   | `giovanni/personal-about-me`  | **KEEP** |
|                           | `giovanni/personal-contact-details`| **KEEP** |
|                           | `giovanni/personal-resume`    | **DELETE** |
| **`giovanni-posts`**      | `giovanni/posts-featured`     | **KEEP** |
|                           | `giovanni/posts-grid`         | **KEEP** |
|                           | `giovanni/posts-list`         | **KEEP** |
|                           | `giovanni/posts-recent`       | **KEEP** |

**1.2. Executing Deletion Tasks**

For each item marked `DELETE`, you will perform a safe removal using the **Safe Refactoring Loop**.
*   **Action:** The human will prompt you with, "Delete the `polaroid-tape` style." You will then locate the `register_block_style()` call for `polaroid-tape` in `functions.php` and provide only the necessary changes to delete that entire registration block.
*   **Testing:** The human will apply the change and test to ensure the theme still works and that the deleted item no longer appears in the editor.
*   **Committing:** The change will be committed with a message like `refactor(styles): Remove 'polaroid-tape' style`.

---

### **Phase 2: Refactoring Execution**

After all `DELETE` tasks are completed and committed, you will proceed to refactor the remaining `KEEP` items from the manifest.

You will follow the **Safe Refactoring Loop** as previously defined for every pattern and style on the `KEEP` list:
1.  **Isolate the Work (New Branch)**
2.  **Execute One Atomic Change** (e.g., "Externalize the `ghost` button style")
3.  **The Validation Protocol (Human-Led Testing)**
4.  **Commit the Change**
5.  **Repeat the Loop** for the next `KEEP` item.