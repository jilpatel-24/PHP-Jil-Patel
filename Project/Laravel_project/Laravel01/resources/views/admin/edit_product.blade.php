@extends ('admin.layout.structure')

@section('content')

<div class="body-wrapper-inner">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Product</h5>
        <link rel="shortcut icon" type="image/png" href="<?php echo url('admin/images/logos/tlogo.png') ?>" />
        <div class="card">
          <div class="card-body">
            @if(session('success'))
            <h3 style="color:green" class="float-end m-3">{{session('success')}}</h3>
            @endif
            <form action="{{url('/update_product/'.$manage_product->id)}}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="" class="form-label">Product Name</label>
                <input type="name" name="product_name" class="form-control" value="{{ $manage_product->product_name }}" id="exampleInputname" aria-describedby="emailHelp">

              </div>

              <div class="mb-3">
                <label for="exampleInputDesc" class="form-label">Product Description</label>
                <textarea name="product_description" class="form-control" rows="4" required>{{ $manage_product->product_description }}</textarea>
              </div>




              <div class="mb-3">
                <label class="form-label">Current Image</label><br>
                <img src="{{ url('upload/product/'.$manage_product->product_img) }}" width="120" style="border-radius:5px">
              </div>

              {{-- New Image Upload --}}
              <div class="mb-3">
                <label class="form-label">Change Product Image</label>
                <input type="file" name="product_img" class="form-control">
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Product Price</label>
                <input type="price" name="product_price" value="{{ $manage_product->product_price }}" class="form-control" id="exampleInputPrice">
              </div>

              <div class="mb-3">
                <label class="form-label">Category Name</label>
                <select name="cate_id" class="form-control">
                  <option value="">Select Categories</option>
                  @foreach($cate_arr as $data)
                  <option value="{{ $data->id }}"
                    {{ $manage_product->cate_id == $data->id ? 'selected' : '' }}>
                    {{ $data->cate_name }}
                  </option>
                  @endforeach
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
@endsection