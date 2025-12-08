<?php
// includes/auth.php

// Always start sessions
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// -----------------------------------------------------
// Helper: Get current logged-in user
// -----------------------------------------------------
function current_user() {
    return $_SESSION['user'] ?? null;
}

// -----------------------------------------------------
// Helper: Check if user is logged in
// -----------------------------------------------------
function is_logged_in() {
    return current_user() !== null;
}

// -----------------------------------------------------
// Redirect user if not logged in
// -----------------------------------------------------
function require_login() {
    if (!is_logged_in()) {
        flash('error', 'Please login to continue.');
        redirect(BASE_URL . '/login.php');
        exit;
    }
}

// -----------------------------------------------------
// Check if current user is admin
// -----------------------------------------------------
function is_admin() {
    $user = current_user();
    return $user && isset($user['role']) && $user['role'] === 'admin';
}

// -----------------------------------------------------
// Redirect user if not admin
// -----------------------------------------------------
function require_admin() {
    if (!is_admin()) {
        flash('error', 'Admin access required.');
        redirect(BASE_URL . '/login.php');
        exit;
    }
}
