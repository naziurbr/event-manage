<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo json_encode(['error'=>'Method not allowed']); exit; }

$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
$name = trim($input['name'] ?? '');
$email = trim($input['email'] ?? '');
$password = $input['password'] ?? '';

if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
    http_response_code(422);
    echo json_encode(['error' => 'Invalid input']); exit;
}

$db = new Database($pdo);
$user = new User($db);
if ($user->findByEmail($email)) { http_response_code(409); echo json_encode(['error'=>'Email exists']); exit; }

$id = $user->create(['name'=>$name,'email'=>$email,'password'=>$password]);
$_SESSION['user'] = $user->findById((int)$id);
echo json_encode(['success'=>true,'user_id'=>$id]);
