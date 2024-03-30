<?php

include ("../connection.php");

$stmt = $conn->prepare("INSERT INTO employees (username, password, name, address, telephone, line_id, code_employee, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $username, $password, $name, $address, $telephone, $line_id, $code_employee, $status);

// Set parameters and execute
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$address = $_POST['address'];
$telephone = $_POST['telephone'];
$line_id = $_POST['line_id'];
$code_employee = $_POST['code_employee'];
$status = $_POST['status'];

$stmt->execute();

echo "เพิ่มพนักงานใหม่สำเร็จ";

$stmt->close();
$conn->close();
header("Location: manage_employee.php");

?>