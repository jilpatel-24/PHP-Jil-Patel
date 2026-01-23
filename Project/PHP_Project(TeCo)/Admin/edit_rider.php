<?php
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
              <h5 class="card-title fw-semibold mb-4">Edit Rider</h5>
              <link rel="shortcut icon" type="image/png" href="./assets/images/logos/tlogo.png" />
              <div class="card">
                <div class="card-body">
                  <form method="post">
                    <div class="mb-3">
                      <label for="name" class="form-label">Rider Name</label>
                      <input type="name" value="<?php echo $fetch->name?>" name="name"class="form-control" id="exampleInputName" aria-describedby="">
                      
                    </div>
                    <div class="mb-3">
                      <label for="mobile" class="form-label">Rider Mobile No.</label>
                      <input type="mobile" value="<?php echo $fetch->mobile_no?>" name="mobile_no" class="form-control" id="exampleInputMobileNo" aria-describedby="">
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