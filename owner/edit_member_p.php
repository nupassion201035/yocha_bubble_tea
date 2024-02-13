<?php

include ("../connection.php");

$stmt = $conn->prepare("INSERT INTO employees (username, password, name, address, telephone, line_id, code_employee, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $username, $password, $name, $address, $telephone, $line_id, $code_employee, $status);

// Set parameters and execute
$member_id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$telephone = $_POST['telephone'];
$line_id = $_POST['line'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE member SET  name=?, address=?, telephone=?, line=?, status=? WHERE member_id=?");
    $stmt->bind_param("sssssi", $name, $address, $telephone, $line_id, $status, $member_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Employee updated successfully";
        header("Location: manage_member.php");
    } else {
        echo "Error updating employee: " . $conn->error;
    }

    // Close the statement
    $stmt->close();



?>