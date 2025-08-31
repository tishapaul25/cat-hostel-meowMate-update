<section class="w-full py-8 md:py-16">
    <div class="container px-4 md:px-6 mx-auto max-w-7xl">
        <!-- Header -->
        <div class="text-center mb-12">
            <div
                class="inline-flex items-center rounded-full border px-3 py-1 text-sm font-semibold bg-blue-600 text-white mb-4">
                Find Providers
            </div>
            <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-gray-900 mb-4">
                Find Trusted Cat Hostel Providers
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Connect with verified cat hostel providers in your area for safe, comfortable, and loving care for your
                feline friends.
            </p>
        </div>

        <!-- Search and Filters -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
                <!-- Search Bar -->
                <div class="lg:col-span-2">
                    <label for="searchInput" class="block text-sm font-medium text-gray-700 mb-2">Search
                        Providers</label>
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search by name or description..."
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <svg class="absolute left-3 top-3.5 h-4 w-4 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Location Filter -->
                <div>
                    <label for="locationFilter" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                    <select id="locationFilter"
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">All Locations</option>
                        <option value="Mirpur">Mirpur</option>
                        <option value="Uttora">Uttora</option>
                        <option value="Mohammadpur">Mohammadpur</option>
                        <option value="Old Dhaka">Old Dhaka</option>
                        <option value="Rampura">Rampura</option>
                    </select>
                </div>

                <!-- Price Filter -->
                <div>
                    <label for="priceFilter" class="block text-sm font-medium text-gray-700 mb-2">Price Range</label>
                    <select id="priceFilter"
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">All Prices</option>
                        <option value="low">BDT 200 - BDT 499</option>
                        <option value="medium">BDT 500 - BDT 999</option>
                        <option value="high">BDT 1000+</option>
                    </select>
                </div>

                <!-- Service Filter -->
                <div>
                    <label for="serviceFilter" class="block text-sm font-medium text-gray-700 mb-2">Services</label>
                    <select id="serviceFilter"
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">All Services</option>
                        <option value="Overnight Boarding">Overnight Boarding</option>
                        <option value="Day Care">Day Care</option>
                        <option value="Grooming">Grooming</option>
                        <option value="Medical Care">Medical Care</option>
                        <option value="Transport">Transport</option>
                    </select>
                </div>

                <!-- Verified Filter -->
                <div class="flex items-end">
                    <label class="flex items-center">
                        <input type="checkbox" id="verifiedFilter"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm font-medium text-gray-700">Verified Only</span>
                    </label>
                </div>
            </div>

            <!-- Filter Actions -->
            <div class="flex justify-between items-center mt-6 pt-4 border-t border-gray-200">
                <div id="resultsCount" class="text-sm text-gray-600 font-medium">
                    Loading providers...
                </div>
                <button onclick="clearFilters()"
                    class="text-blue-600 hover:text-blue-700 font-medium text-sm transition-colors">
                    Clear All Filters
                </button>
            </div>
        </div>

        <!-- Providers Grid -->
        <div id="providersContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Providers will be loaded here by JavaScript -->
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                Load More Providers
            </button>
        </div>
    </div>
</section>