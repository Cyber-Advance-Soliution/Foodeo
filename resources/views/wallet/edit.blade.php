@extends('layouts.main-admin')

@section('title', 'Debit')

@section('content')

	<div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
				<div class="card-header">
					<h3 class="card-title"> Add Money</h3>
					
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="{{ route('wallet-update') }}" method="post" role="form">
					@csrf 
                    
                    <input type="hidden"  id="walletid" name="walletid"  value="{{$model->id}}">
                    <input type="hidden"  id="u_id" name="u_id"  value="{{$model->customer_id}}">
                    <input type="hidden"  id="customerId" name="customerId"  value="{{$model->id}}">

					<div class="card-body">
						<div class="form-group">
							<label for="coupon-code">Debit</label>
							<input type="text" class="form-control" id="debit" name="debit" placeholder="" value="{{isset($model->blance)? $model->blance:$model->debit}}">
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
