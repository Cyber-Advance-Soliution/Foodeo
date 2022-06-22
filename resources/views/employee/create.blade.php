@extends('layouts.main-admin')

@section('title', 'New Employee')

@section('content')

	<div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
				<div class="card-header">
					<h3 class="card-title"> Create Employee </h3>
					
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{ route('create-employee') }}" method="post" role="form">
					@csrf 
					<div class="card-body">
					
						<div class="form-group">
							<label> Store </label>
							<select class="form-control select2" name="store_id" style="width: 100%;">
								<option value="" selected="selected"> -- Select Store -- </option>
								@foreach($stores as $store)
									<option value="{{ $store->id }}">{{ $store->store_name }}</option>
								@endforeach
							</select>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1"> Name </label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
						</div>
						
						<div class="form-group">
							<label>Designation </label>
							<select class="form-control select2" name="designation_id" style="width: 100%;">
								<option value="" selected="selected"> -- Select Designation  -- </option>
								@foreach($designations as $designation)
									<option value="{{ $designation->id }}">{{ $designation->designation_name }}</option>
								@endforeach
							</select>
						</div>
						
						<div class="form-group">
							<label for="email"> Email </label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
						</div>
						
						<div class="form-group">
							<label for="email"> Password </label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
						</div>
					
						<div class="form-group">
							<label for="phoneNumber"> Phone Number </label>
							<input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
						</div>
						
						<div class="form-group">
							<label for="phoneNumber"> Address </label>
							<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="permissions"> Assign Permissions </label>
							</div>
							
							@foreach($permissions as $permission)
							
								<div class="col-md-3">
									<div class="form-group">
										<div class="form-check">
											<input class="form-check-input" type="checkbox"  id="permissions" name="permissions[]" value="{{ $permission->name }}">
											<label class="form-check-label">  {{ ucwords($permission->name) }}</label>
										</div>
									</div>
								</div>
							
							@endforeach
						</div>
					</div>
					<div class="card-footer text-right">
						<button type="submit" class="btn btn-success btn-lg">Save</button>
					</div>
				</form>
            </div>
            <!-- /.card -->
			
        </div>
        <!-- /.row -->
	</div>
@stop
<!-- Javascript Requirements -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\EmployeeRequest') !!}

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgUJGcH0GQUG5Vug-yb1JAp1OIkZEUrzQ&amp;libraries=places"></script> 
<!-- Bootstrap 4 -->

<!-- Page script -->
<script>
	$(document).ready(function(){
		
		//bsCustomFileInput.init();
		
		
		initialize();
		var cdn_css_file="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/css/bootstrap4-toggle.min.css";
		var toggle_script_url="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js";
				$.getScript(toggle_script_url);
				//$.getScript(cdn_css_file);
		
	});
	
	function initialize() {
		var input = document.getElementById('locations_filter');
		var autocomplete = new google.maps.places.Autocomplete(input);
		autocomplete.addListener('place_changed', function () {
			var place = autocomplete.getPlace();
			console.log(autocomplete);
			// place variable will have all the information you are looking for.
			$('#latitude').val(place.geometry['location'].lat());
			$('#longitude').val(place.geometry['location'].lng());
			$('#location').val(place.name);
			$('#location_search_filter').val(1);
		});
	}
	
</script>
