<?php

include ("../connection.php");

$stmt = $conn->prepare("INSERT INTO member (name, address, telephone, status, point, line) VALUES (?, ?, ?, 'active', 0, ?)");
$stmt->bind_param("ssis",$name, $address, $telephone, $line_id);

// Set parameters and execute

$name = $_POST['name'];
$address = $_POST['address'];
$telephone = $_POST['telephone'];
$line_id = $_POST['line_id'];


$stmt->execute();

echo "New member added successfully";

$stmt->close();
$conn->close();
header("Location: manage_member.php");

?>