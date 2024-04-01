<?php
include("../connection.php");
$promotion_id = $_GET['id'];
$sql = "UPDATE `promotion` SET `status` = 'complete' WHERE `promotion_id` = '$promotion_id'";
$res = $conn->query($sql);


header("Location: ./queue.php");
?>