<?php
session_start();
include 'config.php';

// Kontrollo nëse përdoruesi është loguar
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or show message
    header('Location: login.php?need_login=1');
    exit();
}

if (isset($_POST['add_to_cart'])) {

    if (empty($_POST['product_id']) || empty($_POST['product_name']) || empty($_POST['price'])) {
        die("Të dhënat e produktit mungojnë.");
    }

    $user_id = $_SESSION['user_id'];
    $product_id = intval($_POST['product_id']);
    $product_name = trim($_POST['product_name']);
    $price = floatval($_POST['price']);
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    // Kontrollo nëse produkti ekziston tashmë në cart
    $check = $conn->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND product_id = ?");
    if (!$check) {
        die('Prepare failed: ' . $conn->error);
    }
    $check->bind_param("ii", $user_id, $product_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Produkti ekziston → update quantity
        $row = $result->fetch_assoc();
        $new_quantity = $row['quantity'] + $quantity;

        $update = $conn->prepare("UPDATE cart SET quantity = ?, added_at = NOW() WHERE id = ?");
        if (!$update) {
            die('Prepare failed (update): ' . $conn->error);
        }
        $update->bind_param("ii", $new_quantity, $row['id']);
        $update->execute();
        $update->close();
    } else {
        // Produkti nuk ekziston → insert i ri
        $insert = $conn->prepare("INSERT INTO cart (user_id, product_id, product_name, price, quantity, added_at)
                                  VALUES (?, ?, ?, ?, ?, NOW())");
        if (!$insert) {
            die('Prepare failed (insert): ' . $conn->error);
        }
        $insert->bind_param("iisdi", $user_id, $product_id, $product_name, $price, $quantity);
        $insert->execute();
        $insert->close();
    }

    $check->close();
    $conn->close();

    // Pasi shtohet → kthehu në faqen e produkteve me mesazh suksesi
    header("Location: shop.php?success=1");
    exit();
} else {
    header('Location: shop.php');
    exit();
}
?>
