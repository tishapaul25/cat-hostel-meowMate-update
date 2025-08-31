<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/cart.php';

$id = $_POST['id'] ?? (json_decode(file_get_contents('php://input'), true)['id'] ?? null);
$state = cart_remove($id);
echo json_encode(['ok'=>true] + $state);
