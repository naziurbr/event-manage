<?php
// classes/Event.php
class Event {
    private Database $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function allPublished() {
        return $this->db->fetchAll(
            'SELECT e.*, c.name AS category_name
             FROM events e
             LEFT JOIN categories c ON e.category_id = c.id
             WHERE e.status = "published"
             ORDER BY e.event_date ASC'
        );
    }

    public function findBySlug(string $slug) {
        return $this->db->fetch(
            'SELECT e.*, c.name AS category_name
             FROM events e
             LEFT JOIN categories c ON e.category_id = c.id
             WHERE e.slug = ?',
            [$slug]
        );
    }

    public function create(array $data) {
        return $this->db->insert(
            'INSERT INTO events (title, slug, description, category_id, venue, address, city,
             event_date, start_time, end_time, price, total_seats, available_seats, image,
             organizer_id, status, featured, created_at, updated_at)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())',
            [
                $data['title'], $data['slug'], $data['description'] ?? null, $data['category_id'] ?? null,
                $data['venue'], $data['address'] ?? null, $data['city'] ?? null,
                $data['event_date'], $data['start_time'], $data['end_time'] ?? null,
                $data['price'] ?? 0.00, $data['total_seats'], $data['available_seats'],
                $data['image'] ?? null, $data['organizer_id'] ?? null,
                $data['status'] ?? 'draft', $data['featured'] ?? 0
            ]
        );
    }

    public function update(int $id, array $data) {
        $this->db->query(
            'UPDATE events SET title=?, description=?, category_id=?, venue=?, address=?, city=?,
             event_date=?, start_time=?, end_time=?, price=?, total_seats=?, available_seats=?,
             image=?, status=?, featured=?, updated_at=NOW() WHERE id=?',
            [
                $data['title'], $data['description'] ?? null, $data['category_id'] ?? null,
                $data['venue'], $data['address'] ?? null, $data['city'] ?? null,
                $data['event_date'], $data['start_time'], $data['end_time'] ?? null,
                $data['price'] ?? 0.00, $data['total_seats'], $data['available_seats'],
                $data['image'] ?? null, $data['status'] ?? 'draft', $data['featured'] ?? 0,
                $id
            ]
        );
        return true;
    }

    public function delete(int $id) {
        $this->db->query('DELETE FROM events WHERE id = ?', [$id]);
        return true;
    }

    public function categories() {
        return $this->db->fetchAll('SELECT * FROM categories ORDER BY name ASC');
    }
}
