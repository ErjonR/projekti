<?php
session_start();
include 'config.php';

if(isset($_POST['update_cart'])) {
    $id = intval($_POST['id']);
    $quantity = intval($_POST['quantity']);

    $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
    $stmt->bind_param("ii", $quantity, $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: config.php");
exit;
