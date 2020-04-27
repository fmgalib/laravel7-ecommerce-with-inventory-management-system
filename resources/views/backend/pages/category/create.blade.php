@extends('backend.template.layout')

@section('dashboard-content')
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Add Category</h4>
          
        </div>
      </div>

       <div class="br-pagebody">
        <div class="br-section-wrapper">
         {{--  <h6 class="br-section-label">Card Block</h6>
          <p class="br-section-text">An example some text within a card block.</p> --}}


 

          <div class="row mg-b-20">
            <div class="col-md">
              <div class="card card-body"> 	

              	<form action="{{ route('storeCategory') }}" method="POST" enctype="multipart/form-data">
		        	@csrf
		        	<div class="form-group">
		        		<label>Category Name</label>
		        		<input class="form-control" type="text" name="cat_name">
		        	</div>
		        	<div class="form-group">
		        		<label>Category Description</label>
		        		<textarea class="form-control" rows="3" name="cat_description"></textarea>
		        	</div>

		        	<div class="form-group">
                        <label>Parent Category</label>
                        <select class="form-control" name="parent_id">
                        	<option value="0">Select a primary category</option>

                        	@foreach($parent_categories as $category)
                        		<option value="{{ $category->id }}">{{ $category->name }}</option>
                        	@endforeach
                        	
                        </select>
                     </div>

		        	<div class="form-group">
                        <label>Category Image</label>
                        <input type="file" name="image" class="form-control-file">
                     </div>

		        	<div >
			      	<input type="submit" name="addCategory" value="Add Category" class="btn btn-primary">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
			      </div>
		       </form>
             
              </div><!-- card -->
            </div><!-- col -->
            
            </div><!-- col -->
          </div><!-- row -->   
        </div><!-- br-section-wrapper -->
      </div>

@endsection   