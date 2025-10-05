<?php
session_start();
include 'config.php';

$cartCount = 0;
$tableCheck = $conn->query("SHOW TABLES LIKE 'cart'");
if ($tableCheck && $tableCheck->num_rows > 0) {
    $countResult = $conn->query("SELECT SUM(quantity) as total FROM cart");
    $countRow = $countResult->fetch_assoc();
    $cartCount = $countRow['total'] ?? 0;
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <h1>Shop Online</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>

                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="#">Hi, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>

                <li>
                    <a href="cart.php" class="cart-link">
                        🛒 <span id="cart-count"><?php echo $cartCount; ?></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<hr>
