<?php
$title = 'Manage Users';
require_once __DIR__ . '/../config/config.php';
require_admin();
require_once __DIR__ . '/../includes/db.php';
include __DIR__ . '/../includes/header.php';

$db = new Database($pdo);

if (($_GET['action'] ?? '') === 'role' && isset($_GET['id'], $_GET['role'])) {
    $id = (int)$_GET['id'];
    $role = $_GET['role'] === 'admin' ? 'admin' : 'user';
    $db->query('UPDATE users SET role = ?, updated_at = NOW() WHERE id = ?', [$role, $id]);
    flash('success', 'Role updated.');
    redirect('/admin/manage-users.php');
}

$users = $db->fetchAll('SELECT id, name, email, role, created_at FROM users ORDER BY created_at DESC');
?>
<h1>Users</h1>
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
  <?php foreach ($users as $u): ?>
  <tr>
    <td><?php echo e($u['id']); ?></td>
    <td><?php echo e($u['name']); ?></td>
    <td><?php echo e($u['email']); ?></td>
    <td><?php echo e($u['role']); ?></td>
    <td>
      <a href="/admin/manage-users.php?action=role&id=<?php echo e($u['id']); ?>&role=user">Make User</a> |
      <a href="/admin/manage-users.php?action=role&id=<?php echo e($u['id']); ?>&role=admin">Make Admin</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include __DIR__ . '/../includes/footer.php'; ?>
