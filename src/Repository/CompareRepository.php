<?php

declare(strict_types=1);

namespace Versus\Repository;

defined('ABSPATH') || exit;

use wpdb;
use WPPoland\StorefrontKit\Compare\CompareRepository as CompareRepositoryContract;

/**
 * Data access for product compare items, backed by the
 * `{$prefix}versus_compare_items` table created by the Migrator.
 *
 * Items are addressed by product id plus exactly one owner: a logged-in
 * `$userId` or a guest `$sessionId`. The list is returned oldest-first so the
 * engine's `removeOldest()` can enforce the per-list cap. Implements the
 * storefront-kit {@see CompareRepositoryContract}.
 *
 * phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery,WordPress.DB.DirectDatabaseQuery.NoCaching,WordPress.DB.PreparedSQL.NotPrepared -- Custom plugin table accessed through $wpdb->prepare() with %i/%d/%s placeholders; no caching layer for this owned table.
 */
final class CompareRepository implements CompareRepositoryContract
{
    public function __construct(
        private readonly wpdb $wpdb,
    ) {
    }

    public function tableName(): string
    {
        return $this->wpdb->prefix . 'versus_compare_items';
    }

    public function add(int $productId, ?int $userId, ?string $sessionId): void
    {
        if ($this->exists($productId, $userId, $sessionId)) {
            return;
        }

        $this->wpdb->insert(
            $this->tableName(),
            [
                'product_id' => $productId,
                'user_id'    => $userId,
                'session_id' => $sessionId,
                'created_at' => current_time('mysql', true),
            ],
            ['%d', '%d', '%s', '%s'],
        );
    }

    public function remove(int $productId, ?int $userId, ?string $sessionId): void
    {
        if ($userId !== null) {
            $this->wpdb->delete(
                $this->tableName(),
                ['product_id' => $productId, 'user_id' => $userId],
                ['%d', '%d'],
            );

            return;
        }

        if ($sessionId !== null) {
            $this->wpdb->delete(
                $this->tableName(),
                ['product_id' => $productId, 'session_id' => $sessionId],
                ['%d', '%s'],
            );
        }
    }

    public function exists(int $productId, ?int $userId, ?string $sessionId): bool
    {
        if ($userId !== null) {
            return (int) $this->wpdb->get_var(
                $this->wpdb->prepare(
                    'SELECT COUNT(*) FROM %i WHERE product_id = %d AND user_id = %d',
                    $this->tableName(),
                    $productId,
                    $userId,
                ),
            ) > 0;
        }

        if ($sessionId !== null) {
            return (int) $this->wpdb->get_var(
                $this->wpdb->prepare(
                    'SELECT COUNT(*) FROM %i WHERE product_id = %d AND session_id = %s',
                    $this->tableName(),
                    $productId,
                    $sessionId,
                ),
            ) > 0;
        }

        return false;
    }

    public function count(?int $userId, ?string $sessionId): int
    {
        if ($userId !== null) {
            return (int) $this->wpdb->get_var(
                $this->wpdb->prepare(
                    'SELECT COUNT(*) FROM %i WHERE user_id = %d',
                    $this->tableName(),
                    $userId,
                ),
            );
        }

        if ($sessionId !== null) {
            return (int) $this->wpdb->get_var(
                $this->wpdb->prepare(
                    'SELECT COUNT(*) FROM %i WHERE session_id = %s',
                    $this->tableName(),
                    $sessionId,
                ),
            );
        }

        return 0;
    }

    public function removeOldest(?int $userId, ?string $sessionId): void
    {
        $oldestId = $this->oldestRowId($userId, $sessionId);

        if ($oldestId === null) {
            return;
        }

        $this->wpdb->delete($this->tableName(), ['id' => $oldestId], ['%d']);
    }

    public function clear(?int $userId, ?string $sessionId): void
    {
        if ($userId !== null) {
            $this->wpdb->delete($this->tableName(), ['user_id' => $userId], ['%d']);

            return;
        }

        if ($sessionId !== null) {
            $this->wpdb->delete($this->tableName(), ['session_id' => $sessionId], ['%s']);
        }
    }

    /**
     * @return list<int>
     */
    public function findProductIds(?int $userId, ?string $sessionId): array
    {
        if ($userId !== null) {
            $ids = $this->wpdb->get_col(
                $this->wpdb->prepare(
                    'SELECT product_id FROM %i WHERE user_id = %d ORDER BY created_at ASC, id ASC',
                    $this->tableName(),
                    $userId,
                ),
            );
        } elseif ($sessionId !== null) {
            $ids = $this->wpdb->get_col(
                $this->wpdb->prepare(
                    'SELECT product_id FROM %i WHERE session_id = %s ORDER BY created_at ASC, id ASC',
                    $this->tableName(),
                    $sessionId,
                ),
            );
        } else {
            return [];
        }

        return array_map('intval', is_array($ids) ? $ids : []);
    }

    public function transferSessionToUser(string $sessionId, int $userId): void
    {
        $this->wpdb->query(
            $this->wpdb->prepare(
                'UPDATE %i SET user_id = %d, session_id = NULL WHERE session_id = %s AND (user_id IS NULL OR user_id = 0)',
                $this->tableName(),
                $userId,
                $sessionId,
            ),
        );
    }

    private function oldestRowId(?int $userId, ?string $sessionId): ?int
    {
        if ($userId !== null) {
            $id = $this->wpdb->get_var(
                $this->wpdb->prepare(
                    'SELECT id FROM %i WHERE user_id = %d ORDER BY created_at ASC, id ASC LIMIT 1',
                    $this->tableName(),
                    $userId,
                ),
            );
        } elseif ($sessionId !== null) {
            $id = $this->wpdb->get_var(
                $this->wpdb->prepare(
                    'SELECT id FROM %i WHERE session_id = %s ORDER BY created_at ASC, id ASC LIMIT 1',
                    $this->tableName(),
                    $sessionId,
                ),
            );
        } else {
            return null;
        }

        return $id !== null ? (int) $id : null;
    }

    // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery,WordPress.DB.DirectDatabaseQuery.NoCaching,WordPress.DB.PreparedSQL.NotPrepared
}
