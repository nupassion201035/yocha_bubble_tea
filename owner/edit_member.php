<?php 



include("navbar_owner.php");
include ("../connection.php");
$id = $_GET['id'];
$sql = "SELECT * FROM member WHERE member_id = $id"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc()
?>
<div class="container">
    <h1>Edit Employee</h1>
    <form action="edit_member_p.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>" />
     
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
        <input type="number" class="form-control" id="telephone" name="telephone" value="<?php echo $row["telephone"] ?>">
      </div>
      <div class="mb-3">
        <label for="line_id" class="form-label">Line ID</label>
        <input type="text" class="form-control" id="line_id" name="line_id" value="<?php echo $row["line"] ?>">
      </div>
      <div class="mb-3">
        <label for="line_id" class="form-label">Point</label>
        <input type="text" class="form-control" id="line_id" name="line_id" value="<?php echo $row["point"] ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" >
        <option value="employee" <?php echo ($row['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
    <option value="owner" <?php echo ($row['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>
  </div>