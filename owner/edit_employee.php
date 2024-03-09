<?php 



include("navbar_owner.php");
include ("../connection.php");
$id = $_GET['id'];
$sql = "SELECT * FROM employees WHERE employee_id = $id"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc()
?>
<div class="container">
    <h1>Edit Employee</h1>
    <form action="edit_employee_p.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>" />
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $row["username"] ?>">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $row["password"] ?>">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"] ?>">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3" ><?php echo $row["address"] ?></textarea>
      </div>
      <div class="mb-3">
        <label for="telephone" class="form-label">Telephone</label>
        <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $row["telephone"] ?>" pattern="\d{10}" >
      </div>
      <div class="mb-3">
        <label for="line_id" class="form-label">Line ID</label>
        <input type="text" class="form-control" id="line_id" name="line_id" value="<?php echo $row["line_id"] ?>">
      </div>
      <div class="mb-3">
        <label for="code_employee" class="form-label">Employee Code</label>
        <input type="text" class="form-control" id="code_employee" name="code_employee" value="<?php echo $row["code_employee"] ?>">
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" >
        <option value="employee" <?php echo ($row['status'] == 'employee') ? 'selected' : ''; ?>>Employee</option>
    <option value="owner" <?php echo ($row['status'] == 'owner') ? 'selected' : ''; ?>>Owner</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>
  </div>