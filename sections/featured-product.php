<?php
$featuredProducts = [
    [
        'id' => 1,
        'name' => 'Premium Cat Food Bundle',
        'image' => '/placeholder.svg?height=300&width=300&text=Premium+Cat+Food',
        'price' => '$49.99',
        'originalPrice' => '$65.99',
        'discount' => '24%',
        'rating' => 4.8,
        'reviews' => 234,
        'category' => 'Food',
        'badge' => 'Best Seller',
        'description' => 'Complete nutrition bundle with premium dry food, wet food, and healthy treats.',
        'features' => ['High Protein', 'Grain Free', 'Natural Ingredients', 'Vet Approved']
    ],
    [
        'id' => 2,
        'name' => 'Interactive Cat Toy Set',
        'image' => '/placeholder.svg?height=300&width=300&text=Cat+Toy+Set',
        'price' => '$29.99',
        'originalPrice' => '$39.99',
        'discount' => '25%',
        'rating' => 4.9,
        'reviews' => 189,
        'category' => 'Toys',
        'badge' => 'Most Popular',
        'description' => 'Engaging toy set to keep your cat active and entertained for hours.',
        'features' => ['Interactive', 'Durable', 'Safe Materials', 'Multiple Toys']
    ],
    [
        'id' => 3,
        'name' => 'Luxury Cat Bed & Blanket',
        'image' => '/placeholder.svg?height=300&width=300&text=Luxury+Cat+Bed',
        'price' => '$79.99',
        'originalPrice' => '$99.99',
        'discount' => '20%',
        'rating' => 4.7,
        'reviews' => 156,
        'category' => 'Comfort',
        'badge' => 'Premium',
        'description' => 'Ultra-soft luxury bed with matching blanket for the ultimate cat comfort.',
        'features' => ['Memory Foam', 'Washable', 'Anti-Slip', 'Hypoallergenic']
    ],
    [
        'id' => 4,
        'name' => 'Complete Grooming Kit',
        'image' => '/placeholder.svg?height=300&width=300&text=Grooming+Kit',
        'price' => '$34.99',
        'originalPrice' => '$44.99',
        'discount' => '22%',
        'rating' => 4.6,
        'reviews' => 98,
        'category' => 'Grooming',
        'badge' => 'New Arrival',
        'description' => 'Professional grooming tools for maintaining your cat\'s health and appearance.',
        'features' => ['Professional Grade', 'Easy to Use', 'Complete Set', 'Storage Case']
    ]
];
?>

