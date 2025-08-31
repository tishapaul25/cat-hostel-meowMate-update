<?php
session_start();
require 'database.php';

$conn = getDatabaseConnection();

// Check if the cookie exists
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];

    // Prepare statement to fetch user
    $stmt = $conn->prepare("SELECT first_name, last_name, email, role FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $user_name = $user['first_name'] . ' ' . $user['last_name'];
        $user_role = $user['role']; // Make sure your DB has 'provider' or 'hotel_provider'
        $user_email = $user['email'];
    } else {
        $user_name = "Unknown";
        $user_role = "guest";
        $user_email = "";
    }

} else {
    $user_name = "Guest";
    $user_role = "guest";
    $user_email = "";
}

// ✅ Define current page to avoid undefined variable error
$current_page = isset($_GET['page']) ? $_GET['page'] : 'welcome';

// Optional: page title
$page_title = ucfirst($current_page) . " - PurrfectStay";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
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
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white flex flex-col">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-800">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center">
                        <i data-lucide="cat" class="w-5 h-5"></i>
                    </div>
                    <span class="text-xl font-bold">PurrfectStay</span>
                </div>
            </div>

            <!-- User Info -->
            <div class="p-4 border-b border-gray-800">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center">
                        <i data-lucide="user" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <div class="font-medium"><?php echo htmlspecialchars($user_name); ?></div>
                        <div class="text-sm text-gray-400 capitalize"><?php echo htmlspecialchars($user_role); ?></div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <!-- Navigation -->
            <nav class="flex-1 p-4">
                <?php
                if ($user_role === 'super_admin'): ?>
                    <!-- SUPER ADMIN MENU -->
                    <div class="mb-6">
                        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Admin Panel</h3>
                        <ul class="space-y-1">
                            <li><a href="?page=overview"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'overview' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="layout-dashboard" class="w-5 h-5"></i><span>Dashboard
                                        Overview</span></a></li>
                            <li><a href="?page=manageuser"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'manageuser' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="users" class="w-5 h-5"></i><span>Manage Users</span></a></li>
                            <li><a href="?page=providers"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'providers' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="home" class="w-5 h-5"></i><span>Manage Providers</span></a></li>
                            <li><a href="?page=veterinarians"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'veterinarians' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="stethoscope" class="w-5 h-5"></i><span>Manage Vets</span></a></li>

                            <li><a href="?page=manage-products-Elements"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'manage-products-Elements' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="stethoscope" class="w-5 h-5"></i><span>Manage Products</span></a></li>
                            <li><a href="?page=analytics"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'analytics' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="bar-chart-3" class="w-5 h-5"></i><span>System Analytics</span></a></li>
                            <li><a href="?page=settings"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'settings' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="settings" class="w-5 h-5"></i><span>System Settings</span></a></li>
                        </ul>
                    </div>

                <?php elseif ($user_role === 'provider'): ?>
                    <!-- HOTEL PROVIDER MENU -->
                    <div class="mb-6">
                        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Hotel Provider</h3>
                        <ul class="space-y-1">
                            <li><a href="?page=overview"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'overview' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="layout-dashboard" class="w-5 h-5"></i><span>My Dashboard</span></a>
                            </li>
                            <li><a href="?page=bookings"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'bookings' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="calendar-check" class="w-5 h-5"></i><span>Bookings</span></a></li>
                            <li><a href="?page=rooms"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'rooms' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="bed" class="w-5 h-5"></i><span>Rooms</span></a></li>
                            <li><a href="?page=services"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'services' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="concierge-bell" class="w-5 h-5"></i><span>Services</span></a></li>
                            <li><a href="?page=profile"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'profile' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="user" class="w-5 h-5"></i><span>Profile</span></a></li>
                            <li><a href="?page=add-service"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'add-service' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="user" class="w-5 h-5"></i><span>add-service</span></a></li>

                        </ul>
                    </div>

                <?php elseif ($user_role === 'vet'): ?>
                    <!-- VET MENU -->
                    <div class="mb-6">
                        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Vet Dashboard</h3>
                        <ul class="space-y-1">
                            <li><a href="?page=overview"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'overview' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="layout-dashboard" class="w-5 h-5"></i><span>My Dashboard</span></a>
                            </li>
                            <li><a href="?page=appointments"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'appointments' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="calendar" class="w-5 h-5"></i><span>Appointments</span></a></li>
                            <li><a href="?page=patients"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'patients' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="heart" class="w-5 h-5"></i><span>My Patients</span></a></li>
                            <li><a href="?page=profile"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'profile' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="user" class="w-5 h-5"></i><span>Profile</span></a></li>
                        </ul>
                    </div>

                <?php elseif ($user_role === 'customer'): ?>
                    <!-- CAT OWNER MENU -->
                    <div class="mb-6">
                        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Cat Owner</h3>
                        <ul class="space-y-1">
                            <li><a href="?page=overview"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'overview' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="layout-dashboard" class="w-5 h-5"></i><span>My Dashboard</span></a>
                            </li>
                            <li><a href="?page=mybookings"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'mybookings' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="calendar-check" class="w-5 h-5"></i><span>My Bookings</span></a></li>
                            <li><a href="?page=mycats"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'mycats' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="cat" class="w-5 h-5"></i><span>My Cats</span></a></li>
                            <li><a href="?page=profile"
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg <?= $current_page === 'profile' ? 'bg-green-600 text-white' : 'text-gray-300 hover:bg-gray-800'; ?>"><i
                                        data-lucide="user" class="w-5 h-5"></i><span>Profile</span></a></li>
                        </ul>
                    </div>

                <?php else: ?>
                    <!-- UNKNOWN ROLE -->
                    <p class="text-gray-400 text-sm">Role-specific menu will go here...</p>
                <?php endif; ?>
            </nav>

            <!-- Bottom Section -->
            <div class="p-4 border-t border-gray-800">
                <a href="index.php"
                    class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-300 hover:bg-gray-800">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span>Back to Home</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 capitalize">
                            <?php echo str_replace('-', ' ', $current_page); ?>
                        </h1>
                        <p class="text-gray-600">
                            <?php
                            if ($user_role === 'super_admin')
                                echo "Super Admin Control Panel";
                            if ($user_role === 'hotel_provider')
                                echo "Hotel Provider Dashboard";
                            ?>
                        </p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search..."
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                            <i data-lucide="search"
                                class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
                        </div>
                        <button class="p-2 text-gray-400 hover:text-gray-600">
                            <i data-lucide="bell" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <?php
                // Define a mapping of page => component file
                $components = [
                    'overview' => 'dashboard-pages/overview.php',
                    'users' => 'components/users.php',
                    'providers' => 'dashboard-pages/providers.php',
                    'veterinarians' => 'components/veterinarians.php',
                    'products' => 'components/products.php',
                    'analytics' => 'components/analytics.php',
                    'settings' => 'components/settings.php',
                    'bookings' => 'dashboard-pages/bookings.php',
                    'rooms' => 'dashboard-pages/rooms.php',
                    'services' => 'components/services.php',
                    // 'profile' => 'dashboard-pages/edit-profile.php',
                    'welcome' => 'dashboard-pages/welcome.php',
                    'manageuser' => 'dashboard-pages/manage-users.php',
                    'productAdd' => 'dashboard-pages/add_product.php',
                    'add-service' => 'dashboard-pages/edit-profile.php',
                    // 'FetchProduct' => 'dashboard-pages/fetch_products.php',
                    'manage-products-Elements' => 'dashboard-pages/manage-products-Elements.php'

                ];

                // Include the component if it exists
                if (isset($components[$current_page]) && file_exists($components[$current_page])) {
                    include $components[$current_page];
                } else {
                    echo "<h2 class='text-xl font-bold'>Dashboard</h2><p class='text-gray-600'>Welcome to your dashboard!</p>";
                }
                ?>
            </main>
        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

<script>
    const userData = {
        name: "<?php echo addslashes($user_name); ?>",
        role: "<?php echo addslashes($user_role); ?>",
        email: "<?php echo addslashes($user_email); ?>"
    };

    console.log("User Data from Database using cookie:", userData);
</script>


</html>