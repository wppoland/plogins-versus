<?php
/**
 * Runnable check for the compare button on the product-button block.
 *
 * Run inside a site with WooCommerce, Versus and at least one published
 * product: `wp eval-file tests/block-button-check.php`.
 *
 * @package Versus
 */

// phpcs:ignoreFile -- Test script, not shipped.

$check = static function (bool $ok, string $what): void {
    if (! $ok) {
        fwrite(STDERR, "FAIL: $what\n");
        exit(1);
    }
};

$ids = wc_get_products(['status' => 'publish', 'limit' => 1, 'return' => 'ids']);
$check($ids !== [], 'needs one published product');
$productId = (int) $ids[0];

$render = static function (array $attrs) use ($productId): string {
    $block = [
        'blockName' => 'woocommerce/product-button',
        'attrs' => $attrs,
        'innerBlocks' => [],
        'innerHTML' => '',
        'innerContent' => [],
    ];

    return (new WP_Block($block, ['postId' => $productId, 'postType' => 'product']))->render();
};

$count = static fn (string $html): int => substr_count($html, 'data-versus-compare-button');

$grid = $render(['isDescendentOfQueryLoop' => true]);
$check(1 === $count($grid), 'grid card gets exactly one compare button');
$check(str_contains($grid, 'data-product-id="' . $productId . '"'), 'button carries the block context product');
$check(wp_script_is('versus', 'enqueued'), 'rendering the button enqueues the script');

$check(0 === $count($render([])), 'single product add-to-cart form gets no button');
$check(0 === $count($render(['isDescendentOfQueryLoop' => true, 'isInherited' => 1])), 'inherited archive grid is left to the classic loop hook');

$again = apply_filters('render_block_woocommerce/product-button', $grid, ['attrs' => ['isDescendentOfQueryLoop' => true]], null);
$check(1 === $count($again), 'a second pass does not add a second button');

echo "block-button-check: OK\n";
