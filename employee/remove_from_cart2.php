<?php 
session_start();
$index_to_remove = $_GET['cart_index'];
unset($_SESSION['cart2'][$index_to_remove]);
header("Location: ./promotion.php");
?>