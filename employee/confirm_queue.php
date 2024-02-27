<?php 

session_start();
echo $_SESSION['employee_id'];
include("../connection.php");
// CART ARRAY STRUCTURE
// array(
//     'size' => $size,
//     'topping' => $topping, // row of product
//     'drink' => $drink, // row of prodcut
//     'price' => $prices[$size] + $topping['price']
// );

 header("Location: ./queue.php");
