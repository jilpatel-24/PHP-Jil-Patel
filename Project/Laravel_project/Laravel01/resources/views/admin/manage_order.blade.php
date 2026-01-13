@extends ('admin.layout.structure')

@section('content')
 
 
	  
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Order</h5>
			  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/tlogo.png" />
              <p class="mb-0">Manage Order </p>
			  @if(session('delete'))
				<h3 style="color:red" class="float-end m-3">{{session('delete')}} is Deleted successfully</h3>
			  @endif
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Customer Name</th>
					<th>Total Price</th>
					<th>Address</th>
					<th>City</th>
					<th>State</th>
					<th>Pincode</th>
					
					<th class="text-center">Action</th>
				  </tr>
				</thead>
				<tbody>
				 
				
				@foreach($order as $d)
				  <tr>
					<td>{{$d->id}}</td>
					<td>{{$d->p_name}}</td>
					<td>{{$d->cust_name}}</td>
					<td>{{$d->t_price}}</td>
					<td>{{$d->Address}}</td>
					<td>{{$d->city}}</td>
					<td>{{$d->state}}</td>
					<td>{{$d->pincode}}</td>
					
				
					<td  class="text-center">
						<a href="#" class="btn btn-primary">Edit</a>
						<a href="/manage_order/{{$d->id}}" class="btn btn-danger">Delete</a>
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