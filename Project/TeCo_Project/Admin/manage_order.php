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
              <h5 class="card-title fw-semibold mb-4">Order</h5>
			  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/tlogo.png" />
              <p class="mb-0">Manage Order </p>
			  
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>ID</th>
					<th>Cart ID</th>
					<th>Customer ID</th>
					<th>Total Amount</th>
					<th>Address</th>
					<th>City</th>
					<th>State</th>
					<th>Pincode</th>
					<th class="text-center">Action</th>
				  </tr>
				</thead>
				<tbody>
				 
				 <?php
				foreach($proorder_arr as $data)
				{
				?>

				  <tr>
					<td><?php echo $data->id;?></td>
					<td><?php echo $data->cart_id;?></td>
					<td><?php echo $data->customer_id;?></td>
					<td><?php echo $data->total_amount;?></td>
					<td><?php echo $data->address;?></td>
					<td><?php echo $data->state;?></td>
					<td><?php echo $data->city;?></td>
					<td><?php echo $data->pincode;?></td>
				
					<td  class="text-center">
						<a href="" class="btn btn-primary">Edit</a>
						<a href="" class="btn btn-danger">Delete</a>
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