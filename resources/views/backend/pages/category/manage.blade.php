@extends('backend.template.layout')

@section('dashboard-content')
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Manage Categories</h4>
          <p class="mg-b-0">Manage all your categories</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
         {{--  <h6 class="br-section-label">Card Block</h6>
          <p class="br-section-text">An example some text within a card block.</p> --}}

		{{-- Add brand button --}}
          <div class="row mg-b-20 justify-content-end">
          	<a class="btn btn-success " href="{{ route('createCategory') }}">Add New Category</a>
          </div>

          {{-- Table starts --}}
          <div class="row mg-b-20">

              <div class="card card-body"> 	

                <table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">Slug</th>
				      <th scope="col">Description</th>
				      <th scope="col">Image</th>
				      <th scope="col">Parent</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>

				  	@foreach($categories as $category)
				  	<tr>
				      <th scope="row">{{ $category->id }}</th>
				      <td>{{ $category->name }}</td>
				      <td>{{ $category->slug }}</td>
				      <td>{{ $category->description }}</td>
				      <td>
				      	@if( $category->image == null )
				      		No Image Attached
				      	@else
				      		<img src="{{ asset('images/categories/' . $category->image) }}" width="50">	
				      	@endif
				      </td>
				      <td>
				      	@if($category->parent_id == 0)
				      		Primary Category
				      	@else
				      		{{$category->parent->name}}
				      	@endif	
				      </td>
				      <td>
				      	<div class="btn-group">
				      		<a class="btn btn-success btn-sm" href="{{ route('editCategory', $category->id ) }}">Edit</a>
				      		<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCategory{{$category->id}}">Delete</button>
				      	</div>

				      	<!-- Modal -->
						<div class="modal fade" id="deleteCategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						      	Do you want to delete this category?

						      </div>
						      <div class="modal-footer">
						       	<form action="{{ route('deleteCategory', $category->id) }}" method="POST">
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