<?php


$page_title = "Find Cat Hostel Providers - PurrfectStay";
$page_description = "Find trusted cat hostel providers in your area for safe and comfortable cat boarding services.";
include 'includes/header.php';
include 'database.php';
?>

<div class="flex flex-col min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50">
    <?php include 'includes/navbar.php'; ?>

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
                    Connect with trusted cat hostel providers in your area for safe, comfortable, and loving care for
                    your feline friends.
                </p>
            </div>

            <!-- Search and Filters -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    <div class="lg:col-span-2">
                        <label for="searchInput" class="block text-sm font-medium text-gray-700 mb-2">Search
                            Providers</label>
                        <input type="text" id="searchInput" placeholder="Search by name or address..."
                            class="w-full pl-4 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="locationFilter"
                            class="block text-sm font-medium text-gray-700 mb-2">Location</label>
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

                    <div>
                        <label for="priceFilter" class="block text-sm font-medium text-gray-700 mb-2">Price
                            Range</label>
                        <select id="priceFilter"
                            class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">All Prices</option>
                            <option value="low">BDT 200 - BDT 499</option>
                            <option value="medium">BDT 500 - BDT 999</option>
                            <option value="high">BDT 1000+</option>
                        </select>
                    </div>

                    <div class="flex items-end">
                        <button onclick="clearFilters()"
                            class="text-blue-600 hover:text-blue-700 font-medium text-sm transition-colors">
                            Clear All Filters
                        </button>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-200">
                    <div id="resultsCount" class="text-sm text-gray-600 font-medium">
                        Loading providers...
                    </div>
                </div>
            </div>

            <!-- Providers Grid -->
            <div id="providersContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</div>

<script>
    let providers = [];

    // Fetch providers from PHP
    async function fetchProviders() {
        const response = await fetch('fetch_providers_json.php');
        const data = await response.json();
        providers = data.providers; // <-- use the array here
        renderProviders();
    }


    function renderProviders() {
        const container = document.getElementById('providersContainer');
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const location = document.getElementById('locationFilter').value.toLowerCase();
        const priceRange = document.getElementById('priceFilter').value;
        const filtered = providers.filter(p => {
            // Only show active providers
            if (p.status !== 'active') return false;

            const matchesSearch = p.full_name.toLowerCase().includes(searchTerm) || p.address.toLowerCase().includes(searchTerm);
            const matchesLocation = location ? p.address.toLowerCase().includes(location) : true;
            const matchesPrice =
                priceRange === 'low' ? p.overnight_rate <= 499 :
                    priceRange === 'medium' ? (p.overnight_rate >= 500 && p.overnight_rate <= 999) :
                        priceRange === 'high' ? p.overnight_rate >= 1000 : true;

            return matchesSearch && matchesLocation && matchesPrice;
        });


        document.getElementById('resultsCount').textContent = `${filtered.length} providers found`;

        container.innerHTML = filtered.map(p => `
        <div class="provider-card bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
            <div class="relative">
                <img src="${p.id_document}" alt="${p.full_name}" class="w-full h-48 object-cover">
                <div class="absolute bottom-3 left-3 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                    BDT ${p.overnight_rate} / night
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">${p.full_name}</h3>
                <p class="text-gray-600 text-sm mb-3">${p.address}</p>
                <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mb-4">
                    <div><span class="font-medium">Experience:</span> ${p.experience_years}</div>
                    <div><span class="font-medium">Capacity:</span> ${p.max_capacity}</div>
                </div>
                <div class="flex gap-3">
                    <button onclick="viewProvider(${p.id})" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-medium transition-colors">View Details</button>
                    <button onclick="contactProvider(${p.id})" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 px-4 rounded-lg font-medium transition-colors">Contact</button>
                </div>
            </div>
        </div>
    `).join('');
    }


    function clearFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('locationFilter').value = '';
        document.getElementById('priceFilter').value = '';
        renderProviders();
    }

    document.getElementById('searchInput').addEventListener('input', renderProviders);
    document.getElementById('locationFilter').addEventListener('change', renderProviders);
    document.getElementById('priceFilter').addEventListener('change', renderProviders);

    function viewProvider(id) {
        window.location.href = `provider-detail.php?id=${id}`;
    }

    function contactProvider(id) {
        alert(`Contacting provider ${id}.`);
    }

    fetchProviders();
</script>

<?php include 'includes/scripts.php'; ?>
</body>

</html>