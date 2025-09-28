<?php
session_start();
include 'config.php'; // lidhja me databazën

// Merr produktet nga tabela cart
$cartItems = [];
$cartExists = $conn->query("SHOW TABLES LIKE 'cart'");
if ($cartExists && $cartExists->num_rows > 0) {
    $result = $conn->query("SELECT * FROM cart");
    if ($result) {
        $cartItems = $result->fetch_all(MYSQLI_ASSOC);
    }
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

<?php include 'header.php'; ?> <!-- përfshin navbar -->

<h1>Produktet në Shportë</h1>

<?php if(count($cartItems) > 0): ?>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Emri Produktit</th>
        <th>Çmimi</th>
        <th>Sasia</th>
        <th>Veprime</th>
    </tr>
    <?php foreach($cartItems as $item): ?>
    <tr>
        <td><?= $item['id'] ?></td>
        <td><?= htmlspecialchars($item['product_name']) ?></td>
        <td><?= $item['price'] ?> €</td>
        <td>
            <form method="post" action="update_cart.php">
                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1">
                <button type="submit" name="update_cart">Update</button>
            </form>
        </td>
        <td>
            <form method="post" action="remove_from_cart.php">
                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                <button type="submit" name="remove_item">Remove</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<p>Shporta juaj është bosh. <a href="shop.php">Shto produkte këtu</a></p>
<?php endif; ?>

</body>
</html>
