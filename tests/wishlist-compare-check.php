<?php
/**
 * Runnable check for "Compare these" under a Shortlist wishlist: the button
 * shows only for two or more products, and the comparison becomes the
 * wishlist products, capped at max_items, unreadable ones skipped.
 *
 * Run inside a site with WooCommerce and Versus:
 * `wp eval-file tests/wishlist-compare-check.php`. Runs as a throwaway customer
 * (an admin may read drafts) and cleans up after itself.
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

$service = \Versus\Plugin::instance()->container()->get(\Versus\Service\VersusService::class);
$engine = (new ReflectionProperty($service, 'engine'))->getValue($service);
$check($engine instanceof \WPPoland\StorefrontKit\Compare\CompareEngine, 'engine is wired');

$original = get_option('versus_settings', []);
update_option('versus_settings', array_merge(is_array($original) ? $original : [], ['enabled' => true, 'max_items' => 2]));

$make = static function (string $status): int {
    $product = new WC_Product_Simple();
    $product->set_name('Wishlist check ' . $status);
    $product->set_status($status);
    $product->set_regular_price('10');

    return $product->save();
};

$a = $make('publish');
$b = $make('publish');
$c = $make('publish');
$draft = $make('draft');

$customer = wp_insert_user(['user_login' => 'wlcheck' . wp_rand(), 'user_pass' => wp_generate_password(), 'role' => 'customer']);
$check(is_int($customer), 'customer created');
wp_set_current_user($customer);

$check(has_action('shortlist_after_wishlist_items', [$service, 'renderWishlistCompare']) !== false, 'hooked under the wishlist');

// Called directly: other listeners on the Shortlist hook are not under test here.
$render = static function (mixed $products) use ($service): string {
    ob_start();
    $service->renderWishlistCompare($products);

    return (string) ob_get_clean();
};

try {
    // do_action() unwraps a one-object array, so this is what a one-item wishlist sends.
    $check($render(wc_get_product($a)) === '', 'one product (unwrapped by do_action): no button, no fatal');
    $check($render([wc_get_product($a)]) === '', 'one product: no button');
    $two = $render([wc_get_product($a), wc_get_product($b)]);
    $check(str_contains($two, 'versus-wishlist-compare') && ! str_contains($two, 'versus-wishlist-compare__note'), 'two products: button, no note');
    $check(str_contains($render([wc_get_product($a), wc_get_product($b), wc_get_product($c)]), 'versus-wishlist-compare__note'), 'three over a cap of two: note');

    // An item already compared is replaced, not kept.
    $engine->compareOnly([$c]);
    $check($engine->compareOnly([$draft, $a, $a, $b, $c]) === 2, 'capped at max_items');
    $ids = array_map(static fn ($p) => $p->get_id(), $engine->getProducts());
    $check($ids === [$a, $b], 'draft skipped, duplicates dropped, order kept, old item gone');
} finally {
    $engine->compareOnly([]);
    update_option('versus_settings', $original);
    wp_set_current_user(0);
    require_once ABSPATH . 'wp-admin/includes/user.php';
    wp_delete_user($customer);
    foreach ([$a, $b, $c, $draft] as $id) {
        wp_delete_post($id, true);
    }
}

echo "wishlist-compare-check: OK\n";
