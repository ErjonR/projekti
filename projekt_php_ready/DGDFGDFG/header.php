<?php
include 'config.php';

$countResult = $conn->query("SELECT SUM(quantity) as total FROM cart");
$countRow = $countResult->fetch_assoc();
$cartCount = $countRow['total'] ?? 0;
?>

<!-- menuja / headeri -->
<a href="cart.php" class="cart-link" style="font-size:20px; text-decoration:none;">
  🛒 <span id="cart-count"><?php echo $cartCount; ?></span>
</a>

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
    <h1>Shop Online</h1>
    <nav>
        <a href="index.php">Home</a> |
        <a href="shop.php">Shop</a> |
        <a href="about.php">About</a> |
        <a href="contact.php">Contact</a>
    </nav>
</header>
<hr>
