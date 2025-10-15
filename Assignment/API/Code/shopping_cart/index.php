<?php
session_start();
include 'db.php';

// Handle Add to Cart
if (isset($_POST['add_to_cart'])) 
{
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];

    if (!isset($_SESSION['cart'])) 
	{
        $_SESSION['cart'] = [];
    }

    // If product already exists in cart, increase quantity
    if (isset($_SESSION['cart'][$id])) 
	{
        $_SESSION['cart'][$id]['quantity'] += 1;
    }
	else 
	{
        $_SESSION['cart'][$id] = 
		[
            'name' => $name,
            'price' => $price,
            'quantity' => 1
        ];
    }

    echo "<script>alert('Product added to cart!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shopping Cart</title>
  <style>
    body { font-family: Arial; background: #f5f5f5; padding: 20px; }
    .product { border: 1px solid #ccc; border-radius: 8px; padding: 10px; background: #fff; text-align: center; }
    .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
    .btn { background: #28a745; color: white; border: none; padding: 10px; cursor: pointer; border-radius: 5px; }
    .btn:hover { background: #218838; }
  </style>
</head>
<body>

<h1>🛍️ Product Catalog</h1>
<a href="cart.php">🛒 View Cart</a>
<hr>

<div class="grid">
<?php
$result = $conn->query("SELECT * FROM products");  //query run
while ($row = $result->fetch_assoc()) 
{
?>
  <div class="product">
    <img src="images/<?php echo $row['image']; ?>" width="100%" height="200"><br>
    <h3><?php echo $row['name']; ?></h3>
    <p>₹ <?php echo $row['price']; ?></p>
    <form method="post">
      <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
      <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
    </form>
  </div>
<?php 
} 
?>
</div>

</body>
</html>
