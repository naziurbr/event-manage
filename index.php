<?php
$title = 'Home';
require_once __DIR__ . '/config/config.php';
include __DIR__ . '/includes/header.php';
?>
<div class="text-center">
  <h1 class="text-4xl font-bold text-indigo-700 mb-4">Welcome to Event Management</h1>
  <p class="text-lg text-gray-600 mb-6">Discover and book events with ease.</p>
  <div class="space-x-4">
    <a href="<?php echo BASE_URL; ?>/events.php" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Browse Events</a>
    <?php if (!is_logged_in()): ?>
      <a href="<?php echo BASE_URL; ?>/login.php" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Login</a>
      <a href="<?php echo BASE_URL; ?>/register.php" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Register</a>
    <?php endif; ?>
  </div>
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
