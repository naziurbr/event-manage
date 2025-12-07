<?php
// config/config.php

// Polyfill for str_starts_with (works in PHP 7+)
if (!function_exists('str_starts_with')) {
    function str_starts_with($haystack, $needle) {
        return $needle !== '' && substr($haystack, 0, strlen($needle)) === $needle;
    }
}

// Simple .env loader
function env($key, $default = null) {
    static $vars = null;
    if ($vars === null) {
        $vars = [];
        $path = __DIR__ . '/../.env';
        if (file_exists($path)) {
            foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
                if (str_starts_with(trim($line), '#')) continue;
                [$k, $v] = array_pad(explode('=', $line, 2), 2, '');
                $vars[trim($k)] = trim($v);
            }
        }
    }
    return $vars[$key] ?? $default;
}

// Base URL constant
define('BASE_URL', env('APP_URL', 'http://localhost/Event_Managements/event-management-website'));

// Sessions
if (session_status() === PHP_SESSION_NONE) {
    session_name('ems_session');
    session_start();
}

// Error reporting (development mode)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Autoload classes
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../classes/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Load helper includes
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/flash.php';
require_once __DIR__ . '/../includes/auth.php';
