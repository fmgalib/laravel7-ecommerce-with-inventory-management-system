@extends('backend.template.layout')

@section('dashboard-content')
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Manage Brands</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
         {{--  <h6 class="br-section-label">Card Block</h6>
          <p class="br-section-text">An example some text within a card block.</p> --}}



          <div class="row mg-b-20">
            <div class="col-md">
              <div class="card card-body"> 	

                <table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">Slug</th>
				      <th scope="col">Description</th>
				      <th scope="col">Image</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>

				  	@foreach($brands as $brand)
				  	<tr>
				      <th scope="row">{{ $brand->id }}</th>
				      <td>{{ $brand->name }}</td>
				      <td>{{ $brand->slug }}</td>
				      <td>{{ $brand->description }}</td>
				      <td>
				      	@if( $brand->image == null )
				      		No Image Attached
				      	@else
				      		<img src="{{ asset('images/brands/' . $brand->image) }}" width="80">	
				      	@endif
				      </td>
				      
				      <td>
				      	<div class="btn-group">
				      		<a class="btn btn-success btn-sm" href="">Edit</a>
				      		<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteBrand{{ $brand->id }}">Delete</button>
				      	</div>

				      	<!-- Modal -->
						<div class="modal fade" id="deleteBrand{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						      	Do you want to delete this Brand?

						      </div>
						      <div class="modal-footer">
						       	<form action="{{ route('deleteBrand', $brand->id) }}" method="POST">
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
            
            </div><!-- col -->
          </div><!-- row -->   
        </div><!-- br-section-wrapper -->
      </div>


@endsection      