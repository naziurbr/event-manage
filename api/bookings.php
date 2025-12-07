<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}
if (!is_logged_in()) {
    http_response_code(401);
    echo json_encode(['error' => 'Login required']);
    exit;
}

$db = new Database($pdo);
$bookingModel = new Booking($db);
$ticketModel = new Ticket($db);

// Simplified parsing
$input = json_decode(file_get_contents('php://input'), true) ?? [];
$eventId = (int)($input['event_id'] ?? 0);
$count = max(1, (int)($input['tickets_count'] ?? 1));

// Fetch event price
$event = $db->fetch('SELECT id, price FROM events WHERE id = ?', [$eventId]);
if (!$event) {
    http_response_code(404);
    echo json_encode(['error' => 'Event not found']);
    exit;
}

$total = $count * (float)$event['price'];
$code = strtoupper(bin2hex(random_bytes(6)));
$bookingId = $bookingModel->create([
    'booking_code' => $code,
    'user_id' => $_SESSION['user']['id'],
    'event_id' => $eventId,
    'tickets_count' => $count,
    'total_amount' => $total,
    'payment_status' => 'pending',
    'payment_method' => 'cash',
    'booking_status' => 'confirmed',
]);
$ticketModel->createForBooking((int)$bookingId, $count);

echo json_encode(['success' => true, 'booking_code' => $code, 'booking_id' => $bookingId]);
