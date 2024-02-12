<script>
    function confirmDelete() {
      return confirm("Are you sure you want to delete this employee?");
    }
  </script>
<?php 



include("navbar_owner.php");

include ("../connection.php");


$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<div class='container'>";
    echo "<br>";
    echo "<a href='add_employee.php'><button type='button'  class='btn btn-primary btn-lg'>Add</button> </a>";
    echo "<div class='table-responsive'>";
    echo "<table class='table '>";
    echo "<thead><tr><th>Username</th><th>Name</th><th>Telephone</th><th>Role</th><th>Action</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["username"]."</td><td>".$row["name"]."</td><td>".$row["telephone"]."</td><td>".$row["status"]."</td> 
        <td>
        <a href='edit_employee.php?id=".$row["employee_id"]."'><button type='button'  class='btn btn-success btn-lg'>Edit</button></a>
        &nbsp;&nbsp;&nbsp; 
        <a onclick='return confirmDelete();' href='delete_employee.php?id=".$row["employee_id"]."'><button type='button' class='btn btn-danger btn-lg'>DELETE</button></a></td></tr>";
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
