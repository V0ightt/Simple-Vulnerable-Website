<?php
// config.php

// VULNERABILITY: Hardcoded sensitive credentials
$servername = "localhost";
$username = "admin_user";
$password = "MySuperSecretPassword123!"; // SAST should flag this
$dbname = "users_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
