<?php
header('Content-Type: application/json');
require_once '../../config/db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

try {
    // In a real app, this would be fetched from the 'users' or 'user_stats' table.
    // For demo, I'll return mock data.
    
    $stats = [
        'level' => 24,
        'xp' => 2450,
        'next_level_xp' => 3000,
        'streak' => 5,
        'accuracy' => 92,
        'cases_completed' => 148,
        'role_title' => 'Senior Attending'
    ];

    echo json_encode(['success' => true, 'stats' => $stats]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error']);
}
?>
