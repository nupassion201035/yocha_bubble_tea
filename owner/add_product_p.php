<?php
$target_dir = "../assets/img/product/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "ไฟล์รูปภาพ - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "ไฟล์นี้ไม่ใช่ไฟล์รูปภาพ";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "ขออภัย มีไฟล์อยู่แล้ว";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "ขออภัย ไฟล์มีขนาดใหญ่เกินไป";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "ขออภัย ไฟล์รูปภาพต้องเป็น JPG, JPEG, PNG หรือ GIF เท่านั้น";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "ขออภัย ไฟล์ไม่สามารถอัพโหลดได้";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "ไฟล์ ". basename( $_FILES["fileToUpload"]["name"]). " ได้ถูกอัพโหลดแล้ว";
    } else {
        echo "ขออภัย มีปัญหาในการอัพโหลดไฟล์ของคุณ";
    }
}

$name = $_POST["name"];

$type = $_POST["type"];
$img_name = basename($_FILES["fileToUpload"]["name"]);

include ("../connection.php");
$stmt = $conn->prepare("INSERT INTO product (name, type, image) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $type, $img_name);

$stmt->execute();

echo "เพิ่มสินค้าใหม่สำเร็จ";

$stmt->close();
$conn->close();
header("Location: manage_product.php");
?>
