<?php
$servername = "localhost";
$username = "root";        // zakonisht 'root' në localhost
$password = "";            // zakonisht bosh në localhost
$dbname = "user_system";   // emri i databazës që krijove

// Krijo lidhjen
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrollo lidhjen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
