<?php 
include 'db.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Catalog</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .catalog {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .product {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 15px;
            text-align: center;
        }
        .product img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }
        .product h3 {
            margin: 10px 0 5px;
            font-size: 18px;
        }
        .price {
            color: #009688;
            font-weight: bold;
        }
        .desc {
            font-size: 14px;
            color: #555;
        }
        .category {
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>

<h1>🛍️ Product Catalog</h1>

<div class="catalog">
<?php
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) 
	{
        echo "
        <div class='product'>
            <img src='images/{$row['image']}' alt='{$row['name']}'>
            <h3>{$row['name']}</h3>
            <p class='category'>{$row['category']}</p>
            <p class='price'>₹ {$row['price']}</p>
            <p class='desc'>{$row['description']}</p>
        </div>
        ";
    }
} 
else 
{
    echo "<p>No products found.</p>";
}
$conn->close();
?>
</div>

</body>
</html>
