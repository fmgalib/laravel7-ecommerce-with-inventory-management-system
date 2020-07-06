@extends('backend.template.layout')

@section('dashboard-content')
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Update District</h4>
          
        </div>
      </div>

       <div class="br-pagebody">
        <div class="br-section-wrapper">
         {{--  <h6 class="br-section-label">Card Block</h6>
          <p class="br-section-text">An example some text within a card block.</p> --}}

            <div class="row mg-b-20">
              <div class="col-md">
                <div class="card card-body"> 	

                  <form action="{{ route('updateDistrict', $district->id) }}" method="POST"         enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label>District Name</label>
                        <input class="form-control" type="text" name="name" value="{{$district->name}}">
                      </div>
                      
                      <div class="form-group">
                        <select name="division_id" class="form-control">
                          <option value="">Please select a division name</option>
                          @foreach( App\Models\Backend\Division::orderBy('name', 'asc')->get() as $division )
                          <option value="{{$division->id}}" @if($district->division->id == $division->id) selected @endif >{{$division->name}}</option>
                          @endforeach  
                        </select>
                      </div>

                      <div >
                      <input type="submit" name="updateDivision" value="Update Division" class="btn btn-primary">
                        
                    </div>
                  </form>
              
                </div><!-- card -->
              </div><!-- col -->
            
            </div><!-- col -->
          </div><!-- row -->   
        </div><!-- br-section-wrapper -->
      </div>

@endsection   