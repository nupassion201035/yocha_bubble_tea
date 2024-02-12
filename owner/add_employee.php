<?php 



include("navbar_owner.php");
?>
<div class="container">
    <h1>Add Employee</h1>
    <form action="add_employee_p.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
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
      <div class="mb-3">
        <label for="code_employee" class="form-label">Employee Code</label>
        <input type="text" class="form-control" id="code_employee" name="code_employee" required>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
          <option value="employee">employee</option>
          <option value="owner">owner</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>
  </div>