<?php
session_start();
if ($_SESSION['status'] != "owner") {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<nav class="navbar navbar-expand navbar-light bg-faded">
    <div class="container">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <a class="navbar-brand" href="#">
                <img src="..\assets\img\logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
                Yocha Bubble Tea
            </a>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="home.php">หน้าสั่งซื้อ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">คิว</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage_employee.php">จัดการพนักงาน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage_product.php">จัดการสินค้า</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="promotion.php">โปรโมชั่น</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage_member.php">จัดการสมาชิก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">สรุปยอดขาย</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=""><?php
                                                        echo "<p>วันที่: " . date("Y-m-d") . " เวลา " . date("H:i:s") . "</p>";
                                                        ?></a>
            </li>
        </ul>
    </div>
</nav>