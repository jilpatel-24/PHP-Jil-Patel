<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Secure File Upload</title>
  <style>
    body { font-family: Arial; margin: 50px; text-align: center; }
    form { display: inline-block; padding: 20px; border: 1px solid #ddd; border-radius: 10px; }
    input[type="file"] { margin: 10px 0; }
    button { padding: 8px 16px; background: #007bff; color: white; border: none; border-radius: 5px; }
  </style>
</head>
<body>

  <h2>📤 Upload Your Document</h2>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="document" required><br>
    <button type="submit" name="upload">Upload File</button>
  </form>

</body>
</html>
