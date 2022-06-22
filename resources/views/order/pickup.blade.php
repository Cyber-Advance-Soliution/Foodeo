@extends('layouts.main-admin')

@section('title', 'Pickup')

@section('content')
<div class="card">
	<div class="card-header">
	  <h3 class="card-title"> Pickup Orders </h3>

	</div>
	<div class="card-body">
	  <div class="row">
		<div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
		  <div class="row">
			<div class="col-12 col-sm-2">
				<div class="info-box bg-light">
					<div class="info-box-content">
						<span class="info-box-text text-center text-muted"> Pending </span><br>
						<div id="pending"></div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-2">
				<div class="info-box bg-light">
					<div class="info-box-content">
						<span class="info-box-text text-center text-muted"> Accepted </span><br>
						<div id="accepted"></div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-2">
				<div class="info-box bg-light">
					<div class="info-box-content">
						<span class="info-box-text text-center text-muted"> Preparing </span><br>
						<div id="preparing"></div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-2">
				<div class="info-box bg-light">
					<div class="info-box-content">
					  <span class="info-box-text text-center text-muted"> R.T.P </span><br>
					  <div id="ready-to-pickup"></div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-2">
				<div class="info-box bg-light">
					<div class="info-box-content">
						<span class="info-box-text text-center text-muted"> Collected </span><br>
						<div id="collected"></div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-2">
				<div class="info-box bg-light">
					<div class="info-box-content">
						<span class="info-box-text text-center text-muted"> Cancelled </span><br>
						<div id="cancelled"></div>
					</div>
				</div>
			</div>
			
		  </div>
		</div>
	   </div>
	</div>
	<!-- /.card-body -->
  </div>
@stop  
<script src="{{asset('admin') }}/plugins/jquery/jquery.min.js"></script> 
<script>

	$(document).ready(function() {
		setInterval( function() {
			$.ajax({
				type : 'get',
				url : "{{ route('pickup-orders') }}",
				data: {'store_id': 1},
				success: function(jsonResponse) {
					var response = $.parseJSON(jsonResponse);
					$("#pending").html(response.Pending);
					$("#accepted").html(response.Accepted);
					$("#preparing").html(response.Preparing);
					$("#ready-to-pickup").html(response.ReadyToPickup);
					$("#collected").html(response.Collected);
					$("#cancelled").html(response.Cancelled);
				},
			});
		}, 2000);
	});
	
</script>