<section class="relative py-20 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-pink-50 via-rose-50 to-orange-50">
        <!-- Large Animated Blobs -->
        <div
            class="absolute top-10 right-10 w-72 h-72 bg-gradient-to-r from-pink-400 to-rose-500 rounded-full opacity-20 animate-blob">
        </div>
        <div
            class="absolute top-32 left-10 w-64 h-64 bg-gradient-to-r from-orange-400 to-pink-500 rounded-full opacity-20 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute bottom-20 right-1/3 w-80 h-80 bg-gradient-to-r from-rose-400 to-orange-500 rounded-full opacity-20 animate-blob animation-delay-4000">
        </div>

        <!-- Floating Particles -->
        <div class="absolute top-1/4 right-1/4 w-2 h-2 bg-pink-400 rounded-full opacity-60 animate-float"></div>
        <div
            class="absolute top-1/3 left-1/4 w-3 h-3 bg-rose-400 rounded-full opacity-40 animate-float animation-delay-1000">
        </div>
        <div
            class="absolute bottom-1/3 right-1/2 w-1 h-1 bg-orange-400 rounded-full opacity-80 animate-float animation-delay-2000">
        </div>
        <div
            class="absolute top-1/2 left-1/3 w-2 h-2 bg-pink-500 rounded-full opacity-50 animate-float animation-delay-3000">
        </div>
        <div
            class="absolute bottom-1/4 left-1/4 w-3 h-3 bg-rose-500 rounded-full opacity-30 animate-float animation-delay-4000">
        </div>

        <!-- Geometric Shapes -->
        <div class="absolute top-1/4 left-1/4 w-8 h-8 border-2 border-pink-300 rotate-45 opacity-30 animate-spin-slow">
        </div>
        <div class="absolute bottom-1/3 right-1/4 w-6 h-6 bg-rose-300 opacity-40 animate-pulse"></div>

        <!-- Animated Lines -->
        <div
            class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-pink-300 to-transparent opacity-50 animate-slide-right">
        </div>
        <div
            class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-rose-300 to-transparent opacity-50 animate-slide-left">
        </div>
    </div>

    <div class="relative container mx-auto px-4 max-w-6xl">
        <!-- Header -->
        <div class="text-center mb-16">
            <div class="inline-block animate-bounce">
                <span
                    class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-pink-100 to-rose-100 text-pink-800 text-sm font-medium rounded-full mb-6 backdrop-blur-sm border border-pink-200">
                    🛍️ Featured Products
                </span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up">
                <span class="bg-gradient-to-r from-pink-600 via-rose-600 to-orange-600 bg-clip-text text-transparent">
                    Premium Products for Your Cat
                </span>
            </h2>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto animate-fade-in-up animation-delay-200">
                Carefully selected premium products that your cats will love. From nutrition to comfort, we have
                everything your feline friend needs.
            </p>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($featuredProducts as $index => $product): ?>
                <div class="group relative bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/50 overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-500 animate-fade-in-up"
                    style="animation-delay: <?php echo $index * 150; ?>ms;">

                    <!-- Product Image -->
                    <div class="relative overflow-hidden">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>"
                            class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500" />

                        <!-- Discount Badge -->
                        <div class="absolute top-3 left-3 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">
                            -<?php echo $product['discount']; ?>
                        </div>

                        <!-- Category Badge -->
                        <div
                            class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm text-gray-700 px-2 py-1 rounded-full text-xs font-medium">
                            <?php echo $product['category']; ?>
                        </div>

                        <!-- Product Badge -->
                        <div
                            class="absolute bottom-3 left-3 bg-gradient-to-r from-pink-500 to-rose-500 text-white px-3 py-1 rounded-full text-xs font-medium">
                            <?php echo $product['badge']; ?>
                        </div>

                        <!-- Quick Actions -->
                        <div
                            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-2">
                            <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                            <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="p-4">
                        <!-- Rating -->
                        <div class="flex items-center gap-1 mb-2">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <svg class="w-4 h-4 <?php echo $i <= floor($product['rating']) ? 'text-yellow-400' : 'text-gray-300'; ?>"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            <?php endfor; ?>
                            <span class="text-sm text-gray-600 ml-1">(<?php echo $product['reviews']; ?>)</span>
                        </div>

                        <!-- Product Name -->
                        <h3 class="font-bold text-gray-900 mb-2 group-hover:text-pink-600 transition-colors line-clamp-2">
                            <?php echo $product['name']; ?>
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                            <?php echo $product['description']; ?>
                        </p>

                        <!-- Features -->
                        <div class="mb-3">
                            <div class="flex flex-wrap gap-1">
                                <?php foreach (array_slice($product['features'], 0, 2) as $feature): ?>
                                    <span
                                        class="px-2 py-1 bg-gradient-to-r from-pink-100 to-rose-100 text-pink-700 text-xs rounded-full">
                                        <?php echo $feature; ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Price and Action -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="text-xl font-bold text-green-600"><?php echo $product['price']; ?></span>
                                <span
                                    class="text-sm text-gray-500 line-through"><?php echo $product['originalPrice']; ?></span>
                            </div>
                        </div>

                        <!-- Add to Cart Button -->
                        <button onclick="addToCart(<?php echo $product['id']; ?>)"
                            class="w-full mt-3 bg-gradient-to-r from-pink-600 to-rose-600 hover:from-pink-700 hover:to-rose-700 text-white py-2 px-4 rounded-lg text-sm font-medium transition-all duration-300 hover:scale-105 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5 6m0 0h9M17 21a2 2 0 100-4 2 2 0 000 4zM9 21a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                            Add to Cart
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a href="products-page.php"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-pink-600 to-rose-600 hover:from-pink-700 hover:to-rose-700 text-white px-8 py-4 rounded-xl font-medium text-lg transition-all duration-300 hover:scale-105 hover:shadow-lg">
                <span>Shop All Products</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                    </path>
                </svg>
            </a>
        </div>
    </div>
</section>

<script>
    function addToCart(productId) {
        // Get existing cart from localStorage
        let cart = JSON.parse(localStorage.getItem('cart') || '[]');

        // Check if product already exists in cart
        let existingItem = cart.find(item => item.id === productId);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ id: productId, quantity: 1 });
        }

        // Save updated cart to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Show success message
        alert('Product added to cart successfully!');

        // Update cart count if you have a cart counter in your header
        updateCartCount();
    }

    function updateCartCount() {
        let cart = JSON.parse(localStorage.getItem('cart') || '[]');
        let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);

        // Update cart count in header if element exists
        let cartCountElement = document.getElementById('cart-count');
        if (cartCountElement) {
            cartCountElement.textContent = totalItems;
        }
    }
</script>

<style>
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1) rotate(0deg);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1) rotate(120deg);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9) rotate(240deg);
        }

        100% {
            transform: translate(0px, 0px) scale(1) rotate(360deg);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes slide-right {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    @keyframes slide-left {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-blob {
        animation: blob 12s infinite;
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-spin-slow {
        animation: spin-slow 8s linear infinite;
    }

    .animate-slide-right {
        animation: slide-right 15s linear infinite;
    }

    .animate-slide-left {
        animation: slide-left 15s linear infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }

    .animation-delay-200 {
        animation-delay: 200ms;
    }

    .animation-delay-1000 {
        animation-delay: 1000ms;
    }

    .animation-delay-2000 {
        animation-delay: 2000ms;
    }

    .animation-delay-3000 {
        animation-delay: 3000ms;
    }

    .animation-delay-4000 {
        animation-delay: 4000ms;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>