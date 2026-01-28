@extends ('admin.layout.structure')

@section('content')



<div class="body-wrapper-inner">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title fw-semibold mb-4">Product</h5>
				<link rel="shortcut icon" type="image/png" href="<?php echo url('admin/images/logos/tlogo.png') ?>" />
				<p class="mb-0">Manage Product </p>
				@if(session('delete'))
				<h3 style="color:red" class="float-end m-3">{{session('delete')}} is Deleted successfully</h3>
			    @endif
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

						@foreach($manage_product as $d)
						<tr>
							<td>{{$d->id}}</td>
							<td>{{$d->product_name}}</td>
							<td>{{$d->product_description}}</td>
							<td>{{$d->product_price}}</td>
							<td>
								<img src="{{ asset('upload/product/' . $d->product_img) }}"
									width="80" height="80"
									style="object-fit: cover; border-radius: 5px;">
							</td>

							<td>{{ $d->category->cate_name ?? 'No Category' }}</td>


							<td class="text-center">
								<a href="{{ url('/edit_product/'.$d->id) }}" class="btn btn-primary">Edit</a>
								<a href="/manage_product/{{$d->id}}" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

@endsection