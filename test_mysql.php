<?php
// Simple direct MySQL connection test
$host = '127.0.0.1';
$dbname = 'crud';
$username = 'root';
$password = '';

echo "Testing MySQL connection...\n";
echo "Host: $host\n";
echo "Database: $dbname\n";
echo "Username: $username\n";
echo "Password: " . (empty($password) ? '(empty)' : '*****') . "\n\n";

try {
    // Try to connect to MySQL
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ SUCCESS: Direct MySQL connection established!\n";
    
    // Show tables in the database
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    if (count($tables) > 0) {
        echo "✅ Tables found in '$dbname' database:\n";
        foreach ($tables as $table) {
            echo "  - $table\n";
        }
    } else {
        echo "ℹ️  Database '$dbname' exists but has no tables\n";
    }
    
    // Count users in users table
    try {
        $userCount = $pdo->query("SELECT COUNT(*) as count FROM users")->fetch()['count'];
        echo "✅ Users table has $userCount records\n";
    } catch (Exception $e) {
        echo "ℹ️  Users table doesn't exist or error: " . $e->getMessage() . "\n";
    }
    
} catch (PDOException $e) {
    echo "❌ ERROR: MySQL connection failed!\n";
    echo "Error message: " . $e->getMessage() . "\n";
    echo "\nTroubleshooting:\n";
    echo "1. Make sure MySQL service is running (check XAMPP/WAMP/Laragon)\n";
    echo "2. Verify database 'crud' exists in phpMyAdmin\n";
    echo "3. Check if MySQL has password (update \$password variable)\n";
    echo "4. Try 'localhost' instead of '127.0.0.1'\n";
}