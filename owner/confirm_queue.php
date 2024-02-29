<?php 

session_start();
echo $_SESSION['employee_id'];
$id = $_GET['id'];
include("../connection.php");
$sql="UPDATE `order` set `status` = 'complete' WHERE `order_id` = '$id'";
$res = $conn->query($sql);


 header("Location: ./queue.php");
