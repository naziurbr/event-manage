<?php
require_once __DIR__ . '/../config/config.php';
if (!is_admin()) redirect('/login.php');
redirect('/admin/dashboard.php');
