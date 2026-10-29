<?php
/**
 * Runnable check for the guest comparison view: where the View comparison
 * link sends a guest, and that [versus] and the account endpoint render the
 * table only when guests are allowed.
 *
 * Run logged out inside a site with WooCommerce and Versus:
 * `wp eval-file tests/guest-view-check.php`. Restores the settings it touches.
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

$check(! is_user_logged_in(), 'run logged out');

$service = \Versus\Plugin::instance()->container()->get(\Versus\Service\VersusService::class);
$engine = (new ReflectionProperty($service, 'engine'))->getValue($service);
$check($engine instanceof \Versus\Vendor\StorefrontKit\Compare\CompareEngine, 'engine is wired');

$original = get_option('versus_settings', []);
$set = static function (array $patch) use ($original): void {
    update_option('versus_settings', array_merge(is_array($original) ? $original : [], $patch));
};

$endpoint = wc_get_account_endpoint_url('versus-compare');
$page = wp_insert_post(['post_type' => 'page', 'post_status' => 'publish', 'post_title' => 'Compare check', 'post_content' => '[versus]']);
$draft = wp_insert_post(['post_type' => 'page', 'post_status' => 'draft', 'post_title' => 'Compare draft']);
$post = wp_insert_post(['post_type' => 'post', 'post_status' => 'publish', 'post_title' => 'Not a page']);

try {
    $set(['allow_guests' => true, 'compare_page_id' => 0]);
    $check($engine->getCompareUrl() === $endpoint, 'no page: guest goes to the account endpoint');

    $set(['compare_page_id' => $page]);
    $check($engine->getCompareUrl() === get_permalink($page), 'published page: guest goes to the page');

    $set(['compare_page_id' => $draft]);
    $check($engine->getCompareUrl() === $endpoint, 'draft page: falls back to the endpoint');

    $set(['compare_page_id' => $post]);
    $check($engine->getCompareUrl() === $endpoint, 'a post id is not a comparison page');

    $set(['compare_page_id' => $page]);
    $check(str_contains(do_shortcode('[versus]'), 'versus-compare-account'), '[versus] renders the table for a guest');

    $GLOBALS['wp']->query_vars['versus-compare'] = '';
    ob_start();
    do_action('woocommerce_before_customer_login_form');
    $check(str_contains((string) ob_get_clean(), 'versus-compare-account'), 'account endpoint shows the guest table');

    $set(['allow_guests' => false]);
    $check(do_shortcode('[versus]') === '', 'guests off: [versus] renders nothing');
    ob_start();
    do_action('woocommerce_before_customer_login_form');
    $check(! str_contains((string) ob_get_clean(), 'versus-compare-account'), 'guests off: no table above the login form');
} finally {
    update_option('versus_settings', $original);
    wp_delete_post($page, true);
    wp_delete_post($draft, true);
    wp_delete_post($post, true);
}

echo "guest-view-check: OK\n";
