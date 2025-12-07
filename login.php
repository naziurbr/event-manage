<?php
$title = 'Login';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/db.php';

$db = new Database(); // no need to pass $pdo
$userModel = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) {
        flash('error', 'Invalid CSRF token.');
        redirect(BASE_URL . '/login.php');
    }

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $user = $userModel->findByEmail($email);
    if (!$user || !$userModel->verifyPassword($user, $password)) {
        flash('error', 'Invalid credentials.');
        redirect(BASE_URL . '/login.php');
    }

    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'role' => $user['role'],
        'avatar' => $user['avatar'],
    ];
    flash('success', 'Logged in successfully.');
    redirect(BASE_URL . '/index.php');
}
?>

<?php include __DIR__ . '/includes/header.php'; ?>

<h1 class="text-2xl font-bold mb-4">Login</h1>
<form method="post" action="<?php echo BASE_URL; ?>/login.php" class="space-y-4 max-w-md">
    <input type="hidden" name="csrf" value="<?php echo e(csrf_token()); ?>">

    <div>
        <label class="block font-medium">Email</label>
        <input type="email" name="email" required class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block font-medium">Password</label>
        <input type="password" name="password" required class="w-full border rounded px-3 py-2">
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Login</button>
</form>

<?php include __DIR__ . '/includes/footer.php'; ?>
