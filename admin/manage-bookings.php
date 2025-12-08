<?php
$title = 'Manage Bookings';
require_once __DIR__ . '/../config/config.php';

require_once __DIR__ . '/../includes/db.php';
include __DIR__ . '/../includes/header.php';

$db = new Database($pdo);

if (($_GET['action'] ?? '') === 'cancel' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $db->query('UPDATE bookings SET booking_status = "cancelled" WHERE id = ?', [$id]);
    flash('success', 'Booking cancelled.');
    redirect('/admin/manage-bookings.php');
}

$bookings = $db->fetchAll(
    'SELECT b.id, b.booking_code, b.tickets_count, b.total_amount, b.payment_status, b.booking_status, b.booked_at,
            u.name AS user_name, e.title AS event_title
     FROM bookings b
     JOIN users u ON b.user_id = u.id
     JOIN events e ON b.event_id = e.id
     ORDER BY b.booked_at DESC'
);
?>
<h1>Bookings</h1>
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Code</th><th>User</th><th>Event</th><th>Tickets</th><th>Amount</th><th>Status</th><th>Actions</th></tr>
  <?php foreach ($bookings as $b): ?>
  <tr>
    <td><?php echo e($b['id']); ?></td>
    <td><?php echo e($b['booking_code']); ?></td>
    <td><?php echo e($b['user_name']); ?></td>
    <td><?php echo e($b['event_title']); ?></td>
    <td><?php echo e($b['tickets_count']); ?></td>
    <td><?php echo e($b['total_amount']); ?></td>
    <td><?php echo e($b['booking_status']); ?>/<?php echo e($b['payment_status']); ?></td>
    <td><a href="/admin/manage-bookings.php?action=cancel&id=<?php echo e($b['id']); ?>">Cancel</a></td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include __DIR__ . '/../includes/footer.php'; ?>
