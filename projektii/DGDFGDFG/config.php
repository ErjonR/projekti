<?php
$host = "localhost";
$user = "root"; // zakonisht root për XAMPP
$pass = "";
$db   = "user_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Lidhja deshtoi: " . $conn->connect_error);
}
?>
