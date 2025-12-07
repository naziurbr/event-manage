<?php
require_once __DIR__ . '/../config/config.php';
require_admin();
require_once __DIR__ . '/../includes/db.php';

$db = new Database($pdo);
$eventModel = new Event($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) {
        flash('error', 'Invalid CSRF.');
        redirect('/admin/manage-events.php');
    }
    $title = trim($_POST['title'] ?? '');
    $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $title)) . '-' . substr(uniqid(), -6);
    $data = [
        'title' => $title,
        'slug' => $slug,
        'venue' => trim($_POST['venue'] ?? ''),
        'event_date' => $_POST['event_date'] ?? date('Y-m-d'),
        'start_time' => $_POST['start_time'] ?? '09:00:00',
        'end_time' => $_POST['end_time'] ?? null,
        'price' => (float)($_POST['price'] ?? 0),
        'total_seats' => (int)($_POST['total_seats'] ?? 50),
        'available_seats' => (int)($_POST['available_seats'] ?? 50),
        'status' => $_POST['status'] ?? 'draft',
        'organizer_id' => $_SESSION['user']['id'] ?? null,
    ];
    if ($data['title'] === '' || $data['venue'] === '') {
        flash('error', 'Title and venue are required.');
        redirect('/admin/manage-events.php');
    }
    $eventModel->create($data);
    flash('success', 'Event created.');
    redirect('/admin/manage-events.php');
}

$events = $db->fetchAll('SELECT id, title, slug, event_date, status FROM events ORDER BY created_at DESC');
?>
<!doctype html>
<html>
<head><title>Manage Events</title></head>
<body>
<?php render_flash(); ?>
<h2>Create Event</h2>
<form method="post" action="/admin/manage-events.php">
    <input type="hidden" name="csrf" value="<?php echo e(csrf_token()); ?>">
    <label>Title</label><input type="text" name="title" required>
    <label>Venue</label><input type="text" name="venue" required>
    <label>Date</label><input type="date" name="event_date" required>
    <label>Start Time</label><input type="time" name="start_time" required>
    <label>End Time</label><input type="time" name="end_time">
    <label>Price</label><input type="number" step="0.01" name="price" value="0">
    <label>Total Seats</label><input type="number" name="total_seats" value="50">
    <label>Available Seats</label><input type="number" name="available_seats" value="50">
    <label>Status</label>
    <select name="status">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
    </select>
    <button type="submit">Create</button>
</form>

<h2>Events</h2>
<table border="1" cellpadding="6">
    <tr><th>ID</th><th>Title</th><th>Date</th><th>Status</th><th>Actions</th></tr>
    <?php foreach ($events as $e): ?>
    <tr>
        <td><?php echo e($e['id']); ?></td>
        <td><?php echo e($e['title']); ?></td>
        <td><?php echo e($e['event_date']); ?></td>
        <td><?php echo e($e['status']); ?></td>
        <td>
            <a href="/event-details.php?slug=<?php echo e($e['slug']); ?>">View</a>
            <a href="/admin/delete-event.php?id=<?php echo e($e['id']); ?>" onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
