<?php
include 'config.php'; // lidhja me databazën

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Merr të dhënat nga forma
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // kripto fjalëkalimin

    // Fut përdoruesin në tabelë
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Përdoruesi u krijua me sukses!";
    } else {
        echo "❌ Gabim: " . $conn->error;
    }
}
?>
