<?php
// Get category name if cat_id is passed
$category_name = "Our Products";

if (isset($_REQUEST['cat_id'])) {
    $cat_id = $_REQUEST['cat_id'];

    // Fetch category name (assuming $this is available or replace with DB call)
    $category_data = $this->select_where('category', ['id' => $cat_id]);

    if (!empty($category_data)) {
        $category_name = "Our " . htmlspecialchars($category_data[0]->name) . " Products";
    }
}
?>

<!DOCTYPE html>
<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Products</title>
      <link rel="shortcut icon" type="image/png" href="images/tlogo.png" />
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>
   <body>
      <?php
		include_once('webheader.php');
	  ?>
      <!-- header section end -->
	  
      
      


<!-- Product Section Start -->
<div class="about_section layout_padding">
   <div class="container">
      <div class="about_section_2">
         <h2 class="mb-4"><?php echo ($category_name); ?></h2>
        
         <div class="row">
            <?php 
            if (!empty($products_arr)) 
               {
               foreach ($products_arr as $product) 
               { 
               ?>
                  <div class="col-md-4 mb-4">
                     <div class="card">
                        <img src="../admin/assets/images/product/<?php echo ($product->product_image); ?>" 
                             class="card-img-top" alt="<?php echo ($product->product_name); ?>" 
                             style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center">
                           <h5 class="card-title"><?php echo ($product->product_name); ?></h5>
                           <p class="card-text">Description: <?php echo  ($product->description ?? ''); ?></p>
                           <p class="card-text"><strong>Price: ₹<?php echo number_format($product->product_price, 2); ?></strong></p>


                           <form method="post" action="cart">
                              <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                              <input type="hidden" name="item_name" value="<?php echo $product->product_name; ?>">
                              <input type="hidden" name="price" value="<?php echo $product->product_price; ?>">
                              <button type="submit" class="btn btn-primary">Add to Cart</button>
                           </form>

                           <!-- View More button -->
                           <a href="product_detail?id=<?php echo $product->id; ?>" 
                              class="btn btn-outline-secondary mt-2">View More</a>


                           

                           
                        </div>
                     </div>
                  </div>
            <?php 
               } 
               } 
            else 
            {
               echo "<p>No products available in this category.</p>";
            } ?>
         </div>
      </div>
   </div>
</div>
<!-- Product Section End -->

<?php include_once('footer.php'); ?>

	  
      
	  
      <!-- Javascript files-->
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