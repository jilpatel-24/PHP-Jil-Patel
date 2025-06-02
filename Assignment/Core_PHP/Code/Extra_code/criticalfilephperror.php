<?php

// Set a flag to indicate if the file was included successfully
$fileIncluded = false;

// Use require_once to include the file.  This will prevent it from being included again if it's already been included.
require_once 'criticalfile.php';

// If the code reaches here, it means the file was included successfully.
$fileIncluded = true;

// Check if the file was included.  If not, display a custom error message.
if (!$fileIncluded) 
{
  echo "<p style='color: red;'>Error: The critical file 'critical_file.php' could not be found. Please check the file path and ensure the file exists.</p>";
  
  error_log("Critical file missing: critical_file.php");
  die();
}


if ($fileIncluded) {
  my_critical_function();
 }

?>
