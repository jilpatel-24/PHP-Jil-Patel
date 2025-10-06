<?php
//session_start();

// Optional: Save order details in database here

// Clear the cart
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Thank You - TeCo</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

   <link rel="icon" href="images/fevicon.png" type="image/gif">
</head>
<body>

<!-- Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
      <a class="navbar-brand" href="index">TeCo - Thank You</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
         <span class="navbar-toggler-icon"></span>
      </button>
      
   </div>
</nav>

<div class="container text-center mt-5 mb-5">
   <h2 class="mb-4 text-success">Thank You for Your Order!</h2>
   <p>Your order has been placed successfully. We will contact you soon.</p>
   <a href="index" class="btn btn-primary mt-3">Back to Home</a>
</div>

<?php 
include('footer.php'); 
?>

<!-- Javascript files -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
