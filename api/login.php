<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo json_encode(['error'=>'Method not allowed']); exit; }

$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
$email = trim($input['email'] ?? '');
$password = $input['password'] ?? '';

$db = new Database($pdo);
$userModel = new User($db);
$user = $userModel->findByEmail($email);

if (!$user || !$userModel->verifyPassword($user, $password)) {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid credentials']); exit;
}

$_SESSION['user'] = [
    'id' => $user['id'],
     'name' => $user['name'],
    'email' => $user['email'],
     'role' => $user['role'],
      'avatar' => $user['avatar'],
];
echo json_encode(['success' => true]);
