<?php
// includes/flash.php

function flash($key, $message = null) {
    if ($message === null) {
        if (isset($_SESSION['flash'][$key])) {
            $msg = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $msg;
        }
        return null;
    } else {
        $_SESSION['flash'][$key] = $message;
    }
}

function render_flash() {
    foreach (['success' => 'green', 'error' => 'red', 'info' => 'blue'] as $type => $color) {
        $msg = flash($type);
        if ($msg) {
            echo '<div class="mb-4 p-4 rounded bg-' . $color . '-100 text-' . $color . '-800 border border-' . $color . '-300">' . e($msg) . '</div>';
        }
    }
}

