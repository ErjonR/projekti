<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "Regjistrimi u krye me sukses. <a href='login.php'>Hyr tani</a>";
    } else {
        echo "Gabim: " . $stmt->error;
    }
}
?>

<form method="POST">
    <h2>Register</h2>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="submit">Register</button>
</form>
