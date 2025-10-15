<?php
session_start();
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) 
{
    echo "<h2>Your cart is empty 🛒</h2>";
    echo "<a href='index.php'>Go back to shopping</a>";
    exit();
}

if (isset($_POST['update'])) 
{
    foreach ($_POST['qty'] as $id => $quantity) 
	{
        $_SESSION['cart'][$id]['quantity'] = max(1, intval($quantity)); // avoid 0
    }
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <style>
    body { font-family: Arial; background: #f8f8f8; padding: 20px; }
    table { width: 100%; border-collapse: collapse; background: #fff; }
    th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: center; }
    th { background: #f4f4f4; }
    .btn { padding: 8px 15px; border: none; cursor: pointer; border-radius: 5px; }
    .btn-update { background: #007bff; color: #fff; }
    .btn-remove { background: #dc3545; color: #fff; }
  </style>
</head>
<body>

<h1>Your Shopping Cart</h1>
<a href="index.php">🛍️ Continue Shopping</a>
<hr>

<form method="post">
<table>
<tr>
  <th>Product</th>
  <th>Price</th>
  <th>Quantity</th>
  <th>Subtotal</th>
  <th>Action</th>
</tr>

<?php foreach ($_SESSION['cart'] as $id => $item): 
  $subtotal = $item['price'] * $item['quantity'];
  $total += $subtotal;
?>
<tr>
  <td><?php echo $item['name']; ?></td>
  <td>₹ <?php echo number_format($item['price'], 2); ?></td>
  <td><input type="number" name="qty[<?php echo $id; ?>]" value="<?php echo $item['quantity']; ?>" min="1"></td>
  <td>₹ <?php echo number_format($subtotal, 2); ?></td>
  <td><a href="remove.php?id=<?php echo $id; ?>" class="btn btn-remove">Remove</a></td>
</tr>
<?php endforeach; ?>

<tr>
  <th colspan="3">Total</th>
  <th colspan="2">₹ <?php echo number_format($total, 2); ?></th>
</tr>
</table>

<br>
<button type="submit" name="update" class="btn btn-update">Update Cart</button>
</form>

</body>
</html>
