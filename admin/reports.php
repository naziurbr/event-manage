<?php
$title = 'Reports';
require_once __DIR__ . '/../config/config.php';
require_admin();
require_once __DIR__ . '/../includes/db.php';
include __DIR__ . '/../includes/header.php';

$db = new Database($pdo);
$revenue = $db->fetch('SELECT COALESCE(SUM(total_amount),0) AS rev FROM bookings WHERE payment_status = "completed"')['rev'] ?? 0;
$sold = $db->fetch('SELECT COALESCE(SUM(tickets_count),0) AS sold FROM bookings')['sold'] ?? 0;
$events = $db->fetch('SELECT COUNT(*) AS c FROM events WHERE status="published"')['c'] ?? 0;
?>
<h1>Reports</h1>
<ul>
  <li>Total revenue (completed): <?php echo e(number_format((float)$revenue, 2)); ?></li>
  <li>Total tickets sold: <?php echo e($sold); ?></li>
  <li>Published events: <?php echo e($events); ?></li>
</ul>
<?php include __DIR__ . '/../includes/footer.php'; ?>
