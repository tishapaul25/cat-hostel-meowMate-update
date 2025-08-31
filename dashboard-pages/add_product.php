<?php
require 'database.php';

header('Content-Type: application/json');
echo json_encode(['success' => true, 'message' => 'Product added successfully!']);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $short_desc = $_POST['short_desc'];
    $full_desc = $_POST['full_desc'];
    $price = $_POST['price'];
    $sale_price = $_POST['sale_price'] ?? null;
    $stock = $_POST['stock'];
    $sku = $_POST['sku'] ?? null;
    $weight = $_POST['weight'] ?? null;
    $status = $_POST['status'];

    // Handle image upload to ImgBB
    $image_url = null;
    if (!empty($_FILES['product_image']['tmp_name'])) {
        $apiKey = "805a467864b22ceeb93bbc95a9c0f2c5";

        $imageData = base64_encode(file_get_contents($_FILES['product_image']['tmp_name']));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.imgbb.com/1/upload?key=$apiKey");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'image' => $imageData
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        if (isset($result['data']['url'])) {
            $image_url = $result['data']['url'];
        } else {
            echo json_encode(['success' => false, 'message' => 'Image upload failed']);
            exit;
        }
    }

    // Insert into database
    $sql = "INSERT INTO products (name, category, short_desc, full_desc, price, sale_price, stock, sku, weight, status, image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssdisssss",
        $name,
        $category,
        $short_desc,
        $full_desc,
        $price,
        $sale_price,
        $stock,
        $sku,
        $weight,
        $status,
        $image_url
    );



    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Product added successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => $stmt->error]);
    }
}
?>