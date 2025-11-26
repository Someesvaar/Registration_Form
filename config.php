<?php
// Database configuration
$host = "ftpupload.net";      // change to your host when online
$user = "if0_40517147";           // default for XAMPP
$password = "H2zu2JDGEN";           // default for XAMPP
$dbname = "if0_40517147_registration_db";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
