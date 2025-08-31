<?php
session_start();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $role = trim($_POST['role'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    // Validation
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($role) || empty($password) || empty($confirm_password)) {
        $error = 'All fields are required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match';
    } elseif (!in_array($role, ['customer', 'provider', 'vet'])) {
        $error = 'Please select a valid role';
    } else {
        // DB Connection
        $servername = "127.0.0.1";
        $username_db = "root";
        $password_db = "";
        $dbname = "meowmate_db";

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username_db, $password_db);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check duplicate email
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->rowCount() > 0) {
                $error = "Email is already registered.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare("INSERT INTO users 
                    (first_name, last_name, email, phone, username, address, password, role, status, entry_date)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

                $usernameGen = strtolower($first_name . "." . $last_name);
                $status = 'active';
                $address = '';

                $stmt->execute([
                    $first_name,
                    $last_name,
                    $email,
                    $phone,
                    $usernameGen,
                    $address,
                    $hashedPassword,
                    $role,   // ✅ now will save "customer", "provider", or "vet"
                    $status
                ]);

                $success = 'Account created successfully! You can now sign in.';
                $first_name = $last_name = $email = $phone = $role = '';
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}

$page_title = "Sign Up - PurrfectStay";
$page_description = "Create your PurrfectStay account to access our cat hostel services.";
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
                <a href="sign-in.php" class="text-green-600 hover:text-green-700 font-medium">
                    Already have an account? Sign In
                </a>
            </div>
        </div>
    </header>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="flex items-center justify-center w-20 h-20 bg-green-600 rounded-full mx-auto mb-4">
                    <i data-lucide="user-plus" class="w-10 h-10 text-white"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Create Your Account</h2>
                <p class="mt-2 text-gray-600">Join PurrfectStay and give your cat the best care</p>
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
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input 
                            id="first_name" 
                            name="first_name" 
                            type="text" 
                            required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="John"
                            value="<?php echo htmlspecialchars($first_name ?? ''); ?>"
                        />
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input 
                            id="last_name" 
                            name="last_name" 
                            type="text" 
                            required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                            placeholder="Doe"
                            value="<?php echo htmlspecialchars($last_name ?? ''); ?>"
                        />
                    </div>
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        required 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        placeholder="john.doe@example.com"
                        value="<?php echo htmlspecialchars($email ?? ''); ?>"
                    />
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input 
                        id="phone" 
                        name="phone" 
                        type="tel" 
                        required 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        placeholder="+880"
                        value="<?php echo htmlspecialchars($phone ?? ''); ?>"
                    />
                </div>
                
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">I want to join as</label>
                    <select 
                        id="role" 
                        name="role" 
                        required 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                    >
                        <option value="">Select your role</option>
                        <option value="customer" <?php echo (isset($role) && $role === 'customer') ? 'selected' : ''; ?>>
                            Customer (Cat Owner)
                        </option>
                        <option value="provider" <?php echo (isset($role) && $role === 'provider') ? 'selected' : ''; ?>>
                            Hostel Provider
                        </option>
                        <option value="vet" <?php echo (isset($role) && $role === 'vet') ? 'selected' : ''; ?>>
                            Veterinarian
                        </option>
                    </select>
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        placeholder="Enter your password"
                        minlength="6"
                    />
                    <p class="mt-1 text-xs text-gray-500">Password must be at least 6 characters long</p>
                </div>
                
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input 
                        id="confirm_password" 
                        name="confirm_password" 
                        type="password" 
                        required 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        placeholder="Confirm your password"
                        minlength="6"
                    />
                </div>
                
                <div class="flex items-center">
                    <input 
                        id="terms" 
                        name="terms" 
                        type="checkbox" 
                        required
                        class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded"
                    />
                    <label for="terms" class="ml-2 block text-sm text-gray-900">
                        I agree to the <a href="#" class="text-green-600 hover:text-green-500">Terms of Service</a> and 
                        <a href="#" class="text-green-600 hover:text-green-500">Privacy Policy</a>
                    </label>
                </div>
                
                <div>
                    <button 
                        type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors"
                    >
                        <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i>
                        Create Account
                    </button>
                </div>
                
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account? 
                        <a href="signin.php" class="font-medium text-green-600 hover:text-green-500">
                            Sign in here
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        lucide.createIcons();
        
        // Password confirmation validation
        document.getElementById('confirm_password').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (password !== confirmPassword) {
                this.setCustomValidity('Passwords do not match');
            } else {
                this.setCustomValidity('');
            }
        });
        
        // Role selection helper text
        document.getElementById('role').addEventListener('change', function() {
            const roleHelp = document.getElementById('role-help');
            if (roleHelp) roleHelp.remove();
            
            const helpTexts = {
                'customer': 'As a customer, you can book hostel services for your cats and access veterinary consultations.',
                'provider': 'As a hostel provider, you can offer boarding services and manage bookings from cat owners.',
                'vet': 'As a veterinarian, you can provide online consultations and emergency services to cat owners.'
            };
            
            if (this.value && helpTexts[this.value]) {
                const helpDiv = document.createElement('p');
                helpDiv.id = 'role-help';
                helpDiv.className = 'mt-1 text-xs text-gray-600';
                helpDiv.textContent = helpTexts[this.value];
                this.parentNode.appendChild(helpDiv);
            }
        });
    </script>
</body>
</html>
