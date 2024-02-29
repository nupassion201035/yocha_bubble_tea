<?php
session_start();
$_SESSION['username'] = '';
$_SESSION['status'] = '';
$_SESSION['employee_id'] = '';
$_SESSION['option'] = '';
$_SESSION['cart'] = '';
$_SESSION['cart2'] = '';
session_destroy();
header("Location: ../index.php");
exit();
?>