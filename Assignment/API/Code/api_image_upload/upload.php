<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


if (!isset($_FILES['image']))  // check if file was uploaded
{
    echo json_encode(["error" => "No file uploaded"]);
    exit;
}

$file = $_FILES['image'];

$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];  // basic validation
$max_size = 2 * 1024 * 1024; // 2 MB

if (!in_array($file['type'], $allowed_types)) 
{
    echo json_encode(["error" => "Only JPG, PNG, and GIF images are allowed"]);
    exit;
}

if ($file['size'] > $max_size) 
{
    echo json_encode(["error" => "File size must be less than 2MB"]);
    exit;
}

$filename = uniqid() . "_" . basename($file['name']);  // generate unique filename
$target_path = __DIR__ . "/uploads/" . $filename;

if (move_uploaded_file($file['tmp_name'], $target_path))   // move file to uploads directory
{
    echo json_encode
	([
        "message" => "Image uploaded successfully",
        "file_name" => $filename,
        "file_path" => "uploads/" . $filename
    ]);
} 
else 
{
    echo json_encode(["error" => "Failed to upload image"]);
}
?>
<!--
Add in postman POST http://localhost/php/API_Assignment/api_image_upload/upload.php

Make Upload Folder

Body → form-data
 Key	         Value	         Type
image	(Select an image file)	 File

-->