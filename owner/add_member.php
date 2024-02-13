<?php 



include("navbar_owner.php");
?>
<div class="container">
    <h1>Add Employee</h1>
    <form action="add_member_p.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label for="telephone" class="form-label">Telephone</label>
        <input type="number" class="form-control" id="telephone" name="telephone" required>
      </div>
      <div class="mb-3">
        <label for="line_id" class="form-label">Line ID</label>
        <input type="text" class="form-control" id="line_id" name="line_id">
      </div>
     
      
      <button type="submit" class="btn btn-primary">Add Member</button>
    </form>
  </div>