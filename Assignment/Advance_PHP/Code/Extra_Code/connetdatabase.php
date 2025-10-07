<?php
// Include the Database class
require_once 'connectmysql.php';

$db = new Database("localhost", "root", "", "testdb"); // Create a Database object

$users = $db->fetchAll("SELECT id, name, email FROM users");  // Fetch user data from 'users' table

// Display users
echo "<h2>Users List</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

foreach ($users as $user) 
{
    echo "<tr>";
    echo "<td>" . $user['id'] . "</td>";
    echo "<td>" . $user['name'] . "</td>";
    echo "<td>" . $user['email'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
