<html>
<head>
<title>Price Calculator</title>

</head>
<body>

<h1>Price Calculator</h1>

<p><strong>Original Price:</strong> <span id="originalPrice"></span></p>
<p><strong>Discount:</strong> <span id="discount"></span></p>
<p><strong>Discounted Price:</strong> <span id="discountedPrice"></span></p>

<script>
  // Sample data (replace with your actual price retrieval method)
  const originalPrice = 600;
  let discount = 0;

  if (originalPrice > 500) {
    discount = originalPrice * 0.10;
  }

  const discountedPrice = originalPrice - discount;

  document.getElementById("originalPrice").textContent = originalPrice.toFixed(2);
  document.getElementById("discount").textContent = discount.toFixed(2);
  document.getElementById("discountedPrice").textContent = discountedPrice.toFixed(2);
</script>

</body>
</html>

<?php

  // Get the product price from the URL (e.g., ?price=600)
  $price = isset($_GET["?price=600"]) ? floatval($_GET["?price=500"]) : 0; // Default to 0 if not provided

  $discount = ($price > 500) ? ($price * 0.10) : 0;

  // Calculate the discounted price
  $discountedPrice = $price - $discount;

  echo "Original Price: " . number_format($price, 2) . "<br>";
  echo "Discount: " . number_format($discount, 2) . "<br>";
  echo "Discounted Price: " . number_format($discountedPrice, 2);

?>
