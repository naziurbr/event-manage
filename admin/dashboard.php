<?php
require_once __DIR__ . '/../config/config.php';

require_once __DIR__ . '/../includes/db.php';

$db = new Database($pdo);
$eventsCount = $db->fetch('SELECT COUNT(*) AS c FROM events')['c'] ?? 0;
$usersCount = $db->fetch('SELECT COUNT(*) AS c FROM users')['c'] ?? 0;
$bookingsCount = $db->fetch('SELECT COUNT(*) AS c FROM bookings')['c'] ?? 0;
?>
<!doctype html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Dashboard</h1>
    <ul>
        <li>Events: <?php echo e($eventsCount); ?></li>
        <li>Users: <?php echo e($usersCount); ?></li>
        <li>Bookings: <?php echo e($bookingsCount); ?></li>
    </ul>
    <a href="/admin/manage-events.php">Manage Events</a>
</body>

</html>