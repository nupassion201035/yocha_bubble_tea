<script>
    function confirmDelete() {
      return confirm("Are you sure you want to delete this?");
    }
  </script>
<?php 



include("navbar_owner.php");

include ("../connection.php");


$sql = "SELECT * FROM member";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<div class='container'>";
    echo "<br>";
    echo "<a href='add_member.php'><button type='button'  class='btn btn-primary btn-lg'>เพิ่มสมาชิก</button> </a>";
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>ชื่อ</th><th>แต้มสะสม</th><th>เบอร์โทรศัพท์</th><th>ตำแหน่ง</th><th></th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["point"]."</td><td>".$row["telephone"]."</td><td>".$row["status"]."</td> 
        <td>
        <a href='edit_member.php?id=".$row["member_id"]."'><button type='button'  class='btn btn-success btn-lg'>แก้ไข</button></a>
        &nbsp;&nbsp;&nbsp; 
        </td></tr>";
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
