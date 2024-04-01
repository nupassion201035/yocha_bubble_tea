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
        <h1>คิว</h1>
            
<?php
$sql = "SELECT o.order_id, o.datetime, em.name as em_name
FROM `order` o
INNER JOIN `employees` em ON o.employee_id = em.employee_id 
WHERE o.status = 'incomplete'
ORDER BY o.datetime desc";

$sql2 = "SELECT o.promotion_id, o.mem_id, o.pro_id, o.datetime, o.status, em.name AS em_name
        FROM `promotion` o
        INNER JOIN `employees` em ON o.employee_id = em.employee_id 
        WHERE o.status = 'incomplete'
        ORDER BY o.datetime DESC";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
if ($result->num_rows > 0) {
    // Output data of each row
    
    echo "<br>";
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>คิว</th><th>ชื่อพนักงาน</th><th>รายละเอียด</th><th>ประเภท</th><th>  </th></tr></thead>";
echo "<tbody>";
while($row2 = $result2->fetch_assoc()) {
  echo "<tr><td>P0".$row2["promotion_id"]."</td><td>".$row2["em_name"]."</td><td>";
  echo "<a href='detail_promotion.php?promotion_id=".$row2["promotion_id"]."' > <button class='btn btn-primary btn-lg'>รายละเอียด</button></a>";
  echo "</td><td>Promotion";
  
  echo "</td><td>";
  echo "<a onclick='return confirmAction();' href='promotion_cf.php?id=".$row2["promotion_id"]."' class='btn btn-success btn-lg'>สำเร็จรายการ</a>";
  
  echo "</td></tr>";
}
while($row = $result->fetch_assoc()) {
    echo "<tr><td>A0".$row["order_id"]."</td><td>".$row["em_name"]."</td><td>";
    echo "<a href='detail_order.php?order_id=".$row["order_id"]."' > <button class='btn btn-primary btn-lg'>รายละเอียด</button></a>";
    echo "</td><td>Normal";
    echo "</td><td>";
   
    
    echo "<a onclick='return confirmAction();' href='confirm_queue.php?id=".$row["order_id"]."' class='btn btn-success btn-lg'>สำเร็จรายการ</a>";
 
    echo "</td></tr>";
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
      return confirm("ยืนยันการยกเลิกรายการ?");
    }
  </script>
  <script>
    function confirmAction() {
      return confirm("ยืนยันการสำเร็จรายการ?");
    }
  </script>