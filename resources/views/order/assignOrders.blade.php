@extends('layouts.main-admin')

@section('title', 'Assign Orders')

@section('content')
	<!-- /.modal -->
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title"> Assign Order to rider  </h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			
			<div class="modal-body">
				<form action="{{ route('assign') }}" method="post" role="form">
					@csrf 
					<input type="hidden" name="order_id" id="order_id">
			
					<div class="form-group">
						<label> Store Riders </label>
						<select class="form-control" id="rider_id" name="rider_id" style="width: 100%;">
							<option selected="selected"> Choose Rider </option>
						</select>
					</div>
					
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success" onclick=""> Update </button>
					
				</form>
			</div>
			
		  </div>
		  <!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
				<h3 class="card-title"> @yield('title') </h3>
				@can('recieve-orders')
					<div class="card-tools">
						<a href="{{ route('recieve-orders') }}" class="btn btn-success btn-sm"> <i class="far fa-circle nav-icon"></i> Recieved Orders </a>
					</div>
				@endcan
            </div>
            <!-- /.card-header -->
            <div class="card-body">
				<table id="assign-orders" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th> # </th>
							<th> Reference No.</th>
							<th> Sub Total </th>
							<th> Grand Total </th>
							<th> Status </th>
							<th> Actions </th>
						</tr>               
					</thead>
					<tbody>
							@php $i = 0; @endphp
							@foreach($model as $key => $order)
							<tr id="{{ $key }}">
								<td> {{ ++$i }} </td>
								<td> <a href="{{ route('view-order', ['id' => $order->id]) }}"> {{ $order->order_reference }} </a></td>
								<td> {{ $order->sub_total }} </td>
								<td> {{ $order->grand_total }} </td>
								<td> {{ $order->order_status }} </td>
								<td>  
									<a href="javascript://" onclick="riders({{ $order->id }})" id="{{ $key }}" class="btn btn-block btn-success btn-flat">  <i class="fa fa-edit"></i> Edit </a>						
								</td>
							</tr>
							@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th> # </th>
							<th> Reference No.</th>
							<th> Sub Total </th>
							<th> Grand Total </th>
							<th> Status </th>
							<th> Actions </th>
						</tr>
					</tfoot>
				</table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@stop  
<script src="{{asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{asset('admin') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
	$(function () {
		$("#assign-orders").DataTable();
	});
	
	function updateOrder(order_id, status, id)
	{
		var rowId = id;
		var orderStatus = status;
		var orderId = order_id;
		$.ajax({
			type : 'post',
			url : "{{ route('update-status') }}",
			data : {'order_id': orderId, 'order_status' : orderStatus},
			success : function(res) {
				var response = $.parseJSON(res);
				if(response.status == 1) {
					$('#' + rowId).fadeOut(1000);
				}
			},
			error : function (error) {
				console.log(error);
			}
		});
	}

	function riders(order_id) {
		var orderId = order_id;
		$.ajax({
			type : 'post',
			url : "{{ route('store-riders') }}",
			data : {'order_id': orderId},
			success : function(res) {
				$('#rider_id').html(res);
				$('#order_id').val(orderId);
				
				$('#modal-default').modal('show');
			},
			error : function (error) {
				console.log(error);
			}
		});
	}
	
</script>