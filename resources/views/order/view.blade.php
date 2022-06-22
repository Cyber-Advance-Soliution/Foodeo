@extends('layouts.main-admin')

@section('title', 'Order Detail')

@section('content')
    <?php if($model->pickup == 0) : ?>
		<div class="card card-solid">
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-sm-12">
						<h3 class="d-inline-block"> Order Ref # {{ $model->order_reference }} </h3> 
						<div id="storeMap" style="height:400px;width:100%;"></div>
						<div class="mt-4 text-center"> <strong> Location of Order # {{ $model->order_reference }} </strong> </div>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
	<?php endif; ?>
	
	<div class="invoice p-3 mb-3">
	  <!-- title row -->
	  <div class="row">
		<div class="col-12">
		  <h4>
			<i class="nav-icon fas fa-store-alt"></i> 
			<small class="float-right"> {{ $model->created_at }} </small>
		  </h4>
		</div>
		<!-- /.col -->
	  </div>
	  <!-- info row -->
		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				Customer
				<address>
					<strong> {{ $model->customer->username ?  $model->customer->username : 'NA' }} </strong>
					<p> Address :  	{{ $model->customer->customer_address }} </p>
					Contact : {{ $model->customer->customerDetail->phone_number ?  $model->customer->customerDetail->phone_number : 'NA' }}
				</address>
			</div>
		
			<div class="col-sm-4 invoice-col">
				Order
				<address>
					<strong> Ref # {{ $model->order_reference }} </strong><br>
					<p>  Location :  <a target="_blank" href="{{ url('view-location', ['id' => $model->id]) }}"> {{ $orderLocation ? $orderLocation : 'Click here to view your order location.' }} </a></p>
					Contact : {{ $model->order_contact ?  $model->order_contact : 'NA' }}
				</address>
			</div>
			
			<div class="col-sm-4 invoice-col">
				Restaurant
				<address>
					<strong> {{ $model->store->store_name ?  $model->store->store_name : 'NA' }} </strong><br>
					<p> Location :  <a target="_blank" href="{{ url('view-location', ['id' => $model->id]) }}"> {{ $storeLocation ? $storeLocation : 'Click here to view your store location.' }} </a></p>
					Contact : {{ $model->store->store_contact ?  $model->store->store_contact : 'NA' }} 
				</address>
			</div>
		<!-- /.col -->
	  </div>
	  <!-- /.row -->

	  <!-- Table row -->
	  <div class="row">
		<div class="col-12 table-responsive">
		  <table class="table table-striped">
			<thead>
			<tr>
			  <th> # </th>
			  <th> Home Delivery </th>
			  <th> Pickup </th>
			  <th> Qunatity </th>
			  
			</tr>
			</thead>
			<tbody>
			@foreach($model->orderProducts as $key => $product)
			<tr>
				<td> {{ ++$key }} </td>
				<td> {{ ($model->home_delivery  == 1) ? 'Yes' : 'No' }} </td>
				<td> {{ ($model->pickup  == 1) ? 'Yes' : 'No' }} </td>
				<td> {{ $product->product_quantity }} </td>
				
			</tr>
			@endforeach
			</tbody>
		  </table>
		</div>
		<!-- /.col -->
	  </div>
	  <!-- /.row -->

	  <div class="row">
		<!-- accepted payments column -->
		<div class="col-6">
		  <p class="lead">Payment Methods:</p>
		  <img src="{{ asset('admin') }}/dist/img/credit/visa.png" alt="Visa">
		  <img src="{{ asset('admin') }}/dist/img/credit/mastercard.png" alt="Mastercard">
			
		</div>
		<!-- /.col -->
		<div class="col-6">
			<p class="lead"> Order Detail  </p>
			<div class="row">
				@foreach($model->orderProducts as $product)
					<div class="col-md-12">
						<strong> {{ $product->product->product_name }} </strong>
						@foreach($product->product_attributes as $key => $attribute )
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<strong>{{ $attribute['attribute_name'] }} </strong>
								</div>
								
								@foreach($attribute['options'] as $key_ => $option)
									@if($option['IsChecked'] == 1)
										<div class="col-md-6 col-sm-12  pt-1 pb-1">
											{{ $attribute['options'][$key_]['option'] }}
										</div>
										<div class="col-md-6 col-sm-12">
											{{ $attribute['options'][$key_]['value'] }}
										</div>
										
									@endif
								@endforeach
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
			
			<p class="lead"> Due Amount  </p>

			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<th style="width:50%">Subtotal:</th>
							<td>{{ $model->sub_total }}</td>
						</tr>
						<tr>
							<th>Coupon discount:</th>
							<td>{{ $model->coupon }}</td>
						</tr>
						<tr>
							<th>Pay from Wallet :</th>
							<td>{{ $model->walletPayment }}</td>
						</tr>
						<tr>
							<th>Delivery charges:</th>
							<td>{{ $model->delivery_charges }}</td>
						</tr>
						<tr>
							<th>Total:</th>
							<td>{{ $model->grand_total }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.col -->
	  </div>
	  <!-- /.row -->

	  <!-- this row will not appear when printing -->
	  <div class="row no-print">
		<div class="col-12">
		  <a href="javascript://" onclick="printOrder()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
		  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
			Payment
		  </button>
		  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
			<i class="fas fa-download"></i> Generate PDF
		  </button>
		</div>
	  </div>
	</div>
@stop  
<!-- jQuery -->
<script src="{{asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&amp;libraries=places"></script> 

<script>
	$(document).ready(function() {
		var latitude = {{ $model->latitude }};
		var longitude = {{ $model->longitude }};
		
		InitializeMap(latitude, longitude);
	});
	function InitializeMap(Latitude, Longitude) {
		var uluru = {lat: Latitude, lng: Longitude};
	
		var map = new google.maps.Map(
		document.getElementById('storeMap'), {zoom: 15, center: uluru});
		 
		var marker = new google.maps.Marker({position: uluru, map: map});
	}
</script>
 