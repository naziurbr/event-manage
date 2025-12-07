<?php
$title = 'My Profile';
require_once __DIR__ . '/../config/config.php';
require_login();
require_once __DIR__ . '/../includes/db.php';
include __DIR__ . '/../includes/header.php';

$db = new Database($pdo);
$userModel = new User($db);
$me = $userModel->findById($_SESSION['user']['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) {
        flash('error', 'Invalid CSRF.');
        redirect('/user/profile.php');
    }
    $userModel->updateProfile($_SESSION['user']['id'], [
        'name' => trim($_POST['name'] ?? $me['name']),
        'phone' => trim($_POST['phone'] ?? ''),
        'avatar' => null,
    ]);
    $_SESSION['user'] = $userModel->findById($_SESSION['user']['id']);
    flash('success', 'Profile updated.');
    redirect('/user/profile.php');
}
?>
<h1>Profile</h1>
<form method="post">
  <input type="hidden" name="csrf" value="<?php echo e(csrf_token()); ?>">
  <label>Name</label><input type="text" name="name" value="<?php echo e($me['name']); ?>">
  <label>Phone</label><input type="text" name="phone" value="<?php echo e($me['phone']); ?>">
  <button type="submit">Save</button>
</form>
<?php include __DIR__ . '/../includes/footer.php'; ?>
