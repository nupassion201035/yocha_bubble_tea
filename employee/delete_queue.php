<?php 

session_start();
echo $_SESSION['employee_id'];
$id = $_GET['id'];
include("../connection.php");
$sql2 = "select quantity from `order_detail` where `order_id` = '$id'";
$res2 = $conn->query($sql2);
$count = 0;
while($row2 = $res2->fetch_assoc()){
    $count+=$row2['quantity'];
}

$sql3 = "select * from `order` where `order_id` = '$id'";
$res3 = $conn->query($sql3);
$row3 = $res3->fetch_assoc();
$mem_id = $row3['mem_id'];

if(!empty($mem_id)){
    $sql4 = "Update `member` set `point` = `point` - '$count' where `member_id` = '$mem_id'";
    $res4 = $conn->query($sql4);
}
    




$sql="DELETE FROM `order`  WHERE `order_id` = '$id'";
$res = $conn->query($sql);


 header("Location: ./queue.php");
