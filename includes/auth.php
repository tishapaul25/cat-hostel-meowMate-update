<?php
require_once 'config/database.php';

class Auth {
    private $conn;
    
    public function __construct() {
        $this->conn = getDatabaseConnection();
    }
    
    public function register($first_name, $last_name, $email, $phone, $role, $password) {
        try {
            // Check if email already exists
            if ($this->emailExists($email)) {
                return ['success' => false, 'message' => 'Email address is already registered'];
            }
            
            // Hash password
            $password_hash = hashPassword($password);
            
            // Generate email verification token
            $verification_token = generateSecureToken();
            
            // Insert user
            $stmt = $this->conn->prepare("
                INSERT INTO users (first_name, last_name, email, phone, password_hash, role, email_verification_token) 
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");
            
            $stmt->execute([
                $first_name, 
                $last_name, 
                $email, 
                $phone, 
                $password_hash, 
                $role, 
                $verification_token
            ]);
            
            $user_id = $this->conn->lastInsertId();
            
            // Create role-specific profile
            $this->createUserProfile($user_id, $role);
            
            // In a real application, send verification email here
            // $this->sendVerificationEmail($email, $verification_token);
            
            return [
                'success' => true, 
                'message' => 'Account created successfully! Please check your email to verify your account.',
                'user_id' => $user_id
            ];
            
        } catch (PDOException $e) {
            error_log("Registration error: " . $e->getMessage());
            return ['success' => false, 'message' => 'Registration failed. Please try again.'];
        }
    }
    
    public function login($email, $password, $ip_address) {
        try {
            // Check rate limiting
            if (!checkLoginAttempts($email, $ip_address)) {
                return ['success' => false, 'message' => 'Too many failed login attempts. Please try again in 15 minutes.'];
            }
            
            // Get user by email
            $stmt = $this->conn->prepare("
                SELECT id, first_name, last_name, email, password_hash, role, status, email_verified 
                FROM users 
                WHERE email = ?
            ");
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            
            if (!$user) {
                logLoginAttempt($email, $ip_address, false);
                return ['success' => false, 'message' => 'Invalid email or password'];
            }
            
            // Verify password
            if (!verifyPassword($password, $user['password_hash'])) {
                logLoginAttempt($email, $ip_address, false);
                return ['success' => false, 'message' => 'Invalid email or password'];
            }
            
            // Check account status
            if ($user['status'] !== 'active') {
                logLoginAttempt($email, $ip_address, false);
                return ['success' => false, 'message' => 'Your account is suspended. Please contact support.'];
            }
            
            // For demo purposes, skip email verification
            // if (!$user['email_verified']) {
            //     return ['success' => false, 'message' => 'Please verify your email address before logging in.'];
            // }
            
            // Update last login
            $this->updateLastLogin($user['id']);
            
            // Log successful attempt
            logLoginAttempt($email, $ip_address, true);
            
            // Create session
            $this->createSession($user);
            
            return [
                'success' => true, 
                'message' => 'Login successful',
                'user' => [
                    'id' => $user['id'],
                    'name' => $user['first_name'] . ' ' . $user['last_name'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ]
            ];
            
        } catch (PDOException $e) {
            error_log("Login error: " . $e->getMessage());
            return ['success' => false, 'message' => 'Login failed. Please try again.'];
        }
    }
    
    public function logout() {
        // Destroy session
        session_start();
        session_destroy();
        
        // In a real application, also invalidate session token in database
        return ['success' => true, 'message' => 'Logged out successfully'];
    }
    
    public function resetPassword($email) {
        try {
            // Check if email exists
            if (!$this->emailExists($email)) {
                // Don't reveal if email exists or not for security
                return ['success' => true, 'message' => 'If an account with that email exists, we\'ve sent you a password reset link.'];
            }
            
            // Generate reset token
            $reset_token = generateSecureToken();
            $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
            
            // Update user with reset token
            $stmt = $this->conn->prepare("
                UPDATE users 
                SET password_reset_token = ?, password_reset_expires = ? 
                WHERE email = ?
            ");
            $stmt->execute([$reset_token, $expires, $email]);
            
            // In a real application, send reset email here
            // $this->sendPasswordResetEmail($email, $reset_token);
            
            return ['success' => true, 'message' => 'If an account with that email exists, we\'ve sent you a password reset link.'];
            
        } catch (PDOException $e) {
            error_log("Password reset error: " . $e->getMessage());
            return ['success' => false, 'message' => 'Password reset failed. Please try again.'];
        }
    }
    
    private function emailExists($email) {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }
    
    private function createUserProfile($user_id, $role) {
        switch ($role) {
            case 'customer':
                $stmt = $this->conn->prepare("INSERT INTO customer_profiles (user_id) VALUES (?)");
                $stmt->execute([$user_id]);
                break;
            case 'provider':
                $stmt = $this->conn->prepare("INSERT INTO provider_profiles (user_id, business_name) VALUES (?, ?)");
                $stmt->execute([$user_id, 'New Business']);
                break;
            case 'vet':
                $stmt = $this->conn->prepare("INSERT INTO vet_profiles (user_id, license_number) VALUES (?, ?)");
                $stmt->execute([$user_id, 'PENDING']);
                break;
        }
    }
    
    private function updateLastLogin($user_id) {
        $stmt = $this->conn->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
        $stmt->execute([$user_id]);
    }
    
    private function createSession($user) {
        session_start();
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['login_time'] = time();
    }
}

// Helper function to check if user is logged in
function isLoggedIn() {
    session_start();
    return isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
}

// Helper function to get current user
function getCurrentUser() {
    if (!isLoggedIn()) {
        return null;
    }
    
    return [
        'id' => $_SESSION['user_id'],
        'email' => $_SESSION['user_email'],
        'name' => $_SESSION['user_name'],
        'role' => $_SESSION['user_role']
    ];
}

// Helper function to require login
function requireLogin($redirect_to = 'signin.php') {
    if (!isLoggedIn()) {
        header("Location: $redirect_to");
        exit;
    }
}

// Helper function to require specific role
function requireRole($required_role, $redirect_to = 'index.php') {
    if (!isLoggedIn()) {
        header("Location: signin.php");
        exit;
    }
    
    if ($_SESSION['user_role'] !== $required_role) {
        header("Location: $redirect_to");
        exit;
    }
}
?>
