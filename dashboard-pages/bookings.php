<div class="space-y-6">
    <!-- Filter Tabs -->
    <div class="bg-white rounded-lg shadow-sm border">
        <div class="border-b border-gray-200">
            <nav class="flex space-x-8 px-6">
                <a href="#" class="border-b-2 border-green-500 py-4 px-1 text-sm font-medium text-green-600">
                    All Bookings
                </a>
                <a href="#" class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                    Upcoming
                </a>
                <a href="#" class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                    Completed
                </a>
                <a href="#" class="border-b-2 border-transparent py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                    Cancelled
                </a>
            </nav>
        </div>
    </div>

    <!-- Booking Cards -->
    <div class="space-y-4">
        <!-- Upcoming Booking -->
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <div class="flex items-start justify-between">
                <div class="flex space-x-4">
                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center">
                        <i data-lucide="home" class="w-8 h-8 text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center space-x-2 mb-2">
                            <h3 class="text-lg font-semibold text-gray-900">Cozy Cat Haven</h3>
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Confirmed</span>
                        </div>
                        <div class="flex items-center space-x-4 text-sm text-gray-600 mb-3">
                            <div class="flex items-center space-x-1">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                <span>Dec 15-20, 2024</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i data-lucide="cat" class="w-4 h-4"></i>
                                <span>Whiskers</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-400"></i>
                                <span>4.9 (127 reviews)</span>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">Premium suite with daily playtime and grooming services included.</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900 mb-2">$180</div>
                    <div class="text-sm text-gray-600">5 days</div>
                </div>
            </div>
            <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200">
                <div class="flex items-center space-x-4">
                    <button class="flex items-center space-x-2 text-green-600 hover:text-green-700">
                        <i data-lucide="eye" class="w-4 h-4"></i>
                        <span>View Details</span>
                    </button>
                    <button class="flex items-center space-x-2 text-blue-600 hover:text-blue-700">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                        <span>Contact Provider</span>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Modify
                    </button>
                    <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Cancel
                    </button>
                </div>
            </div>
        </div>

        <!-- Completed Booking -->
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <div class="flex items-start justify-between">
                <div class="flex space-x-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i data-lucide="stethoscope" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center space-x-2 mb-2">
                            <h3 class="text-lg font-semibold text-gray-900">Dr. Sarah Johnson - Vet Consultation</h3>
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Completed</span>
                        </div>
                        <div class="flex items-center space-x-4 text-sm text-gray-600 mb-3">
                            <div class="flex items-center space-x-1">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                <span>Dec 10, 2024</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i data-lucide="cat" class="w-4 h-4"></i>
                                <span>Luna</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-400"></i>
                                <span>5.0 (89 reviews)</span>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">General health checkup and vaccination consultation.</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900 mb-2">$85</div>
                    <div class="text-sm text-gray-600">30 min</div>
                </div>
            </div>
            <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200">
                <div class="flex items-center space-x-4">
                    <button class="flex items-center space-x-2 text-green-600 hover:text-green-700">
                        <i data-lucide="download" class="w-4 h-4"></i>
                        <span>Download Report</span>
                    </button>
                    <button class="flex items-center space-x-2 text-blue-600 hover:text-blue-700">
                        <i data-lucide="repeat" class="w-4 h-4"></i>
                        <span>Book Again</span>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                        Rate Service
                    </button>
                </div>
            </div>
        </div>

        <!-- Another Completed Booking -->
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <div class="flex items-start justify-between">
                <div class="flex space-x-4">
                    <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i data-lucide="scissors" class="w-8 h-8 text-purple-600"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center space-x-2 mb-2">
                            <h3 class="text-lg font-semibold text-gray-900">Purrfect Grooming Spa</h3>
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Completed</span>
                        </div>
                        <div class="flex items-center space-x-4 text-sm text-gray-600 mb-3">
                            <div class="flex items-center space-x-1">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                <span>Dec 8, 2024</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i data-lucide="cat" class="w-4 h-4"></i>
                                <span>Whiskers & Luna</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-400"></i>
                                <span>4.8 (203 reviews)</span>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">Full grooming service including bath, nail trim, and fur styling.</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900 mb-2">$120</div>
                    <div class="text-sm text-gray-600">2 cats</div>
                </div>
            </div>
            <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200">
                <div class="flex items-center space-x-4">
                    <button class="flex items-center space-x-2 text-green-600 hover:text-green-700">
                        <i data-lucide="camera" class="w-4 h-4"></i>
                        <span>View Photos</span>
                    </button>
                    <button class="flex items-center space-x-2 text-blue-600 hover:text-blue-700">
                        <i data-lucide="repeat" class="w-4 h-4"></i>
                        <span>Book Again</span>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                        Rate Service
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Empty State (if no bookings) -->
    <!-- <div class="text-center py-12">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i data-lucide="calendar-x" class="w-12 h-12 text-gray-400"></i>
        </div>
        <h3 class="text-lg font-medium text-gray-900 mb-2">No bookings yet</h3>
        <p class="text-gray-600 mb-6">Start by booking your first cat care service</p>
        <button class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
            Browse Services
        </button>
    </div> -->
</div>
