<?php
if(isset($_SESSION['a_id']))
{
 
}
else
{
	 echo "<script>
		  window.location='admin';
	  </script>";
}

	include_once('adminheader.php');
?>

    <!--  Main wrapper -->
    <div class="body-wrapper">
	
    <?php
		include_once('admin_account.php');
	?>
	  
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Categories</h5>
              <link rel="shortcut icon" type="image/png" href="./assets/images/logos/tlogo.png" />
              <div class="card">
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                      <label class="form-label">Category Name</label>
                      <input type="text" value="<?php echo $fetch->name?>" name="name" class="form-control" id="" aria-describedby="">
                      
                    </div>
                    
                    <div class="mb-3">
                      <label class="form-label">Category Image</label>

                      <input type="file" name="image" class="form-control mb-3">
                      <img src="assets/images/catagory/<?php echo $fetch->image?>"  width="100px" height="120px"  alt="">
                    </div>
                   
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
        
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