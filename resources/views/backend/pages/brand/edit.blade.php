@extends('backend.template.layout')

@section('dashboard-content')
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Update Brand</h4>
          
        </div>
      </div>

       <div class="br-pagebody">
        <div class="br-section-wrapper">
         {{--  <h6 class="br-section-label">Card Block</h6>
          <p class="br-section-text">An example some text within a card block.</p> --}}


 

          <div class="row mg-b-20">
            <div class="col-md">
              <div class="card card-body"> 	

              	<form action="{{ route('updateBrand', $brand->id) }}" method="POST" enctype="multipart/form-data">
		        	@csrf
		        	<div class="form-group">
		        		<label>Brand Name</label>
		        		<input class="form-control" type="text" name="brand_name" value="{{$brand->name}}">
		        	</div>
		        	<div class="form-group">
		        		<label>Brand Description</label>
		        		<textarea class="form-control" rows="3" name="brand_description">{{$brand->description}}</textarea>
		        	</div>


		        	<div class="form-group">
                        <label>Brand Image</label><br>
                        @if($brand->image == null)
                          No image uploaded
                        @else
                          <img src="{{ asset('images/brands/' . $brand->image) }}" width="80"> <br><br>
                        @endif  

                        <input type="file" name="image" class="form-control-file">
                     </div>

		        	<div >
			      	<input type="submit" name="updateBrand" value="Update Category" class="btn btn-primary">
			          
			      </div>
		       </form>
             
              </div><!-- card -->
            </div><!-- col -->
            
            </div><!-- col -->
          </div><!-- row -->   
        </div><!-- br-section-wrapper -->
      </div>

@endsection   