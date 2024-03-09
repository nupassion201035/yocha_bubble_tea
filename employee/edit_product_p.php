<?php
include ("../connection.php");
$target_dir = "../assets/img/product/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$img_name = basename($_FILES["fileToUpload"]["name"]);

$old_filename = $_POST["old_img"] ;
$filename = $target_dir.$old_filename;
$sql10 = "SELECT * FROM product WHERE image = '$old_filename'";
$res10 = $conn->query($sql10);
$result10 = $res10->fetch_assoc();

if (!empty($img_name)) {
    if (file_exists($filename)) { // Check if the file exists before trying to delete
        if (unlink($filename)) {
            echo "File $filename has been deleted successfully.";
        } else {
            echo "Error: Unable to delete $filename.";
        }
    } else {
        echo "Error: File $filename does not exist.";
    }
} else {
    // $img_name is empty, so do not attempt deletion and possibly provide a message or handle as needed
    echo "No new image file provided; skipping deletion of old image.";
}
$id = $_POST["id"] ;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



if(empty($img_name)){
    $img_name = $old_filename;
}
$stmt = $conn->prepare("UPDATE product SET name=?, type=?, image=? WHERE pro_id=?");
$stmt->bind_param("sssi", $name, $type, $img_name, $id);
$name = $_POST["name"];
$type = $_POST["type"];

$stmt->execute();

echo "product update successfully";

$stmt->close();
$conn->close();





header("Location: manage_product.php");

?>

*/
