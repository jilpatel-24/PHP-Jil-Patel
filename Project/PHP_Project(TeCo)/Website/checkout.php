<?php
//session_start();

// Redirect if cart is empty
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) 
{
    header("Location: cart");
    exit();
}

// Redirect if user not logged in
if (!isset($_SESSION['u_id'])) 
{
    echo 
    "<script> 
      window.location='login'; 
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Check Out - TeCo</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5 mb-5">
   <h2 class="mb-4">Checkout</h2>
   <form action="" method="post" class="border p-4 rounded bg-light">
      <div class="row mb-3">
         <div class="col-md-6">
            <label for="name" class="form-label">Full Name</label>
            <input type="text"  value="<?php echo $fetch->name ?>" class="form-control"  name="name" required>
         </div>
         <div class="col-md-6">
            <label for="email" class="form-label">Email Address</label>
            <input type="email"  value="<?php echo $fetch->email ?>" class="form-control"  name="email" required>
         </div>
      </div>
      <div class="row mb-3">
         <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" value="<?php echo $fetch->mobile_no ?>" class="form-control"  name="phone" required>
         </div>
         <div class="col-md-6">
            <label for="payment" class="form-label">Payment Method</label>
            <select class="form-select" id="payment" name="payment" required>
               <option value="cod">Cash on Delivery</option>
               <option value="card">Credit/Debit Card</option>
               <option value="upi">UPI</option>
            </select>
         </div>
      </div>
      <div class="mb-3">
         <label for="address" class="form-label">Full Address</label>
         <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
      </div>
      <div class="row mb-3">
         <div class="col-md-4">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" id="state" name="state" required>
         </div>
         <div class="col-md-4">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" required>
         </div>
         <div class="col-md-4">
            <label for="pincode" class="form-label">Pincode</label>
            <input type="number" class="form-control" id="pincode" name="pincode" required>
         </div>

    
      </div>
      <button type="submit" class="btn btn-success">Place Order</button>
      <a href="cart" class="btn btn-secondary ms-2">Back to Cart</a>
   </form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
