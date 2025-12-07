<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/db.php';

header('Content-Type: application/json');

$db = new Database($pdo);
$eventModel = new Event($db);
echo json_encode($eventModel->allPublished());
