<?php

// Multi-dimensional array to store product information
$products = array
(
    array("name" => "Laptop", "price" => 1200, "stock" => 100),
    array("name" => "Mouse", "price" => 250, "stock" => 500),
    array("name" => "Keyboard", "price" => 750, "stock" => 300),
    array("name" => "Monitor", "price" => 5000, "stock" => 100)
);


echo "<table border='1' cellpadding='3px' cellspacing='0px'>"; //Display in Table
echo "<thead>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Price</th>";
echo "<th>Stock</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($products as $product) 
{
    echo "<tr>";
    echo "<td>" . $product["name"] . "</td>";
    echo "<td>" . $product["price"] . "</td>";
    echo "<td>" . $product["stock"] . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

?>
