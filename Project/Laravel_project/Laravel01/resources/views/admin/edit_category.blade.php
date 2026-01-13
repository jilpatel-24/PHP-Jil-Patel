@extends ('admin.layout.structure')

@section('content')

<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Category</h5>
        <link rel="shortcut icon" type="image/png" href="<?php echo url('admin/images/logos/tlogo.png') ?>" />
        <div class="card">
          <div class="card-body">
            @if(session('success'))
            <h3 style="color:green" class="float-end m-3">{{session('success')}}</h3>
            @endif
            <form action="{{url('/update_category/'.$manage_category->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="" class="form-label">Edit Category Name</label>
                <input type="name" name="cate_name" value="{{ $manage_category->cate_name }}" class="form-control" id="exampleInputName" aria-describedby="emailHelp">

              </div>

              <div class="mb-3">
                <label for="" class="form-label">Change Image</label>
                <input type="file" name="cate_img" class="form-control" id="exampleInputImage">
              </div>

              <div class="mb-3">
                <label class="form-label">Current Image</label><br>
                <img src="<?php echo url('upload/category/'.$manage_category->cate_img)?>" width="100">
              </div>

              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection