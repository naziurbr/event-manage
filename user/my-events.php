<?php
require_once __DIR__ . '/../config/config.php';
require_login();
require_once __DIR__ . '/../includes/db.php';

$db = new Database($pdo);
$booking = new Booking($db);
$list = $booking->forUser($_SESSION['user']['id']);
?>
<!doctype html>
<html>
<head><title>My Events</title></head>
<body>
<h1>My Events</h1>
<?php foreach ($list as $b): ?>
    <div style="margin-bottom:12px;">
        <strong><?php echo e($b['title']); ?></strong>
        <span>— <?php echo e($b['event_date']); ?></span>
        <div>Booking Code: <?php echo e($b['booking_code']); ?></div>
        <div>Tickets: <?php echo e($b['tickets_count']); ?> | Amount: <?php echo e($b['total_amount']); ?></div>
        <div>Status: <?php echo e($b['booking_status']); ?> | Payment: <?php echo e($b['payment_status']); ?></div>
    </div>
<?php endforeach; ?>
</body>
</html>
