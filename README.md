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

## Theme options (Kirki)

**Appearance → Customize → Revive Theme Options**

- Header: phone, Book Online label/URL
- Hero: title parts, background image, CTA
- Highlight box: title, text, image, CTA
- Footer: email, Facebook URL

## Gutenberg blocks

Under the **Revive** category:

- `revive/hero`
- `revive/highlight-box`

Build block assets with `npm run build` (or `npm start` while developing).

Homepage markup currently loads from PHP template parts in `front-page.php`. Blocks can replace those sections when placed in page content.

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
