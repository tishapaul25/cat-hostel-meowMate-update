<?php
require 'database.php'; // your DB connection file

$error = ''; // initialize error
$success = ''; // initialize success

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Get DB connection
    $conn = getDatabaseConnection();

    if (!$conn) {
        die("Database connection failed.");
    }

    // Prepare SQL to get password, name, and role
    $sql = "SELECT id, first_name, last_name, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Bind the result
        $stmt->bind_result($user_id, $first_name, $last_name, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Set cookies for 7 days
            setcookie('user_id', $user_id, time() + (7 * 24 * 60 * 60), "/");
            setcookie('first_name', $first_name, time() + (7 * 24 * 60 * 60), "/");
            setcookie('last_name', $last_name, time() + (7 * 24 * 60 * 60), "/");
            setcookie('role', $role, time() + (7 * 24 * 60 * 60), "/"); // <-- added role

            // Start session
            session_start();
            $_SESSION['id'] = $user_id;
            $_SESSION['role'] = $role; // optional: store role in session too

            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No account found with that email.";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_description; ?>">
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

<body class="bg-gradient-to-br from-green-50 to-emerald-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/60 border-b">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <a href="index.php" class="flex items-center space-x-2">
                    <div class="flex items-center justify-center w-10 h-10 bg-green-600 rounded-full">
                        <i data-lucide="cat" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="text-xl font-bold text-green-800">PurrfectStay</span>
                </a>
                <a href="signup.php" class="text-green-600 hover:text-green-700 font-medium">
                    Don't have an account? Sign Up
                </a>
            </div>
        </div>
    </header>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="flex items-center justify-center w-20 h-20 bg-green-600 rounded-full mx-auto mb-4">
                    <i data-lucide="log-in" class="w-10 h-10 text-white"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Welcome Back</h2>
                <p class="mt-2 text-gray-600">Sign in to your PurrfectStay account</p>
            </div>

            <?php if ($error): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md">
                    <div class="flex items-center">
                        <i data-lucide="alert-circle" class="w-4 h-4 mr-2"></i>
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md">
                    <div class="flex items-center">
                        <i data-lucide="check-circle" class="w-4 h-4 mr-2"></i>
                        <?php echo htmlspecialchars($success); ?>
                    </div>
                </div>
            <?php endif; ?>

            <form class="mt-8 space-y-6" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" name="email" type="email" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        placeholder="Enter your email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                            class="mt-1 block w-full px-3 py-2 pr-10 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="Enter your password" />
                        <button type="button" id="toggle-password"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i data-lucide="eye" class="w-4 h-4 text-gray-400 hover:text-gray-600"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded" />
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="forgot-pass.php" class="font-medium text-green-600 hover:text-green-500">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                        <i data-lucide="log-in" class="w-4 h-4 mr-2"></i>
                        Sign In
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="/cat-hostel-meowMate/sign-up.php"
                            class="font-medium text-green-600 hover:text-green-500">
                            Sign up here
                        </a>
                    </p>
                </div>
            </form>

            
    <script>
        lucide.createIcons();

        // Toggle password visibility
        document.getElementById('toggle-password').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.setAttribute('data-lucide', 'eye-off');
            } else {
                passwordInput.type = 'password';
                eyeIcon.setAttribute('data-lucide', 'eye');
            }

            lucide.createIcons();
        });
    </script>
</body>

</html>