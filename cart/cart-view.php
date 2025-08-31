<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/cart.php';
echo json_encode(['ok'=>true] + cart_state());
