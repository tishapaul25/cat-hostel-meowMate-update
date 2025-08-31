<?php
// checkout.php  (self-contained remove + place-order handling)

// Use the same session cart utilities
require_once __DIR__ . '/cart/cart.php';

// Choose the correct products page automatically
$productsUrl = 'product.php';
if (!file_exists(__DIR__ . '/product.php')) {
    if (file_exists(__DIR__ . '/products.php'))       $productsUrl = 'products.php';
    elseif (file_exists(__DIR__ . '/products-page.php')) $productsUrl = 'products-page.php';
}

// --- Handle POST actions BEFORE any output (so redirects work) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Remove a single line item
    if (isset($_POST['remove_id'])) {
        cart_remove($_POST['remove_id']);
        header('Location: checkout.php'); // PRG pattern
        exit;
    }
    // Place order (stub: clear cart)
    if (isset($_POST['place_order'])) {
        $_SESSION['cart'] = [];
        header('Location: checkout.php?placed=1'); // show success message
        exit;
    }
}

// Page meta AFTER processing
$page_title = "Checkout - PurrfectStay";
$page_description = "Review your cart and complete the purchase.";
include 'includes/header.php';

// Current cart state
$state = cart_state();
$items = $state['items'];
$total = $state['total'];
$placed = isset($_GET['placed']);
?>

<div class="flex flex-col min-h-screen bg-gradient-to-br from-green-50 to-emerald-50">
    <?php include 'includes/navbar.php'; ?>

    <main class="flex-1">
        <section class="py-12">
            <div class="container mx-auto px-4 max-w-5xl">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Checkout</h1>

                <?php if ($placed): ?>
                    <div class="bg-white border border-green-200 text-green-800 px-4 py-3 rounded-md mb-6">
                        ✅ Your order has been placed successfully. Thank you!
                    </div>
                    <a href="<?php echo htmlspecialchars($productsUrl, ENT_QUOTES); ?>"
                       class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md font-medium">
                        Continue Shopping
                    </a>
                <?php else: ?>

                    <?php if (empty($items)): ?>
                        <div class="bg-white border border-yellow-200 text-yellow-800 px-4 py-3 rounded-md mb-6">
                            Your cart is empty.
                        </div>
                        <a href="<?php echo htmlspecialchars($productsUrl, ENT_QUOTES); ?>"
                           class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md font-medium">
                            Go to Products
                        </a>
                    <?php else: ?>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Cart items -->
                            <div class="lg:col-span-2 space-y-4">
                                <?php foreach ($items as $it): ?>
                                    <div class="bg-white border border-gray-200 rounded-md p-4 flex items-center gap-4">
                                        <img src="<?php echo htmlspecialchars($it['img'], ENT_QUOTES); ?>" alt=""
                                             class="w-20 h-20 object-cover rounded-md">
                                        <div class="flex-1">
                                            <div class="font-semibold text-gray-900">
                                                <?php echo htmlspecialchars($it['name'], ENT_QUOTES); ?>
                                            </div>
                                            <div class="text-gray-600">
                                                $<?php echo number_format((float)$it['price'], 2); ?> × <?php echo (int)$it['qty']; ?>
                                            </div>
                                        </div>
                                        <!-- Remove posts back to THIS page -->
                                        <form method="post" class="ml-2">
                                            <input type="hidden" name="remove_id" value="<?php echo (int)$it['id']; ?>">
                                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Summary -->
                            <div>
                                <div class="bg-white border border-gray-200 rounded-md p-4">
                                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h2>
                                    <div class="flex justify-between text-gray-700 mb-3">
                                        <span>Subtotal</span>
                                        <span>$<?php echo number_format((float)$total, 2); ?></span>
                                    </div>
                                    <div class="flex justify-between text-gray-700 mb-3">
                                        <span>Shipping</span>
                                        <span>$0.00</span>
                                    </div>
                                    <div class="flex justify-between font-semibold text-gray-900 border-t pt-3">
                                        <span>Total</span>
                                        <span>$<?php echo number_format((float)$total, 2); ?></span>
                                    </div>

                                    <form method="post" class="mt-4">
                                        <button type="submit" name="place_order"
                                                class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-md font-medium">
                                            Place Order
                                        </button>
                                    </form>
                                    <a href="<?php echo htmlspecialchars($productsUrl, ENT_QUOTES); ?>"
                                       class="block text-center mt-3 text-green-700 hover:text-green-800">
                                        Continue Shopping
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
