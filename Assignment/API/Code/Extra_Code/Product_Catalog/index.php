<?php 
	include('db.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dynamic Product Catalog</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h1>🛍️ Product Catalog</h1>

  <div class="filters">
    <input type="text" id="search" placeholder="Search products...">
    
    <select id="category">
      <option value="">All Categories</option>
      <option value="Electronics">Electronics</option>
      <option value="Footwear">Footwear</option>
      <option value="Clothing">Clothing</option>
    </select>

    <select id="price">
      <option value="">All Prices</option>
      <option value="0-1000">Below ₹1,000</option>
      <option value="1000-5000">₹1,000 - ₹5,000</option>
      <option value="5000-10000">₹5,000 - ₹10,000</option>
      <option value="10000-99999">Above ₹10,000</option>
    </select>
  </div>

  <div id="product-list"></div>

  <script>
    $(document).ready(function() {
      function loadProducts() {
        var search = $('#search').val();
        var category = $('#category').val();
        var price = $('#price').val();

        $.ajax({
          url: 'fetch_products.php',
          type: 'POST',
          data: { search: search, category: category, price: price },
          success: function(response) {
            $('#product-list').html(response);
          }
        });
      }

      // Initial load
      loadProducts();

      // Live search and filter
      $('#search, #category, #price').on('input change', function() 
	  {
        loadProducts();
      });
    });
  </script>
</body>
</html>
