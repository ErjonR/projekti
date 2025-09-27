<?php
include 'config.php';

if (isset($_POST['add_to_cart'])) {
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];

    // kontrollo nëse ekziston produkti në shportë
    $check = $conn->query("SELECT * FROM cart WHERE product_id = '$id'");
    if ($check->num_rows > 0) {
        $conn->query("UPDATE cart SET quantity = quantity + 1 WHERE product_id = '$id'");
    } else {
        $conn->query("INSERT INTO cart (product_id, product_name, price, quantity) 
                      VALUES ('$id', '$name', '$price', 1)");
    }

    // kthehu te shop.php ose te cart.php
    header("Location: cart.php");
    exit;
}
