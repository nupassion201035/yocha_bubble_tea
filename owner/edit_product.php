
<?php 



include("navbar_owner.php");
include ("../connection.php");
$id = $_GET['id'];
$sql = "SELECT * FROM product WHERE pro_id = $id"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc()
?>
<div class="container">
    <h1>Edit Employee</h1>
    <form action="edit_product_p.php"  method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <input type="hidden" name="old_img" value="<?php echo $row["image"] ?>" />
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"] ?>">
      </div>
      
      <div class="mb-3">
        <label for="type" class="form-label">type</label>
        <select class="form-select" id="type" name="type" required>
          <option value="drink" <?php echo ($row['type'] == 'drink') ? 'selected' : ''; ?> >Drink</option>
          <option value="topping" <?php echo ($row['type'] == 'topping') ? 'selected' : ''; ?>>Topping</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <img id="imagePreview" src="../assets/img/product/<?php echo $row["image"] ?>" alt="Image Preview" style="max-width: 200px;"><br><br>
      </div>
      
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>
  </div>
  <script>
    // JavaScript to display image preview
    document.getElementById("fileToUpload").addEventListener("change", function() {
      var input = this;
      var img = document.getElementById("imagePreview");
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          img.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
      } else {
        img.src = "";
      }
    });
  </script>