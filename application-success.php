<?php
// Include your database connection
require_once 'database.php';
$conn = getDatabaseConnection();

// 🔑 Your ImgBB API key
define("IMGBB_API_KEY", "805a467864b22ceeb93bbc95a9c0f2c5");

// Upload single file
function imgg($fileInputName)
{
    if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $fileTmp = $_FILES[$fileInputName]['tmp_name'];
    $imageData = base64_encode(file_get_contents($fileTmp));

    $url = "https://api.imgbb.com/1/upload?key=" . IMGBB_API_KEY;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['image' => $imageData]);

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);
    return $result['data']['url'] ?? null;
}

// Upload multiple files
function uploadMultiple($inputName)
{
    $urls = [];
    if (!empty($_FILES[$inputName]['name'][0])) {
        foreach ($_FILES[$inputName]['tmp_name'] as $index => $tmpName) {
            if ($_FILES[$inputName]['error'][$index] === 0) {
                $imageData = base64_encode(file_get_contents($tmpName));
                $url = "https://api.imgbb.com/1/upload?key=" . IMGBB_API_KEY;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ['image' => $imageData]);

                $response = curl_exec($ch);
                curl_close($ch);

                $result = json_decode($response, true);
                if (isset($result['data']['url'])) {
                    $urls[] = $result['data']['url'];
                }
            }
        }
    }
    return $urls;
}

// Collect form data
$full_name = $_POST['first_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$experience_years = $_POST['experience_years'];
$own_cats = $_POST['own_cats'];
$qualifications = $_POST['qualifications'];
$property_type = $_POST['property_type'];
$max_capacity = $_POST['max_capacity'];
$services = isset($_POST['services']) ? implode(",", $_POST['services']) : "";
$facility_desc = $_POST['facility_description'];
$overnight_rate = $_POST['overnight_rate'];
$day_care_rate = $_POST['day_care_rate'] ?? null;
$grooming_rate = $_POST['grooming_rate'] ?? null;

// Upload files
$id_document = imgg('id_document');
$facility_photos = uploadMultiple('facility_photos');
$facility_photos_json = json_encode($facility_photos);

// Insert into database
$stmt = $conn->prepare("INSERT INTO hostel_providers 
    (full_name, email, phone, address, experience_years, own_cats, qualifications, property_type, max_capacity, services, facility_description, overnight_rate, day_care_rate, grooming_rate, id_document, facility_photos) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param(
    "ssssssssssssddss",
    $full_name,
    $email,
    $phone,
    $address,
    $experience_years,
    $own_cats,
    $qualifications,
    $property_type,
    $max_capacity,
    $services,
    $facility_desc,
    $overnight_rate,
    $day_care_rate,
    $grooming_rate,
    $id_document,
    $facility_photos_json
);

$success = $stmt->execute();
$stmt->close();
$conn->close();

// Redirect with success flag
header("Location: dashboard.php?page=add-service&success=" . ($success ? "1" : "0"));
exit;
