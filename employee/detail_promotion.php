

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
        <div class="row">
        <a href="queue.php"><button class="btn btn-primary"> กลับหน้าคิว</button></a>
            
<?php
$promotion_id = $_GET["promotion_id"];
$sql = "SELECT p.name AS product_name, p.image AS product_image,
               t.name AS topping_name, t.image AS topping_image,
               pr.datetime, pr.status, pr.employee_id
        FROM promotion pr
        INNER JOIN product p ON pr.pro_id = p.pro_id
        INNER JOIN product t ON pr.topping_id = t.pro_id
        WHERE pr.promotion_id = '$promotion_id'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    
    echo "<br>";
    echo "<h1>รายละเอียดคิว</h1>";
    echo "<h1>P0$promotion_id</h1>";
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>เมนู</th><th>ท็อปปิ้ง</th><th>จำนวน</th><th>รูปภาพ</th></tr></thead>";
echo "<tbody>";
$total_sale = 0;
while($row = $result->fetch_assoc()) {
  
    
    echo "<tr><td>".$row["product_name"]."</td><td>".$row["topping_name"]."</td><td>1<td><img src='../assets/img/product/".$row["product_image"]."'width='50' height='50' ></td></tr>";
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