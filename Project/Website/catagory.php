<!DOCTYPE html>
<html lang="en">
<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>TeCo - Category</title>
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

<!-- category section start -->
<div class="about_section layout_padding">
   <div class="container">
      <div class="about_section_2">
         <h2 class="mb-4">Our Categories</h2>
         <div class="row">
            <?php if (!empty($cate_arr)) 
            {
               foreach ($cate_arr as $cat) 
               { 
            ?>
                  <div class="col-md-4 mb-4">
                     <div class="card">
                        <img src="../admin/assets/images/catagory/<?php echo $cat->image; ?>" class="card-img-top" alt="<?php echo $cat->name; ?>"style="height: 300px; object-fit: cover;">
                        

                        <div class="card-body text-center">
                           <h5 class="card-title"><?php echo $cat->name; ?></h5>
                           <form method="post" action="cart.php">
                              <input type="hidden" name="item_name" value="<?php echo $cat->name; ?>">
                              <input type="hidden" name="price" value="<?php echo $cat->price ?? 0; ?>">
                              
                           </form>
                        </div>
                     </div>
                  </div>
            <?php 
               }
            } 
            else 
            {
               echo "<p>No categories available.</p>";
            } 
            ?>
         </div>
      </div>
   </div>
</div>
<!-- category section end -->


<?php 
include_once('footer.php'); 
?>

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
