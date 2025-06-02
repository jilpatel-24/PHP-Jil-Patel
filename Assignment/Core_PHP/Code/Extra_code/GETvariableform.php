<html>
<head>
<title>GET Form</title>
</head>
<body>

<h2>GET Form</h2>
<form  method="GET">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>

<?php
if ($_GET) 
{
    echo "<p>Name: " . ($_GET["name"]) . "</p>";
    echo "<p>Email: " . ($_GET["email"]) . "</p>";
} 
else 
{
    echo "<p>No data received.</p>";
}
?>