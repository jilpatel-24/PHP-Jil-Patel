@extends ('admin.layout.structure')

@section('content')

<div class="body-wrapper-inner">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title fw-semibold mb-4">Catagory</h5>
				<link rel="shortcut icon" type="image/png" href="<?php echo url('admin/images/logos/tlogo.png') ?>" />
				<p class="mb-0">Manage Catagory </p>
				
				@if(session('delete')) <!--This is Flash Session -->
				<h3 style="color:red" class="float-end m-3">{{session('delete')}} Category Deleted Successfully</h3>
				@endif

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
						@foreach($manage_category as $d)
						<tr>
							<td>{{$d->id}}</td>
							<td>{{$d->cate_name}}</td>
							<td>
								<img src="{{ asset('upload/category/' . $d->cate_img) }}"
									width="80" height="80"
									style="object-fit: cover; border-radius: 5px;">
							</td>

							<td class="text-center">
								<a href="{{ url('/edit_category/'.$d->id) }}" class="btn btn-primary">Edit</a>
								<a href="/manage_category/{{$d->id}}" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

@endsection