@extends ('admin.layout.structure')

@section('content')
 
 
	  
       <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Contact</h5>
			  <link rel="shortcut icon" type="image/png" href="<?php echo url('admin/images/logos/tlogo.png')?>" />
              <p class="mb-0">Manage Contact </p>
			  @if(session('delete'))
				<h3 style="color:red" class="float-end m-3">{{session('delete')}} is Deleted successfully</h3>
			  @endif
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>ID</th>
					<th>Customer Name</th>
					<th>Email</th>
					<th>Message</th>
					<th class="text-center">Action</th>
				  </tr>
				</thead>
				<tbody>
					
				@foreach($contact as $d)
				  <tr>
					<td>{{$d->id}}</td>
					<td>{{$d->name}}</td>
					<td>{{$d->email}}</td>
					<td>{{$d->comment}}</td>
					<td  class="text-center">
						<a href="#" class="btn btn-primary">Edit</a>
						<a href="/manage_contact/{{$d->id}}" class="btn btn-danger">Delete</a>
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