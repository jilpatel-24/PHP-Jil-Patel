<?php
// Add item to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $id    = $_POST['product_id'];
    $name  = $_POST['product_name'];
    $price = (float) $_POST['price'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$id] = [
            'name'     => $name,
            'price'    => $price,
            'quantity' => 1
        ];
    }

    header("Location: cart");
    exit();
}

// Decrease quantity
if (isset($_GET['decrease'])) {
    $id = $_GET['decrease'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] -= 1;
        if ($_SESSION['cart'][$id]['quantity'] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }
    header("Location: cart");
    exit();
}

// Increase quantity
if (isset($_GET['increase'])) {
    $id = $_GET['increase'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    }
    header("Location: cart");
    exit();
}

// Remove item completely
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
    header("Location: cart");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Cart - TeCo</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
      <a class="navbar-brand" href="product">TeCo</a>
      <ul class="navbar-nav ms-auto">
         <li class="nav-item">
            <a class="nav-link active" href="cart">
               Cart (<?= isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0 ?>)
            </a>
         </li>
      </ul>
   </div>
</nav>

<div class="container mt-5 mb-5">
   <h2 class="mb-4">Your Cart</h2>

   <?php if (!empty($_SESSION['cart'])): ?>
      <table class="table table-bordered">
         <thead class="table-dark">
            <tr>
               <th>Item</th>
               <th>Price</th>
               <th>Quantity</th>
               <th>Total</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php 
               $grand_total = 0;
               foreach ($_SESSION['cart'] as $id => $item):
                   $total = $item['price'] * $item['quantity'];
                   $grand_total += $total;
            ?>
            <tr>
               <td><?= htmlspecialchars($item['product_name']) ?></td> <!-- in this i change item_name to product_name -->
               <td>₹<?= number_format($item['price'], 2) ?></td>
               <td>
               <a href="cart?decrease=<?= urlencode($id) ?>" class="btn btn-sm btn-outline-secondary">−</a>
               <span class="mx-2"><?= $item['quantity'] ?></span>
               <a href="cart?increase=<?= urlencode($id) ?>" class="btn btn-sm btn-outline-secondary">+</a>
            </td>
            <td>
               <a href="cart?remove=<?= urlencode($id) ?>" class="btn btn-danger btn-sm">Remove</a>
            </td>

            </tr>
            <?php endforeach; ?>
            <tr>
               <td colspan="3" class="text-end"><strong>Grand Total</strong></td>
               <td colspan="2"><strong>₹<?= number_format($grand_total, 2) ?></strong></td>
            </tr>
         </tbody>
      </table>
      <div class="d-flex justify-content-between">
         <a href="product" class="btn btn-secondary">Continue Shopping</a>
         <a href="checkout" class="btn btn-success">Proceed to Checkout</a>
      </div>
   <?php else: ?>
      <p>Your cart is empty.</p>
      <a href="product" class="btn btn-primary">Start Shopping</a>
   <?php endif; ?>
</div>

<?php include_once('footer.php'); ?>
</body>
</html>
