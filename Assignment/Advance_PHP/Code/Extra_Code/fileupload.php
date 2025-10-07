<?php
// Configuration
$target_dir = "uploads/"; // Directory where images will be stored
$allowed_types = ["jpg", "jpeg", "png", "gif"]; // Allowed file extensions (lowercase)
$max_file_size = 5 * 1024 * 1024; // Maximum file size in bytes (5MB)

// Check if the upload button was clicked
if (isset($_POST["submit"])) {
    $file_name = $_FILES["image"]["name"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $file_size = $_FILES["image"]["size"];
    $file_error = $_FILES["image"]["error"];

    // Get the file extension
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // 1. File Type Validation
    if (!in_array($file_ext, $allowed_types)) {
        echo "Error: Invalid file type. Allowed types are: " . implode(", ", $allowed_types);
        exit; // Stop further processing
    }

    // 2. File Size Validation
    if ($file_size > $max_file_size) {
        echo "Error: File size exceeds the limit of " . ($max_file_size / 1024 / 1024) . "MB.";
        exit; // Stop further processing
    }

    // 3. Error Handling (Check for upload errors)
    if ($file_error !== UPLOAD_ERR_OK) {
        echo "Error: File upload failed with error code: " . $file_error;
        exit;
    }

    // Generate a unique filename to prevent overwriting
    $new_file_name = uniqid("", true) . "." . $file_ext;
    $target_file = $target_dir . $new_file_name;

    // 4. Move the uploaded file
    if (move_uploaded_file($file_tmp, $target_file)) {
        echo "The file " .($file_name) . " has been uploaded successfully.";
        // You can now save the file path ($target_file) to your database, etc.
    } else {
        echo "Error: There was an error uploading your file.";
    }
}
?>


<html>
<head>
    <title>Image Upload</title>
</head>
<body>

    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload Image" name="submit">
    </form>

</body>
</html>
