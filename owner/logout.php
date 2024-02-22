<?php
session_start();
$_SESSION['username'] = '';
$_SESSION['status'] = '';
$_SESSION['employee_id'] = '';
session_destroy();
header("Location: ../index.php");
exit();
?>