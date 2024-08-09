<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
#delay between command

$second = "3";
// ANSI color codes
$redColor = "\033[31m";
$greenColor = "\033[32m";
$resetColor = "\033[0m";


echo "Configuration file loaded successfully.\n";
Sleep($second);
// Extract configuration details
echo "Extracting database configuration details...\n";

$host = $_ENV['DB_HOST'];
$user = $_ENV['ROOT_NAME'];
$password = $_ENV['ROOT_PASS'];

echo "Database configuration details extracted successfully.\n";
Sleep($second);
// // Check command-line arguments
// echo "Checking command-line arguments...\n";
// if ($argc < 2) {
//     echo "Usage: php create_database.php <database_name>\n";
//     exit(1); // Exit with error
// }

$newDatabase = $_ENV['DB_NAME'];
$newUser = $_ENV['DB_USER'];
$newUserPassword = $_ENV['DB_PASSWORD'];


echo $greenColor . "Database name: $newDatabase" . $resetColor . "\n";
Sleep($second);

// Create connection
echo "Connecting to MySQL server...\n";
$conn = new mysqli($host, $user, $password);
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error . "\n";
    exit(1); // Exit with error
}

Sleep($second);
echo "Connected to MySQL server successfully\n";

// Create database
echo "Creating database '$newDatabase' if it does not exist...\n";
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS `$newDatabase`";
if ($conn->query($sqlCreateDB) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
    $conn->close();
    exit(1); // Exit with error
}
Sleep($second);
// Grant privileges
echo "Granting all privileges on '$newDatabase' to user '$newUser'...\n";
$sqlGrantPrivileges = "GRANT ALL PRIVILEGES ON `$newDatabase`.* TO '$newUser'@'%' IDENTIFIED BY '$newUserPassword'";
if ($conn->query($sqlGrantPrivileges) === TRUE) {
    echo "User '$newUser' granted privileges on '$newDatabase'\n";
} else {
    echo "Error granting privileges: " . $conn->error . "\n";
}

// Flush privileges to ensure they are loaded
echo "Flushing privileges to ensure they are loaded...\n";
if ($conn->query("FLUSH PRIVILEGES") === TRUE) {
    echo "Privileges flushed\n";
} else {
    echo "Error flushing privileges: " . $conn->error . "\n";
}

// Close connection
echo "Closing MySQL connection...\n";
$conn->close();
echo "Script executed successfully\n";
exit(0); // Exit with success
