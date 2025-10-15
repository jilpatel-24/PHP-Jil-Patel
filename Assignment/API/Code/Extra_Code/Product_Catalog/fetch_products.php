<?php
include('db.php');

$search = $_POST['search'] ?? '';
$category = $_POST['category'] ?? '';
$price = $_POST['price'] ?? '';

$sql = "SELECT * FROM products WHERE 1";

if ($search !== '') {
  $sql .= " AND name LIKE '%" . $conn->real_escape_string($search) . "%'";
}

if ($category !== '') {
  $sql .= " AND category = '" . $conn->real_escape_string($category) . "'";
}

if ($price !== '') {
  list($min, $max) = explode('-', $price);
  $sql .= " AND price BETWEEN $min AND $max";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) 
  {
    echo "
      <div class='product'>
       <img src='uploads/{$row['image']}' alt='{$row['name']}'>
        <h3>{$row['name']}</h3>
        <p>Category: {$row['category']}</p>
        <p>Price: ₹{$row['price']}</p>
        <p>{$row['description']}</p>
      </div>
    ";
  }
} 
else 
{
  echo "<p>No products found.</p>";
}
?>
