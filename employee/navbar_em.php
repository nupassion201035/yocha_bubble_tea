<?php
session_start();
if ($_SESSION['status'] != "employee"){
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/chart.js"></script>
</head>
<nav class="navbar navbar-expand navbar-light bg-faded">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="..\assets\img\logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
                Yocha Bubble Tea
            </a>
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home.php">หน้าสั่งซื้อ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="promotion.php">โปรโมชั่น</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="queue.php">คิว</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_product.php">จัดการสินค้า</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_member.php">จัดการสมาชิก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="report.php">สรุปยอดขาย</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>