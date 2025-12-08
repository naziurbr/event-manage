<?php
require_once __DIR__ . '/../config/config.php';

require_once __DIR__ . '/../includes/db.php';

$db = new Database($pdo);
$eventModel = new Event($db);

$id = (int)($_GET['id'] ?? 0);
if ($id > 0) {
    $eventModel->delete($id);
    flash('success', 'Event deleted.');
}
redirect('/admin/manage-events.php');
