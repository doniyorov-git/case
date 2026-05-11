<?php
header('Content-Type: application/json');
require_once '../../config/db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

try {
    // Mock case data based on IDs
    $cases = [
        1 => [
            'id' => 1,
            'title' => 'Acute Chest Pain',
            'patient_name' => 'John Doe',
            'age' => 42,
            'gender' => 'Male',
            'complaint' => 'Severe Chest Pain',
            'initial_statement' => "Hi Doctor. It started about an hour ago while I was shoveling snow. It feels like an elephant is sitting on my chest.",
            'vitals' => ['hr' => 110, 'sbp' => 155, 'dbp' => 95]
        ],
        2 => [
            'id' => 2,
            'title' => 'Sudden Weakness',
            'patient_name' => 'Michael Smith',
            'age' => 32,
            'gender' => 'Male',
            'complaint' => 'Unilateral Weakness',
            'initial_statement' => "I was just sitting at my desk when my right arm suddenly went limp and I couldn't find my words.",
            'vitals' => ['hr' => 88, 'sbp' => 140, 'dbp' => 90]
        ]
    ];

    $case = isset($cases[$id]) ? $cases[$id] : $cases[1];
    
    echo json_encode(['success' => true, 'case' => $case]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error']);
}
?>
