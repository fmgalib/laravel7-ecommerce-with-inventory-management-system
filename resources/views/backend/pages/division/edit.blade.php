@extends('backend.template.layout')

@section('dashboard-content')
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Update Category</h4>
          
        </div>
      </div>

       <div class="br-pagebody">
        <div class="br-section-wrapper">
         {{--  <h6 class="br-section-label">Card Block</h6>
          <p class="br-section-text">An example some text within a card block.</p> --}}


 

          <div class="row mg-b-20">
            <div class="col-md">
              <div class="card card-body"> 	

              	<form action="{{ route('updateCategory', $category->id) }}" method="POST" enctype="multipart/form-data">
		        	@csrf
		        	<div class="form-group">
		        		<label>Category Name</label>
		        		<input class="form-control" type="text" name="cat_name" value="{{$category->name}}">
		        	</div>
		        	<div class="form-group">
		        		<label>Category Description</label>
		        		<textarea class="form-control" rows="3" name="cat_description">{{$category->description}}</textarea>
		        	</div>

		        	<div class="form-group">
                        <label>Parent Category</label>
                        <select class="form-control" name="parent_id">
                        	<option value="0">Select a primary category</option>

                        	@foreach($parent_categories as $parent)
                        		<option value="{{ $parent->id }}" {{ $parent->id == $category->parent_id ? 'selected' : '' }} >{{ $parent->name }}</option>
                        	@endforeach
                        	
                        </select>
                     </div>

		        	<div class="form-group">
                        <label>Category Image</label><br>
                        @if($category->image == null)
                          No image uploaded
                        @else
                          <img src="{{ asset('images/categories/' . $category->image) }}" width="80"> <br><br>
                        @endif  

                        <input type="file" name="image" class="form-control-file">
                     </div>

		        	<div >
			      	<input type="submit" name="updateCategory" value="Update Category" class="btn btn-primary">
			          
			      </div>
		       </form>
             
              </div><!-- card -->
            </div><!-- col -->
            
            </div><!-- col -->
          </div><!-- row -->   
        </div><!-- br-section-wrapper -->
      </div>

@endsection   