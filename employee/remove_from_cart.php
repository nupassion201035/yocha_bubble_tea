<?php 
session_start();
$index_to_remove = $_GET['cart_index'];
unset($_SESSION['cart'][$index_to_remove]);
header("Location: ./home.php");
?>