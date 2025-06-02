<html>
<head>
<title>POST Form </title>
</head>
<body>

<h2>POST Form</h2>
<form  method="POST">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>

<?php
if ($_POST) {
    echo "<p>Name: " . ($_POST["name"]) . "</p>";
    echo "<p>Email: " . ($_POST["email"]) . "</p>";
} else {
    echo "<p>No data received via POST.</p>";
}
?>