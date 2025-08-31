<?php
header('Content-Type: application/json');
require_once 'database.php';
$conn = getDatabaseConnection();

// DELETE product
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Product deleted']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete product']);
    }
    exit; // important: stop further execution
}

// GET products
$sql = "SELECT id, name, category, price, sale_price, stock, status, short_desc, image 
        FROM products";
$result = $conn->query($sql);

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode([
    "success" => true,
    "products" => $products
]);
?>