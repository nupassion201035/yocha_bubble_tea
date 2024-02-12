<?php

include ("../connection.php");
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM employees WHERE employee_id = ?");
$stmt->bind_param("i", $id);

// Execute the statement
if ($stmt->execute()) {
    echo "Employee deleted successfully";
    header("Location: manage_employee.php");

} else {
    echo "Error deleting employee: " . $conn->error;
}

// Close the statement
$stmt->close();



// Close the connection
$conn->close();
?>