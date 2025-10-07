<?php
// Configuration
$uploadDirectory = 'uploads/'; // Directory where files will be stored
$allowedFileTypes = ['txt', 'pdf', 'doc', 'docx']; // Allowed file extensions
$maxFileSize = 2 * 1024 * 1024; // Maximum file size in bytes (2MB)

// Helper function to sanitize filenames
function sanitizeFilename($filename) {
    $filename = preg_replace("/[^a-zA-Z0-9._-]+/", "_", $filename); // Replace invalid characters
    return $filename;
}

// Check if the upload directory exists, create it if it doesn't
if (!is_dir($uploadDirectory)) {
    if (!mkdir($uploadDirectory, 0777, true)) {
        die("Error: Could not create upload directory.");
    }
}

// Check if a file was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["uploadedFile"]) && $_FILES["uploadedFile"]["error"] == UPLOAD_ERR_OK) {
        $fileName = $_FILES["uploadedFile"]["name"];
        $fileTmpName = $_FILES["uploadedFile"]["tmp_name"];
        $fileSize = $_FILES["uploadedFile"]["size"];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Sanitize the filename
        $safeFileName = sanitizeFilename($fileName);

        // Validate file type
        if (!in_array($fileType, $allowedFileTypes)) {
            echo "Error: Invalid file type. Allowed types are: " . implode(", ", $allowedFileTypes) . ".";
            exit;
        }

        // Validate file size
        if ($fileSize > $maxFileSize) {
            echo "Error: File size exceeds the limit of " . ($maxFileSize / 1024 / 1024) . "MB.";
            exit;
        }

        // Create the destination path
        $destinationPath = $uploadDirectory . $safeFileName;

        // Move the uploaded file
        if (move_uploaded_file($fileTmpName, $destinationPath)) {
            echo "File uploaded successfully as: " . $safeFileName . "<br>";

            // Read the file content
            if ($fileType == 'txt') { // Only read text files
                $fileContent = file_get_contents($destinationPath);
                if ($fileContent !== false) {
                    echo "File Content:<br><pre>" . ($fileContent) . "</pre>";
                } else {
                    echo "Error: Could not read the file content.";
                }
            } else {
                echo "File content reading is only supported for .txt files.";
            }

        } else {
            echo "Error: File upload failed.";
        }
    } else {
        // Handle upload errors
        switch ($_FILES["uploadedFile"]["error"]) 
		{
            case UPLOAD_ERR_INI_SIZE:
                $errorMessage = "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $errorMessage = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
                break;
            case UPLOAD_ERR_PARTIAL:
                $errorMessage = "The uploaded file was only partially uploaded.";
                break;
            case UPLOAD_ERR_NO_FILE:
                $errorMessage = "No file was uploaded.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $errorMessage = "Missing a temporary folder.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $errorMessage = "Failed to write file to disk.";
                break;
            case UPLOAD_ERR_EXTENSION:
                $errorMessage = "File upload stopped by extension.";
                break;
            default:
                $errorMessage = "An unknown error occurred.";
                break;
        }
        echo "Error: " . $errorMessage;
    }
}
?>


<html>
<head>
    <title>File Upload and Reader</title>
</head>
<body>

    <h2>File Upload</h2>

    <form method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Select a file to upload:</label>
        <input type="file" name="uploadedFile" id="fileToUpload">
        <br><br>
        <input type="submit" value="Upload File" name="submit">
    </form>

</body>
</html>
