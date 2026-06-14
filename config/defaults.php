<?php
/**
 * Default settings, merged under the option key `versus_settings`.
 *
 * The feature ships enabled. The merchant tunes which standard fields and
 * product attributes appear in the comparison table, the per-list item cap, and
 * whether guests may build a comparison. All comparison logic lives in the
 * storefront-kit CompareEngine; these values are passed through to it as the
 * resolved settings.
 *
 * @package Versus
 *
 * @return array<string, mixed>
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

return [
    'enabled' => true,

    // Where the compare button appears.
    'show_on_loop'   => true,
    'show_on_single' => true,

    // Access + storage.
    'allow_guests'   => true,
    'show_in_account' => true,
    'max_items'      => 4,

    // Comparison table.
    'show_attributes'          => true,
    'highlight_differences'    => true,
    'show_only_differences'    => false,
    'show_product_image'       => true,
    'show_add_to_cart'         => true,
    'show_remove_button'       => true,

    // Standard fields to compare (ordered). Keys map to engine-resolved rows.
    'fields' => [
        'price'        => true,
        'sku'          => true,
        'availability' => true,
        'description'  => true,
    ],

    // Runtime strings (front-end + AJAX). Empty falls back to engine labels.
    'button_add_text'        => 'Compare',
    'button_remove_text'     => 'Remove',
    'compare_link_text'      => 'View comparison',
    'feature_label'          => 'Feature',
    'account_label'          => 'Compare',
    'clear_text'             => 'Clear all',
    'empty_text'             => 'No products added to compare yet.',
    'differences_toggle_text' => 'Show only differences',
    'login_required_text'    => 'Please log in to compare products.',
    'product_not_found_text' => 'Product not found.',
    'clear_error_text'       => 'Could not clear the comparison.',
    'limit_notice_text'      => 'You can compare up to {limit} products. The oldest item was removed.',
];
