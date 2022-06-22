@extends('layouts.main')

@section('title', 'Users / Owners')

@section('content')
	
	<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
				<h3 class="card-title"> @yield('title') </h3>
				<div class="card-tools">
                	<a href="{{ route('new-user') }}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Create User </a>
				</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
				<div class="">
					<table id="users" class="table table-bordered table-hover  table-responsive">
						<thead>
							<tr>
								<th> # </th>
								<th> Name  </th>
								<th> Email </th>
								<th> Contact </th>
								<th> Status </th>
								<th> Actions </th>
							</tr>
						</thead>
						<tbody>
						
							@php $i = 0; @endphp
							@foreach($model as $key => $user)
							<tr id="{{ $key }}">
								<td> {{ ++$i }} </td>
								<td> <a href="{{ route('edit', ['id' => $user->id]) }}"> {{ $user->userDetail ? $user->userDetail->name : ''  }} </a></td>
								<td> {{ $user->email }} </td>
								<td> {{ $user->userDetail ? $user->userDetail->phone_number : '' }} </td>
								<td> {{ $user->owner_status }} </td>
								<td>  
									<a href="{{ route('edit', ['id' => $user->id]) }}" class="btn btn-block btn-success btn-flat">  <i class="fa fa-check"></i> Edit </a>						
								</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th> # </th>
								<th> Name  </th>
								<th> Email </th>
								<th> Contact </th>
								<th> Status </th>
								<th> Actions </th>
							</tr>
						</tfoot>
					</table>
				</div>
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
		$("#users").DataTable();
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

	
</script>