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
        <div class="row">
        <h1>คิว</h1>
            
<?php
$sql = "SELECT o.order_id, o.datetime, em.name as em_name
FROM `order` o
INNER JOIN `employees` em ON o.employee_id = em.employee_id 
WHERE o.status = 'incomplete'
ORDER BY o.datetime desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    
    echo "<br>";
    
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>Date Time</th><th>Employee Name</th><th>Detail</th><th>Action</th></tr></thead>";
echo "<tbody>";
while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["datetime"]."</td><td>".$row["em_name"]."</td><td>";
    echo "<a href='detail_order.php?order_id=".$row["order_id"]."' > <button class='btn btn-primary btn-lg'>Detail</button></a>";
    echo "</td><td>";
    echo "<a onclick='return confirmAction();' href='calculate.php?id=".$row["order_id"]."' class='btn btn-warning btn-lg'>Calculate</a>";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "<a onclick='return confirmAction();' href='confirm_queue.php?id=".$row["order_id"]."' class='btn btn-success btn-lg'>Complete</a>";
    echo "&nbsp;&nbsp;&nbsp;";
    echo "<a onclick='return confirmDelete();' href='delete_queue.php?id=".$row["order_id"]."' class='btn btn-danger btn-lg'>Cancel</a>";
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
      return confirm("Are you sure you want to delete this?");
    }
  </script>
  <script>
    function confirmAction() {
      return confirm("Are you sure you want to complete this?");
    }
  </script>