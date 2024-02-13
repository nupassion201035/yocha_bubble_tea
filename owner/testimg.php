<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Show Image in Form</title>
</head>
<body>
  <h1>Image Preview</h1>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">Select image to upload:</label><br>
    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
    <img id="imagePreview" src="" alt="Image Preview" style="max-width: 200px;"><br><br>
    <input type="submit" value="Upload Image" name="submit">
  </form>

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
</body>
</html>