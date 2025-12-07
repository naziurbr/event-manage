<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/db.php';

$db = new Database($pdo);
$eventModel = new Event($db);
$events = $eventModel->allPublished();
?>
<!doctype html>
<html>
<head><title>Events</title></head>
<body>
<h1>Events</h1>
<?php foreach ($events as $e): ?>
    <div style="margin-bottom:16px;">
        <h3><a href="/event-details.php?slug=<?php echo e($e['slug']); ?>"><?php echo e($e['title']); ?></a></h3>
        <p><?php echo e($e['venue']); ?> — <?php echo e($e['event_date']); ?></p>
        <p>Status: <?php echo e($e['status']); ?></p>
    </div>
<?php endforeach; ?>
</body>
</html>
