<?php
session_start();
if(isset($_POST['index'], $_POST['quantity'])) {
    $index = $_POST['index'];
    $newQuantity = $_POST['quantity'];

    // Update the quantity and total price in the session cart
    if(isset($_SESSION['cart'][$index])) {
        $_SESSION['cart'][$index]['quantity'] = $newQuantity;
        $newTotalPrice = $_SESSION['cart'][$index]['price'] * $newQuantity;
        $_SESSION['cart'][$index]['totalPrice'] = $newTotalPrice;
        echo json_encode(array('newTotalPrice' => $newTotalPrice));
    } else {
        echo json_encode(array('error' => 'Item not found'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
}
?>