<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Header -->
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full mb-4">
                Products & Services
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Everything Your Cat Needs
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Premium cat products and services to keep your feline friend happy and healthy.
            </p>
        </div>

        <!-- Search and Filter Bar -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-8">
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Search Bar -->
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search products..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            onkeyup="filterProducts()" />
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="md:w-48">
                    <select id="categoryFilter"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500"
                        onchange="filterProducts()">
                        <option value="">All Categories</option>
                        <option value="food">Food & Treats</option>
                        <option value="toys">Toys</option>
                        <option value="grooming">Grooming</option>
                        <option value="accessories">Accessories</option>
                    </select>
                </div>

                <!-- Price Filter -->
                <div class="md:w-48">
                    <select id="priceFilter"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500"
                        onchange="filterProducts()">
                        <option value="">All Prices</option>
                        <option value="0-20">$0 - $20</option>
                        <option value="20-40">$20 - $40</option>
                        <option value="40-60">$40 - $60</option>
                        <option value="60+">$60+</option>
                    </select>
                </div>

                <!-- Clear Filters -->
                <button onclick="clearFilters()"
                    class="px-4 py-2 text-gray-600 hover:text-gray-800 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Clear
                </button>
            </div>
        </div>

        <!-- Results Count -->
        <div class="mb-6">
            <p id="resultsCount" class="text-gray-600">Showing all products</p>
        </div>

        <!-- Products Grid -->
        <div id="productsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Products will be dynamically loaded here -->
        </div>

        <!-- No Results Message -->
        <div id="noResults" class="text-center py-12 hidden">
            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.29-1.009-5.824-2.562M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                </path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No products found</h3>
            <p class="text-gray-600">Try adjusting your search or filter criteria</p>
        </div>

        <!-- View All Button -->
       <div class="text-center mt-12">
  <button type="button"
          onclick="document.getElementById('categoryFilter').value=''; document.getElementById('priceFilter').value=''; document.getElementById('searchInput').value=''; filterProducts();"
          class="inline-block bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-md font-medium transition-colors">
    View All Products
  </button>
</div>


</div>
</section>

<script>
    function filterProducts() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const categoryFilter = document.getElementById('categoryFilter').value;
        const priceFilter = document.getElementById('priceFilter').value;
        const productCards = document.querySelectorAll('.product-card');
        const noResults = document.getElementById('noResults');
        const resultsCount = document.getElementById('resultsCount');

        let visibleCount = 0;

        productCards.forEach(card => {
            const title = card.dataset.title;
            const category = card.dataset.category;
            const price = parseFloat(card.dataset.price);

            let showCard = true;

            if (searchTerm && !title.includes(searchTerm)) showCard = false;
            if (categoryFilter && category !== categoryFilter) showCard = false;

            if (priceFilter) {
                if (priceFilter === '0-20' && (price < 0 || price > 20)) showCard = false;
                else if (priceFilter === '20-40' && (price < 20 || price > 40)) showCard = false;
                else if (priceFilter === '40-60' && (price < 40 || price > 60)) showCard = false;
                else if (priceFilter === '60+' && price < 60) showCard = false;
            }

            if (showCard) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
            resultsCount.textContent = 'No products found';
        } else {
            noResults.classList.add('hidden');
            resultsCount.textContent = `Showing ${visibleCount} product${visibleCount !== 1 ? 's' : ''}`;
        }
    }

    function clearFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('categoryFilter').value = '';
        document.getElementById('priceFilter').value = '';
        filterProducts();
    }

    // Escape helper for attribute text
    function attrEscape(s){
        return String(s || '')
            .replace(/&/g,'&amp;')
            .replace(/"/g,'&quot;')
            .replace(/</g,'&lt;')
            .replace(/>/g,'&gt;');
    }

    async function deleteProduct(productId, cardElement) {
        if (!confirm('Are you sure you want to delete this product?')) return;

        try {
            const response = await fetch(`fetch_products.php?id=${productId}`, { method: 'DELETE' });
            const result = await response.json();

            if (result.success) {
                cardElement.remove();
                filterProducts();
                alert('Product deleted successfully!');
            } else {
                alert('Failed to delete product: ' + result.message);
            }
        } catch (err) {
            console.error('Delete error:', err);
            alert('Error deleting product');
        }
    }

    async function loadProducts() {
        try {
            const response = await fetch('fetch_products.php');
            const result = await response.json();

            if (!result.success) {
                console.error("Failed to fetch products:", result.message);
                return;
            }

            const productsGrid = document.getElementById('productsGrid');
            productsGrid.innerHTML = '';

            result.products.forEach(product => {
                // Choose the displayed price (sale or regular)
                const priceNum = Number(product.sale_price || product.price || 0);
                const price = priceNum.toFixed(2);
                const originalPrice = product.price;
                const category = (product.category || '').toLowerCase();
                const imgUrl = product.image || '/placeholder.svg?height=200&width=300&text=No+Image';
                const safeName = attrEscape(product.name);

                const card = document.createElement('div');
                card.className = 'product-card bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow';
                card.dataset.category = category;
                card.dataset.title = (product.name || '').toLowerCase();
                card.dataset.price = priceNum;

                card.innerHTML = `
                    <div class="relative">
                        <img src="${imgUrl}"
                            alt="${safeName}" class="w-full h-48 object-cover" />
                        ${product.sale_price ? `<div class="absolute top-3 right-3"><span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">Sale</span></div>` : ''}
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-900 mb-2">${safeName}</h3>
                        <p class="text-gray-600 text-sm mb-3">${product.short_desc ? attrEscape(product.short_desc) : ''}</p>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-xl font-bold text-green-600">$${price}</span>
                            ${product.sale_price ? `<span class="text-sm text-gray-500 line-through">$${originalPrice}</span>` : ''}
                        </div>
                        <div class="flex gap-2">
                            <a href="sections/product-details.php?id=${product.id}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-4 rounded-md text-sm font-medium transition-colors">
                                View Details
                            </a>
                            <!-- IMPORTANT: cart button has data-* and class js-add-to-cart -->
                            <button type="button"
                                class="js-add-to-cart bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-md transition-colors"
                                data-id="${product.id}"
                                data-name="${safeName}"
                                data-price="${price}"
                                data-img="${attrEscape(imgUrl)}"
                                aria-label="Add to cart">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5 6m0 0h9M17 21a2 2 0 100-4 2 2 0 000 4zM9 21a2 2 0 100-4 2 2 0 000 4z"></path>
                                </svg>
                            </button>
                            <!-- Optional Delete Button for Admins -->
                        </div>
                    </div>
                `;
                productsGrid.appendChild(card);
            });

            filterProducts();
        } catch (err) {
            console.error('Error loading products:', err);
        }
    }

    document.addEventListener('DOMContentLoaded', loadProducts);
</script>
