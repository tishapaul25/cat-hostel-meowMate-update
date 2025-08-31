<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = []; // [ productId => ['name','price','img','qty'] ]

function cart_add(array $item): array {
  // $item = ['id'=>int,'name'=>string,'price'=>float,'img'=>string,'qty'=>int]
  $id = (string)($item['id'] ?? '');
  if ($id === '') return cart_state();

  if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = [
      'id'    => (int)$id,
      'name'  => (string)($item['name'] ?? 'Product'),
      'price' => (float)($item['price'] ?? 0),
      'img'   => (string)($item['img'] ?? ''),
      'qty'   => max(1, (int)($item['qty'] ?? 1)),
    ];
  } else {
    $_SESSION['cart'][$id]['qty'] += max(1, (int)($item['qty'] ?? 1));
  }
  return cart_state();
}

function cart_remove($id): array {
  $id = (string)$id;
  if (isset($_SESSION['cart'][$id])) unset($_SESSION['cart'][$id]);
  return cart_state();
}

function cart_state(): array {
  $items = array_values($_SESSION['cart']);
  $count = 0; $total = 0.0;
  foreach ($items as $it) { $count += (int)$it['qty']; $total += ((float)$it['price']) * (int)$it['qty']; }
  return ['items'=>$items, 'count'=>$count, 'total'=>$total];
}
