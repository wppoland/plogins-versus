=== Versus - Product Compare for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product compare, compare products, product comparison, comparison table
Requires at least: 6.5
Tested up to: 7.1
Requires PHP: 8.1
Stable tag: 1.0.22
Requires Plugins: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Fast product compare for WooCommerce: side-by-side comparison table, difference highlighting, guest and customer lists. No jQuery.

== Description ==

Versus adds a "Compare" button to your WooCommerce shop, archive and single product pages. Shoppers compare products side by side in a WooCommerce comparison table, with product data kept inside your store.

Versus is developed in the open. The code, and a place to report bugs or request features, live at [github.com/wppoland/plogins-versus](https://github.com/wppoland/plogins-versus).

The table shows the product image, name, price, SKU, availability and short description, plus a row for every product attribute (colour, size, material and more). Rows whose values differ between products are highlighted, and a single toggle hides everything that is identical so the real differences stand out.

= Documentation and links =

* **Documentation**: [plogins.com/plogins-versus/docs/](https://plogins.com/plogins-versus/docs/)
* **Plugin page**: [plogins.com/plogins-versus/](https://plogins.com/plogins-versus/)
* **Source code**: [github.com/wppoland/plogins-versus](https://github.com/wppoland/plogins-versus)
* **Bug reports and feature requests**: [github.com/wppoland/plogins-versus/issues](https://github.com/wppoland/plogins-versus/issues)


= Built for speed and accessibility =

* **No jQuery** in the plugin's own front-end code, the script is vanilla JS, deferred and loaded in the footer.
* **No layout shift (CLS).** The comparison table scrolls horizontally inside its own wrapper, so adding columns never reflows the page.
* **Keyboard friendly.** The compare buttons are real buttons with `aria-pressed` state that updates over AJAX.
* **Guests and customers.** Logged-out visitors build and open a comparison stored per browser; logged-in customers get a "Compare" tab in My Account, and a guest list is merged into the account on login.

= Settings =

A WooCommerce-capability settings page (Versus menu) lets you:

* Enable or disable comparison and set how many products can be compared at once (2-6).
* Choose where the compare button appears (loops, single product), whether guests can use it, and an optional comparison page for guests.
* Choose which standard fields appear as rows (price, SKU, availability, short description) and whether to include product attributes.
* Toggle difference highlighting, the "differences only" default, and the image / add-to-cart / remove controls in each column header.
* Customise the front-end strings, the compare button, remove button, compare link, differences toggle, clear-all button and empty-list message, or leave them on their translated defaults.

= Translation ready =

All strings are translatable through the `plogins-versus` text domain, and a `plogins-versus.pot` template ships in `/languages`. Deleting the plugin removes its options and the comparison table.

= How it works =

Adding or removing a product is a single nonce-verified AJAX request; no full page reload. Guest selections are kept in a per-browser cookie for six months and merged into the account on login. The CSS and JavaScript are enqueued only on pages that actually show the compare button or the table.

== Plogins Versus PRO ==

The free plugin is complete for what it does: a Compare button and a basic
comparison table for guests and customers, with nothing time-limited and no
account to create. **Plogins Versus PRO** is a separate add-on that adds a
fuller comparison page:

* **Comparison page shortcode** - `[versus_compare]` renders the shopper's set as a side-by-side table with price, SKU, stock, weight, dimensions, description and every product attribute
* **Configurable rows** - choose which rows appear and cap how many products can be compared at once
* **Sticky compare bar** - a persistent bar listing the selected products, linking straight to the comparison page
* **Export** - download the comparison as CSV or PDF, or print it
* **Category-scoped compare** - keep comparisons to like-for-like products

Versus PRO requires the free plugin and does not replace it. If the free plugin
is missing or disabled, PRO stays dormant and says so rather than half-working.

* **Plogins Versus PRO** - [plogins.com/versus-pro/](https://plogins.com/versus-pro/)
* **Pricing** - [plogins.com/versus-pro/pricing/](https://plogins.com/versus-pro/pricing/)

== Installation ==

1. Upload the plugin to `/wp-content/plugins/plogins-versus`, or install via Plugins > Add New.
2. Activate it. WooCommerce must be active.
3. Visit the **Versus** menu in wp-admin to choose the compared fields and placement.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Yes. Versus requires an active WooCommerce installation.

= Does it use jQuery? =

No. The plugin's own front-end script is vanilla JavaScript with no jQuery dependency.

= Can guests compare products? =

Yes, when "Allow guests" is enabled. A guest's comparison is stored per browser, and the View comparison link opens their table without an account: on the My Account Compare address above the login form, or on a page of your choice that holds the `[versus]` shortcode (set it under "Comparison page for guests"). That page is excluded from page caching, since each visitor sees their own list. When the guest logs in, the list is merged into their account.

= Where does the compare button appear? =

On shop and archive loops (classic templates and block-theme product grids such as the Product Collection block) and on the single product page, depending on your settings. The comparison itself opens on the My Account "Compare" tab. A guest sees the same table there above the login form, or on the comparison page you chose for guests.

= What fields appear in the comparison table? =

The table can show product image, name, price, SKU, availability, short description and product attributes such as size, colour or material.

= Can shoppers hide identical rows? =

Yes. Difference highlighting and a "differences only" toggle help shoppers focus on what actually changes between compared products.

= Does the product compare list work for logged-in customers? =

Yes. Logged-in customers get a My Account Compare tab. Guest compare lists can be merged into the account after login.


= Does this plugin work on WordPress Multisite? =

Yes. This plugin is compatible with WordPress Multisite. Network activate it or activate it on individual sites; each site keeps its own settings and data.

== Screenshots ==

1. The side-by-side comparison table with difference highlighting.
2. The Versus settings screen.

== External Services ==

Versus does not connect to, or send any data to, any external service or third-party server. It bundles no SDK, API client, web font, map tile, CDN asset or analytics call, everything runs on your own site.

Comparison data stays inside your WordPress database: a custom `{prefix}versus_compare_items` table holds the compared product IDs, the plugin settings live in the `versus_settings` option (with `versus_db_version` tracking the schema), and a guest's selection is kept in a first-party cookie in their own browser. Adding or removing a product is a same-origin AJAX request to your site's own `admin-ajax.php`; no outbound HTTP request is ever made. Deleting the plugin removes those options and drops the table.

== Translations ==

Versus is fully translatable and ships the `plogins-versus.pot` template. Translations are delivered by WordPress.org language packs from translate.wordpress.org, which is where Polish, German and Spanish are being contributed; the package itself carries no compiled translation files.

== Changelog ==

= 1.0.22 =
* Guests can now open their comparison table. The View comparison link used to land a logged-out shopper on a bare login form with no table on it; the table now shows above that form, and a new "Comparison page for guests" setting can send guests to any page holding the new `[versus]` shortcode instead. That page is excluded from page caching.

= 1.0.21 =
* Fixed: the compare button was missing from block-theme product grids (the Product Collection block, the blockified shop page), because only the classic loop hook added it. It now follows the product button in those grids and shows the same in-compare state, and the compare script and style load on any page that renders one.

= 1.0.20 =
* Fixed: the comparison page answered 404 on a new install until Permalinks were re-saved, because nothing flushed the rewrite rules for its My Account endpoint. The rules are now flushed once after install, update and activation.
* Fixed: emptying a custom storefront label in the settings kept the old custom text instead of returning to the translated default.
* Fixed: the comparison page heading read "Feature" (the first column's label) instead of "Compare products".

= 1.0.19 =
* Security (medium): the compare list no longer accepts or shows draft, pending, private or password-protected products. A logged-in customer could add one by id and read its name, SKU and price in the My Account compare table.
* Security (low): a disabled variation under a published product is no longer accepted in the compare list.

= 1.0.18 =
* The upgrade notice's "Coming soon" and "Get notified" labels are English source strings for every language; Polish sites used to get their own Polish source text, which translators in other languages then saw untranslated.

= 1.0.17 =
* Display name drops the "Plogins " prefix. The slug, the text domain and every option key are unchanged, so nothing on an existing install moves.

= 1.0.16 =
* The sidebar upgrade promo now follows the same dismissal as the banner. Dismissing the banner used to leave a full-height advert on the settings screen for good, which is not what the WordPress.org guideline on upgrade prompts means by used with moderation.

= 1.0.15 =
* Fixed: the PRO upgrade promo kept selling to people who had already bought the paid edition. Only the banner could be dismissed, so the sidebar promo and the locked feature cards followed a paying customer around for good. The promo now checks whether the paid edition is active and steps aside when it is.
* Fixed: arrow glyphs in the admin menu paths, and in the strings handed to translators. An arrow inside a translatable string makes the glyph every translator's problem and changes the layout in any locale that drops it.

= 1.0.14 =
* Changed: the PRO feature cards printed an arrow glyph in menu paths where the rest of the plugin and the documentation use a plain ">". Same navigation, one character that renders everywhere.

= 1.0.13 =
* Fixed: deleting the plugin left the per-user "dismiss" flag from the PRO notice in the database. Uninstall now removes it for every user, not just the one who dismissed it.

= 1.0.12 =
* The translation template was regenerated. 5 strings added to the plugin since the template was last built were missing from it, so no translator could reach them in any language, and 6 strings the plugin no longer uses have been dropped. Nothing you see changes; what a translator can see does.

= 1.0.11 =
* Fixed: the plugin reported an older version number internally than the one it was released under. That number versions the stylesheets and scripts the admin screen loads, so a browser holding the previous files kept them after an update instead of fetching the corrected ones.

= 1.0.10 =
* Declared compatibility with WooCommerce 11.0.

= 1.0.9 =
* Fixed the PRO promo on the settings screen quoting a price in PLN. PRO is priced and charged in EUR, so an admin on a Polish site was shown a zloty amount and then billed in euro, and the zloty figure was a fixed conversion that drifted from the real charge as the rate moved. The promo now shows the euro price that is actually taken.

= 1.0.8 =
* Approved on WordPress.org and renamed to Plogins Versus.

= 1.0.6 =
* The "View comparison" link now always opens the comparison table. Guests, and customers in stores that hide the account tab, used to land on the shop page with no comparison on it.
* Hiding the My Account "Compare" tab now only hides the tab: shoppers can still open their comparison from the link next to the compare button.
* Clearer wording on the "Allow guests" and "Account menu" settings about where a shopper actually sees the comparison table.

= 1.0.4 =
* Translations: completed Polish, German and Spanish for the PRO upgrade panel.

= 1.0.3 =
* Accessibility improvements to the admin and storefront markup.
* Fixed low-contrast admin headings under an OS dark-mode preference.

= 1.0.2 =
* Added bundled Polish, German and Spanish translations for the plugin interface.

= 1.0.1 =
* First stable release.

= 0.2.1 =
* Renamed to Plogins Versus for WooCommerce for a more distinctive plugin name.

= 0.2.0 =
* Polished every interface: inline help tooltips on every setting, a modern themeable comparison table (CSS custom properties, fluid sizing, dark-mode and reduced-motion support), a friendly empty-state on the comparison page, and a live count badge on the compare link.
* Improved accessibility: accessible "?" help affordances wired via `aria-describedby`, a polite live region that announces compare changes to screen readers, visible focus styles and full keyboard operability.
* More robust front-end: graceful handling of network failures, guard against double submission, automatic table refresh after a remove, and friendly fallbacks for missing data.
* Added a "Labels & text" section to the settings screen so the compare button, remove button, compare link, differences toggle, clear-all button and empty-list message can be customised (empty falls back to the translated default).
* Made the plugin fully translation ready: `Domain Path` header and a `versus.pot` template in `/languages` (WordPress loads the translations automatically).
* Added `uninstall.php` cleanup that removes the plugin options and the comparison-items table when the plugin is deleted.

= 0.1.0 =
* Initial release: accessible product comparison for WooCommerce with a difference-highlighting table, guest + customer lists, and a settings page for compared fields and placement.

== Upgrade Notice ==

= 1.0.22 =
Guests can open their comparison table without logging in.

= 1.0.21 =
The compare button now appears in block-theme product grids such as the Product Collection block.

= 1.0.20 =
The comparison page no longer answers 404 on a new install, and a cleared storefront label returns to its default.

= 1.0.19 =
Security release. Unpublished and password-protected products can no longer be added to or shown in a compare list.
