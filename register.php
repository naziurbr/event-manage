<?php
$title = 'Register';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/db.php';

$db = new Database(); // no need to pass $pdo
$userModel = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) {
        flash('error', 'Invalid CSRF token.');
        redirect(BASE_URL . '/register.php');
    }

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if ($name === '' || $email === '' || $password === '') {
        flash('error', 'All fields are required.');
        redirect(BASE_URL . '/register.php');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        flash('error', 'Invalid email address.');
        redirect(BASE_URL . '/register.php');
    }
    if ($password !== $confirm) {
        flash('error', 'Passwords do not match.');
        redirect(BASE_URL . '/register.php');
    }
    if ($userModel->findByEmail($email)) {
        flash('error', 'Email already registered.');
        redirect(BASE_URL . '/register.php');
    }

    // ✅ Pass 3 arguments instead of array
    $id = $userModel->create($name, $email, $password);

    $_SESSION['user'] = $userModel->findById((int)$id);
    flash('success', 'Registration successful.');
    redirect(BASE_URL . '/index.php');
}
?>

<?php include __DIR__ . '/includes/header.php'; ?>

<h1 class="text-2xl font-bold mb-4">Register</h1>
<form method="post" action="<?php echo BASE_URL; ?>/register.php" class="space-y-4 max-w-md">
    <input type="hidden" name="csrf" value="<?php echo e(csrf_token()); ?>">

    <div>
        <label class="block font-medium">Name</label>
        <input type="text" name="name" required class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block font-medium">Email</label>
        <input type="email" name="email" required class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block font-medium">Password</label>
        <input type="password" name="password" required class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block font-medium">Confirm Password</label>
        <input type="password" name="confirm_password" required class="w-full border rounded px-3 py-2">
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Register</button>
</form>

<?php include __DIR__ . '/includes/footer.php'; ?>
