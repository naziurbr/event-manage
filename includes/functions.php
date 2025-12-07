<?php
// includes/functions.php

function redirect($url) {
    // If the URL doesn’t already start with http, prepend BASE_URL
    if (strpos($url, 'http') !== 0) {
        $url = BASE_URL . $url;
    }
    header('Location: ' . $url);
    exit;
}

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function now() {
    return date('Y-m-d H:i:s');
}

function csrf_token() {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf'];
}

function csrf_check($token) {
    return isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token);
}
