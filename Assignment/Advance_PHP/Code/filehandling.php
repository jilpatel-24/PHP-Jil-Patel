<html>
<head>
<title>Text File Viewer</title>
</head>
<body>

<h1>Text File Content</h1>

<?php
  $filename = "mytextfile.txt"; // Replace with your file's name
  if (file_exists($filename)) 
  {
    $file = fopen($filename, "r");
    if ($file) 
	{
      while (($line = fgets($file)) !== false) 
	  {
        echo "<p>" . htmlspecialchars($line) . "</p>";
      }
      fclose($file);
    } 
	else 
	{
      echo "<p>Error opening the file.</p>";
    }
  } 
  else 
  {
    echo "<p>File not found.</p>";
  }
?>

</body>
</html>
