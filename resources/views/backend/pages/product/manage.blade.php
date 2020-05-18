@extends('backend.template.layout')

@section('dashboard-content')
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Manage Products</h4>
          <p class="mg-b-0">Manage all your products</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
         {{--  <h6 class="br-section-label">Card Block</h6>
          <p class="br-section-text">An example some text within a card block.</p> --}}



          <div class="row mg-b-20">
              <div class="card card-body"> 	
              
              	
                <table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Title</th>
				      <th scope="col">Brand</th>
				      <th scope="col">Category</th>				      
				      <th scope="col">Slug</th>
				      <th scope="col">Description</th>
				      <th scope="col">Regular Price</th>
				      <th scope="col">Offer Price</th>
				      <th scope="col">Quantity</th>
				      <th scope="col">Status</th>				      
				      <th scope="col">Image</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>

				  	@foreach($products as $product)
				  	<tr>
				      <th scope="row">{{ $product->id }}</th>
				      <td>{{ $product->title }}</td>
 				      <td>{{ $product->brand->name }}</td>
				      <td>{{ $product->category->name }}</td>
				      <td>{{ $product->slug }}</td>
				      <td>{{ $product->description }}</td>
				      <td>{{ $product->reguler_price }}</td>
				      <td>{{ $product->offer_price }}</td>
				      <td>{{ $product->quantity }}</td>
				      <td>{{ $product->status }}</td>		     				      
				      <td>

				      	@php $i = 1; @endphp
				      	@foreach($product->images as $image)
				      		@if( $i > 0 )
				      			<img src=" {{ asset('images/products/' . $image->image) }}" width="50" >
				      			@php $i--; @endphp
				      		@endif				      		
				      	@endforeach
				      </td>
				      <td>
				      	<div class="btn-group">
				      		<a class="btn btn-success btn-sm" href="">Edit</a>
				      		<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="">Delete</button>
				      	</div>


				      	
				      	<!-- Delete Modal -->
						<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						      	Do you want to delete this Product?

						      </div>
						      <div class="modal-footer">
						       	<form action="" method="POST">
						      		@csrf
						      		<button type="submit" class="btn btn-danger">Delete</button> 
						      	</form>
						       	
						       <span><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button></span>
						      </div>

						  </div>
						</div>

				      </td>
				    </tr>
				  	@endforeach

				    
				  </tbody>
				</table>

              </div><!-- card -->        
            </div><!-- col -->
          </div><!-- row -->   
        </div><!-- br-section-wrapper -->
      </div>


@endsection      