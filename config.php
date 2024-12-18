<?php
$host = 'localhost'; // Host del database
$dbname = 'portfolio'; // Nome del database
$username = 'root'; // Username del database
$password = ''; // Password del database

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
