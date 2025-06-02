<html>
<head>
<title>Information</title>
</head>
<body>
</body>
</html>

<?php

$users = array(
  array("name" => "Jil", "email" => "jp@example.com", "phone" => "123456789"),
  array("name" => "Dhruvin", "email" => "dp@example.com", "phone" => "987654321"),
  array("name" => "Zainil", "email" => "zp@example.com", "phone" => "112345678")
);

echo "<table border='1' cellspacing='0' cellpadding='5'>";
echo "<tr><th>Name</th><th>Email</th><th>Phone</th></tr>";

foreach ($users as $user) {
  echo "<tr>";
  echo "<td>" . $user["name"] . "</td>";
  echo "<td>" . $user["email"] . "</td>";
  echo "<td>" . $user["phone"] . "</td>";
  echo "</tr>";
}

echo "</table>";
?>


