<?php 
include("navbar_owner.php");
?>
<div class="container">
    <h1>Add Product</h1>
    <form action="add_product_p.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" required>
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" id="type" name="type" required>
          <option value="drink">Drink</option>
          <option value="topping">Topping</option>
        </select>
      </div>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <input type="submit" class="btn btn-primary" value="submit" name="submit">
</form>
  </div>