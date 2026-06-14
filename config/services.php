<?php
/**
 * Service wiring. Returns a closure that registers every service in the
 * container. Keep services thin; product logic lives in storefront-kit engines
 * instantiated here with this plugin's text-domain / option prefix / asset URLs.
 *
 * @package Versus
 */

declare(strict_types=1);

use Versus\Admin\Settings;
use Versus\Container;
use Versus\Migrator;
use Versus\Repository\CompareRepository;
use Versus\Service\VersusService;

defined('ABSPATH') || exit;

return static function (Container $c): void {
    $c->singleton(Migrator::class, static fn (): Migrator => new Migrator());

    $c->singleton(CompareRepository::class, static function (): CompareRepository {
        global $wpdb;

        return new CompareRepository($wpdb);
    });

    // Thin adapter over the storefront-kit CompareEngine.
    $c->singleton(VersusService::class, static fn (Container $c): VersusService => new VersusService(
        $c->get(CompareRepository::class),
    ));

    // Admin (only needed in wp-admin context).
    if (is_admin()) {
        $c->singleton(Settings::class, static fn (): Settings => new Settings());
    }
};
