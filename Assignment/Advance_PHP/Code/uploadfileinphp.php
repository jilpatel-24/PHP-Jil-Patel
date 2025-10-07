<?php
$target_dir = "uploads/"; // Directory where uploaded files will be stored
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"]))  // check if image file is a actual image or fake image
{
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) 
  {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } 
  else 
  {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if (file_exists($target_file))  // Check if file already exists
{
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000)  // check file size 500 KB (0.5 MB)
{
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )  // Allow certain file formats
{
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0)  // check if $uploadOk is set to 0 by an error
{
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else 
{
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
  {
    echo "The file ".( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } 
  else 
  {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
