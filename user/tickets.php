<?php
$title = 'My Tickets';
require_once __DIR__ . '/../config/config.php';
require_login();
require_once __DIR__ . '/../includes/db.php';
include __DIR__ . '/../includes/header.php';

$db = new Database($pdo);
$tickets = $db->fetchAll(
    'SELECT t.ticket_number, t.is_used, t.used_at, e.title, e.event_date
     FROM tickets t
     JOIN bookings b ON t.booking_id = b.id
     JOIN events e ON b.event_id = e.id
     WHERE b.user_id = ?
     ORDER BY t.created_at DESC',
    [$_SESSION['user']['id']]
);
?>
<h1>My Tickets</h1>
<?php foreach ($tickets as $t): ?>
<div>
  <strong><?php echo e($t['title']); ?></strong> — <?php echo e($t['event_date']); ?><br>
  Ticket: <?php echo e($t['ticket_number']); ?> | Used: <?php echo e($t['is_used'] ? 'Yes' : 'No'); ?>
</div>
<?php endforeach; ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>
