<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Manage Products</h1>
            <p class="text-gray-600 mt-1">Add, edit, and manage your product catalog</p>
        </div>
        <button onclick="showAddProductModal()"
            class="mt-4 sm:mt-0 bg-emerald-600 text-white px-6 py-3 rounded-lg hover:bg-emerald-700 transition-colors flex items-center gap-2">
            <i data-lucide="plus" class="w-5 h-5"></i>
            Add New Product
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Products</p>
                    <p class="text-3xl font-bold text-gray-900">156</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="package" class="w-6 h-6 text-blue-600"></i>
                </div>
            </div>
            <p class="text-sm text-green-600 mt-2">+12% from last month</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm border p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Products</p>
                    <p class="text-3xl font-bold text-gray-900">142</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="check-circle" class="w-6 h-6 text-green-600"></i>
                </div>
            </div>
            <p class="text-sm text-green-600 mt-2">91% active rate</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm border p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Out of Stock</p>
                    <p class="text-3xl font-bold text-gray-900">8</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="alert-triangle" class="w-6 h-6 text-red-600"></i>
                </div>
            </div>
            <p class="text-sm text-red-600 mt-2">Needs attention</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm border p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                    <p class="text-3xl font-bold text-gray-900">$24.5K</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="dollar-sign" class="w-6 h-6 text-purple-600"></i>
                </div>
            </div>
            <p class="text-sm text-green-600 mt-2">+18% from last month</p>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="bg-white rounded-xl shadow-sm border p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="relative">
                    <i data-lucide="search"
                        class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input type="text" placeholder="Search products..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 w-full sm:w-64">
                </div>
                <select
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option>All Categories</option>
                    <option>Cat Food</option>
                    <option>Cat Toys</option>
                    <option>Cat Accessories</option>
                    <option>Cat Health</option>
                    <option>Cat Grooming</option>
                </select>
                <select
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Draft</option>
                    <option>Out of Stock</option>
                    <option>Discontinued</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 flex items-center gap-2">
                    <i data-lucide="filter" class="w-4 h-4"></i>
                    Filter
                </button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 flex items-center gap-2">
                    <i data-lucide="download" class="w-4 h-4"></i>
                    Export
                </button>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="text-left py-4 px-6 font-medium text-gray-900">
                            <input type="checkbox"
                                class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                        </th>
                        <th class="text-left py-4 px-6 font-medium text-gray-900">Product</th>
                        <th class="text-left py-4 px-6 font-medium text-gray-900">Category</th>
                        <th class="text-left py-4 px-6 font-medium text-gray-900">Price</th>
                        <th class="text-left py-4 px-6 font-medium text-gray-900">Stock</th>
                        <th class="text-left py-4 px-6 font-medium text-gray-900">Status</th>
                        <th class="text-left py-4 px-6 font-medium text-gray-900">Sales</th>
                        <th class="text-left py-4 px-6 font-medium text-gray-900">Actions</th>
                    </tr>
                </thead>
                <tbody id="productTableBody" class="divide-y divide-gray-200">
                    <!-- Product Row 1 -->
                    <!-- <tr class="hover:bg-gray-50">
                        <td class="py-4 px-6">
                            <input type="checkbox"
                                class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-4">
                                <img src="/placeholder.svg?height=60&width=60&text=Cat+Food" alt="Premium Cat Food"
                                    class="w-15 h-15 rounded-lg object-cover">
                                <div>
                                    <h3 class="font-medium text-gray-900">Premium Cat Food - Salmon & Rice</h3>
                                    <p class="text-sm text-gray-500">High-quality nutrition for adult cats</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">Cat
                                Food</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="font-medium text-gray-900">$24.99</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="text-gray-900">150 units</span>
                        </td>
                        <td class="py-4 px-6">
                            <span
                                class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">Active</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="text-gray-900">89 sold</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <button onclick="editProduct(1)"
                                    class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i data-lucide="edit" class="w-4 h-4"></i>
                                </button>
                                <button onclick="viewProduct(1)"
                                    class="p-2 text-gray-400 hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>
                                <button onclick="deleteProduct(1)"
                                    class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </td>
                    </tr> -->


                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Showing 1 to 5 of 156 products
            </div>
            <div class="flex items-center gap-2">
                <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50"
                    disabled>
                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                </button>
                <button class="px-3 py-2 bg-emerald-600 text-white rounded-lg">1</button>
                <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
                <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
                <span class="px-3 py-2 text-gray-500">...</span>
                <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">32</button>
                <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div id="add-product-modal"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-white rounded-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-gray-900">Add New Product</h3>
                <button onclick="closeAddProductModal()" class="text-gray-400 hover:text-gray-600">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
        <form id="productForm" enctype="multipart/form-data" class="p-6 space-y-6">
            <!-- Basic Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <label>Product Name *</label>
                    <input type="text" name="product_name" required class="w-full px-4 py-3 border rounded-lg">
                </div>

                <div>
                    <label>Category *</label>
                    <select name="category" required class="w-full px-4 py-3 border rounded-lg">
                        <option value="">Select Category</option>
                        <option value="Cat Food">Cat Food</option>
                        <option value="Cat Toys">Cat Toys</option>
                        <option value="Cat Accessories">Cat Accessories</option>
                        <option value="Cat Health">Cat Health</option>
                        <option value="Cat Grooming">Cat Grooming</option>
                    </select>
                </div>

                <div class="lg:col-span-2">
                    <label>Short Description *</label>
                    <input type="text" name="short_desc" required class="w-full px-4 py-3 border rounded-lg">
                </div>

                <div class="lg:col-span-2">
                    <label>Full Description *</label>
                    <textarea name="full_desc" required rows="4" class="w-full px-4 py-3 border rounded-lg"></textarea>
                </div>
            </div>

            <!-- Pricing & Inventory -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div>
                    <label>Regular Price *</label>
                    <input type="number" step="0.01" name="price" required class="w-full px-4 py-3 border rounded-lg">
                </div>

                <div>
                    <label>Sale Price</label>
                    <input type="number" step="0.01" name="sale_price" class="w-full px-4 py-3 border rounded-lg">
                </div>

                <div>
                    <label>Stock Quantity *</label>
                    <input type="number" name="stock" required class="w-full px-4 py-3 border rounded-lg">
                </div>

                <div>
                    <label>SKU</label>
                    <input type="text" name="sku" class="w-full px-4 py-3 border rounded-lg">
                </div>

                <div>
                    <label>Weight (kg)</label>
                    <input type="number" step="0.01" name="weight" class="w-full px-4 py-3 border rounded-lg">
                </div>

                <div>
                    <label>Status *</label>
                    <select name="status" required class="w-full px-4 py-3 border rounded-lg">
                        <option value="draft">Draft</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Product Image -->
            <div>
                <label>Product Image</label>
                <input type="file" name="product_image" accept="image/*" class="w-full">
            </div>

            <button type="submit" class="px-6 py-3 bg-emerald-600 text-white rounded-lg">Save Product</button>
        </form>

    </div>
