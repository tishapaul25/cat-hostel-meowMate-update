<?php
header('Content-Type: application/json');
require_once 'database.php';
$conn = getDatabaseConnection();

// Check request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $status = isset($_POST['status']) ? strtolower(trim($_POST['status'])) : '';

    // Allow only "active" or "denied"
    if ($id > 0 && in_array($status, ['active', 'denied'])) {
        $stmt = $conn->prepare("UPDATE hostel_providers SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "msg" => "Status updated successfully"]);
        } else {
            echo json_encode(["success" => false, "msg" => "Database update failed"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "msg" => "Invalid input"]);
    }
} else {
    echo json_encode(["success" => false, "msg" => "Invalid request"]);
}

$conn->close();
?>