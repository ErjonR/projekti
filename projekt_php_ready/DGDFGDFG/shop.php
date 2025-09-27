<?php
include 'config.php';

// Merr çmimin maksimal nga slider ose vendos default 500
$maxPrice = isset($_GET['price']) ? intval($_GET['price']) : 500;

// Merr produktet nga DB sipas çmimit maksimal
$result = $conn->query("SELECT * FROM products WHERE price <= $maxPrice");
?>

<h1>Produktet</h1>

<!-- Slider për filtrimin e çmimit -->
<form method="get" action="">
  <label for="priceRange">Filtro sipas çmimit (max):</label>
  <input type="range" id="priceRange" name="price" min="0" max="500" step="10"
         value="<?= $maxPrice ?>" oninput="priceValue.innerText = this.value + '€'">
  <span id="priceValue"><?= $maxPrice ?>€</span>
  <button type="submit">Filtro</button>
</form>

<br>

<div id="products-container">
  <?php while($row = $result->fetch_assoc()): ?>
    <div class="product">
      <h2><?= htmlspecialchars($row['name']) ?></h2>
      <p><?= $row['price'] ?> €</p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
        <input type="hidden" name="product_name" value="<?= htmlspecialchars($row['name']) ?>">
        <input type="hidden" name="price" value="<?= $row['price'] ?>">
        <button type="submit" name="add_to_cart">Add to Cart</button>
      </form>
    </div>
  <?php endwhile; ?>
</div>

<!-- Lidh shop.js -->
<script src="shop.js"></script>
