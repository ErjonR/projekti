<?php
session_start();
include 'config.php';

// Kontrollo nëse përdoruesi është loguar
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$cartItems = [];

// Kontrollo nëse tabela ekziston
$cartExists = $conn->query("SHOW TABLES LIKE 'cart'");
if ($cartExists && $cartExists->num_rows > 0) {
    $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cartItems = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shporta Juaj</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<h1>Produktet në Shportë</h1>

<?php if(count($cartItems) > 0): ?>
<table border="1" cellpadding="8">
    <tr>
        <th>Emri Produktit</th>
        <th>Çmimi</th>
        <th>Sasia</th>
        <th>Totali</th>
        <th>Veprime</th>
    </tr>
    <?php 
    $total = 0;
    foreach($cartItems as $item): 
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
    ?>
    <tr>
        <td><?= htmlspecialchars($item['product_name']) ?></td>
        <td><?= $item['price'] ?> €</td>
        <td>
            <form method="post" action="update_cart.php">
                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1">
                <button type="submit" name="update_cart">Update</button>
            </form>
        </td>
        <td><?= number_format($subtotal, 2) ?> €</td>
        <td>
            <form method="post" action="remove_from_cart.php">
                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                <button type="submit" name="remove_item">Remove</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h3>Totali: <?= number_format($total, 2) ?> €</h3>

<?php else: ?>
<p>Shporta juaj është bosh. <a href="shop.php">Shto produkte këtu</a></p>
<?php endif; ?>

</body>
</html>
