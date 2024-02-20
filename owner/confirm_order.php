<?php 

session_start();

// CART ARRAY STRUCTURE
// array(
//     'size' => $size,
//     'topping' => $topping, // row of product
//     'drink' => $drink, // row of prodcut
//     'price' => $prices[$size] + $topping['price']
// );

foreach ($_SESSION['cart'] as $index => $order) {
    echo "Size: " . $order['size'] . "<br>";
    echo "Drink: ". $order['drink']['pro_id'].'/'.$order['drink']['name'].'/'.$order['drink']['price'].'/'.$order['drink']['type'].'/'.$order['drink']['price'].'/'.$order['drink']['image']."<br>";
    echo "Topping: " . $order['topping']['pro_id'].'/'.$order['topping']['name'].'/'.$order['topping']['price'].'/'.$order['topping']['type'].'/'.$order['topping']['price'].'/'.$order['topping']['image']."<br>";
    echo "Price: " . $order['price'] . "<br><br>";
};

?>