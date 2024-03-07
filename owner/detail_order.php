<?php include("navbar_owner.php"); 
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
        <a href="queue.php"><button class="btn btn-primary"> Back to Queue</button></a>
        <h1>คิว</h1>
            
<?php
$order_id = $_GET["order_id"];
$sql = "SELECT od.size, od.pro_id, p.name AS product_name, p.image AS product_image, 
               t.name AS topping_name, t.image AS topping_image
        FROM order_detail od 
        INNER JOIN `order` o ON od.order_id = o.order_id 
        INNER JOIN product p ON od.pro_id = p.pro_id 
        INNER JOIN product t ON od.topping_id = t.pro_id  
        WHERE o.order_id = '$order_id'";


$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    
    echo "<br>";
    
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>Name</th><th>Type</th><th>toping name</th><th>Image</th></tr></thead>";
echo "<tbody>";
while($row = $result->fetch_assoc()) {
   
    echo "<tr><td>".$row["product_name"]."</td><td>".$row["size"]."</td><td>".$row["topping_name"]."</td><td><img src='../assets/img/product/".$row["product_image"]."'width='50' height='50' ></td></tr>";
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
<script>
    function confirmDelete() {
      return confirm("Are you sure you want to delete this?");
    }
  </script>
  <script>
    function confirmAction() {
      return confirm("Are you sure you want to complete this?");
    }
  </script>