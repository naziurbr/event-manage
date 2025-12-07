<?php
// classes/Ticket.php
class Ticket {
    private Database $db;
    public function __construct(Database $db) { $this->db = $db; }

    public function createForBooking(int $bookingId, int $count) {
        for ($i = 0; $i < $count; $i++) {
            $ticketNumber = strtoupper(bin2hex(random_bytes(6)));
            $this->db->insert(
                'INSERT INTO tickets (ticket_number, booking_id, qr_code, is_used, created_at)
                 VALUES (?, ?, ?, 0, NOW())',
                [$ticketNumber, $bookingId, $ticketNumber] // simple qr placeholder
            );
        }
        return true;
    }

    public function markUsed(string $ticketNumber) {
        $this->db->query(
            'UPDATE tickets SET is_used = 1, used_at = NOW() WHERE ticket_number = ?',
            [$ticketNumber]
        );
        return true;
    }
}
