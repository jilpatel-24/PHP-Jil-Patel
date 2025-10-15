<?php
if (isset($_POST['upload'])) 
{
    $targetDir = "uploads/";

    
    if (!is_dir($targetDir))  // create folder if it doesn't exist
	{
        mkdir($targetDir, 0755, true);
    }

    $fileName = basename($_FILES["document"]["name"]);
    $targetFile = $targetDir . uniqid() . "_" . $fileName; // Prevent duplicate names

    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $fileSize = $_FILES["document"]["size"];

    
    $allowedTypes = ["pdf", "doc", "docx", "jpg", "jpeg", "png"];  // allowed file types

   
    if (!in_array($fileType, $allowedTypes))   // validate file type
	{
        die("Invalid file type. Allowed: PDF, DOC, DOCX, JPG, PNG.");
    }

   
    if ($fileSize > 5 * 1024 * 1024)   // validate file size (Max: 5MB)
	{
        die(" File too large. Maximum size is 5MB.");
    }

    
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFile))  // move file securely
	{
        echo "File uploaded successfully! <br>";
        echo "Stored as: <strong>" . htmlspecialchars(basename($targetFile)) . "</strong>";
    } 
	else 
	{
        echo " Error uploading file.";
    }
}
?>
