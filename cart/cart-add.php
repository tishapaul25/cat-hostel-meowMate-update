<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/cart.php';   // <- same folder

$data = $_POST ?: json_decode(file_get_contents('php://input'), true) ?: [];
$state = cart_add([
  'id'    => $data['id']    ?? null,
  'name'  => $data['name']  ?? null,
  'price' => $data['price'] ?? 0,
  'img'   => $data['img']   ?? '',
  'qty'   => $data['qty']   ?? 1,
]);
echo json_encode(['ok'=>true] + $state);
