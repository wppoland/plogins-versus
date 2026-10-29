<?php
/**
 * "Compare these" under a Shortlist wishlist.
 *
 * Rendered by VersusService on `shortlist_after_wishlist_items` when the
 * wishlist holds two or more products. A plain form, so it works without JS.
 *
 * @var list<int> $product_ids
 * @var int       $max_items
 * @var string    $action
 *
 * @package Versus/Templates
 */

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- Variables are local to the template include scope.

declare(strict_types=1);

defined('ABSPATH') || exit;
?>
<form class="versus-compare versus-wishlist-compare" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <input type="hidden" name="action" value="<?php echo esc_attr($action); ?>">
    <?php wp_nonce_field($action); ?>
    <?php foreach ($product_ids as $product_id) : ?>
        <input type="hidden" name="product_ids[]" value="<?php echo esc_attr((string) $product_id); ?>">
    <?php endforeach; ?>
    <button type="submit" class="button versus-compare-button">
        <?php esc_html_e('Compare these', 'plogins-versus'); ?>
    </button>
    <?php if (count($product_ids) > $max_items) : ?>
        <p class="versus-wishlist-compare__note">
            <?php
            echo esc_html(
                sprintf(
                    /* translators: %d: how many products a comparison holds at most. */
                    _n('Only the first %d is compared.', 'Only the first %d are compared.', $max_items, 'plogins-versus'),
                    $max_items,
                ),
            );
            ?>
        </p>
    <?php endif; ?>
</form>
