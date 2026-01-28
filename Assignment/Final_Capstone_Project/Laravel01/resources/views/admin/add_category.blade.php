@extends ('admin.layout.structure')

@section('content')

<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Add Category</h5>
        <link rel="shortcut icon" type="image/png" href="<?php echo url('admin/images/logos/tlogo.png') ?>" />
        <div class="card">
          <div class="card-body">
            @if(session('success'))
            <h3 style="color:green" class="float-end m-3">{{session('success')}}</h3>
            @endif
            <form action="{{url('/category')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="" class="form-label">Add Category</label>
                <input type="name" name="cate_name" class="form-control" id="exampleInputName" aria-describedby="emailHelp">

              </div>
              <div class="mb-3">
                <label for="" class="form-label">Add Image</label>
                <input type="file" name="cate_img" class="form-control" id="exampleInputImage">
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