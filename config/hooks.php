<?php
/**
 * Boot order: services listed here are resolved from the container and have
 * their registerHooks() called during Plugin::boot(). Each must implement
 * Versus\Contract\HasHooks.
 *
 * @package Versus
 *
 * @return array<class-string>
 */

declare(strict_types=1);

use Versus\Admin\Settings;
use Versus\Service\VersusService;

defined('ABSPATH') || exit;

return [
    VersusService::class,
    ...(is_admin() ? [Settings::class] : []),
];
