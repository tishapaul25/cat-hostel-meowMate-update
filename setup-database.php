<?php
require_once 'config/database.php';

// Set content type and disable caching
header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$success_messages = [];
$error_messages = [];

try {
    // Get database connection
    $conn = getDatabaseConnection();
    
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Database Setup - PurrfectStay</title>
        <script src='https://cdn.tailwindcss.com'></script>
        <script src='https://unpkg.com/lucide@latest/dist/umd/lucide.js'></script>
    </head>
    <body class='bg-gray-100 min-h-screen py-8'>
        <div class='max-w-4xl mx-auto px-4'>
            <div class='bg-white rounded-lg shadow-lg p-8'>
                <h1 class='text-3xl font-bold text-green-600 mb-6 flex items-center'>
                    <i data-lucide='database' class='w-8 h-8 mr-3'></i>
                    PurrfectStay Database Setup
                </h1>";
    
    // Read and execute SQL schema
    $schema_file = 'database/schema.sql';
    if (!file_exists($schema_file)) {
        throw new Exception("Schema file not found: $schema_file");
    }
    
    $sql_content = file_get_contents($schema_file);
    $sql_statements = explode(';', $sql_content);
    
    echo "<div class='space-y-4'>";
    echo "<h2 class='text-xl font-semibold text-gray-800 mb-4'>Executing Database Setup...</h2>";
    
    foreach ($sql_statements as $statement) {
        $statement = trim($statement);
        if (empty($statement) || strpos($statement, '--') === 0) {
            continue;
        }
        
        try {
            $conn->exec($statement);
            
            // Extract table/operation name for display
            if (preg_match('/CREATE TABLE\s+(\w+)/i', $statement, $matches)) {
                echo "<div class='flex items-center text-green-600'>
                        <i data-lucide='check-circle' class='w-4 h-4 mr-2'></i>
                        Created table: <strong>{$matches[1]}</strong>
                      </div>";
                $success_messages[] = "Created table: {$matches[1]}";
            } elseif (preg_match('/INSERT INTO\s+(\w+)/i', $statement, $matches)) {
                echo "<div class='flex items-center text-blue-600'>
                        <i data-lucide='plus-circle' class='w-4 h-4 mr-2'></i>
                        Inserted demo data into: <strong>{$matches[1]}</strong>
                      </div>";
                $success_messages[] = "Inserted demo data into: {$matches[1]}";
            } elseif (preg_match('/CREATE DATABASE/i', $statement)) {
                echo "<div class='flex items-center text-green-600'>
                        <i data-lucide='database' class='w-4 h-4 mr-2'></i>
                        Created database: <strong>purrfectstay</strong>
                      </div>";
                $success_messages[] = "Created database: purrfectstay";
            }
        } catch (PDOException $e) {
            // Skip errors for existing tables/database
            if (strpos($e->getMessage(), 'already exists') === false) {
                echo "<div class='flex items-center text-red-600'>
                        <i data-lucide='alert-circle' class='w-4 h-4 mr-2'></i>
                        Error: {$e->getMessage()}
                      </div>";
                $error_messages[] = $e->getMessage();
            }
        }
    }
    
    echo "</div>";
    
    // Verify tables were created
    echo "<div class='mt-8'>";
    echo "<h2 class='text-xl font-semibold text-gray-800 mb-4'>Verifying Database Structure...</h2>";
    
    $tables = ['users', 'customer_profiles', 'provider_profiles', 'vet_profiles', 'user_sessions', 'login_attempts'];
    
    foreach ($tables as $table) {
        try {
            $stmt = $conn->query("DESCRIBE $table");
            $columns = $stmt->fetchAll();
            echo "<div class='flex items-center text-green-600'>
                    <i data-lucide='check-circle' class='w-4 h-4 mr-2'></i>
                    Table <strong>$table</strong> verified (" . count($columns) . " columns)
                  </div>";
        } catch (PDOException $e) {
            echo "<div class='flex items-center text-red-600'>
                    <i data-lucide='x-circle' class='w-4 h-4 mr-2'></i>
                    Table <strong>$table</strong> missing or invalid
                  </div>";
        }
    }
    
    echo "</div>";
    
    // Show demo accounts
    echo "<div class='mt-8 p-6 bg-blue-50 rounded-lg'>";
    echo "<h2 class='text-xl font-semibold text-blue-800 mb-4'>Demo Accounts Created</h2>";
    echo "<div class='grid grid-cols-1 md:grid-cols-2 gap-4 text-sm'>";
    
    $demo_accounts = [
        ['role' => 'Customer', 'email' => 'john.doe@example.com', 'password' => 'password'],
        ['role' => 'Customer', 'email' => 'sarah.wilson@example.com', 'password' => 'password'],
        ['role' => 'Provider', 'email' => 'provider@cozycats.com', 'password' => 'password'],
        ['role' => 'Provider', 'email' => 'admin@happypaws.com', 'password' => 'password'],
        ['role' => 'Veterinarian', 'email' => 'dr.smith@vetcare.com', 'password' => 'password'],
        ['role' => 'Veterinarian', 'email' => 'dr.johnson@vetcare.com', 'password' => 'password']
    ];
    
    foreach ($demo_accounts as $account) {
        echo "<div class='bg-white p-3 rounded border'>
                <div class='font-medium text-gray-800'>{$account['role']}</div>
                <div class='text-gray-600'>Email: {$account['email']}</div>
                <div class='text-gray-600'>Password: {$account['password']}</div>
              </div>";
    }
    
    echo "</div></div>";
    
    // Success message
    echo "<div class='mt-8 p-6 bg-green-50 rounded-lg border border-green-200'>";
    echo "<div class='flex items-center text-green-800'>
            <i data-lucide='check-circle' class='w-6 h-6 mr-3'></i>
            <div>
                <h3 class='font-semibold text-lg'>Database Setup Completed Successfully!</h3>
                <p class='mt-1'>You can now test the authentication system.</p>
            </div>
          </div>";
    echo "</div>";
    
    // Navigation links
    echo "<div class='mt-8 flex flex-wrap gap-4'>";
    echo "<a href='signin.php' class='bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors flex items-center'>
            <i data-lucide='log-in' class='w-4 h-4 mr-2'></i>
            Test Sign In
          </a>";
    echo "<a href='signup.php' class='bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center'>
            <i data-lucide='user-plus' class='w-4 h-4 mr-2'></i>
            Test Sign Up
          </a>";
    echo "<a href='index.php' class='bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition-colors flex items-center'>
            <i data-lucide='home' class='w-4 h-4 mr-2'></i>
            Go to Homepage
          </a>";
    echo "</div>";
    
} catch (Exception $e) {
    echo "<div class='bg-red-50 border border-red-200 rounded-lg p-6'>
            <div class='flex items-center text-red-800'>
                <i data-lucide='alert-circle' class='w-6 h-6 mr-3'></i>
                <div>
                    <h3 class='font-semibold text-lg'>Database Setup Failed</h3>
                    <p class='mt-1'>Error: " . htmlspecialchars($e->getMessage()) . "</p>
                </div>
            </div>
          </div>";
    
    echo "<div class='mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg'>
            <h4 class='font-semibold text-yellow-800 mb-2'>Troubleshooting Steps:</h4>
            <ul class='list-disc list-inside text-yellow-700 space-y-1'>
                <li>Make sure MySQL server is running</li>
                <li>Check database credentials in config/database.php</li>
                <li>Ensure the database 'purrfectstay' exists</li>
                <li>Verify file permissions for database/schema.sql</li>
            </ul>
          </div>";
}

echo "        </div>
        </div>
        <script>lucide.createIcons();</script>
    </body>
    </html>";
?>
