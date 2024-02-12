<?php

include ("../connection.php");

$stmt = $conn->prepare("INSERT INTO employees (username, password, name, address, telephone, line_id, code_employee, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $username, $password, $name, $address, $telephone, $line_id, $code_employee, $status);

// Set parameters and execute
$employee_id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$address = $_POST['address'];
$telephone = $_POST['telephone'];
$line_id = $_POST['line_id'];
$code_employee = $_POST['code_employee'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE employees SET username=?, password=?, name=?, address=?, telephone=?, line_id=?, code_employee=?, status=? WHERE employee_id=?");
    $stmt->bind_param("ssssssssi", $username, $password, $name, $address, $telephone, $line_id, $code_employee, $status, $employee_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Employee updated successfully";
        header("Location: manage_employee.php");
    } else {
        echo "Error updating employee: " . $conn->error;
    }

    // Close the statement
    $stmt->close();



?>