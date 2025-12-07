<?php
// includes/navbar.php
?>
<header>
  <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <div class="text-xl font-bold text-indigo-600">Event Management</div>
      <div class="space-x-4">
        <a href="<?php echo BASE_URL; ?>/index.php" class="text-gray-700 hover:text-indigo-600">Home</a>
        <a href="<?php echo BASE_URL; ?>/events.php" class="text-gray-700 hover:text-indigo-600">Browse Events</a>
        <a href="<?php echo BASE_URL; ?>/about.php" class="text-gray-700 hover:text-indigo-600">About</a>
        <a href="<?php echo BASE_URL; ?>/contact.php" class="text-gray-700 hover:text-indigo-600">Contact</a>
        <?php if (is_logged_in()): ?>
          <a href="<?php echo BASE_URL; ?>/user/my-events.php" class="text-gray-700 hover:text-indigo-600">My Events</a>
          <?php if (is_admin()): ?>
            <a href="<?php echo BASE_URL; ?>/admin/dashboard.php" class="text-gray-700 hover:text-indigo-600">Admin</a>
          <?php endif; ?>
          <a href="<?php echo BASE_URL; ?>/logout.php" class="text-red-600 hover:text-red-800">Logout</a>
        <?php else: ?>
          <a href="<?php echo BASE_URL; ?>/login.php" class="text-gray-700 hover:text-indigo-600">Login</a>
          <a href="<?php echo BASE_URL; ?>/register.php" class="text-gray-700 hover:text-indigo-600">Register</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</header>
