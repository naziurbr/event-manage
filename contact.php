<?php
$title = 'Contact';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/db.php';
include __DIR__ . '/includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check($_POST['csrf'] ?? '')) {
        flash('error', 'Invalid CSRF token.');
        redirect(BASE_URL . '/contact.php');
    }

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        flash('error', 'Name, email, and message are required.');
        redirect(BASE_URL . '/contact.php');
    }

    $db = new Database(); // uses internal PDO from db.php
    $db->insert(
        'INSERT INTO contact_messages (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())',
        [$name, $email, $subject, $message]
    );

    flash('success', 'Message sent. We will contact you soon.');
    redirect(BASE_URL . '/contact.php');
}
?>

<h1 class="text-2xl font-bold mb-4">Contact</h1>
<form method="post" action="<?php echo BASE_URL; ?>/contact.php" class="space-y-4 max-w-xl">
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
    <label class="block font-medium">Subject</label>
    <input type="text" name="subject" class="w-full border rounded px-3 py-2">
  </div>

  <div>
    <label class="block font-medium">Message</label>
    <textarea name="message" required class="w-full border rounded px-3 py-2 h-32"></textarea>
  </div>

  <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Send</button>
</form>

<?php include __DIR__ . '/includes/footer.php'; ?>
