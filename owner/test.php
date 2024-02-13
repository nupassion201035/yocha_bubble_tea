<?php
$filename = "../assets/img/product/tea.jpg";

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
?>