<?php
include 'config.php';
$result = $conn->query("SELECT * FROM products");
?>

<h1>Produktet</h1>
<table border="1" cellpadding="8">
  <tr><th>Emri</th><th>Cmimi</th><th>Veprimi</th></tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['price'] ?> €</td>
    <td>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
        <input type="hidden" name="product_name" value="<?= $row['name'] ?>">
        <input type="hidden" name="price" value="<?= $row['price'] ?>">
        <button type="submit" name="add_to_cart">Add to Cart</button>
      </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
