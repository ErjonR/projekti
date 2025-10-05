<?php
session_start();
include 'config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            // ✅ Ruaj ID-në e përdoruesit dhe username
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id']; 

            // ✅ Ridrejto pas login te shop.php
            header("Location: index.php");
            exit();
        } else {
            echo "Password i gabuar!";
        }
    } else {
        echo "Ky përdorues nuk ekziston!";
    }
}
?>

<form method="POST">
    <h2>Login</h2>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="submit">Login</button>
</form>
