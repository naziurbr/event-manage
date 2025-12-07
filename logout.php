<?php
require_once __DIR__ . '/config/config.php';
session_destroy();
flash('success', 'Logged out.');
redirect('/index.php');
