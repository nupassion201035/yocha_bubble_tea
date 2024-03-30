<?php 



include("navbar_em.php");
?>
<div class="container">
    <h1>เพิ่มสมาชิก</h1>
    <form action="add_member_p.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">ชื่อ</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">ที่อยู่</label>
        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label for="telephone" class="form-label">เบอร์โทรศัพท์</label>
        <input type="number" class="form-control" id="telephone" name="telephone" required>
      </div>
      <div class="mb-3">
        <label for="line_id" class="form-label">Line ID</label>
        <input type="text" class="form-control" id="line_id" name="line_id">
      </div>
     
      
      <button type="submit" class="btn btn-primary">เพิ่มสมาชิก</button>
    </form>
  </div>