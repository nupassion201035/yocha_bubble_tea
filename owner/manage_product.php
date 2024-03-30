<script>
    function confirmDelete() {
      return confirm("Are you sure you want to delete this?");
    }
  </script>
<?php 



include("navbar_owner.php");

include ("../connection.php");


$sql = "SELECT * FROM product";
$result = $conn->query($sql);
echo "<div class='container'>";
echo "<a href='add_product.php'><button type='button'  class='btn btn-primary btn-lg'>เพิ่มรายการเมนูสินค้า</button> </a>";
// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    
    echo "<br>";
    
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>เมนู</th><th>ประเภท</th><th>รูปภาพ</th><th></th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["type"]."</td><td><img src='../assets/img/product/".$row["image"]."'width='50' height='50' ></td> 
        <td>
        <a href='edit_product.php?id=".$row["pro_id"]."'><button type='button'  class='btn btn-success btn-lg'>แก้ไข</button></a>
        &nbsp;&nbsp;&nbsp; 
        <a onclick='return confirmDelete();' href='delete_product.php?id=".$row["pro_id"]."&product_name=".$row["image"]."'><button type='button' class='btn btn-danger btn-lg'>ลบ</button></a></td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
} else {
    echo "0 results";   
}
// Close connection

?>
