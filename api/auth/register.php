<?php
header('Content-Type: application/json');
require_once '../../config/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['email']) || !isset($data['password'])) {
    echo json_encode(['success' => false, 'message' => 'Missing data']);
    exit;
}

$email = $data['email'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);
$role = isset($data['role']) ? $data['role'] : 'student';

try {
    $stmt = $pdo->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$email, $password, $role]);
    echo json_encode(['success' => true, 'message' => 'User registered successfully']);
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo json_encode(['success' => false, 'message' => 'Email already exists']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Registration failed']);
    }
}
?>