</div>

<script>
    function showAddProductModal() {
        document.getElementById('add-product-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeAddProductModal() {
        document.getElementById('add-product-modal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }


    function editProduct(id) {
        alert("Open edit modal for product " + id);
    }

    function viewProduct(id) {
        alert("Show product details for " + id);
    }

    async function deleteProduct(id) {
        if (!confirm("Are you sure you want to delete this product?")) return;

        const response = await fetch("delete_product.php?id=" + id, { method: "GET" });
        const result = await response.json();

        if (result.success) {
            alert("Product deleted!");
            location.reload();
        } else {
            alert("Error deleting product");
        }
    }


    // Close modal when clicking outside
    document.getElementById('add-product-modal').addEventListener('click', function (e) {
        if (e.target === this) {
            closeAddProductModal();
        }
    });


    document.getElementById('productForm').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent normal form submission

        let formData = new FormData(this);

        fetch('dashboard.php?page=productAdd', {  // <-- post directly to add_product.php
            method: 'POST',
            body: formData
        })
            .then(res => res.text())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    closeAddProductModal();
                    document.getElementById('productForm').reset();
                } else {
                    alert("Error: " + data.message);
                }
            })

            .catch(err => console.error(err));
    });

    // Fethching data function
    async function loadProducts() {
        try {
            const response = await fetch("fetch_products.php");
            const result = await response.json();

            if (!result.success) {
                console.error("Error fetching products:", result.message);
                return;
            }

            const tbody = document.getElementById("productTableBody");
            tbody.innerHTML = "";

            result.products.forEach(product => {
                let row = `
            <tr class="hover:bg-gray-50 text-sm sm:text-base">
                <!-- Checkbox -->
                <td class="py-3 px-4 sm:py-4 sm:px-6">
                    <input type="checkbox" class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                </td>

                <!-- Image + Name + Short desc -->
                <td class="py-3 px-4 sm:py-4 sm:px-6">
                    <div class="flex items-center gap-3 sm:gap-4">
                        <img src="${product.image || '/placeholder.svg?height=60&width=60&text=No+Image'}" 
                             alt="${product.name}" 
                             class="w-12 h-12 sm:w-16 sm:h-16 rounded-lg object-cover flex-shrink-0">
                        <div class="min-w-0">
                            <h3 class="font-medium text-gray-900 truncate">${product.name}</h3>
                            <p class="text-xs sm:text-sm text-gray-500 truncate">${product.short_desc || ""}</p>
                        </div>
                    </div>
                </td>

                <!-- Category (hidden on mobile) -->
                <td class="py-3 px-4 sm:py-4 sm:px-6 hidden md:table-cell">
                    <span class="px-2 py-0.5 sm:px-3 sm:py-1 bg-blue-100 text-blue-800 rounded-full text-xs sm:text-sm font-medium">
                        ${product.category}
                    </span>
                </td>

                <!-- Price -->
                <td class="py-3 px-4 sm:py-4 sm:px-6">
                    <span class="font-medium text-gray-900">
                        $${product.sale_price || product.price}
                    </span>
                </td>

                <!-- Stock (hidden on small screens) -->
                <td class="py-3 px-4 sm:py-4 sm:px-6 hidden lg:table-cell">
                    <span class="text-gray-900">${product.stock}</span>
                </td>

                <!-- Status -->
                <td class="py-3 px-4 sm:py-4 sm:px-6">
                    <span class="px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs sm:text-sm font-medium
                        ${product.status === "Active"
                        ? "bg-green-100 text-green-800"
                        : "bg-red-100 text-red-800"}">
                        ${product.status}
                    </span>
                </td>

                <!-- Sold (hidden on mobile) -->
                <td class="py-3 px-4 sm:py-4 sm:px-6 hidden md:table-cell">
                    <span class="text-gray-900">${product.sold || 0}</span>
                </td>

                <!-- Actions -->
                <td class="py-3 px-4 sm:py-4 sm:px-6">
                    <div class="flex items-center gap-1 sm:gap-2">
                        <button onclick="editProduct(${product.id})"
                            class="p-1.5 sm:p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                            <i data-lucide="edit" class="w-4 h-4"></i>
                        </button>
                        <button onclick="viewProduct(${product.id})"
                            class="p-1.5 sm:p-2 text-gray-400 hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                        <button onclick="deleteProduct(${product.id})"
                            class="p-1.5 sm:p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                </td>
            </tr>
            `;
                tbody.innerHTML += row;
            });

            // Render Lucide icons
            lucide.createIcons();
        } catch (err) {
            console.error("Fetch error:", err);
        }
    }

    // Load products on page ready
    document.addEventListener("DOMContentLoaded", loadProducts);

    // delete method
    async function deleteProduct(id) {
        if (!confirm("Are you sure you want to delete this product?")) return;

        try {
            const response = await fetch(`fetch_products.php?id=${id}`, { method: "DELETE" });
            const result = await response.json();

            if (result.success) {
                alert("Product deleted!");
                loadProducts(); // reload table
            } else {
                alert("Error deleting product: " + result.message);
            }
        } catch (err) {
            console.error("Delete error:", err);
            alert("Something went wrong while deleting the product.");
        }
    }




</script>