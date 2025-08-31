<?php
// providers.php
require_once 'database.php';
$conn = getDatabaseConnection();

// Fetch all providers
$sql = "SELECT * FROM hostel_providers ORDER BY id DESC";
$result = $conn->query($sql);

$providers = [];
$statusCounts = ['all' => 0, 'pending' => 0, 'active' => 0, 'suspended' => 0];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['status'] = $row['status'] ?? 'pending'; // default pending
        $providers[] = $row;
        $statusCounts['all']++;
        if (isset($statusCounts[$row['status']]))
            $statusCounts[$row['status']]++;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Providers - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>

<body class="bg-gray-50">
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <a href="../dashboard.php" class="text-green-600 hover:text-green-800">
                        <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    </a>
                    <div>
                        <h1 class="text-xl font-semibold text-gray-900">Manage Providers</h1>
                        <p class="text-sm text-gray-500">Review and manage hostel provider applications</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-sm text-gray-600">
                        Total Providers: <span class="font-semibold text-green-600"><?= $statusCounts['all'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Messages -->
        <div id="message-container" class="hidden mb-6"></div>

        <!-- Filters -->
        <div class="bg-white rounded-lg shadow mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">Provider Applications</h3>
                    <div class="flex space-x-2">
                        <button class="filter-btn px-3 py-1 text-sm rounded-md bg-green-100 text-green-800"
                            data-filter="all">All (<?= $statusCounts['all'] ?>)</button>
                        <button class="filter-btn px-3 py-1 text-sm rounded-md text-gray-600 hover:bg-gray-100"
                            data-filter="pending">Pending (<?= $statusCounts['pending'] ?>)</button>
                        <button class="filter-btn px-3 py-1 text-sm rounded-md text-gray-600 hover:bg-gray-100"
                            data-filter="active">Active (<?= $statusCounts['active'] ?>)</button>
                        <button class="filter-btn px-3 py-1 text-sm rounded-md text-gray-600 hover:bg-gray-100"
                            data-filter="suspended">Suspended (<?= $statusCounts['suspended'] ?>)</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Provider Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6" id="providers-container">
            <?php foreach ($providers as $provider):
                $facility_photos = json_decode($provider['facility_photos'], true) ?? [];
                ?>
                <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow provider-card"
                    data-status="<?= htmlspecialchars($provider['status']) ?>" data-id="<?= $provider['id'] ?>">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <i data-lucide="user" class="w-6 h-6 text-green-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        <?= htmlspecialchars($provider['full_name']) ?>
                                    </h3>
                                    <p class="text-sm text-gray-600"><?= htmlspecialchars($provider['email']) ?></p>
                                </div>
                            </div>
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                <?= ucfirst($provider['status']) ?>
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Contact Information</h4>
                                <div class="space-y-1">
                                    <div class="flex items-center text-sm text-gray-600"><i data-lucide="phone"
                                            class="w-4 h-4 mr-2"></i><?= htmlspecialchars($provider['phone']) ?></div>
                                    <div class="flex items-start text-sm text-gray-600"><i data-lucide="map-pin"
                                            class="w-4 h-4 mr-2 mt-0.5"></i><?= htmlspecialchars($provider['address']) ?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Experience & Qualifications</h4>
                                <div class="space-y-1">
                                    <div class="flex items-center text-sm text-gray-600"><i data-lucide="calendar"
                                            class="w-4 h-4 mr-2"></i><?= htmlspecialchars($provider['experience_years']) ?>
                                        years experience</div>
                                    <div class="flex items-center text-sm text-gray-600"><i data-lucide="heart"
                                            class="w-4 h-4 mr-2"></i><?= htmlspecialchars($provider['own_cats']) ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Qualifications</h4>
                            <p class="text-sm text-gray-600"><?= htmlspecialchars($provider['qualifications']) ?></p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Facility Details</h4>
                                <div class="space-y-1">
                                    <div class="flex items-center text-sm text-gray-600"><i data-lucide="home"
                                            class="w-4 h-4 mr-2"></i><?= htmlspecialchars($provider['property_type']) ?>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600"><i data-lucide="users"
                                            class="w-4 h-4 mr-2"></i>Max <?= htmlspecialchars($provider['max_capacity']) ?>
                                        cats</div>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Pricing</h4>
                                <div class="space-y-1">
                                    <div class="text-sm text-gray-600">Overnight:
                                        $<?= htmlspecialchars($provider['overnight_rate']) ?>/night</div>
                                    <div class="text-sm text-gray-600">Day Care:
                                        $<?= htmlspecialchars($provider['day_care_rate']) ?>/day</div>
                                    <div class="text-sm text-gray-600">Grooming:
                                        $<?= htmlspecialchars($provider['grooming_rate']) ?>/session</div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Services Offered</h4>
                            <div class="flex flex-wrap gap-1">
                                <?php foreach (explode(",", $provider['services']) as $service): ?>
                                    <span
                                        class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full"><?= htmlspecialchars($service) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Facility Description</h4>
                            <p class="text-sm text-gray-600"><?= htmlspecialchars($provider['facility_description']) ?></p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-2">ID Document</h4>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                    <button class="text-blue-600 hover:text-blue-800 view-document-btn"
                                        data-document="<?= htmlspecialchars($provider['id_document']) ?>">View
                                        Document</button>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Facility Photos</h4>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i data-lucide="image" class="w-4 h-4 mr-2"></i>
                                    <button class="text-blue-600 hover:text-blue-800 view-photos-btn"
                                        data-photos='<?= htmlspecialchars($provider['facility_photos']) ?>'>View Photos
                                        (<?= count($facility_photos) ?>)</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                        <div class="flex items-center justify-between">
                            <div class="text-xs text-gray-500">Applied:
                                <?= htmlspecialchars(date("Y-m-d", strtotime($provider['created_at']))) ?>
                            </div>
                            <div class="flex space-x-2">
                                <div class="flex space-x-2">
                                    <?php if ($provider['status'] === 'pending'): ?>
                                        <button
                                            class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700 transition-colors approve-btn"
                                            data-id="<?= $provider['id'] ?>">Active</button>
                                        <button
                                            class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 transition-colors deny-btn"
                                            data-id="<?= $provider['id'] ?>">Deny</button>
                                    <?php elseif ($provider['status'] === 'active'): ?>
                                        <span class="text-green-600 font-semibold">Active</span>
                                    <?php elseif ($provider['status'] === 'denied'): ?>
                                        <span class="text-red-600 font-semibold">Denied</span>
                                    <?php endif; ?>
                                </div>



                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Photo Modal -->
        <div id="photo-modal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 hidden">
            <div class="bg-white rounded-lg max-w-4xl w-full p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold">Facility Photos</h3>
                    <button id="close-photo-modal" class="text-gray-500 hover:text-gray-700">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>
                </div>
                <div id="photo-gallery" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"></div>
            </div>
        </div>

        <script>
            lucide.createIcons();

            // Filter buttons with cookie
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const filter = this.dataset.filter;
                    document.cookie = `provider_filter=${filter}; path=/; max-age=86400`;
                    document.querySelectorAll('.filter-btn').forEach(b => b.className = 'filter-btn px-3 py-1 text-sm rounded-md text-gray-600 hover:bg-gray-100');
                    this.className = 'filter-btn px-3 py-1 text-sm rounded-md bg-green-100 text-green-800';
                    document.querySelectorAll('.provider-card').forEach(card => {
                        card.style.display = (filter === 'all' || card.dataset.status === filter) ? 'block' : 'none';
                    });
                });
            });

            // Load cookie filter
            window.addEventListener('DOMContentLoaded', () => {
                const match = document.cookie.match(/(^|;)\\s*provider_filter=([^;]+)/);
                if (match) {
                    const btn = document.querySelector(`.filter-btn[data-filter="${match[2]}"]`);
                    if (btn) btn.click();
                }
            });

            // Photos modal
            document.querySelectorAll('.view-photos-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const photos = JSON.parse(this.dataset.photos);
                    const gallery = document.getElementById('photo-gallery');
                    gallery.innerHTML = photos.map(photo => `
            <div class="aspect-square bg-gray-200 rounded-lg overflow-hidden">
                <img src="${photo}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            </div>
        `).join('');
                    document.getElementById('photo-modal').classList.remove('hidden');
                });
            });

            // Document view
            document.querySelectorAll('.view-document-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    alert('Opening document: ' + this.dataset.document);
                });
            });

            // Close modal
            document.getElementById('close-photo-modal').addEventListener('click', () => document.getElementById('photo-modal').classList.add('hidden'));
            document.getElementById('photo-modal').addEventListener('click', function (e) { if (e.target === this) this.classList.add('hidden'); });

            // Toast
            function showMessage(msg, type) {
                const container = document.getElementById('message-container');
                const colorClass = type === 'success' ? 'bg-green-100 border-green-400 text-green-700' : (type === 'error' ? 'bg-red-100 border-red-400 text-red-700' : 'bg-orange-100 border-orange-400 text-orange-700');
                container.innerHTML = `<div class="${colorClass} border px-4 py-3 rounded">${msg}</div>`;
                container.classList.remove('hidden');
                setTimeout(() => container.classList.add('hidden'), 5000);
            }

            function updateStatus(id, status) {
                fetch('fetch_providers_json.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `id=${id}&status=${status}`
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            showMessage(`Provider status updated to ${status}`, 'success');
                            const card = document.querySelector(`.provider-card[data-id='${id}']`);
                            card.dataset.status = status;

                            // update badge text
                            card.querySelector('span').textContent =
                                status.charAt(0).toUpperCase() + status.slice(1);

                            // find buttons
                            const approveBtn = card.querySelector('.approve-btn');
                            const denyBtn = card.querySelector('.deny-btn');

                            if (status === 'active') {
                                // disable active button
                                approveBtn.disabled = true;
                                approveBtn.classList.add('opacity-50', 'cursor-not-allowed');
                                // remove deny button
                                if (denyBtn) denyBtn.remove();
                            } else if (status === 'denied') {
                                // disable deny button
                                denyBtn.disabled = true;
                                denyBtn.classList.add('opacity-50', 'cursor-not-allowed');
                                // remove active button
                                if (approveBtn) approveBtn.remove();
                            }
                        } else {
                            showMessage(data.msg || 'Error updating status', 'error');
                        }
                    })
                    .catch(() => showMessage('AJAX error', 'error'));
            }
            // Attach events
            document.querySelectorAll('.approve-btn').forEach(btn => {
                btn.addEventListener('click', () => updateStatus(btn.dataset.id, 'active'));
            });
            document.querySelectorAll('.deny-btn').forEach(btn => {
                btn.addEventListener('click', () => updateStatus(btn.dataset.id, 'denied'));
            });

            // Attach events
            document.querySelectorAll('.approve-btn').forEach(btn => {
                btn.addEventListener('click', () => updateStatus(btn.dataset.id, 'active'));
            });
            document.querySelectorAll('.deny-btn').forEach(btn => {
                btn.addEventListener('click', () => updateStatus(btn.dataset.id, 'denied'));
            });

        </script>
</body>

</html>