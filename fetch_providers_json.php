<?php
header('Content-Type: application/json');
require_once 'database.php';
$conn = getDatabaseConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle status update
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $status = isset($_POST['status']) ? strtolower(trim($_POST['status'])) : '';

    if ($id > 0 && in_array($status, ['active', 'denied'])) {
        $stmt = $conn->prepare("UPDATE hostel_providers SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "msg" => "Status updated", "id" => $id, "status" => $status]);
        } else {
            echo json_encode(["success" => false, "msg" => "Database update failed"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "msg" => "Invalid input"]);
    }

    $conn->close();
    exit;
}

// Otherwise: GET request → fetch providers
$sql = "SELECT id, full_name, address, experience_years, services, max_capacity, overnight_rate, id_document, status 
        FROM hostel_providers 
        WHERE status = 'active'";


$result = $conn->query($sql);

$providers = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $providers[] = $row;
    }
}

echo json_encode([
    "success" => true,
    "providers" => $providers
]);

$conn->close();
?>