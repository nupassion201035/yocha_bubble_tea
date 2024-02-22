<script>
    function confirmDelete() {
      return confirm("Are you sure you want to delete this?");
    }
  </script>
<?php 



include("navbar_em.php");

include ("../connection.php");


$sql = "SELECT * FROM member";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<div class='container'>";
    echo "<br>";
    echo "<a href='add_member.php'><button type='button'  class='btn btn-primary btn-lg'>Add</button> </a>";
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>Name</th><th>Point</th><th>Telephone</th><th>Status</th><th>Action</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["point"]."</td><td>".$row["telephone"]."</td><td>".$row["status"]."</td> 
        <td>
        <a href='edit_member.php?id=".$row["member_id"]."'><button type='button'  class='btn btn-success btn-lg'>Edit</button></a>
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
