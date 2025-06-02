<html>
<head>
<title> $_FILE</title>
</head>
<body>

<form method="post" enctype="multipart/form-data">     
	<p>Name: <input type="text" name="username"/></p>
	<p>File: <input type="file" name="file1"/></p>

	<p><input type="submit" name="submit" value="Click"/></p>
</form>
</body>
</html>
<?php

if(isset($_POST['submit']))
{
	echo $username=$_POST['username']."<br>";
	
	echo $img=$_FILES['file1']['name']; // image upload	
}

?>


