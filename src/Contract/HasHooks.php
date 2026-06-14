<?php

declare(strict_types=1);

namespace Versus\Contract;

defined('ABSPATH') || exit;

/**
 * A service that registers its own WordPress hooks during boot.
 */
interface HasHooks
{
    public function registerHooks(): void;
}
