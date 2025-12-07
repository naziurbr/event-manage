<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/db.php';

$db = new Database($pdo);
$eventModel = new Event($db);

$slug = $_GET['slug'] ?? '';
$event = $eventModel->findBySlug($slug);
if (!$event) {
    flash('error', 'Event not found.');
    redirect('/events.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_login();
    if (!csrf_check($_POST['csrf'] ?? '')) {
        flash('error', 'Invalid CSRF.');
        redirect('/event-details.php?slug=' . urlencode($slug));
    }

    $count = max(1, (int)($_POST['tickets_count'] ?? 1));
    $total = $count * (float)($event['price'] ?? 0);
    $bookingModel = new Booking($db);
    $ticketModel = new Ticket($db);

    $code = strtoupper(bin2hex(random_bytes(6)));
    $bookingId = $bookingModel->create([
        'booking_code' => $code,
        'user_id' => $_SESSION['user']['id'],
        'event_id' => $event['id'],
        'tickets_count' => $count,
        'total_amount' => $total,
        'payment_status' => 'pending',
        'payment_method' => 'cash',
        'booking_status' => 'confirmed',
    ]);
    $ticketModel->createForBooking((int)$bookingId, $count);

    flash('success', 'Booking created. Code: ' . $code);
    redirect('/user/my-events.php');
}
?>
<!doctype html>
<html>
<head><title><?php echo e($event['title']); ?></title></head>
<body>
<?php render_flash(); ?>
<h1><?php echo e($event['title']); ?></h1>
<p><?php echo e($event['venue']); ?> — <?php echo e($event['event_date']); ?> (<?php echo e($event['start_time']); ?>)</p>
<p>Price: <?php echo e(number_format((float)$event['price'], 2)); ?></p>

<form method="post" action="/event-details.php?slug=<?php echo e($slug); ?>">
    <input type="hidden" name="csrf" value="<?php echo e(csrf_token()); ?>">
    <label>Tickets</label><input type="number" name="tickets_count" value="1" min="1">
    <button type="submit">Book</button>
</form>
</body>
</html>
