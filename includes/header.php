<?php
// includes/header.php
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo e($title ?? 'Event Management'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind CSS via CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800">
  <?php include __DIR__ . '/navbar.php'; ?>
  <div class="container mx-auto px-4 py-6">
    <?php render_flash(); ?>
