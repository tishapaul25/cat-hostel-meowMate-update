<footer class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 to-slate-800"></div>

        <!-- Floating particles -->
        <div
            class="absolute top-10 right-10 w-2 h-2 bg-purple-400/30 rounded-full animate-pulse-slow will-change-transform">
        </div>
        <div class="absolute bottom-20 left-20 w-3 h-3 bg-pink-400/20 rounded-full animate-pulse-slow will-change-transform"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 right-1/4 w-1 h-1 bg-blue-400/40 rounded-full animate-pulse-slow will-change-transform"
            style="animation-delay: 2s;"></div>
    </div>

    <!-- Footer Content -->
    <div class="relative z-10 container mx-auto max-w-7xl px-4 md:px-6 py-16">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <!-- Brand Section -->
            <div class="space-y-4 group">
                <div class="flex items-center space-x-2">
                    <div class="flex items-center justify-center w-10 h-10 bg-green-600 rounded-full">
                        <i data-lucide="cat" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="text-xl font-bold text-white">MeowMate</span>
                </div>
                <p class="text-gray-300 text-sm">
                    Professional cat boarding services with love, care, and attention your feline friend deserves.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i data-lucide="facebook" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i data-lucide="twitter" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i data-lucide="instagram" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4 group">
                <h3 class="text-lg font-semibold text-white">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="index.php" class="text-gray-300 hover:text-white transition-colors text-sm">Home</a>
                    </li>
                    <li><a href="find-providers.php"
                            class="text-gray-300 hover:text-white transition-colors text-sm">Find Providers</a></li>
                    <li><a href="apply-provider.php"
                            class="text-gray-300 hover:text-white transition-colors text-sm">Become
                            a Provider</a></li>
                    <li><a href="testimonial.php" class="text-gray-300 hover:text-white transition-colors text-sm">
                            Testimonials </a></li>
                    <li><a href="about.php" class="text-gray-300 hover:text-white transition-colors text-sm">About
                            Us</a>
                    </li>
                </ul>
            </div>

            <!-- Services -->
            <div class="space-y-4 group">
                <h3 class="text-lg font-semibold text-white">Services</h3>
                <ul class="space-y-2">
                    <li class="text-gray-300 text-sm">Cat Boarding</li>
                    <li class="text-gray-300 text-sm">Day Care</li>
                    <li class="text-gray-300 text-sm">Grooming</li>
                    <li class="text-gray-300 text-sm">Pet Supplies</li>
                    <li class="text-gray-300 text-sm">Emergency Care</li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="space-y-4 group">
                <h3 class="text-lg font-semibold text-white">Contact Info</h3>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <i data-lucide="phone" class="w-4 h-4 text-green-400"></i>
                        <span class="text-gray-300 text-sm">+8801764227527</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i data-lucide="mail" class="w-4 h-4 text-green-400"></i>
                        <span class="text-gray-300 text-sm">hello@meowmate.com</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i data-lucide="map-pin" class="w-4 h-4 text-green-400"></i>
                        <span class="text-gray-300 text-sm">Dhaka Cantonment, Dhaka, 1206</span>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bottom Section -->
        <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col sm:flex-row justify-between items-center">
            <p class="text-xs text-gray-400">
                © <?php echo date('Y'); ?> MeowMate Cat Hostel. All rights reserved.
            </p>
            <nav class="flex gap-4 sm:gap-6 mt-4 sm:mt-0">
                <a href="#" class="text-xs hover:underline underline-offset-4 text-gray-400 hover:text-white">Terms of
                    Service</a>
                <a href="#" class="text-xs hover:underline underline-offset-4 text-gray-400 hover:text-white">Privacy
                    Policy</a>
                <a href="#" class="text-xs hover:underline underline-offset-4 text-gray-400 hover:text-white">Cat Care
                    Guidelines</a>
            </nav>
        </div>
    </div>
</footer>

<style>
    /* Optimized Pulse Animation */
    @keyframes pulse-slow {

        0%,
        100% {
            opacity: 0.3;
            transform: scale(1);
        }

        50% {
            opacity: 0.8;
            transform: scale(1.1);
        }
    }

    .animate-pulse-slow {
        animation: pulse-slow 4s ease-in-out infinite;
        will-change: transform, opacity;
    }
</style>