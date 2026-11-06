# Marhaba WordPress theme

Custom classic theme for Marhaba Palace Trading Establishment, built from the static homepage design in the repository root.

## Install

1. Zip the `marhaba` folder (or use `marhaba-theme.zip` if provided) and upload it in **Appearance → Themes → Add New → Upload Theme**.
2. Activate **Marhaba**.
3. Create a page called "Home", then set **Settings → Reading → Your homepage displays → A static page → Home**.
4. Set **Settings → Permalinks → Post name**.

## What you can edit in the admin

| Where | What |
|---|---|
| Appearance → Customize → **Marhaba: Contact & Social** | Phone, mobile, WhatsApp, emails, location, Instagram / LinkedIn / Facebook, company profile PDF link, Arabic site link, footer text |
| Appearance → Customize → **Marhaba: Hero Slider** | Three slides: small heading, headline (wrap a word in `<em>` to make it red), text, background image, two buttons (`Label|link`) |
| Appearance → Customize → **Marhaba: Enquiry Form** | Recipient email, or a form plugin shortcode (e.g. Contact Form 7) to replace the built-in form |
| Appearance → Customize → **Site Identity** | Logo (falls back to the bundled Marhaba logo) |
| Appearance → Menus | **Primary Menu** (header + mobile drawer, 2 levels) and **Footer — Company links**. Until a Primary menu is assigned, the design's default menu with the Solutions mega-menu is shown. |

## Code layout

```
front-page.php                 Homepage; section order is set here (filter: marhaba_front_sections)
template-parts/front/*.php     One file per homepage section
template-parts/icons.php       Inline SVG icon sprite
template-parts/nav-fallback.php Default menu with mega-menu
inc/customizer.php             Theme options + defaults from the 2026 company profile
inc/enquiry.php                "Request a Quote" handler (nonce, honeypot, wp_mail, action hook marhaba_enquiry_submitted)
assets/css/main.css            Design styles (shared with the static prototype)
style.css                      Theme header + WordPress-specific styles
```

Section text other than the hero (solutions, brands, sectors, etc.) is in the template parts and edited in code.

## Email

The quote form sends with `wp_mail()`. On live hosting, install an SMTP plugin (e.g. WP Mail SMTP) so messages are delivered reliably.

## Before go-live

Photos and partner logos are still linked from saveto.com, myklaticrete.com, dcp-int.com and the brand websites. Upload replacements to the Media Library and update the template parts / Customizer.
