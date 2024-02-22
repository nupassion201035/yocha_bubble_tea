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

$order = array(
    'size' => $size,
    'topping' => $topping,
    'drink' => $drink,
    'price' => $prices[$size] + $topping['price']
);

$_SESSION['cart'][] = $order;

header("Location: ./home.php");

?>