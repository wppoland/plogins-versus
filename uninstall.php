<?php
/**
 * Uninstall cleanup for Versus.
 *
 * Runs only when the plugin is deleted from wp-admin. Removes the options and
 * the custom compare-items table this plugin created. Guarded by the WordPress
 * uninstall constant so it can never run in any other context.
 *
 * @package Versus
 */

declare(strict_types=1);

defined('WP_UNINSTALL_PLUGIN') || exit;

/**
 * Remove the options and the compare-items table from the current site.
 */
function versus_uninstall_site(): void
{
    global $wpdb;

    delete_option('versus_settings');
    delete_option('versus_db_version');
    delete_option('versus_flush_rewrite');

    // Drop the plugin's own compare-items table. The name is built from the WP
    // table prefix and a fixed, plugin-owned suffix; it is not user input.
    // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange
    $wpdb->query(
        $wpdb->prepare('DROP TABLE IF EXISTS %i', $wpdb->prefix . 'versus_compare_items')
    );
    // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange
}

// Everything above is stored per site, so a network uninstall has to visit
// every site.
if (is_multisite()) {
    foreach (get_sites(['fields' => 'ids', 'number' => 0]) as $versus_site_id) {
        switch_to_blog((int) $versus_site_id);
        versus_uninstall_site();
        restore_current_blog();
    }
    unset($versus_site_id);
} else {
    versus_uninstall_site();
}

// The PRO banner's dismissal is stored per user, so it belongs to the
// plugin rather than to the site content. User meta is global, not
// per-site, which is why this uses delete_metadata's \$delete_all rather
// than a loop over the users of one blog.
delete_metadata('user', 0, 'versus_pro_banner_dismissed', '', true);
