<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Bookings</p>
                    <p class="text-3xl font-bold text-gray-900">3</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="calendar-check" class="w-6 h-6 text-green-600"></i>
                </div>
            </div>
            <p class="text-sm text-green-600 mt-2">+2 from last month</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Favorite Providers</p>
                    <p class="text-3xl font-bold text-gray-900">8</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="heart" class="w-6 h-6 text-blue-600"></i>
                </div>
            </div>
            <p class="text-sm text-blue-600 mt-2">+1 this week</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Spent</p>
                    <p class="text-3xl font-bold text-gray-900">$1,247</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="dollar-sign" class="w-6 h-6 text-purple-600"></i>
                </div>
            </div>
            <p class="text-sm text-purple-600 mt-2">This year</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Happy Cats</p>
                    <p class="text-3xl font-bold text-gray-900">2</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="cat" class="w-6 h-6 text-orange-600"></i>
                </div>
            </div>
            <p class="text-sm text-orange-600 mt-2">Whiskers & Luna</p>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="bg-white rounded-lg shadow-sm border">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Recent Bookings</h2>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i data-lucide="home" class="w-6 h-6 text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900">Cozy Cat Haven</h3>
                            <p class="text-sm text-gray-600">Dec 15-20, 2024 • Whiskers</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">Confirmed</span>
                        <span class="text-lg font-semibold text-gray-900">$180</span>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i data-lucide="stethoscope" class="w-6 h-6 text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900">Dr. Sarah Johnson</h3>
                            <p class="text-sm text-gray-600">Dec 10, 2024 • Luna checkup</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">Completed</span>
                        <span class="text-lg font-semibold text-gray-900">$85</span>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i data-lucide="scissors" class="w-6 h-6 text-purple-600"></i>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900">Purrfect Grooming</h3>
                            <p class="text-sm text-gray-600">Dec 8, 2024 • Both cats</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="px-3 py-1 bg-purple-100 text-purple-800 text-sm font-medium rounded-full">Completed</span>
                        <span class="text-lg font-semibold text-gray-900">$120</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="plus" class="w-8 h-8 text-green-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Book New Stay</h3>
                <p class="text-gray-600 mb-4">Find the perfect hostel for your cat</p>
                <button class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors">
                    Browse Providers
                </button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="phone" class="w-8 h-8 text-blue-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Emergency Call</h3>
                <p class="text-gray-600 mb-4">24/7 veterinary support</p>
                <button class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors">
                    Call Now
                </button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="shopping-cart" class="w-8 h-8 text-purple-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Shop Products</h3>
                <p class="text-gray-600 mb-4">Cat food, toys, and accessories</p>
                <button class="w-full bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition-colors">
                    Shop Now
                </button>
            </div>
        </div>
    </div>
</div>
