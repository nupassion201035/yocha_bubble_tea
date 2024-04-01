<?php
include("../connection.php");

session_start();

$size = $_POST['Sizeselection'];
$topping_id = $_POST['topping_id'];
$pro_id = $_POST['pro_id'];

$sql = "SELECT * FROM product WHERE pro_id = $topping_id";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM product WHERE pro_id = $pro_id";
$result2 = $conn->query($sql2);

$drink = $result2->fetch_assoc();
$topping = $result->fetch_assoc();

$prices = array(
    'S' => 30,
    'M' => 40,
    'L' => 50
);

// Initialize or increment quantity
$quantity = 1;

// Prepare order
$order = array(
    'size' => $size,
    'topping' => $topping,
    'drink' => $drink,
    'price' => $prices[$size] + $topping['price'],
    'quantity' => $quantity
);

// Check if the same item (drink, size, topping) is already in the cart
$found = false;
foreach ($_SESSION['cart2'] as &$existing_order) {
    if ($existing_order['drink']['pro_id'] == $order['drink']['pro_id'] && $existing_order['size'] == $order['size'] && $existing_order['topping']['pro_id'] == $order['topping']['pro_id']) {
        // Item found, increase quantity
        $existing_order['quantity'] += 1;
        $found = true;
        break;
    }
}

if (!$found) {
    // If not found, add new item
    $_SESSION['cart2'][] = $order;
}
header("Location: ./promotion.php");

?>