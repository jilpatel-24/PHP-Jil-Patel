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
          <h5 class="card-title fw-semibold mb-4">Add Product</h5>
          <link rel="shortcut icon" type="image/png" href="./assets/images/logos/tlogo.png" />
          <div class="card">
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">

                <div class="mb-3">
                  <label for="" class="form-label">Product Name</label>
                  <input type="name" name="product_name" class="form-control" id="exampleInputname" aria-describedby="emailHelp">

                </div>

                <div class="mb-3">
                  <label for="exampleInputDesc" class="form-label">Product Description</label>
                  <textarea name="description" class="form-control" id="exampleInputDesc" rows="4" placeholder="Enter product details..." required></textarea>
                </div>
                
                <div class="mb-3">
                  <label for="" class="form-label">Product Image</label>
                  <input type="file" name="product_image" class="form-control" id="exampleInputimage">
                </div>

                <div class="mb-3">
                  <label for="" class="form-label">Product Price</label>
                  <input type="price" name="product_price" class="form-control" id="exampleInputPrice">
                </div>

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Category Name</label>
                  <select type="name" name="cat_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <option value="">Select Categories</option>
                    <?php
                    foreach ($cate_arr as $data) 
                    {
                    ?>
                      <option value="<?php echo $data->id ?>"><?php echo $data->name; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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