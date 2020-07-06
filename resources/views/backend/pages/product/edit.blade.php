@extends('backend.template.layout')

@section('dashboard-content')
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Edit Product</h4>
          
        </div>
      </div>

       <div class="br-pagebody">
        <div class="br-section-wrapper">
         {{--  <h6 class="br-section-label">Card Block</h6>
          <p class="br-section-text">An example some text within a card block.</p> --}}


 

          <div class="row mg-b-20">
            <div class="col-md">
              <div class="card card-body"> 	

              	<form action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
		        	@csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Product Title</label>
                    <input class="form-control" type="text" name="title" value="{{ $product->title }}">
                  </div>
                  <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="form-control" rows="3" name="description">{{ $product->title }}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Reguler Price</label>
                    <input type="text" class="form-control" rows="3" name="reguler_price" value="{{ $product->reguler_price }}"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Offer Price</label>
                    <input type="text" class="form-control" rows="3" name="offer_price" value="{{ $product->offer_price }}"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" rows="3" name="quantity" value="{{ $product->quantity }}"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Select Brand</label>
                    <select name="brand_id" class="form-control">
                      <option value="">Please select a product brand</option>
                      @foreach( App\Models\Backend\Brand::orderBy('name', 'asc')->get() as $brand )
                        <option value="{{$brand->id}}" @if($product->brand->id == $brand->id) selected @endif >{{$brand->name}}</option>
                      @endforeach  
                    </select>               
                  </div>
                  <div class="form-group">
                    <label>Select Category</label>
                    <select name="category_id" class="form-control">
                      <option value="">Please select a product category</option>
                      @foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('parent_id', 0)->get() as $parent )
                        <option value="{{$parent->id}}" @if($product->category_id == $parent->id) selected @endif >{{$parent->name}}</option>
                        @foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child )
                          <option value="{{$child->id}}" @if($product->category_id == $child->id) selected @endif > > {{$child->name}}</option>
                        @endforeach
                      @endforeach  
                    </select>               
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="">Please select</option>
                      <option value="1" @if($product->status == 1) selected @endif >Active</option>
                      <option value="0" @if($product->status == 0) selected @endif >Inactive</option>
                    </select>               
                  </div>
                  <div class="form-group">
                    <label>Is Featured?</label>
                    <select name="is_featured" class="form-control">
                      <option value="">Please select (Yes / No)</option>
                      <option value="1" @if($product->is_featured == 1) selected @endif >Yes</option>
                      <option value="0" @if($product->is_featured == 0) selected @endif >No</option>
                    </select>               
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Product Main Thumbnail</label>
                <input type="file" name="p_image[]" class="form-control-file">
              </div>
		        	
              <div class="row">
                <div class="form-group col-md-3">
                  <label>Image 1</label>
                  <input type="file" name="p_image[]" class="form-control-file">
                </div>
                <div class="form-group col-md-3">
                  <label>Image 2</label>
                  <input type="file" name="p_image[]" class="form-control-file">
                </div>
                <div class="form-group col-md-3">
                  <label>Image 3</label>
                  <input type="file" name="p_image[]" class="form-control-file">
                </div>
                <div class="form-group col-md-3">
                  <label>Image 4</label>
                  <input type="file" name="p_image[]" class="form-control-file">
                </div>
              </div>
	        	  
			      	<input type="submit" name="addProduct" value="Add Product" class="btn btn-primary">
			        
			      </div>
		       </form>
             
              </div><!-- card -->
            </div><!-- col -->
            
            </div><!-- col -->
          </div><!-- row -->   
        </div><!-- br-section-wrapper -->
      </div>

@endsection   