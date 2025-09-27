<?php
include 'config.php'; // lidhja me databazën

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contacts (name, email, message) 
            VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Mesazhi u ruajt me sukses!";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>
