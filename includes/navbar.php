<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require __DIR__ . '/../database.php';

$conn = getDatabaseConnection();

$user_name = '';
$is_logged_in = false;

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];

    $stmt = $conn->prepare("SELECT first_name, last_name  FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name);

    if ($stmt->fetch()) {
        $user_name = trim($first_name . ' ' . $last_name);
        $is_logged_in = true;
    }

    $stmt->close();
}
?>


<header class="sticky top-0 z-50 w-full border-b bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/60">
    <div class="container flex h-16 items-center justify-between px-4 md:px-6 mx-auto max-w-7xl">
        <a href="index.php" class="flex items-center space-x-2">
            <div class="flex items-center justify-center w-10 h-10 bg-green-600 rounded-full">
                <i data-lucide="cat" class="w-6 h-6 text-white"></i>
            </div>
            <span class="text-xl font-bold text-green-800">MeowMate</span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center space-x-6 text-sm font-medium">
            <a href="/cat-hostel-meowMate/index.php"
                class="flex items-center space-x-1 text-green-700 hover:text-green-600 transition-colors">
                <i data-lucide="home" class="w-4 h-4"></i>
                <span>Home</span>
            </a>
            <a href="/cat-hostel-meowMate/find-providers.php"
                class="flex items-center space-x-1 text-green-700 hover:text-green-600 transition-colors">
                <i data-lucide="users" class="w-4 h-4"></i>
                <span>Cat Hostel Providers</span>
            </a>

            <a href="/cat-hostel-meowMate/products.php"
                class="flex items-center space-x-1 text-green-700 hover:text-green-600 transition-colors">
                <i data-lucide="package" class="w-4 h-4"></i>
                <span>Products</span>
            </a>
            <a href="/cat-hostel-meowMate/contact.php"
                class="flex items-center space-x-1 text-green-700 hover:text-green-600 transition-colors">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span>Contact Us</span>
            </a>
            <a href="/cat-hostel-meowMate/blog.php"
                class="flex items-center space-x-1 text-green-700 hover:text-green-600 transition-colors">
                <i data-lucide="book-open" class="w-4 h-4"></i>
                <span>Blog</span>
            </a>
        </nav>

        <div class="flex items-center space-x-4">
            <div class="hidden md:flex items-center space-x-2">
                <?php if ($is_logged_in): ?>
                    <span class="text-green-700 font-medium"><?php echo htmlspecialchars($first_name); ?></span>
                    <span class="text-green-700 font-medium"><?php echo htmlspecialchars($last_name); ?></span>
                    <a href="logout.php" class="text-red-600 hover:text-red-700 font-medium">Logout</a>

                    <div class="relative group">
                        <img src="uploads/<?= htmlspecialchars($profile_image); ?>" alt="User Avatar"
                            class="w-10 h-10 rounded-full cursor-pointer border">

                        <!-- Dropdown -->
                        <div
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="/cat-hostel-meowMate/profile.php" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                            <a href="/cat-hostel-meowMate/settings.php"
                                class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                            <a href="/cat-hostel-meowMate/dashboard.php"
                                class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                            <a href="/cat-hostel-meowMate/logout.php"
                                class="block px-4 py-2 text-red-600 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>

                <?php else: ?>
                    <a href="/cat-hostel-meowMate/sign-in.php"
                        class="border border-green-600 text-green-600 hover:bg-green-50 bg-transparent px-4 py-2 rounded-md text-sm font-medium transition-colors">
                        Sign In
                    </a>
                    <a href="/cat-hostel-meowMate/sign-up.php"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                        Sign Up
                    </a>
                <?php endif; ?>

            </div>


            <!-- Mobile menu button -->
            <button id="mobile-menu-btn" class="md:hidden p-2 text-green-700 hover:text-green-600">
                <i data-lucide="menu" class="w-6 h-6" id="menu-icon"></i>
                <i data-lucide="x" class="w-6 h-6 hidden" id="close-icon"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="absolute top-16 left-0 right-0 bg-white border-b shadow-lg md:hidden hidden">
            <nav class="flex flex-col space-y-4 p-4">
                <a href="index.php"
                    class="flex items-center space-x-2 text-green-700 hover:text-green-600 transition-colors">
                    <i data-lucide="home" class="w-4 h-4"></i>
                    <span>Home</span>
                </a>
                <a href="/cat-hostel-meowMate/providers.php"
                    class="flex items-center space-x-2 text-green-700 hover:text-green-600 transition-colors">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>Cat Hostel Providers</span>
                </a>
                <a href="interested.php" class="text-green-700 hover:text-green-600 transition-colors">
                    Give Your Cat to Hostel
                </a>
                <a href="/cat-hostel-meowMate/products.php"
                    class="flex items-center space-x-2 text-green-700 hover:text-green-600 transition-colors">
                    <i data-lucide="package" class="w-4 h-4"></i>
                    <span>Products</span>
                </a>
                <a href="/cat-hostel-meowMate/contact.php"
                    class="flex items-center space-x-2 text-green-700 hover:text-green-600 transition-colors">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>Contact Us</span>
                </a>
                <a href="/cat-hostel-meowMate/urgent-vet.php"
                    class="flex items-center space-x-2 text-red-600 hover:text-red-700 transition-colors font-medium">
                    <i data-lucide="stethoscope" class="w-4 h-4"></i>
                    <span>🚨 Urgent Vet</span>
                </a>
                <div class="flex flex-col space-y-2 pt-2 border-t border-green-200">
                    <button
                        class="border border-green-600 text-green-600 hover:bg-green-50 bg-transparent px-4 py-2 rounded-md text-sm font-medium transition-colors">
                        Sign In
                    </button>
                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                        Sign Up
                    </button>
                </div>
            </nav>
        </div>
    </div>
</header>