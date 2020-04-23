@extends('backend.template.layout')

@section('dashboard-content')
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Manage Categories</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Card Block</h6>
          <p class="br-section-text">An example some text within a card block.</p>

          <div class="row mg-b-20">
            <div class="col-md">
              <div class="card card-body">
                <table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Sl No</th>
				      <th scope="col">Nmae</th>
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
				      		<img src="{{ $category->image }}">	
				      	@endif
				      </td>
				      <td>{{ $category->parent_id }}</td>
				      <td>
				      	<div class="btn-group">
				      		<a class="btn btn-success btn-sm" href="">Edit</a>
				      		<a class="btn btn-danger btn-sm" href="">Delete</a>
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