# Revive Integrative Health Theme

Custom classic WordPress theme for Revive Integrative Health — Kirki theme options and Gutenberg blocks.

## WordPress setup

### Option A — `@wordpress/env` (Docker required)

1. Install [Docker Desktop](https://www.docker.com/products/docker-desktop/).
2. From the theme root:

```bash
npm install
npm run sass
npm run build
npm run env:start
```

3. Open http://localhost:8888 — Kirki is installed via `.wp-env.json`.
4. Activate **Revive Integrative Health** under Appearance → Themes.
5. Create pages with slugs `services`, `team`, and `contact`, and assign page templates **Services**, **Our Team**, and **Contact**.
6. Settings → Reading → set a static front page.

### Option B — Local / XAMPP / other

1. Copy this folder into `wp-content/themes/revive-integrative-health`.
2. Install and activate the [Kirki](https://wordpress.org/plugins/kirki/) plugin.
3. Run `npm install && npm run sass && npm run build` locally, then activate the theme.

## Services (hierarchical CPT)

Post type slug: `services` (hierarchical).

| Level | Use |
|-------|-----|
| Parent posts | Pediatric, Specialized, Health & Wellness cards |
| Child posts | List titles on home / Services page; accordion rows on parent single |

- Child singles redirect to the parent (not linked in the UI).
- Parent featured image = card/detail image; excerpt or content = intro.
- Child title = list/accordion label; child content = accordion body.
- Order by menu order, then title.

## Team page (CPT)

The **Our Team** page template loads posts from the `team` custom post type:

| Field | Source |
|-------|--------|
| Name | Post title |
| Photo | Featured image |
| Bio | Post content (falls back to excerpt) |
| Designation / role | Taxonomy `designation` |
| Speciality tags | Taxonomy `speciality` |

Order by **menu order**, then title. Assign the **Our Team** template to your Team page.

## Primary menu (WordPress)

1. Go to **Appearance → Menus**.
2. Create a menu and assign it to **Primary Menu**.
3. For the Services mega dropdown:
   - Add **Services** as a top-level item
   - Under Screen Options, enable **CSS Classes**
   - Add CSS class `mega` on the Services item
   - Nest three column headings under Services (e.g. Pediatric Services, Specialized Services, Health & Wellness Services)
   - Nest the service links under each column heading

Until a Primary Menu is assigned, the theme shows a built-in fallback nav.

## Theme options (Kirki)

**Appearance → Customize → Revive Theme Options**

- Header: phone, Book Online label/URL
- Hero: title parts, background image, CTA
- Highlight box: title, text, image, CTA
- Contact Form: section title + Cognito Forms embed code
- Footer: email, Facebook URL

Paste the Cognito seamless embed (example):

```html
<script src="https://www.cognitoforms.com/f/seamless.js" data-key="YOUR_KEY" data-form="YOUR_FORM"></script>
```

## Gutenberg blocks

Under the **Revive** category:

- `revive/hero`
- `revive/highlight-box`
- `revive/contact-locations` — repeater for clinic locations (name, address, hours, phone, map embed, etc.)
- `revive/careers` — repeater for job posts (title, meta, image, about, responsibilities, offer, qualifications, apply CTA)

Build block assets with `npm run build` (or `npm start` while developing).

Homepage markup currently loads from PHP template parts in `front-page.php`. Blocks can replace those sections when placed in page content.

On the **Contact** page template, add the **Contact Locations** block in the page editor to manage Salina/McPherson (or more) locations. If the page content is empty, the block defaults are rendered automatically.

## Page templates

| Template | File | Suggested page slug |
|----------|------|---------------------|
| Services | `page-templates/template-services.php` | `services` |
| Our Team | `page-templates/template-team.php` | `team` |
| Contact | `page-templates/template-contact.php` | `contact` |

## Static HTML preview (reference)

Static HTML files remain for design reference:

| Page | File |
|------|------|
| Home | `index.html` |
| Services | `services.html` |
| Our Team | `team.html` |
| Contact | `contact.html` |

```bash
npm install
npm run sass
```

Open the HTML files in a browser after compiling styles.

## SCSS

```
scss/
  abstracts/   — variables, mixins, functions
  base/        — reset, typography, utilities
  components/  — buttons
  layout/      — header, footer, sections
  pages/       — page-specific styles
  style.scss   — main entry point
```

Compiled CSS: `css/style.css` (enqueued by the theme).

## Image assets

Images live under `assets/images/` (see table in git history / prior README). Theme PHP uses `revive_asset_uri()` to resolve them.
