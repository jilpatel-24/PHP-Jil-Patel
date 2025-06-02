<html>
<head>
	<title>Form with POST Method </title>
</head>
<form method="post">
  Name: <input type="text" name="name"><br><br>
  Email: <input type="text" name="email"><br><br>
  <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
  $name = $_POST['name'];
  $email = $_POST['email'];

  echo "Name: " . ($name) . "<br>";
  echo "Email: " . ($email) . "<br>";
}
?>
