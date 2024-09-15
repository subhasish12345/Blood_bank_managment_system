<?php
session_start();

try {
    // Create a new PDO instance to connect to the MySQL database
    $db = new PDO('mysql:host=localhost;dbname=blood_bank', 'root', 'yes');
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If the connection fails, display the error message
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
