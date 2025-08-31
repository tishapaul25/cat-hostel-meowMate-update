<?php
session_start();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    
    // Basic validation
    if (empty($email)) {
        $error = 'Email address is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address';
    } else {
        // In a real application, you would:
        // 1. Check if email exists in database
        // 2. Generate a secure reset token
        // 3. Send reset email
        // For demo purposes, we'll just show success message
        $success = 'If an account with that email exists, we\'ve sent you a password reset link.';
    }
}

$page_title = "Forgot Password - PurrfectStay";
$page_description = "Reset your PurrfectStay account password.";
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
                <a href="signin.php" class="text-green-600 hover:text-green-700 font-medium">
                    Back to Sign In
                </a>
            </div>
        </div>
    </header>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="flex items-center justify-center w-20 h-20 bg-green-600 rounded-full mx-auto mb-4">
                    <i data-lucide="key" class="w-10 h-10 text-white"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Forgot Password?</h2>
                <p class="mt-2 text-gray-600">No worries! Enter your email and we'll send you reset instructions</p>
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
            
            <?php if (!$success): ?>
            <form class="mt-8 space-y-6" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        required 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        placeholder="Enter your email address"
                        value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                    />
                    <p class="mt-1 text-xs text-gray-500">We'll send password reset instructions to this email</p>
                </div>
                
                <div>
                    <button 
                        type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors"
                    >
                        <i data-lucide="mail" class="w-4 h-4 mr-2"></i>
                        Send Reset Instructions
                    </button>
                </div>
            </form>
            <?php endif; ?>
            
            <div class="text-center space-y-2">
                <p class="text-sm text-gray-600">
                    Remember your password? 
                    <a href="signin.php" class="font-medium text-green-600 hover:text-green-500">
                        Sign in here
                    </a>
                </p>
                <p class="text-sm text-gray-600">
                    Don't have an account? 
                    <a href="signup.php" class="font-medium text-green-600 hover:text-green-500">
                        Sign up here
                    </a>
                </p>
            </div>
        </div>
    </div>
    
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
