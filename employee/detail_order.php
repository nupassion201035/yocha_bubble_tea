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
$order_id = $_GET["order_id"];
$sql = "SELECT od.size, od.pro_id, p.name AS product_name, p.image AS product_image, 
               t.name AS topping_name, t.image AS topping_image , od.quantity AS quantity
        FROM order_detail od 
        INNER JOIN `order` o ON od.order_id = o.order_id 
        INNER JOIN product p ON od.pro_id = p.pro_id 
        INNER JOIN product t ON od.topping_id = t.pro_id  
        WHERE o.order_id = '$order_id'";


$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    
    echo "<br>";
    echo "<h1>รายละเอียดคิว</h1>";
    echo "<h1>A0$order_id</h1>";
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>เมนู</th><th>ประเภท</th><th>ท็อปปิ้ง</th><th>จำนวน</th><th>ราคา</th><th>รูปภาพ</th></tr></thead>";
echo "<tbody>";
$total_sale = 0;
while($row = $result->fetch_assoc()) {
  $total_price = 0;
  
   if ($row["size"] == "S") {
       $price = 30 ;
    } else if ($row["size"] == "M") {
        $price = 40 ;
    } else {
        $price = 50 ;
    }
    $total_price = $price * $row["quantity"];
    $total_sale += $total_price;
    echo "<tr><td>".$row["product_name"]."</td><td>".$row["size"]."</td><td>".$row["topping_name"]."</td><td>".$row["quantity"]. " x " .$price." บาท</td><td>".$total_price."</td><td><img src='../assets/img/product/".$row["product_image"]."'width='50' height='50' ></td></tr>";
}
echo "</tbody>";
echo "<tr><td></td><td></td><td></td><td>ราคารวม</td><td>$total_sale</td><td></td></tr>";
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