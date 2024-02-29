<?php 
session_start();

unset($_SESSION['cart2']);
header("Location: ./promotion.php");
?>