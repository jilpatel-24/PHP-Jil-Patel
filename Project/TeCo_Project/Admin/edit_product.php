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
          <h5 class="card-title fw-semibold mb-4">Edit Product</h5>
          <link rel="shortcut icon" type="image/png" href="./assets/images/logos/tlogo.png" />
          <div class="card">
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">

                <div class="mb-3">
                  <label for="" class="form-label">Product Name</label>
                  <input type="name" value="<?php echo $fetch->product_name?>" name="product_name" class="form-control" id="exampleInputname" aria-describedby="emailHelp">

                </div>

                <div class="mb-3">
                  <label for="" class="form-label">Product Description</label>
                  <input type="name" value="<?php echo $fetch->description?>" name="description" class="form-control" id="exampleInputname" aria-describedby="emailHelp">

                </div>

                <div class="mb-3">
                  <label class="form-label">Product Image</label>
                  <input type="file"  name="product_image" class="form-control" id="exampleInputimage">
                  <img src="assets/images/product/<?php echo $fetch->product_image?>" width="100px" height="120px" alt="">
                </div>

                <div class="mb-3">
                  <label for="" class="form-label">Product Price</label>
                  <input type="price" value="<?php echo $fetch->product_price?>" name="product_price" class="form-control" id="exampleInputPrice">
                </div>

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Category Name</label>
                  <select type="name" name="cat_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <option value="">Select Categories</option>
                      <?php
                      foreach($cate_arr as $data) 
                      {
                        // Check if the current category ID matches the product's category ID
                        // If yes, mark it as "selected" in the dropdown
                        $selected = ($data->id == $fetch->cat_id) ? "selected" : "";

                        // Print each option with category ID as value and category name as text
                        // Add "selected" if it matches the current product category
                        echo "<option value='{$data->id}' $selected>{$data->name}</option>";
                      }
                      ?>
                  </select>
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