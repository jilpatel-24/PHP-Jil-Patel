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
              <h5 class="card-title fw-semibold mb-4">Catagory</h5>
			  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/tlogo.png" />
              <p class="mb-0">Manage Catagory </p>
			  
			  <table id="mytablejp" class="table table-striped">
				<thead>
				  <tr>
					<th>ID</th>
					<th>Name</th>
					<th>Image</th>
					<th class="text-center">Action</th>
				  </tr>
				</thead>
				<tbody>

				 <?php
				foreach($cate_arr as $data)
				{
				?>

				  <tr>
					<td><?php echo $data->id;?></td>
					<td><?php echo $data->name;?></td>		
					<td><img src="assets/images/catagory/<?php echo $data->image;?>" width="100px" height="120px"alt=""></td>
					<td  class="text-center">
						<a href="edit_categories?edit_categories=<?php echo $data->id?>"  class="btn btn-primary">Edit</a>
						<a href="delete?dlt_catagory=<?php echo $data->id;?>" class="btn btn-danger">Delete</a>
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
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
  <!-- 2 Include these two files --> 
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> 

  <script>
		$(document).ready(function() 
		{
			$('#mytablejp').DataTable();
		} );
	</script>
</body>

</html>