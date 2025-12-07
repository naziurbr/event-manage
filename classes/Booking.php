<?php
// classes/Booking.php
class Booking {
    private Database $db;
    public function __construct(Database $db) { $this->db = $db; }

    public function create(array $data) {
        $id = $this->db->insert(
            'INSERT INTO bookings (booking_code, user_id, event_id, tickets_count, total_amount,
             payment_status, payment_method, booking_status, booked_at)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())',
            [
                $data['booking_code'], $data['user_id'], $data['event_id'],
                $data['tickets_count'], $data['total_amount'],
                $data['payment_status'] ?? 'pending',
                $data['payment_method'] ?? null,
                $data['booking_status'] ?? 'confirmed'
            ]
        );
        return $id;
    }

    public function forUser(int $userId) {
        return $this->db->fetchAll(
            'SELECT b.*, e.title, e.event_date FROM bookings b
             JOIN events e ON b.event_id = e.id
             WHERE b.user_id = ?
             ORDER BY b.booked_at DESC',
            [$userId]
        );
    }
}
