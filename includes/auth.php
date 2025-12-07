<?php
// includes/auth.php

function current_user() {
    return $_SESSION['user'] ?? null;
}

function is_logged_in() {
    return !!current_user();
}

function require_login() {
    if (!is_logged_in()) {
        flash('error', 'Please login to continue.');
        redirect(BASE_URL . '/login.php');
    }
}

function is_admin() {
    return is_logged_in() && (($_SESSION['user']['role'] ?? 'user') === 'admin');
}

function require_admin() {
    if (!is_admin()) {
        flash('error', 'Admin access required.');
        redirect(BASE_URL . '/login.php');
    }
}
