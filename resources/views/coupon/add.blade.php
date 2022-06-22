@extends('layouts.main-admin')

@section('title', 'New Coupon')

@section('content')

	<div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
				<div class="card-header">
					<h3 class="card-title"> Create Coupon </h3>
					
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{ route('coupon-store') }}" method="post" role="form">
					@csrf 
					<div class="card-body">
						<div class="form-group">
							<label for="coupon-code">Coupon Code</label>
							<input type="text" class="form-control" id="code" name="code" placeholder="Enter code like foodeo234">
						</div>
						
						<div class="form-group">
							<label> Coupon Type </label>
							<select class="form-control select2" name="type" style="width: 100%;">
								<option value="" selected="selected"> -- Select coupon type -- </option>
									<option value="percentage">percentage</option>
									<option value="value">value</option>

							</select>
						</div>
						<div class="form-group">
							<label for="coupon-value">Coupon Value </label>
							<input type="number" class="form-control" id="value" name="value" placeholder="Enter value">
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

{!! JsValidator::formRequest('App\Http\Requests\CouponRequest') !!}

<script>

	$(document).ready(function(){
		
	});
	
</script>
