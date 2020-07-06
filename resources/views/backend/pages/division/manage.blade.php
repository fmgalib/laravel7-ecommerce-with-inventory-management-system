@extends('backend.template.layout')

@section('dashboard-content')
<div class="br-mainpanel">
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Division List</h4>
			<p class="mg-b-0">Manage Divisions</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="br-section-wrapper">
			{{--  <h6 class="br-section-label">Card Block</h6>
			<p class="br-section-text">An example some text within a card block.</p> --}}

			{{-- Add brand button --}}
			<div class="row mg-b-20">
				<a class="btn btn-success " href="{{ route('createDivision') }}">Add New Division</a>
			</div>

			{{-- Table starts --}}
			<div class="row mg-b-20">

				<div class="card card-body"> 	

					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#Sl</th>
								<th scope="col">Division Name</th>
								<th scope="col">Priority List</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@php
							$i = 0;
							@endphp
							@foreach($divisions as $division)
							<tr>
								<th scope="row">{{ ++ $i }}</th>
								<td>{{ $division->name }}</td>
								<td>{{ $division->priority }}</td>
								<td>
									<div class="btn-group">
										<a class="btn btn-success btn-sm" href="{{ route('editCategory', $division->id ) }}">Edit</a>
										<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteDivision{{$division->id}}">Delete</button>
									</div>

									<!-- Modal -->
									<div class="modal fade" id="deleteDivision{{$division->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Delete Division</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													Do you want to delete this division?
												</div>
												<div class="modal-footer">
													<form action="{{ route('deleteDivision', $division->id) }}" method="POST">
														@csrf
														<button type="submit" class="btn btn-danger">Delete</button> 
													</form>
													<span><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button></span>
												</div>
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