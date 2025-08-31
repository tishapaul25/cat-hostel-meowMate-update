<?php
$page_title = "Shopping Cart - PurrfectStay";
$page_description = "Review your selected cat products and proceed to checkout.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_description; ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
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
    </style>
</head>

<body class="bg-gradient-to-br from-green-50 via-white to-blue-50 min-h-screen">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes fixed inset-0 z-0">
        <div class="floating-shape w-20 h-20 bg-green-200 rounded-full"></div>
        <div class="floating-shape w-16 h-16 bg-blue-200 rounded-full"></div>
        <div class="floating-shape w-12 h-12 bg-purple-200 rounded-full"></div>
        <div class="floating-shape w-24 h-24 bg-pink-200 rounded-full"></div>
        <div class="floating-shape w-18 h-18 bg-yellow-200 rounded-full"></div>
        <div class="floating-shape w-14 h-14 bg-indigo-200 rounded-full"></div>
        <div class="floating-shape w-22 h-22 bg-red-200 rounded-full"></div>
        <div class="floating-shape w-10 h-10 bg-teal-200 rounded-full"></div>
    </div>

    <!-- Header -->
    <header class="bg-white/80 backdrop-blur-md shadow-lg sticky top-0 z-50 animate__animated animate__slideInDown">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3 animate-pulse-slow">
                    <div
                        class="w-10 h-10 bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl flex items-center justify-center animate-wiggle">
                        <i data-lucide="cat" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="text-2xl font-bold gradient-text">PurrfectStay</span>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="index.php"
                        class="text-gray-600 hover:text-green-600 transition-all duration-300 hover:scale-110">Home</a>
                    <a href="products-page.php"
                        class="text-gray-600 hover:text-green-600 transition-all duration-300 hover:scale-110">Products</a>
                    <a href="providers.php"
                        class="text-gray-600 hover:text-green-600 transition-all duration-300 hover:scale-110">Providers</a>
                    <a href="contact.php"
                        class="text-gray-600 hover:text-green-600 transition-all duration-300 hover:scale-110">Contact</a>
                </nav>

                <!-- Actions -->
                <div class="flex items-center space-x-4">
                    <button
                        class="p-2 text-gray-600 hover:text-green-600 transition-all duration-300 hover:scale-125 relative">
                        <i data-lucide="search" class="w-5 h-5"></i>
                    </button>
                    <button
                        class="p-2 text-gray-600 hover:text-red-500 transition-all duration-300 hover:scale-125 relative">
                        <i data-lucide="heart" class="w-5 h-5"></i>
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center animate-bounce"
                            id="wishlist-count">0</span>
                    </button>
                    <a href="cart.php"
                        class="p-2 text-green-600 hover:text-green-700 transition-all duration-300 hover:scale-125 relative">
                        <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                        <span
                            class="absolute -top-1 -right-1 bg-green-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center animate-bounce"
                            id="cart-count">0</span>
                    </a>
                    <a href="signin.php"
                        class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-6 py-2 rounded-full hover:from-green-700 hover:to-emerald-700 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Breadcrumb -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 relative z-10">
        <nav class="flex items-center space-x-2 text-sm animate__animated animate__fadeInUp">
            <a href="index.php" class="text-gray-500 hover:text-green-600 transition-colors">Home</a>
            <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
            <span class="text-green-600 font-medium">Shopping Cart</span>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 relative z-10">
        <div class="animate__animated animate__fadeInUp">
            <h1 class="text-4xl md:text-5xl font-bold gradient-text mb-8 text-center">
                Shopping Cart 🛒
            </h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div
                    class="bg-white/90 backdrop-blur-md rounded-2xl shadow-xl border p-6 md:p-8 animate__animated animate__slideInLeft">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <i data-lucide="shopping-bag" class="w-6 h-6 mr-3 text-green-600"></i>
                        Cart Items
                    </h2>

                    <!-- Empty Cart -->
                    <div id="empty-cart" class="text-center py-16">
                        <div class="text-8xl mb-6">🛒</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Your cart is empty</h3>
                        <p class="text-gray-600 mb-8">Add some amazing products for your feline friend!</p>
                        <a href="products-page.php"
                            class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-4 rounded-full hover:from-green-700 hover:to-emerald-700 transition-all duration-300 hover:scale-105 font-bold">
                            Continue Shopping
                        </a>
                    </div>

                    <!-- Cart Items List -->
                    <div id="cart-items" class="space-y-6 hidden">
                        <!-- Items will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div
                    class="bg-white/90 backdrop-blur-md rounded-2xl shadow-xl border p-6 md:p-8 animate__animated animate__slideInRight sticky top-24">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <i data-lucide="calculator" class="w-6 h-6 mr-3 text-green-600"></i>
                        Order Summary
                    </h2>

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-semibold" id="subtotal">$0.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping:</span>
                            <span class="font-semibold text-green-600" id="shipping">Free</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax:</span>
                            <span class="font-semibold" id="tax">$0.00</span>
                        </div>
                        <div class="border-t pt-4">
                            <div class="flex justify-between text-xl font-bold">
                                <span>Total:</span>
                                <span class="text-green-600" id="total">$0.00</span>
                            </div>
                        </div>
                    </div>

                    <!-- Promo Code -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Promo Code</label>
                        <div class="flex gap-2">
                            <input type="text" id="promo-code" placeholder="Enter code"
                                class="flex-1 px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-4 focus:ring-green-500/50 focus:border-green-500 transition-all duration-300">
                            <button id="apply-promo"
                                class="px-6 py-3 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition-all duration-300 font-medium">
                                Apply
                            </button>
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <button id="checkout-btn"
                        class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white py-4 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-300 hover:scale-105 hover:shadow-lg font-bold text-lg mb-4 disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                        Proceed to Checkout
                    </button>

                    <a href="products-page.php"
                        class="block w-full text-center border-2 border-green-600 text-green-600 py-4 rounded-xl hover:bg-green-50 transition-all duration-300 hover:scale-105 font-bold">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast"
        class="fixed top-20 right-4 bg-green-600 text-white px-6 py-4 rounded-xl shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center space-x-3">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span id="toast-message">Item updated!</span>
        </div>
    </div>

    <script>
        lucide.createIcons();

        // Global variables
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

        // Show toast notification
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');

            toastMessage.textContent = message;
            toast.className = `fixed top-20 right-4 px-6 py-4 rounded-xl shadow-lg transform transition-transform duration-300 z-50 ${type === 'success' ? 'bg-green-600 text-white' : 'bg-red-600 text-white'
                }`;

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

        // Calculate totals
        function calculateTotals() {
            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const tax = subtotal * 0.08; // 8% tax
            const total = subtotal + tax;

            document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('total').textContent = `$${total.toFixed(2)}`;

            // Enable/disable checkout button
            const checkoutBtn = document.getElementById('checkout-btn');
            if (cart.length > 0) {
                checkoutBtn.disabled = false;
            } else {
                checkoutBtn.disabled = true;
            }
        }

        // Remove item from cart
        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
            updateCartCount();
            calculateTotals();
            showToast('Item removed from cart');
        }

        // Update quantity
        function updateQuantity(productId, newQuantity) {
            if (newQuantity <= 0) {
                removeFromCart(productId);
                return;
            }

            const item = cart.find(item => item.id === productId);
            if (item) {
                item.quantity = newQuantity;
                localStorage.setItem('cart', JSON.stringify(cart));
                renderCart();
                calculateTotals();
                showToast('Quantity updated');
            }
        }

        // Render cart items
        function renderCart() {
            const cartItems = document.getElementById('cart-items');
            const emptyCart = document.getElementById('empty-cart');

            if (cart.length === 0) {
                cartItems.classList.add('hidden');
                emptyCart.classList.remove('hidden');
                return;
            }

            cartItems.classList.remove('hidden');
            emptyCart.classList.add('hidden');

            cartItems.innerHTML = cart.map(item => `
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 border-2 border-gray-200 rounded-xl hover:border-green-300 transition-all duration-300">
                    <div class="w-full sm:w-24 h-24 bg-gray-200 rounded-xl flex items-center justify-center overflow-hidden">
                        <img src="/placeholder.svg?height=96&width=96&text=${encodeURIComponent(item.name)}" alt="${item.name}" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">${item.name}</h3>
                        <p class="text-sm text-gray-600 mb-2">Premium quality cat product</p>
                        <div class="flex items-center space-x-4">
                            <span class="text-xl font-bold text-green-600">$${item.price.toFixed(2)}</span>
                            <span class="text-sm text-gray-500">each</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <button onclick="updateQuantity('${item.id}', ${item.quantity - 1})" class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors">
                            <i data-lucide="minus" class="w-4 h-4"></i>
                        </button>
                        <span class="w-12 text-center font-semibold">${item.quantity}</span>
                        <button onclick="updateQuantity('${item.id}', ${item.quantity + 1})" class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors">
                            <i data-lucide="plus" class="w-4 h-4"></i>
                        </button>
                    </div>
                    
                    <div class="flex flex-col items-end space-y-2">
                        <span class="text-xl font-bold text-gray-900">$${(item.price * item.quantity).toFixed(2)}</span>
                        <button onclick="removeFromCart('${item.id}')" class="text-red-500 hover:text-red-700 transition-colors p-2">
                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
            `).join('');

            // Reinitialize Lucide icons
            lucide.createIcons();
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function () {
            updateCartCount();
            renderCart();
            calculateTotals();

            // Promo code functionality
            document.getElementById('apply-promo').addEventListener('click', function () {
                const promoCode = document.getElementById('promo-code').value.trim();
                if (promoCode === 'SAVE10') {
                    showToast('Promo code applied! 10% discount');
                } else if (promoCode) {
                    showToast('Invalid promo code', 'error');
                }
            });

            // Checkout functionality
            document.getElementById('checkout-btn').addEventListener('click', function () {
                if (cart.length > 0) {
                    showToast('Redirecting to checkout...');
                    // Here you would redirect to checkout page
                    setTimeout(() => {
                        window.location.href = 'checkout.php';
                    }, 1500);
                }
            });
        });
    </script>
</body>

</html>