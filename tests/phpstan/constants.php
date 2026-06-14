<?php
/**
 * Constants needed by PHPStan to analyse the plugin without bootstrapping WordPress.
 *
 * @package Versus
 */

declare(strict_types=1);

namespace {
    if (! defined('ABSPATH')) {
        define('ABSPATH', '/tmp/wordpress/');
    }
    if (! defined('VERSUS_DIR')) {
        define('VERSUS_DIR', '/tmp/versus/');
    }
    if (! defined('VERSUS_URL')) {
        define('VERSUS_URL', 'https://example.test/wp-content/plugins/versus/');
    }
}

namespace Versus {
    if (! defined('Versus\\VERSION')) {
        define('Versus\\VERSION', '0.1.0');
    }
    if (! defined('Versus\\PLUGIN_FILE')) {
        define('Versus\\PLUGIN_FILE', '/tmp/versus/versus.php');
    }
}
