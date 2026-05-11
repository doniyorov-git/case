<?php
header('Content-Type: application/json');
require_once '../../config/db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

try {
    // In a real app, this would come from the database.
    // I'll create a mock response for now, or I can try to fetch from DB if I had a schema.
    // Let's assume the table 'cases' exists.
    
    $stmt = $pdo->query("SELECT * FROM cases LIMIT 10");
    $cases = $stmt->fetchAll();

    if (!$cases) {
        // Fallback for demo purposes if table is empty
        $cases = [
            ['id' => 1, 'title' => '68-F Exertional Chest Pain', 'specialty' => 'Cardiology', 'difficulty' => 'Medium', 'description' => 'Patient presents with radiating jaw pain during exercise.', 'est_time' => 15],
            ['id' => 2, 'title' => '32-M Sudden Onset Weakness', 'specialty' => 'Neurology', 'difficulty' => 'Hard', 'description' => 'Acute unilateral hemiparesis and aphasia in a young adult.', 'est_time' => 25],
            ['id' => 3, 'title' => '24-F Chronic Cough', 'specialty' => 'Pulmonology', 'difficulty' => 'Easy', 'description' => 'Persistent dry cough for 6 weeks, worse at night.', 'est_time' => 10],
            ['id' => 4, 'title' => '45-M LLQ Pain', 'specialty' => 'Gastroenterology', 'difficulty' => 'Medium', 'description' => 'Progressive lower left quadrant abdominal pain and fever.', 'est_time' => 18]
        ];
    }

    echo json_encode(['success' => true, 'cases' => $cases]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
