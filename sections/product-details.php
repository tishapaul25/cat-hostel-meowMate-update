<!-- Header -->

<?php include '../includes/navbar.php'; ?>
<?php
if (!isset($_GET['id'])) {
    echo "Product ID not provided!";
    exit;
}

$productId = intval($_GET['id']);
require_once __DIR__ . '/../database.php';
$conn = getDatabaseConnection();

$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo "Product not found!";
    exit;
}

// Make sure optional fields exist
$product['images'] = isset($product['images']) ? json_decode($product['images'], true) : [$product['image']];
$product['badge'] = $product['badge'] ?? '';
$product['rating'] = $product['rating'] ?? 0;
$product['reviews'] = $product['reviews'] ?? 0;
$product['original_price'] = $product['original_price'] ?? $product['price'];
$product['full_desc'] = $product['full_desc'] ?? $product[''];
$product['features'] = isset($product['features']) ? json_decode($product['features'], true) : [];
$product['in_stock'] = isset($product['stock']) && $product['stock'] > 0 ? true : false;
$product['brand'] = $product['brand'] ?? 'Unknown';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - MeowMate</title>
    <meta name="description" content="<?php echo $page_description; ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#22c55e',
                        secondary: '#16a34a'
                    },
                    animation: {
                        'bounce-slow': 'bounce 3s infinite',
                        'pulse-slow': 'pulse 4s infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 5px #22c55e, 0 0 10px #22c55e, 0 0 15px #22c55e' },
                            '100%': { boxShadow: '0 0 10px #22c55e, 0 0 20px #22c55e, 0 0 30px #22c55e' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-text {
            background: linear-gradient(45deg, #22c55e, #3b82f6, #8b5cf6, #ef4444);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient-shift 3s ease infinite;
        }

        @keyframes gradient-shift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .floating-shape {
            position: absolute;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
        }

        .floating-shape:nth-child(1) {
            left: 10%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            left: 20%;
            animation-delay: 1s;
        }

        .floating-shape:nth-child(3) {
            left: 30%;
            animation-delay: 2s;
        }

        .floating-shape:nth-child(4) {
            left: 40%;
            animation-delay: 3s;
        }

        .floating-shape:nth-child(5) {
            left: 50%;
            animation-delay: 4s;
        }

        .floating-shape:nth-child(6) {
            left: 60%;
            animation-delay: 5s;
        }

        .floating-shape:nth-child(7) {
            left: 70%;
            animation-delay: 6s;
        }

        .floating-shape:nth-child(8) {
            left: 80%;
            animation-delay: 7s;
        }

        .image-zoom {
            transition: transform 0.3s ease;
        }

        .image-zoom:hover {
            transform: scale(1.1);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tab-button.active {
            background: linear-gradient(to right, #16a34a, #059669);
            color: white;
        }
    </style>
</head>

<body class="bg-gray-50">


    <!-- Breadcrumb -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="index.php" class="text-gray-500 hover:text-primary">Home</a>
            <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
            <a href="products-page.php" class="text-gray-500 hover:text-primary">Products</a>
            <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
            <span class="text-primary font-medium"><?php echo $product['name']; ?></span>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Images -->
            <div>
                <!-- Main Image -->
                <div class="mb-6 relative">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <img id="main-image" src="<?php echo $product['images'][0]; ?>"
                            alt="<?php echo $product['name']; ?>" class="w-full h-96 md:h-[500px] object-cover">

                        <?php if ($product['badge']): ?>
                            <span class="absolute top-4 left-4 px-3 py-1 text-sm font-bold rounded-full
                                <?php
                                echo $product['badge'] === 'Best Seller' ? 'bg-green-500 text-white' :
                                    ($product['badge'] === 'Sale' ? 'bg-red-500 text-white' : 'bg-blue-500 text-white');
                                ?>">
                                <?php echo $product['badge']; ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Thumbnail Images -->
                <div class="grid grid-cols-3 gap-4">
                    <?php foreach ($product['images'] as $index => $image): ?>
                        <button
                            class="thumbnail-btn bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow <?php echo $index === 0 ? 'ring-2 ring-primary' : ''; ?>"
                            data-image="<?php echo $image; ?>">
                            <img src="<?php echo $image; ?>" alt="Product view <?php echo $index + 1; ?>"
                                class="w-full h-20 md:h-24 object-cover">
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Product Info -->
            <div>
                <!-- Title and Rating -->
                <div class="mb-6">
                    <span
                        class="text-sm font-medium text-primary bg-green-100 px-3 py-1 rounded-full mb-3 inline-block"><?php echo $product['category']; ?></span>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"><?php echo $product['name']; ?></h1>

                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i data-lucide="star"
                                    class="w-5 h-5 <?php echo $i <= floor($product['rating']) ? 'text-yellow-400 fill-current' : 'text-gray-300'; ?>"></i>
                            <?php endfor; ?>
                        </div>
                        <span class="text-lg font-medium text-gray-700"><?php echo $product['rating']; ?></span>
                        <span class="text-gray-500">(<?php echo $product['reviews']; ?> reviews)</span>
                    </div>
                </div>

                <!-- Price -->
                <div class="mb-8">
                    <div class="flex items-center gap-4 mb-2">
                        <span
                            class="text-4xl font-bold text-primary">$<?php echo number_format($product['price'], 2); ?></span>
                        <?php if ($product['original_price'] > $product['price']): ?>
                            <span
                                class="text-2xl text-gray-500 line-through">$<?php echo number_format($product['original_price'], 2); ?></span>
                            <span class="text-lg font-bold text-red-600 bg-red-100 px-3 py-1 rounded-full">
                                <?php echo round((($product['original_price'] - $product['price']) / $product['original_price']) * 100); ?>%
                                OFF
                            </span>
                        <?php endif; ?>
                    </div>
                    <p class="text-gray-600">Free shipping on orders over $50</p>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <p class="text-gray-700 text-lg leading-relaxed"><?php echo $product['full_desc']; ?></p>
                </div>

                <!-- Features -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Key Features:</h3>
                    <ul class="space-y-3">
                        <?php foreach ($product['features'] as $feature): ?>
                            <li class="flex items-center text-gray-700">
                                <i data-lucide="check-circle" class="w-5 h-5 text-primary mr-3"></i>
                                <?php echo $feature; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Stock Status -->
                <div class="mb-8">
                    <?php if ($product['in_stock']): ?>
                        <div class="flex items-center text-green-600 mb-2">
                            <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                            <span class="font-medium">In Stock (<?php echo $product['in_stock']; ?> available)</span>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center text-red-600 mb-2">
                            <i data-lucide="x-circle" class="w-5 h-5 mr-2"></i>
                            <span class="font-medium">Out of Stock</span>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Quantity and Add to Cart -->
                <div class="mb-8">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex items-center border-2 border-gray-300 rounded-lg overflow-hidden">
                            <button id="decrease-qty" class="px-4 py-3 hover:bg-gray-100">
                                <i data-lucide="minus" class="w-5 h-5"></i>
                            </button>
                            <input type="number" id="quantity" value="1" min="1"
                                max="<?php echo $product['in_stock']; ?>"
                                class="w-20 text-center py-3 border-0 focus:ring-0">
                            <button id="increase-qty" class="px-4 py-3 hover:bg-gray-100">
                                <i data-lucide="plus" class="w-5 h-5"></i>
                            </button>
                        </div>

                        <button id="add-to-cart"
                            class="flex-1 bg-primary text-white py-4 px-8 rounded-lg hover:bg-secondary transition-colors font-bold text-lg flex items-center justify-center space-x-3 <?php echo !$product['in_stock'] ? 'opacity-50 cursor-not-allowed' : ''; ?>"
                            <?php echo !$product['in_stock'] ? 'disabled' : ''; ?>>
                            <i data-lucide="shopping-cart" class="w-6 h-6"></i>
                            <span><?php echo $product['in_stock'] ? 'Add to Cart' : 'Out of Stock'; ?></span>
                        </button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 mb-8">
                    <button id="add-to-wishlist"
                        class="flex-1 border-2 border-red-500 text-red-500 py-3 px-6 rounded-lg hover:bg-red-50 transition-colors font-bold flex items-center justify-center space-x-2">
                        <i data-lucide="heart" class="w-5 h-5"></i>
                        <span>Add to Wishlist</span>
                    </button>

                    <button
                        class="flex-1 border-2 border-blue-500 text-blue-500 py-3 px-6 rounded-lg hover:bg-blue-50 transition-colors font-bold flex items-center justify-center space-x-2">
                        <i data-lucide="share-2" class="w-5 h-5"></i>
                        <span>Share</span>
                    </button>
                </div>

                <!-- Product Info -->
                <div class="bg-gray-100 rounded-lg p-6">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-600">Brand:</span>
                            <span class="font-medium ml-2"><?php echo $product['brand']; ?></span>
                        </div>
                        <div>
                            <span class="text-gray-600">Category:</span>
                            <span class="font-medium ml-2"><?php echo $product['category']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Description -->
        <div class="mt-16">
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Product Description</h3>
                <p class="text-gray-700 text-lg leading-relaxed mb-6"><?php echo $product['full_desc']; ?></p>

                <h4 class="text-xl font-bold text-gray-900 mb-4">Features & Benefits:</h4>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <?php foreach ($product['features'] as $feature): ?>
                        <li class="flex items-start text-gray-700">
                            <i data-lucide="check-circle" class="w-5 h-5 text-primary mr-3 mt-0.5"></i>
                            <span><?php echo $feature; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast"
        class="fixed top-20 right-4 bg-primary text-white px-6 py-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center space-x-3">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span id="toast-message">Product added to cart!</span>
        </div>
    </div>

    <script>
        lucide.createIcons();

        // Global variables
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        const product = <?php echo json_encode($product); ?>;

        // Show toast notification
        function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');

            toastMessage.textContent = message;
            toast.style.transform = 'translateX(0)';

            setTimeout(() => {
                toast.style.transform = 'translateX(100%)';
            }, 3000);
        }

        // Update cart count
        function updateCartCount() {
            document.getElementById('cart-count').textContent = cart.length;
            document.getElementById('wishlist-count').textContent = wishlist.length;
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function () {
            updateCartCount();

            // Thumbnail image switching
            document.querySelectorAll('.thumbnail-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const newImage = this.dataset.image;
                    document.getElementById('main-image').src = newImage;

                    // Update active thumbnail
                    document.querySelectorAll('.thumbnail-btn').forEach(b => {
                        b.classList.remove('ring-2', 'ring-primary');
                    });
                    this.classList.add('ring-2', 'ring-primary');
                });
            });

            // Quantity controls
            const quantityInput = document.getElementById('quantity');
            const decreaseBtn = document.getElementById('decrease-qty');
            const increaseBtn = document.getElementById('increase-qty');

            decreaseBtn.addEventListener('click', function () {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            increaseBtn.addEventListener('click', function () {
                const currentValue = parseInt(quantityInput.value);
                const maxValue = parseInt(quantityInput.max);
                if (currentValue < maxValue) {
                    quantityInput.value = currentValue + 1;
                }
            });

            // Add to cart
            document.getElementById('add-to-cart').addEventListener('click', function () {
                if (this.disabled) return;

                const quantity = parseInt(quantityInput.value);

                // Check if product already exists in cart
                const existingItem = cart.find(item => item.id === product.id.toString());

                if (existingItem) {
                    existingItem.quantity += quantity;
                } else {
                    cart.push({
                        id: product.id.toString(),
                        name: product.name,
                        price: product.price,
                        quantity: quantity,
                        image: product.images[0]
                    });
                }

                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartCount();
                showToast(`${product.name} added to cart!`);
            });

            // Add to wishlist
            document.getElementById('add-to-wishlist').addEventListener('click', function () {
                const productId = product.id.toString();
                const textSpan = this.querySelector('span');

                if (wishlist.includes(productId)) {
                    wishlist = wishlist.filter(id => id !== productId);
                    this.classList.remove('bg-red-50', 'border-red-600', 'text-red-600');
                    this.classList.add('border-red-500', 'text-red-500');
                    textSpan.textContent = 'Add to Wishlist';
                    showToast('Removed from wishlist');
                } else {
                    wishlist.push(productId);
                    this.classList.remove('border-red-500', 'text-red-500');
                    this.classList.add('bg-red-50', 'border-red-600', 'text-red-600');
                    textSpan.textContent = 'Remove from Wishlist';
                    showToast('Added to wishlist!');
                }

                localStorage.setItem('wishlist', JSON.stringify(wishlist));
                updateCartCount();
            });

            // Initialize wishlist state
            if (wishlist.includes(product.id.toString())) {
                const wishlistBtn = document.getElementById('add-to-wishlist');
                const textSpan = wishlistBtn.querySelector('span');
                wishlistBtn.classList.remove('border-red-500', 'text-red-500');
                wishlistBtn.classList.add('bg-red-50', 'border-red-600', 'text-red-600');
                textSpan.textContent = 'Remove from Wishlist';
            }
        });
    </script>
</body>

</html>