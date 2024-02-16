<?php

namespace App\config;
use PDO;
use PDOException;
define('BASE_DIR', __DIR__);


$env = file_get_contents('./.env');
$lines = explode("\n", $env);
$dbConfig = [];
foreach ($lines as $line) {
    if (empty($line) || $line[0] === '#') {
        continue;
    }
    list($key, $value) = explode('=', $line);
    $dbConfig[$key] = trim($value);
}

// db connections
$dbhost = $dbConfig['DB_HOST'];
$dbname = $dbConfig['DB_NAME'];
try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbConfig['DB_USER'], $dbConfig['DB_PASSWORD']);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Display a success message if the connection was established
//    echo "Connected successfully";
} catch (PDOException $e) {
    // Display an error message if the connection fails
    echo "Connection failed: " . $e->getMessage();
}
