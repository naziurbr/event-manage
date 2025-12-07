<?php
$title = 'Settings';
require_once __DIR__ . '/../config/config.php';
require_admin();
require_once __DIR__ . '/../includes/db.php';
include __DIR__ . '/../includes/header.php';

class Settings {
    private Database $db;
    public function __construct(Database $db) { $this->db = $db; }
    public function get($key, $default = '') {
        $row = $this->db->fetch('SELECT setting_value FROM settings WHERE setting_key = ?', [$key]);
        return $row['setting_value'] ?? $default;
    }
    public function set($key, $value) {
        $exists = $this->db->fetch('SELECT id FROM settings WHERE setting_key = ?', [$key]);
        if ($exists) {
            $this->db->query('UPDATE settings SET setting_value = ?, updated_at = NOW() WHERE setting_key = ?', [$value, $key]);
        } else {
            $this->db->insert('INSERT INTO settings (setting_key, setting_value, updated_at) VALUES (?, ?, NOW())', [$key, $value]);
        }
    }
}

$db = new Database($pdo);
$settings = new Settings($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) {
        flash('error', 'Invalid CSRF.');
        redirect('/admin/settings.php');
    }
    $settings->set('site_name', trim($_POST['site_name'] ?? 'Event Management'));
    $settings->set('contact_email', trim($_POST['contact_email'] ?? 'admin@example.com'));
    flash('success', 'Settings updated.');
    redirect('/admin/settings.php');
}
?>
<h1>Settings</h1>
<form method="post">
  <input type="hidden" name="csrf" value="<?php echo e(csrf_token()); ?>">
  <label>Site name</label><input type="text" name="site_name" value="<?php echo e($settings->get('site_name', 'Event Management')); ?>">
  <label>Contact email</label><input type="email" name="contact_email" value="<?php echo e($settings->get('contact_email', 'admin@example.com')); ?>">
  <button type="submit">Save</button>
</form>
<?php include __DIR__ . '/../includes/footer.php'; ?>
