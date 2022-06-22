@extends('layouts.main')

@section('title', 'Update Owner')

@section('content')

	<div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
				<div class="card-header">
					<h3 class="card-title"> {{ $model->username }} </h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{ route('update') }}" method="post" role="form">
					@csrf 
					<div class="card-body">
					
						<input type="hidden" name="user_id" value="{{ $model->id }}">
						<div class="form-group">
							<label for="exampleInputEmail1"> Name </label>
							<input type="text" class="form-control" id="name" name="name" value="{{ ($model->userDetail) ? $model->userDetail->name : '' }}" placeholder="Enter Name">
						</div>
						
						<div class="form-group">
							<label> Owner Status </label>
							<select class="form-control select2" name="status" style="width: 100%;">
								<option value="1" {{ ($model->status == 1) ? 'selected' : '' }}> Active </option>
								<option value="0" {{($model->status == 0) ? 'selected' : '' }}> Not Active </option>
							</select>
						</div>
						
						<div class="form-group">
							<label for="email"> Email </label>
							<input type="text" class="form-control" id="email" name="email" value="{{ $model->email }}" placeholder="Enter Email">
						</div>
						
						<!--<div class="form-group">
							<label for="email"> Password </label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
						</div>-->
					
						<div class="form-group">
							<label for="phoneNumber"> Phone Number </label>
							<input type="text" class="form-control" id="phone_number" value="{{ ($model->userDetail) ? $model->userDetail->phone_number : '' }}" name="phone_number" placeholder="Enter Phone Number">
						</div>
						
						<div class="form-group">
							<label for="phoneNumber"> Address </label>
							<input type="text" class="form-control" id="address" name="address" value="{{ ($model->userDetail) ? $model->userDetail->address : '' }}" placeholder="Enter Address">
						</div>
					
					</div>
					<div class="card-footer text-right">
						<button type="submit" class="btn btn-success btn-lg"> Update </button>
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

<!-- Page script -->
<script>
	$(document).ready(function(){
	
	});
	
	
</script>
