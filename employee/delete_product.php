<?php

include ("../connection.php");
$id = $_GET['id'];
$name = $_GET['product_name'];
$stmt = $conn->prepare("DELETE FROM product WHERE pro_id = ?");
$stmt->bind_param("i", $id);
$dir = "../assets/img/product/";

$filename = $dir.$name;
echo $filename ;

// Check if the file exists
if (file_exists($filename)) {
    // Attempt to delete the file
    if (unlink($filename)) {
        echo "File $filename has been deleted successfully.";
    } else {
        echo "Error: Unable to delete $filename.";
    }
} else {
    echo "Error: File $filename does not exist.";
}
// Execute the statement
if ($stmt->execute()) {
    echo "product deleted successfully";
    header("Location: manage_product.php");

} else {
    echo "Error deleting product: " . $conn->error;
}

// Close the statement
$stmt->close();



// Close the connection
$conn->close();


?>
