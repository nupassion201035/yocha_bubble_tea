<?php include("navbar_em.php"); 
include("../connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-xxl" >
        <div class="row" style="background-color: aqua;">
        <h1>คิว</h1>
            
<?php
$sql = "SELECT * FROM `order` WHERE `status` = 'incomplete'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    
    echo "<br>";
    
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>Name</th><th>Type</th><th>Image</th><th>Action</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["datetime"]."</td><td>".$row["mem_id"]."</td><td>".$row["employee_id"]."</td> 
        <td>
        <a href=''><button type='button'  class='btn btn-success btn-lg'>Edit</button></a>
        &nbsp;&nbsp;&nbsp; 
        <a onclick='return confirmDelete();' href=''><button type='button' class='btn btn-danger btn-lg'>DELETE</button></a></td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
} else {
    echo "0 results";   
}
?>

        </div>
    </div>
    
</body>
</html>