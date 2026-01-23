<?php
	include_once('adminheader.php');
?>
	
    <!--  Main wrapper -->
    <div class="body-wrapper">
      
	<?php
	  include_once('admin_account.php')
	?>
	  
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Product</h5>
			  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/tlogo.png" />
              <p class="mb-0">Manage Product </p>
			  
			  <table class="table">
				<thead>
				  <tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Description</th> 
					<th>Price</th>
					<th>Image</th>
					<th>Category Name</th>
					<th class="text-center">Action</th>
				  </tr>
				</thead>
				<tbody>
				  <?php
				foreach($prod_arr as $data)
				{
				?>

				  <tr>
					<td><?php echo $data->id;?></td>
					<td><?php echo $data->product_name;?></td>
					<td><?php echo $data->description; ?></td> 
					<td><?php echo $data->product_price;?></td>
					
					<td><img src="assets/images/product/<?php echo $data->product_image;?>" width="100px" height="120px" ></td>
					
					<td><?php echo $data->name;?></td>
				
					<td  class="text-center">
						<a href="edit_product?edit_product=<?php echo $data->id?>" class="btn btn-primary">Edit</a>
						<a href="delete?dlt_product=<?php echo $data->id;?>" class="btn btn-danger">Delete</a>
					</td>
				  </tr>
				<?php
				}
				?>  
				  
				</tbody>
			  </table>
			  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/sidebarmenu.js"></script>
  <script src="./assets/js/app.min.js"></script>
  <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>